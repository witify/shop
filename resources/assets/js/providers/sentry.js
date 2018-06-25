/*
 |--------------------------------------------------------------------------
 | Sentry
 |--------------------------------------------------------------------------
 */

import Raven from 'raven-js';
import RavenVue from 'raven-js/plugins/vue';

if (window.env === 'production') {
    Raven
        .config(window.Laravel.sentry_dsn_public)
        .addPlugin(RavenVue, Vue)
        .install();
}
