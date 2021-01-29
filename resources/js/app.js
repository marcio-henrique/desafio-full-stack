require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import VueMask from 'v-mask';

import routes from './routes';

import App from './components/App';

Vue.prototype.$http = axios;

//módulos para uso nos componentes
Vue.use(VueRouter);
Vue.use(VueMask);

const router = new VueRouter({
    mode: 'history',
    routes
})

const app = new Vue({
    el: '#app',
    components: {App},
    router
})
