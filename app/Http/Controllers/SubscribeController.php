<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
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
}
