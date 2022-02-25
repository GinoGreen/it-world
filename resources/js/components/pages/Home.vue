<template>

   <div class="container d-flex">

      <aside>
         <!-- :class="{'active': index === sectionIndex}" -->
         <div
            class="scroll-line"
            v-for="(line, index) in sections"
            :key="`line${index}`"
         ></div>
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
   aside{
      width: 13%;
      height: 100vh;
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

   main{
      width: 100%;
      color: #000;
   }
}   

</style>