<?php

namespace App\Http\Controllers\Shop;

use App\Product;
use App\ProductCategory;
use App\Http\Controllers\Front\FrontController;

class ProductController extends FrontController
{
    public function show($locale, ProductCategory $category, Product $product)
    {
        $page = $product;
        return view('app.shop.product', compact('product', 'page'));
    }
}
