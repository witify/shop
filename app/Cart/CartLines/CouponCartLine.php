<?php

namespace App\Cart\CartLines;

use App\CouponCode;
use Witify\LaravelCart\Cart;
use Witify\LaravelCart\Contracts\CartLineHandler;

class CouponCartLine implements CartLineHandler
{
    static public function handle(Cart $cart, float $total) : float
    {
        if ($cart->metaData->has('coupon_code') && $cart->getMetaData('coupon_code') != null) {
            $coupon = CouponCode::where('name', $cart->metaData['coupon_code'])->first();
            
            if ($coupon != null) {
                return -$coupon->rebate($total);
            }
        }

        return 0;
    } 
}
