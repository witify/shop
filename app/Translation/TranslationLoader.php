<?php

namespace App\Translation;

class TranslationLoader
{
    /**
     * Returns the client translation file as an array
     *
     * @return array
     */
    static public function js()
    {
        return include resource_path('lang/' . app()->getLocale() .'/js.php');
    }
}
