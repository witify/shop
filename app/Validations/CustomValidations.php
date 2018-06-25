<?php

namespace App\Validations;

use DB;
use Auth;
use Hash;

class CustomValidations {

    public function isCurrentPassword($attribute, $value, $parameters, $validator)
    {
        if (Auth::check()) {
            return Hash::check($value, Auth::user()->password);
        }

        return false;
    }

    public function isOwnModel($attribute, $value, $parameters, $validator)
    {
        if (Auth::check()) {
            return DB::table($parameters[0])
                    ->where('id', $value)
                    ->where('user_id', Auth::user()->id)
                    ->first() !== null;
        }

        return false;
    }

    public function isUniqueJson($attribute, $value, $parameters, $validator)
    {
        $id = array_key_exists(1, $parameters) ? $parameters[1] : null;
        return DB::table($parameters[0])
                ->where('id', '!=', $id)
                ->where(str_replace('.', '->', $attribute), $value)
                ->first() === null;
    }
}
