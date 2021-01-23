require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import routes from './routes';

import App from './components/App';

Vue.prototype.$http = axios;
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes
})

const app = new Vue({
    el: '#app',
    components: {App},
    router
})
