<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Auth\SocialiteTrait;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends FrontController
{
   /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use SocialiteTrait;
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        return '/' . Auth::user()->role;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest')->except('logout');
    }
}
