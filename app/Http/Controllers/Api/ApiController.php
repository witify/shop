<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * Returns the current User information in json
     *
     * @return User Current user
     */
    public function user()
    {
        return request()->user();
    }
}
