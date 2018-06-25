<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\Request;

class ContactRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string'
        ];
    }
}
