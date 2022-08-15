<?php

namespace Tests\Unit;

use App\Actions\ExportSubscriberAction;
use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use LaravelViews\Views\View;

class SubscriberTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test
     *
     * @return void
     */
    public function test_invalid_form()
    {
        $response = $this->post('/subscribe',
            [
                'firstname'      => 'Xavi',
                'lastname'       => '',
                'phone_number'   => '123-456-7544',
                'email_address'  => 'vphat2223@gmail.com',
                'desired_budget' => '200',
                'message'        => 'hello',
            ]);
        $response->assertSessionHasErrors(['lastname']);

        $response = $this->post('/subscribe',
            [
                'firstname'      => 'Xavi',
                'lastname'       => 'nguyen',
                'phone_number'   => '123-451',
                'email_address'  => 'vphat2223@gmail.com',
                'desired_budget' => '200',
                'message'        => 'hello',
            ]);
        $response->assertSessionHasErrors(['phone_number']);
    }

    public function test_email_existed_exception()
    {
        $response = $this->post('/subscribe',
            [
                'firstname'      => 'xavi',
                'lastname'       => 'nguyen',
                'phone_number'   => '123-456-7544',
                'email_address'  => 'vphat2223@gmail.com',
                'desired_budget' => '200',
                'message'        => 'hello',
            ]);
        $response->assertSessionHasNoErrors();
        $response->assertRedirectContains('thanks');

        $response = $this->post('/subscribe',
            [
                'firstname'      => 'xavi',
                'lastname'       => 'nguyen',
                'phone_number'   => '123-456-7544',
                'email_address'  => 'vphat2223@gmail.com',
                'desired_budget' => '200',
                'message'        => 'hello',
            ]);
        $response->assertSessionHasErrors(['email_address']);
    }

    public function test_export_function()
    {
        $response = $this->post('/subscribe',
            [
                'firstname'      => 'xavi',
                'lastname'       => 'nguyen',
                'phone_number'   => '123-456-7544',
                'email_address'  => 'vphat2223@gmail.com',
                'desired_budget' => '200',
                'message'        => 'hello',
            ]);
        $response->assertSessionHasNoErrors();
        $response->assertRedirectContains('thanks');

        $subscriber     = Subscriber::where('email_address', 'vphat2223@gmail.com')->firstOrFail();
        $mockedView     = $this
            ->getMockBuilder(View::class)
            ->setMethods(['__construct', 'getRenderData', 'emitSelf'])
            ->getMock();
        $stub           = $this
            ->getMockBuilder(ExportSubscriberAction::class)
            ->setMethods(['importWPRequest', 'success', 'error'])
            ->getMock();
        $mockedResponse = new \stdClass();
        // Simulate remote response is a success
        $mockedResponse->success = true;
        $mockedResponse->data    = "remote message";
        $stub->expects($this->exactly(2))
             ->method('importWPRequest')->willReturn($mockedResponse);
        $stub->expects($this->once())->method('success');
        $stub->handle($subscriber, $mockedView);
        // Simulate remote response is error
        $mockedResponse->success = false;
        // Error function should be called
        $stub->expects($this->once())->method('error');
        $stub->handle($subscriber, $mockedView);
    }
}
