import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './components/pages/Home.vue';
import AdvancedSearch from './components/pages/AdvancedSearch.vue';

Vue.use(VueRouter);

const router = new VueRouter({
   mode: 'history',
   linkExactActiveClass: 'active',

   routes: [
      {
         path: '/',
         name: 'home',
         component: Home,
      },
      {
         path: '/advanced_search/:jobRole',
         name: 'advanced_search',
         component: AdvancedSearch,
      }
   ]
});

export default router;