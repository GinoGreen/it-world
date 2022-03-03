<template>
   <div class="it-wrapper">
      <Header/>
      <router-view></router-view>
   </div>
</template>

<script>
import Header from './components/partials/Header';
export default {
   name: 'App',

   components:{
      Header
   },
   data(){
      return{
         apiUrl:'http://127.0.0.1:8000/api/home',
         user:''
      }
   },
   mounted(){
      this.getApi();
   },
   methods:{
       getApi(){
         axios.get(this.apiUrl)
          .then(res => {
           this.user = res.data;
            console.log(this.user[0].cognome) ;
          })
       }
   }

}
</script>

<style lang="scss">
.it-wrapper{
   background-image: url("/img/moon/planet-vector-10.svg");
   background-position: center right;
   background-size: 60%;
   background-repeat: no-repeat;
   background-position-x: 60vw;
   
}


</style>