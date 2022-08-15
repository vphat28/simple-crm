<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Show subscribe form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Request $request)
    {
        return  view('subscribe.form');
    }

    /**
     * @param  Request  $request
     *
     * @return void
     */
    public function submit(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:12',
            'desired_budget' => 'required|numeric|min:13',
            'email_address' => 'required|email:rfc,dns|unique:subscribers',
            'message' => 'required|max:1055',
        ]);

        $user = new Subscriber();
        $user->name = $request->get('firstname') . ' ' . $request->get('lastname');
        $user->phone_number = $request->get('phone_number');
        $user->email_address = $request->get('email_address');
        $user->desired_budget = $request->get('desired_budget');
        $user->message = $request->get('message');
        $user->save();

        return redirect('subscribe/thanks');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function thanks()
    {
        return  view('subscribe.thanks');
    }
}
