<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Facades\ShopViewComposer;

class FrontController extends Controller {

    protected $pages;
    protected $globals;
    protected $categories;

    public function __construct()
    {
        $this->shareGlobalData();
    }

    /**
     * Share data to all front routes
     *
     * @return void
     */
    private function shareGlobalData()
    {
        ShopViewComposer::run();
    }
}
