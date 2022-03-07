<template>
<div class="it-container-page">
   <section class="it-section-page">
     <h1>{{profile.name}}</h1>
   </section>
</div>
  
</template>

<script>
export default {
   name: 'SingleProfile',
   data(){
      return{
         apiUrl: 'http://127.0.0.1:8000/api/profile/',
         profile: null,
      }
   },
   methods:{
      getApi(){
         axios.get(this.apiUrl + this.$route.params.profile_id)
            .then(res => {
               this.profile = res.data[0];
               console.log(res.data);
         });
      }
   },

   mounted(){
      this.getApi();
   }
}

</script>

<style lang="scss" scoped>
@import '../../../sass/guest/_variables.scss';
@import '../../../sass/guest/_generals.scss';

</style>