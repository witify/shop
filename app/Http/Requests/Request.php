<?php

namespace App\Http\Requests;

use App\Validations\LocaleValidations;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     * Helpers
     */
    use LocaleValidations;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return $this->onDelete();
            }
            case 'POST':
            {
                return $this->onPost();
            }
            case 'PUT':
            {
                return $this->onPut();
            }
            case 'PATCH':
            {
                return $this->onPatch();
            }
        };
    }

    protected function onDelete()
    {
        return [];
    }

    protected function onPost()
    {
        return [];
    }

    protected function onPut()
    {
        return [];
    }

    protected function onPatch()
    {
        return [];
    }
}
