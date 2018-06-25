<?php

namespace App\Http\Requests;

use Auth;

class PageRequest extends Request
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        $id = null;
        if ($this->route('page') !== null) {
            $id = $this->route('page')->id;
        }

        $rules = [
            'view' => 'required|string'
        ];

        $rules = $this->foreachLocale($rules, 'title', 'required|string|min:3|unique_json:pages,' . $id);
        $rules = $this->foreachLocale($rules, 'slug', 'required|string|unique_json:pages,' . $id);

        foreach ($this->sections as $key => $section) {
            $rules['sections.' . $key . '.id'] = 'required|string';
            $rules['sections.' . $key . '.type'] = 'required';
            $rules = $this->foreachLocale($rules, 'sections.' . $key . '.name', 'required|string');
            if ($section['type'] === 'text') {
                $rules = $this->foreachLocale($rules, 'sections.' . $key . '.content', 'required|string');
            } else if ($section['type'] === 'picture') {
                $rules['sections.' . $key . '.value'] = 'required';
            }
        }

        return $rules;
    }
}
