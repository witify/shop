<?php

namespace App\Page\Contracts;

use App\Page;
use Illuminate\View\View;
use Illuminate\Http\Request;

interface PageLoader
{
    static public function load(Request $request, Page $page);
}
