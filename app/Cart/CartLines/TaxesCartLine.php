<?php

namespace App\Cart\CartLines;

use Witify\LaravelCart\Contracts\CartLineHandler;
use Witify\LaravelCart\Cart;

class TaxesCartLine implements CartLineHandler
{
    static public function handle(Cart $cart, float $total) : float
    {
        return $total * 0.15;
    } 
}
