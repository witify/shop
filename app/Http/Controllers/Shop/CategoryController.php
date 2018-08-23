<?php

namespace App\Http\Controllers\Shop;

use App\ProductCategory;
use App\Http\Controllers\Front\FrontController;
use App\Facades\ShopViewComposer;

class CategoryController extends FrontController
{
    public function show($locale, ProductCategory $category)
    {
        $page = $category;

        ShopViewComposer::categoryAncestry($category);

        $products = $category->products;

        return view('app.shop.category.index', compact('category', 'page', 'products'));
    }
}
