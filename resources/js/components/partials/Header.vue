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

               <span class="d-none d-md-block">
                  <a href="/login">Accedi</a>
               </span>
               <span class="d-none d-md-block">
                  <a href="/register">Registrati</a>
               </span>
             

               <!-- <div class="wrap-line-menu">
                  <div class="menu-line upper"></div>
                  <div class="menu-line lower"></div>
               </div> -->

               <div id="sidemenu" class="d-block d-md-none">
                  <button class="sidemenu__btn" v-on:click="navOpen=!navOpen" v-bind:class="{active:navOpen}">
                     <span class="top"></span>
                     <span class="mid"></span>
                     <span class="bottom"></span>
                  </button>
                  <transition name="translateX">
                     <nav v-show="navOpen">
                        <div class="sidemenu__wrapper">
                           <ul class="sidemenu__list">
                              <li class="sidemenu__item"><a href="/login">ACCEDI</a></li>
                              <li class="sidemenu__item"><a href="/register">REGISTRATI</a></li>
                              <!-- <li class="sidemenu__item"><a href="">CONTATTACI</a></li> -->
                              <!-- <li class="sidemenu__item"><a href="">Work</a></li>
                              <li class="sidemenu__item"><a href="">Link</a></li> -->
                           </ul>
                        </div>
                     </nav>
                  </transition>
               </div>

            </div>

         </div>
      </div>
   </header>
 
</template>

<script>
export default {
   name: 'Header',

   data(){
      return {
         navOpen: false
      }
   },

   methods: {

   }
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

         #sidemenu {
            nav {
               width: 100%;
               height: 100%;
               background: rgb(7,33,66);
               background: linear-gradient(90deg, rgba(7,33,66,1) 0%, rgba(154,47,118,1) 50%, rgba(255,77,90,1) 100%);
               position: fixed;
               top: 0;
               right: 0;
               z-index: 99;
               // box-shadow: 2px 0 3px$grey-6;
               // overflow-y: scroll;
            }

            .sidemenu {
               &__btn {
                  display: block;
                  width: 50px;
                  height: 50px;
                  background: transparent;
                  border: none;
                  position: relative;
                  z-index: 100;
                  appearance: none;
                  cursor: pointer;
                  outline: none;

                  span {
                     display: block;
                     width: 40px;
                     height: 3px;
                     margin: auto;
                     background: white;
                     position: absolute;
                     top: 0;
                     bottom: 0;
                     left: 0;
                     right: 0;
                     transition: all .4s ease;

                     &.top {
                        transform: translateY(-8px);
                     }

                     &.bottom {
                        transform: translateY(8px);
                     }
                  }
                  &.active{
                     .top {
                        transform: rotate(-45deg);
                     }
                     .mid{
                        transform: translateX(-20px) rotate(360deg);
                        opacity: 0;
                     }
                     .bottom {
                        transform: rotate(45deg);
                     }
                  }

               }

               &__wrapper {
               padding-top: 80px;
            }

               &__list {
                  padding-top: 50px;
               list-style:none;
               padding: 0;
               margin: 0;
               }

               &__item {
                  text-align: center;

                  a {
                     text-decoration: none;
                     line-height: 1.6em;
                     font-size: 30px;
                     font-weight: 800;
                     padding: 50px;
                     display: block;
                     color: white;
                     transition: .4s ease;

                     &:hover {
                        background: rgba(255, 255, 255, 0.2);
                        color: $secondary_color;
                     }
                  }
               }
            }
         }

         .translateX-enter{
            transform:translateX(-200px);
            opacity: 0;
         }

         .translateX-enter-active,.translateX-leave-active{
            transform-origin: top left 0;
            transition:.2s ease;
         }

         .translateX-leave-to{
            transform: translateX(-200px);
            opacity: 0;
         }
      }

   }

@media screen and (max-width: 992px){

   header{
      display: flex;
      justify-content: space-between;
   }

}

@media screen and (max-width: 500px){

   header{
      display: flex;
      justify-content: space-between;
      
   }

}

</style>