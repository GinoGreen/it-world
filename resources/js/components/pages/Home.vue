<template>

   <div class="container d-flex">

      <aside>
         <!-- :class="{'active': index === sectionIndex}" -->
         <div class="wrap-scroll-line">
            <div
            class="scroll-line"
            v-for="(line, index) in sections"
            :key="`line${index}`"
            ></div>
         </div>
         

         <div class="scroll-down">
            <span>Lorem</span>
            <div class="line"></div>
         </div>
      </aside>

      <main>
         
         
         <Section 
            v-for="(section, index) in sections" 
            :key="index"
            :sectionInfo="{section, index}"
         />
         
      </main>

   </div>

</template>

<script>
import Section from './Section.vue'
import sections from '../../data/sections'

export default {
   name: 'Home',
   components: { 
      Section 
   },

   data() {
      return {
         sections
      }
   }
}
</script>

<style lang="scss" scoped>

@import '../../../sass/guest/_variables.scss';
   
.container{
   position: relative;
   aside{
      width: 13%;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;

      .wrap-scroll-line{
         margin-top: 300px;
         display: flex;
         flex-direction: column;
         justify-content: center;
         .scroll-line{
            
         cursor: pointer;
         background-color: #fff;
         border-radius: 10px;
         height: 5px;
         width: 50px;
         margin-bottom: 20px;
         transition: 1s;
         &:hover{
            width: 80px;
         }
         &.active {
            width: 80px;
         }
         }

      }
      .scroll-down{
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: space-between;
         height: 150px;
         width: 50px;
         span{
            margin-left: 4px;
            color: white;
            rotate: 90deg;
         }
         .line{
            width: 2px;
            height: 100px;
            background-color: #fff;
         }

      }
   
   }
   /* Hide scrollbar */
   main::-webkit-scrollbar {
      display: none;
   }
   main{
      
      width: 100%;
      height: 100vh;
      color: #000;
      -ms-overflow-style: none;  /* IE and Edge */
      scrollbar-width: none;  /* Firefox */
      overflow-y: scroll;
     
   }

   
}   

</style>