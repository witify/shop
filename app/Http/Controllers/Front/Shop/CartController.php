<?php

namespace App\Http\Controllers\Front\Shop;

use Cart;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Front\FrontController;
use App\Http\Requests\Shop\Cart\CartAddRequest;
use App\Http\Requests\Shop\Cart\CartGetPriceRequest;

class CartController extends FrontController
{
    public function add(CartAddRequest $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cartItem = Cart::add($product, $request->quantity, $request->options);
        return $this->json()->redirect('/cart/success?row_id=' . $cartItem->rowId);
    }

    public function remove(string $rowId)
    {
        Cart::remove($rowId);
        return $this->json()->success();
    }

    public function index()
    {
        return view('app.front.shop.cart.index');
    }

    public function success(Request $request)
    {
        $productId = Cart::items()[$request->row_id]->id;
        $product = Product::findOrFail($productId);
        return view('app.front.shop.cart.success', compact('product'));
    }

    public function getPrice(CartGetPriceRequest $request)
    {
        $product = Product::findOrFail($request->product_id);

        return [
            'price' => $product->getBuyablePrice($request->options)
        ];
    }
}
