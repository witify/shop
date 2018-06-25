<?php

namespace App\Http\Controllers\Admin;

use App\User;

class HomeController extends AdminController
{
    /**
     * Dev dashboard
     * 
     * @return View
     */
    public function index()
    {
        return view('app.admin.index');
    }

    /**
     * Account settings
     * 
     * @return View
     */
    public function account()
    {
        return view('app.admin.account');
    }
}
