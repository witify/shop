<?php

namespace App\Http\Controllers\Dev;

use Auth;
use App\User;

class UserController extends DevController
{
    /**
     * Dev dashboard
     * 
     * @return View
     */
    public function index()
    {
        $users = User::orderBy('email')->paginate();
        return view('app.dev.user.index', compact('users'));
    }

    /**
     * Login as a User
     *
     * @param User $user
     * @return redirect
     */
    public function loginAs(User $user)
    {
        Auth::login($user);
        return redirect($user->role);
    }
}
