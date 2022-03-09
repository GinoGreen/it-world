<template>

   <header>
      <div class="container h-100">
         <div class="row justify-content-between h-100">

            <div class="logo h-100">
                <router-link :to="{name: 'home' }">
                  <img src="/img/logo.png">
                </router-link>
            </div>

            <div class="menu h-100">

               <span>Chi siamo</span>
               <span>
                  <a href="/login">Accedi</a>
               </span>
               <span>
                  <a href="/register">Registrati</a>
               </span>
             

               <div class="wrap-line-menu">
                  <div class="menu-line upper"></div>
                  <div class="menu-line lower"></div>
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
         align-items: center;
         img{
            width: 150px;
         }
      }
      .menu{
         display: flex;
         align-items: center;
         height: 90px;
         span{
            cursor: pointer;
            color: white;
            margin: 0px 20px 7px 0px;
         }
         .wrap-line-menu {
            cursor: pointer;
            &:hover {
               .upper {
                  transform: translate(5px, 5px) rotate(45deg) ;
               }
               .lower {
                  transform: translate(5px, -5px) rotate(-45deg) ;  
               }
            }
            .menu-line{
               
               transition: all .3s;
               width: 45px;
               height: 3px;
               margin-bottom: 8px;
               background-color: #fff;
            }
            
         }
      }

   }

</style>