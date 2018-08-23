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

/** Front **/
Vue.component('front-contact', require('./app/front/ContactForm.vue'))
Vue.component('address-form', require('./app/front/AddressForm.vue'))

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
