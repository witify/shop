<?php

namespace App\Http\Requests\Account;

use App\Http\Requests\Request;

class PasswordRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'old_password' => 'required|string|is_current_password',
            'new_password' => 'required|string|min:6|same:new_password_confirmation',
        ];
    }
}
