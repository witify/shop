<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Multilingual
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (collect(config('app.locales'))->has($request->segment(1))) {
            return $next($request);
        }

        abort(404);
    }
}
