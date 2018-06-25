<?php

namespace App\Http\Controllers\Front\Shop;

use App\ProductCategory;
use App\Http\Controllers\Front\FrontController;
use App\Facades\ShopViewComposer;

class CategoryController extends FrontController
{
    public function show($locale, ProductCategory $category)
    {
        $currentPage = $category;

        ShopViewComposer::categoryAncestry($category);

        $products = $category->products;

        return view('app.front.shop.category.index', compact('category', 'currentPage', 'products'));
    }
}
