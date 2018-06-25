<?php

namespace App\Http\Requests\Account;

use App\Http\Requests\Request;

class InfoRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|unique:users,email,' . $this->user()->id . '|string|email',
        ];
    }
}
