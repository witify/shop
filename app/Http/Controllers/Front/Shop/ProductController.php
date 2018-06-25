<?php

namespace App\Http\Controllers\Front\Shop;

use App\Product;
use App\ProductCategory;
use App\Http\Controllers\Front\FrontController;

class ProductController extends FrontController
{
    public function show($locale, ProductCategory $category, Product $product)
    {
        $currentPage = $product;
        return view('app.front.shop.product', compact('product', 'currentPage'));
    }
}
