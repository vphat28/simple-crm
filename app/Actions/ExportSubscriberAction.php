<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;

class ExportSubscriberAction extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "WP Export";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "cast";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        // Basic authentication...
        $response = Http::withBasicAuth(env('WP_ADMIN_USERNAME'), env('WP_ADMIN_PASSWORD'))
                        ->post(
                            env('WP_ENDPOINT') . '/wp-admin/admin-ajax.php?action=create_subscriber',
                            [
                                'name' => $model->name,
                                'email' => $model->email_address,
                                'phone_number' => $model->phone_number,
                                'desired_budget' => $model->desired_budget,
                                'message' => $model->message,
                            ]
                        );
        $body = json_decode($response->body());
        if ($body->success === true) {
            $this->success();
        } else {
            $this->error($body->data);
        }
    }
}
