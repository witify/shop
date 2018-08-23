<?php

namespace App\Http\Controllers\Shop;

use App\Cart\CartUtils;
use Illuminate\Http\Request;
use App\Http\Controllers\Front\FrontController;

class CheckoutController extends FrontController
{
    public function index(Request $request, string $locale, string $step = 'start')
    {
        CartUtils::refresh();
        return $this->loadStep($request, $step);
    }

    private function loadStep(Request $request, string $step)
    {
        if (method_exists($this, $step)) {
            return $this->$step($request);
        }

        abort(404);
    }

    private function start(Request $request)
    {
        return view('app.shop.checkout.start');
    }

    private function address(Request $request)
    {
        return view('app.shop.checkout.address');
    }

    private function shipping(Request $request)
    {
        return view('app.shop.checkout.shipping');
    }

    private function payment(Request $request)
    {
        return view('app.shop.checkout.payment');
    }

    private function review(Request $request)
    {
        return view('app.shop.checkout.review');
    }

    private function success(Request $request)
    {
        return view('app.shop.checkout.success');
    }
}
