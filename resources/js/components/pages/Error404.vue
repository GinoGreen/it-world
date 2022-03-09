<template>

<div class="it-container-page">

   <section class="it-section-page">

      <div class="wrap-error">

         <img src="/img/catslider/frontend-dev.svg" alt="">
         <h1>Errore 404</h1>
         <h3>Questa pagina non esiste!</h3>

      </div>
      
   </section>

</div>
  
</template>

<script>
export default {
   name: 'Error404'
}
</script>

<style lang="scss" scoped>
@import '../../../sass/guest/_variables.scss';
@import '../../../sass/guest/_generals.scss';
.wrap-error{
   width: 100%;
   height: 600px;
   display: flex;
   flex-direction: column;
   align-items: center;
   // justify-content: center;

   img{
      width: 20%;
   }

   h1{
      margin: 30px 0px;
   }

   
}

</style>