import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './components/pages/Home.vue';
import AdvancedSearch from './components/pages/AdvancedSearch.vue';
import SingleProfile from './components/pages/SingleProfile.vue';
import MessageReviewForm from './components/pages/MessageReviewForm.vue';
import Error404 from './components/pages/Error404.vue';

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
      },

      {
         path: '/contact/:type/:userId',
         name: 'from_contact',
         component: MessageReviewForm,
      },

      {
         path: '/*',
         name: 'erroe404',
         component: Error404,
      },
   ]
});

export default router;