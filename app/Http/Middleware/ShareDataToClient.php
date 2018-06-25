<?php

namespace App\Http\Middleware;

use Cart;
use Auth;
use View;
use Closure;
use App\Translation\TranslationLoader;

class ShareDataToClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $translations = TranslationLoader::js();

        View::share('_laravel', collect([
            'env' => config('app.env'),
            'app' => collect(config('app'))->except('providers', 'aliases'),
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'translations' => $translations,
            'notifications' => session('flash_notification', collect()),
            'cart' => Cart::toArray()
        ]));

        return $next($request);
    }
}
