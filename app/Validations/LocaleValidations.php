<?php

namespace App\Validations;

trait LocaleValidations {

    public function foreachLocale(array $rulesArray, string $attribute, $rules)
    {
        foreach (config('app.locales') as $key => $lang) {
            $_rules = '';

            if (is_string($rules)) {
                $_rules = $rules;
            } else if (is_callable($rules)) {
                $_rules = $rules($key);
            }

            $rulesArray[$attribute . '.' . $key] = $_rules;
        }
        return $rulesArray;
    }
}
