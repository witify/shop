<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Client dashboard
     *
     * @return void
     */
    public function index()
    {
        return view('app.client.index');
    }

    /**
     * Account settings
     *
     * @return void
     */
    public function account()
    {
        return view('app.client.account');
    }
}
