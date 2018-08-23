/*
 |--------------------------------------------------------------------------
 | Bootstrap application
 |--------------------------------------------------------------------------
 */

require('./bootstrap')

/*
 |--------------------------------------------------------------------------
 | Application specific components
 |--------------------------------------------------------------------------
 */

/** Dev **/
Vue.component('dev-global-form', require('./app/dev/global/Form.vue'))
Vue.component('dev-page-form', require('./app/dev/page/Form.vue'))
Vue.component('dev-page-list', require('./app/dev/page/List.vue'))

/** Admin **/
Vue.component('admin-global-form', require('./app/admin/global/Form.vue'))
Vue.component('admin-page-form', require('./app/admin/page/Form.vue'))
Vue.component('admin-page-list', require('./app/admin/page/List.vue'))

 /*
 |--------------------------------------------------------------------------
 | Main Vue instance
 |--------------------------------------------------------------------------
 */

const app = new Vue({
    el: '#app'
});
