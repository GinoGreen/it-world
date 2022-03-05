<template>

   <div class="container d-flex">
      
      <aside>
         <!-- :class="{'active': index === sectionIndex}" -->
         <div class="wrap-scroll-line">
            <a v-for="(line, index) in sections"
               :key="`line${index}`"
            ><div class="scroll-line"></div></a>
         </div>
         

         <div class="scroll-down">
            <div class="scroll-text">Scroll down</div>
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
         sections,
         apiUrl: 'http://127.0.0.1:8000/api/job_roles',
         job_roles: null
      }
   },

   methods: {

   },

}
</script>

<style lang="scss" scoped>

@import '../../../sass/guest/_variables.scss';
   
.container{
   aside{
      position: relative;
      width: 10%;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;

      .wrap-scroll-line{
         display: flex;
         flex-direction: column;
         justify-content: center;

         a {
            cursor: pointer;
            
            &:hover .scroll-line {
               width: 45px;
            }
            .scroll-line{
               margin: 11px 0;
               background-color: #fff;
               height: 3px;
               width: 30px;
               transition: .25s;

               &.active {
                  width: 45px;
               }
            }
         }

      }
      .scroll-down{
         position: absolute;
         bottom: 0;
         left: -40px;
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: space-between;
         .scroll-text{
            letter-spacing: 1px;
            font-weight: lighter;
            font-style: italic;
            width: min-content;
            min-width: 100px;
            margin-bottom: 40px;
            color: white;
            transform: rotate(90deg);
            rotate: 90deg;
         }
         .line{
            width: 2px;
            height: 65px;
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