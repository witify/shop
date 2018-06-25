<?php

namespace App\Http\Controllers\Dev;

use App\User;

class HomeController extends DevController
{
    /**
     * Dev dashboard
     * 
     * @return View
     */
    public function index()
    {
        return view('app.dev.index');
    }

    /**
     * Users dashboard
     * 
     * @return View
     */
    public function user()
    {
        $users = User::paginate(20);
        return view('app.dev.user.index', compact('users'));
    }

    /**
     * Account settings
     * 
     * @return View
     */
    public function account()
    {
        return view('app.dev.account');
    }
}
