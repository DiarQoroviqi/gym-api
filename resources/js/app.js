/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from "vue-router";
import routes from './routes';
import Toasted from 'vue-toasted';

Vue.use(VueRouter);
Vue.use(Toasted);

const closeAction = {
    text : 'X',
    onClick : (e, toastObject) => {
        toastObject.goAway(0);
    }
}

let errorOptions = {
    type: 'error',
    action: closeAction,
    duration: 10000
};

Vue.toasted.register('error_notification', (payload) => {
        if (!payload) {
            return "Oops.. Something Went Wrong.."
        }

        return "Oops.. " + payload.message;
    },
    errorOptions
);

let successOptions = {
    type: 'success',
    action: closeAction,
    duration: 10000,
};

Vue.toasted.register('success_notification', (payload) => {
        if (!payload) {
            return "Success"
        }

        return  payload.message;
    },
    successOptions
);

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
