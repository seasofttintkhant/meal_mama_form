
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('first-name', require('./components/FirstComponent.vue'));
Vue.component('last-name', require('./components/LastComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
        first_name: null,
        last_name: null
    },
    created: function(){
        this.first_name = "Tint";
        this.last_name = "Aung Khant";
    } 
});
