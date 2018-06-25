<?php

namespace App\Http\Requests;

class GlobalRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];

        foreach ($this->all()['content'] as $key => $content) {
            $rules['content.' . $key . '.id'] = 'required|string';
            $rules = $this->foreachLocale($rules, 'content.' . $key . '.name', 'required|string');
            $rules = $this->foreachLocale($rules, 'content.' . $key . '.value', 'required|string');
        }

        return $rules;
    }
}
