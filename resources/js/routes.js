import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './components/pages/Home.vue';
import AdvancedSearch from './components/pages/AdvancedSearch.vue';
import SingleProfile from './components/pages/SingleProfile.vue';

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
         path: '/advanced_search/:job_role',
         name: 'advanced_search',
         component: AdvancedSearch,
      },
      {
         path: '/profile/:profile_id',
         name: 'profile',
         component: SingleProfile,
      }
   ]
});

export default router;