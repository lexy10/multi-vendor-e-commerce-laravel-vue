
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//support vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store"

const store = new Vuex.Store(
    storeData,
)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('product-home', require('./components/ProductHome.vue'));
Vue.component('categories', require('./components/Category.vue'));
Vue.component('products', require('./components/Product.vue'));
Vue.component('cart-count', require('./components/CartCount.vue'));
Vue.component('product-detail', require('./components/ProductDetail.vue'));
Vue.component('cart-summary', require('./components/CartSummary.vue'));

const app = new Vue({
    el: '#app',
    store
});
