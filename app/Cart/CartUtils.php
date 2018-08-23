<?php

namespace App\Cart;

use Cart;
use App\Product;
use App\CouponCode;

class CartUtils
{
    public static function refresh()
    {
        Cart::items()->each(function($item) {
            $product = Product::find($item->id);
            if ($product == null) {
                Cart::remove($item->rowId);
            } else {
                Cart::update($item->rowId, $product, $item->quantity, $item->options->toArray());
            }
        });

        if (Cart::hasMetaData('coupon_code')) {
            $coupon = CouponCode::where('name', Cart::getMetaData('coupon_code'))->first();
            if ($coupon == null) {
                Cart::setMetaData('coupon_code', null);
            }
        }
    }
}
