<template>

   <header>

      <div class="container">

         <div class="row">

             <div class="logo col-6">
               
             </div>

             <div class="menu col-6">

             </div>

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

   header{
      height: 90px;
      background-color: #072142;
      width: 100vw;
      position: fixed;
      top: 0;
      left: 0;
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