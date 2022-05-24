require('./bootstrap');
window.Vue = require("vue").default;
Vue.component('pagination', require('laravel-vue-pagination'));
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import "materialize-css/dist/js/materialize.min"
import App from './App.vue';
import Home from '../js/components/Home';
import VueAxios from 'vue-axios';
import  axios from 'axios';
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(VueAxios,axios);

const routes =[
    {
        name:'/',
        path: '/',
        component:Home
    },

]

const router =new VueRouter({mode:'history',  routes:routes});
const app = new Vue(Vue.util.extend({router},App)).$mount('#app');
