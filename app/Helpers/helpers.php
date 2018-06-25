<?php

/*
|--------------------------------------------------------------------------
| Price Format
|--------------------------------------------------------------------------
|
| Convert to price format.
|
*/
function price_format($number)
{
    return '$' . number_format((float)$number, 2, '.', ',');
}

/*
 |--------------------------------------------------------------------------
 | Helper functions
 |--------------------------------------------------------------------------
 |
 | Here you may add various helper functions you need in the application or 
 | in the views. All these functions will be globally accessibles.
 |
 */

use App\Translation\Translator;

function translate(array $translatable)
{
    return Translator::get($translatable);
}

/*
|--------------------------------------------------------------------------
| Detect Matching Route
|--------------------------------------------------------------------------
|
| Compare given route with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/
function isMatchingRoute($route, $output = "is-active", $force = null)
{
    if ($force ?? ends_with(url()->current(), $route)) return $output;
}

/*
|--------------------------------------------------------------------------
| Detect Active Route
|--------------------------------------------------------------------------
|
| Compare given route with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/
function isActiveRoute($route, $output = "is-active")
{
    if (Route::currentRouteName() == $route) return $output;
}

/*
|--------------------------------------------------------------------------
| Detect Active Routes
|--------------------------------------------------------------------------
|
| Compare given routes with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/
function areActiveRoutes(Array $routes, $output = "is-active")
{
    foreach ($routes as $route)
    {
        if (Route::currentRouteName() == $route) return $output;
    }

}