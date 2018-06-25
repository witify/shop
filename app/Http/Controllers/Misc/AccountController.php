<?php

namespace App\Http\Controllers\Misc;

use Hash;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\InfoRequest;
use App\Http\Requests\Account\PasswordRequest;

class AccountController extends Controller
{
    /**
     * Account dashboard
     *
     * @return View
     */
    public function index()
    {
        return view('account.index');
    }

    /**
     * Update account info
     *
     * @return \Illuminate\Http\Response
     */
    public function updateInfo(InfoRequest $request)
    {
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        flash('Informations updated')->success();
        return $this->json()->success();
    }

    /**
     * Update account password
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(PasswordRequest $request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();
        flash('Password updated')->success();
        return $this->json()->success();
    }
}
