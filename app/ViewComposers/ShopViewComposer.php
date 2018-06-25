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
        $pages['home'] = $this->pages->where('id', 1)->first();
        $pages['contact'] = $this->pages->where('id', 2)->first();
        $pages['cart'] = $this->pages->where('id', 3)->first();
        $pages['checkout'] = $this->pages->where('id', 4)->first();
        $pages['login'] = $this->pages->where('id', 5)->first();
        $pages['register'] = $this->pages->where('id', 6)->first();

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
