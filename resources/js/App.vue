<template>
   <div class="it-wrapper">
      <Header/>
      <router-view></router-view>
      <div class="it_world_bg">
         <div class="circle">
            <div class="circle">
               <div class="circle">
                  <div class="circle">
                     <div class="circle">
                        <div class="circle">
                           <img class="planet" src="img/moon/planet-solo-vector-10.svg" alt="it_world">
                           <img class="stars" src="img/moon/planet-vector-stars-solo.svg" alt="stars">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
   </div>
</template>

<script>
import Header from './components/partials/Header';
import gsap from 'gsap';
export default {
   name: 'App',

   components:{
      Header
   },
   
   data(){
      return{

      }
   },

   mounted(){
      this.animateWavesPlanetLights();
   },

   methods:{
      animateWavesPlanetLights() {
         gsap.to('.circle', {
            width: '+=40',
            height: '+=40',
            duration: 1.7,
            stagger: {
               each: .4,
               from: 'start',
               repeat: -1,
               yoyo: true,
               ease: 'Back.easeInOut.config(4)',
            }
         })
      }
   }

}
</script>

<style lang="scss">

.it-wrapper{
   background-image: url("/img/moon/planet-vector-stars-solo.svg");
   background-position: left;
   background-size: 40%;

   position: relative;
   overflow: hidden;
   
   .it_world_bg {
      width: 65vh;
      height: 65vh;
      z-index: -1;
      position: absolute;
      top: 20%;
      left: 75vw;
      border-radius: 50%;

      .circle {
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         border-radius: 50%;
         background-color: rgba(255, 255, 255, .02);
         width: calc(100% + 75px);
         height: calc(100% + 75px);
         
      }
      .planet,
      .stars {
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         width: 65vh;
      }
      .stars {
         width: 100vh;
      }
   }
}


</style>