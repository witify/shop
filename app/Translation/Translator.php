<?php

namespace App\Translation;

use Log;

class Translator
{
    /**
     * Translate an attribute in the best possible way
     *
     * @param array $attribute
     * @return string
     */
    static public function get(array $attribute) : string
    {
        if (array_key_exists(app()->getLocale(), $attribute)) {
            return $attribute[app()->getLocale()];
        }

        if (array_key_exists(config('app.fallback_locale'), $attribute)) {
            return $attribute[config('app.fallback_locale')];
        }

        if (count($attribute) > 0) {
            return array_values($attribute)[0];
        }

        Log::error('Could not find a translation in Translator::get(array $attribute)');

        return '';
    }
}
