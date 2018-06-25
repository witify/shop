/*
 |--------------------------------------------------------------------------
 | Translations
 |--------------------------------------------------------------------------
 */

window.__ = function (key) {
    return window.Laravel.translations[key] || null;
}

Vue.prototype.$__ = __
