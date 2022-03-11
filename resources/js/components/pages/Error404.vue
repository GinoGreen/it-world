<template>

<div class="it-container-page">

   <section class="it-section-page">

      <div class="wrap-error">

         <img src="/img/slider/404.svg" alt="error-404">
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
      width: 40%;
   }

   h3{
      margin: 30px 0px;
   }

   
}

</style>