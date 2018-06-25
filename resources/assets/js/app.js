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

/** Front **/
Vue.component('front-contact', require('./app/front/ContactForm.vue'))

/** Shop **/
Vue.component('add-to-cart', require('./app/store/cart/AddToCart.vue'))
Vue.component('remove-from-cart', require('./app/store/cart/RemoveFromCart.vue'))
Vue.component('product-cart', require('./app/store/product/ProductCart.vue'))

 /*
 |--------------------------------------------------------------------------
 | Main Vue instance
 |--------------------------------------------------------------------------
 */

const app = new Vue({
    el: '#app'
});
