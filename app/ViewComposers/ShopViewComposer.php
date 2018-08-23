<?php

namespace App\ViewComposers;

use App\Page;
use App\ProductCategory;
use App\GlobalModel as GlobalModel;
use App\Utils\CategoryUtils;

class ShopViewComposer 
{
    public $shopData;
    public $pages;
    public $globals;
    public $categories;

    public function run()
    {
        $this->shopData = collect();

        $this->pages = Page::all();
        $this->globals = GlobalModel::first();
        $this->categories = ProductCategory::where('id', 1)->with('children')->get();

        $pages = collect();
        $pages['all'] = $this->pages;
        $pages['home'] = $this->pages->where('name', 'home')->first();
        $pages['contact'] = $this->pages->where('name','contact')->first();
        $pages['cart'] = $this->pages->where('name', 'cart')->first();
        $pages['checkout'] = $this->pages->where('name', 'checkout')->first();
        $pages['login'] = $this->pages->where('name', 'login')->first();
        $pages['register'] = $this->pages->where('name', 'register')->first();

        $this->share('pages', $pages);
        $this->share('globals', $this->globals);
        $this->share('categories', $this->categories);
    }

    public function getData()
    {
        return $this->shopData;
    }

    public function share(string $key, $data)
    {
        $this->shopData[$key] = $data;
        view()->share('shop', $this->shopData);
    }

    public function categoryAncestry(ProductCategory $category)
    {
        $ancestry = CategoryUtils::findAncestry($this->categories, $category);
        $this->share('categoryAncestry', $ancestry);
    }
}
