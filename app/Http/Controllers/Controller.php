<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\Seo;
use Witify\LaravelJsonResponse\JsonTrait;
use Witify\LaravelSeoAttributes\SeoTrait;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, SeoTrait, JsonTrait;
}
