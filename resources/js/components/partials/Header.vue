<template>

   <header>
      <div class="container">
         <div class="row">

            <div class="logo col-6">
               <img src="/img/logo.svg" alt="">
            </div>

            <div class="menu col-6">

               <span>Cerca</span>
               <span>Accedi</span>
               <span>Registrati</span>

               <div class="wrap-line-menu">
                  <div class="menu-line"></div>
                  <div class="menu-line"></div>
               </div>

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

@import '../../../sass/guest/_variables.scss';

   header{
      height: 90px;
      width: 100%;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1000;
      .logo{
         display: flex;
         justify-content: flex-start;
         align-items: center;
         // background-color: orange;
         height: 90px;
         img{
            width: 150px;
            height: 80px;
         }
      }
      .menu{
         display: flex;
         justify-content: flex-end;
         align-items: center;
         // background-color: green;
         height: 90px;
         span{
            color: white;
            margin: 0px 20px 7px 0px;
         }
         .menu-line{
            width: 30px;
            height: 5px;
            margin-bottom: 8px;
            background-color: #fff;
            border-radius: 10px;
         }
      }

   }

</style>