window.Vue = require('vue');
window.axios = require('axios');
window.gsap = require('gsap');

import App from './App.vue';
import router from './routes';

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App),
});
