<template>

   <section 
      :class="sectionInfo.section.class"
      :id="'section' + sectionInfo.index"
   >


      <div class="row">

         <div class="content-sx" 
            :class="'col-' + sectionInfo.section.col.sx"
         >
            <h1 v-if="sectionInfo.section.title" 
               class="it-title-big"
            >{{ sectionInfo.section.title }}</h1>

            <div class="section-details">
               <div class="line-1"></div>
               <div class="line-2"></div>
            </div>

            <h2 v-if="sectionInfo.section.class === 'search'"
               class="it-title-medium"
            >
               <div class="word-box d-inline-block">
                  <span class="typing-word"></span>
                  <span class="cursor">|</span>
               </div>
               <span class="it-title">{{ sectionInfo.section.subtitle }}</span>
            </h2>

            <h2 v-else-if="sectionInfo.section.subtitle" 
               class="it-title-medium"
            >{{ sectionInfo.section.subtitle }}</h2>

            <p v-if="sectionInfo.section.text" 
               class="it-title-medium"
            >{{ sectionInfo.section.text }}</p>

            <SearchBar
               v-if="sectionInfo.section.class === 'search'"
            />

            <CatSlider v-if="sectionInfo.section.class === 'categories'"/>

            <Slider v-if="sectionInfo.section.class === 'professionals'"/>

            <div 
               v-if="sectionInfo.section.class === 'join'"
               class="it-btn"
            >
               <button class="it-title-small">Unisciti a noi</button>
            </div>

            <ContactForm v-if="sectionInfo.section.class === 'contact'"/>
            
         </div>

         <div v-if="sectionInfo.section.image" 
            class="content-dx" :class="'col-' + sectionInfo.section.col.dx"
         >
            <img :src="sectionInfo.section.image" alt="">
         </div>

      </div>
      
   </section>

</template>

<script>

import SearchBar from './widgets/SearchBar'
import Slider from './widgets/Slider'
import CatSlider from './widgets/CatSlider'
import ContactForm from './widgets/ContactForm'
import gsap from 'gsap'
import TextPlugin from 'gsap/TextPlugin'
import RoughEase from 'gsap/EasePack'

export default {
   name: 'Section',

   components: { 
      SearchBar, 
      CatSlider,
      Slider,
      ContactForm,
   },

   props: {
      sectionInfo: Object
   },

   data() {
      return {
         typingWords: ['Cerca', 'Scegli', 'Contatta'],
      }
   },

   methods: {
      typeWords() {
         let cursor = gsap.to('.cursor', {
            opacity: 0, 
            ease: 'power2.inOut', 
            repeat: -1,
            duration: .55,
         });

         let masterTl = gsap.timeline({repeat: -1});

         this.typingWords.forEach(word => {
            let tl = gsap.timeline({repeat: 1, yoyo: true, repeatDelay: 1});
            tl.to('.typing-word', {duration: 1, text: word});
            masterTl.add(tl);
         });
      },
   },

   mounted() {
      gsap.registerPlugin(RoughEase);
      gsap.registerPlugin(TextPlugin);
      this.typeWords();
   }
}
</script>

<style lang="scss" scoped>

@import '../../../sass/guest/_variables.scss';
@import '../../../sass/guest/_generals.scss';

   section {
      height: 100vh;
      width: 90%;

      .row{
         padding-top: 30px;

         .content-sx,
         .content-dx{
            height: 500px;   
         }

         .content-sx{
            // background-color: cyan;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;

            h1{
               color: #FFF;
            }

            h2{
               --offset: 85px;
               position: relative;
               color: #fff;
               margin-bottom: 20px;

               .word-box {
                  position: absolute;
                  bottom: 0;
                  left: 0;
                  min-width: var(--offset);

                  .cursor {
                     margin-left: -4px;
                  }
               }
               .it-title {
                  display: inline-block;
                  margin-left: var(--offset);
               }
            }

            .it-btn{
               justify-content: flex-start;

               button{
                  font-size: 1em;
                  padding: 10px 20px;
                  background-color: $primary_color;
                  border-radius: 30px;
                  transition: all .4s;
                  &:hover{
                     transform: translateY(-3px);
                  }
               }
            }
         }

         .content-dx{
            // background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;

            img{
               width: 100%;

            }
         }
      }
      .section-details{
         padding: 32px 0;
         .line-1,
         .line-2{
            width: 88px;
            height: 3px;
            background-color: $primary_color;
            border-radius: 6px;
         }
         .line-1 {
            margin-bottom: 16px;
         }
         .line-2{
            margin-left: 50px;
         }
      }
   }
</style>