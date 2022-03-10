<template>

   <div class="container d-flex">
      
      <aside>
         <!-- :class="{'active': index === sectionIndex}" -->
         <div class="wrap-scroll-line">
            <a 
                v-for="(line, index) in sections"
               :key="`line${index}`"
               @click="!isScrolling ? scrollToSection(index + 1) : ''"
            >
               <div class="scroll-line" :class="{active: sectionIndex === (index + 1)}"></div>
            </a>
         </div>
         

         <div class="scroll-down">
            <div class="scroll-text">Scroll down</div>
            <div class="line"></div>
         </div>
      </aside>

      <main @scroll.passive="handleScroll" >
                  
         <Section 
            v-for="(section, index) in sections" 
            :key="index"
            :sectionInfo="{section, index}"
         />
         
      </main>

   </div>

</template>

<script>
import gsap from 'gsap'
import ScrollToPlugin from 'gsap/ScrollToPlugin'
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
         sectionIndex: 1,
         scrollPosition: 0,
         isScrolling: false,
         scrollTiming: 1,

      }
   },

   methods: {

      handleScroll(event){
         
         let currentScrollPosition = event.srcElement.scrollTop;
         
         if (!this.isScrolling) {
            
            if (currentScrollPosition > this.scrollPosition) {
               console.log('scroll down');

               if (this.sectionIndex < sections.length){
                  this.sectionIndex++;
               } 

               this.scrollToSection(this.sectionIndex);

            } else if (currentScrollPosition < this.scrollPosition) {
               console.log('scroll up');

               if (this.sectionIndex > 1){
                  this.sectionIndex--;
               }

               this.scrollToSection(this.sectionIndex);
            }
         }

         this.scrollPosition = event.srcElement.scrollTop;

      },

      scrollToSection(index){
         this.isScrolling = true;

         if (index > 1) {
            gsap.to('.scroll-down', {
               translateY: '150%',
               opacity: 0,
               ease: 'back.in',
               duration: 1,
            });
         } else {
            gsap.to('.scroll-down', {
               translateY: '0%',
               opacity: 1,
               ease: 'back.out',
               duration: 1,
               delay: .5,
            });
         }


         gsap.to('main', {
            duration: this.scrollTiming,
            scrollTo: {
               y: '#section' + index,
            },
            ease: 'sine.in'
         })
         
         setTimeout(() => this.isScrolling = false, this.scrollTiming * 1000 + 100);
         this.sectionIndex = index;
      }

   },

   mounted(){
      gsap.registerPlugin(ScrollToPlugin);
   }

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