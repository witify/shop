<?php

namespace App\Http\Controllers\Shop;

use Cart;
use App\Page;
use App\Product;
use App\CouponCode;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Front\FrontController;
use App\Http\Requests\Shop\Cart\CartAddRequest;
use App\Http\Requests\Shop\Cart\CartCouponRequest;
use App\Http\Requests\Shop\Cart\CartGetPriceRequest;

use App\Cart\CartUtils;

class CartController extends FrontController
{
    public function index()
    {
        CartUtils::refresh();
        return view('app.shop.cart.index');
    }

    public function add(CartAddRequest $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cartItem = Cart::add($product, $request->quantity, $request->options);
        $cartSuccess = Page::where('name', 'cart.success')->first();
        return $this->json()->redirect($cartSuccess->url() . '?row_id=' . $cartItem->rowId);
    }

    public function remove(string $rowId)
    {
        Cart::remove($rowId);
        return $this->json()->success();
    }

    public function getPrice(CartGetPriceRequest $request)
    {
        $product = Product::findOrFail($request->product_id);

        return [
            'price' => $product->getBuyablePrice($request->options)
        ];
    }

    public function addCoupon(CartCouponRequest $request)
    {
        if (CouponCode::where('name', $request->coupon)->count() > 0) {
            Cart::setMetaData('coupon_code', strtoupper($request->coupon));
        }

        return redirect()->back();
    }

    public function removeCoupon()
    {
        Cart::setMetaData('coupon_code', null);

        return redirect()->back();
    }
}
