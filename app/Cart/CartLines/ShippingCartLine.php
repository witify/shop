<?php

namespace App\Cart\CartLines;

use Witify\LaravelCart\Cart;
use Witify\LaravelCart\Contracts\CartLineHandler;

class ShippingCartLine implements CartLineHandler
{
    static public function handle(Cart $cart, float $total) : float
    {
        return 0;
    } 
}
