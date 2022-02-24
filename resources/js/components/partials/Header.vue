<template>

   <header>
      <div class="container">
         <div class="row">

            <div class="logo col-6"></div>

            <div class="menu col-6"></div>

         </div>
      </div>
   </header>
 
</template>

<script>
export default {
   name: 'Header'
}
</script>

<style lang="scss" scoped>

@import '../../../sass/guest/_variables.scss';

   header{
      height: 90px;
      width: 100%;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1000;
      .logo{
         background-color: orange;
         height: 90px;
      }
      .menu{
         background-color: green;
         height: 90px;
      }

   }

</style>