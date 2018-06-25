<?php

namespace App\Model\Interfaces;

interface IsPage 
{
    public function url(string $locale = null) : string;
}
