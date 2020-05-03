/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

/*includes */
import Gets from './Gets'
Vue.prototype.$gets = new Gets(window.user)
/*end includes*/
/*vue-infinite-loading  load more*/
Vue.use(require('vue-resource'));
Vue.component('InfiniteLoading', require('vue-infinite-loading'));

/*end vue-infinite-loading load more*/

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
/*vue router */
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
const routes = [
    { path: '/Jobs', component: require('./components/Job').default },
    { path: '/Projects', component: require('./components/Project').default },
    { path: '/Home', component: require('./components/Home').default },
    { path: '/', component: require('./components/Home').default, meta: {
            auth: true,
            title: 'Brikole'
        } },
    { path: '/Profile', component: require('./components/Profile').default },
]
const router = new VueRouter({
    mode:'history',
    routes // short for `routes: routes`
})

/*end vue router */






/** VueProgressBar */

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(255, 162, 0)',
    failedColor: 'red',
    height: '2px',
    thickness: '5px',
    transition: {
        speed: '1s',
        opacity: '1s',
        termination: 900
    },
})
/*end VueProgressBar*/

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


/*  vform */
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
/* vform end */





/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    routes:[

    ]
});
