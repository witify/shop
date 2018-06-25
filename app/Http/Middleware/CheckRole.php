<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, string $role)
    {
        if ($request->user()->hasRole($role)) {
            return $next($request);
        }

        return redirect('/' . $request->user()->role);
    }
}
