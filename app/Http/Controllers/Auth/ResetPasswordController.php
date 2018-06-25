<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends FrontController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }
}
