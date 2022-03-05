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


            <h2 v-if="sectionInfo.section.subtitle" 
               class="it-title-medium"
            >{{ sectionInfo.section.subtitle }}</h2>

            <p v-if="sectionInfo.section.text" 
               class="it-title-medium"
            >{{ sectionInfo.section.text }}</p>

            <SearchBar @initSearch="setString"
               v-if="sectionInfo.section.class === 'search'"
            />

            <CatSlider v-if="sectionInfo.section.class === 'categories'"/>

            <Slider v-if="sectionInfo.section.class === 'professionals'"/>

            <div 
               v-if="sectionInfo.section.class === 'join'"
               class="it-btn"
            >
               <button>Unisciti a noi</button>
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
         stringSearched: '',
      }
   },

   methods: {
      setString(str) {
         this.stringSearched = str;
      }
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
               color: #fff;
               margin-bottom: 20px;
            }

            .it-btn{
               justify-content: flex-start;

               button{
                  font-size: 20px;
                  background-color: $primary_color;
                  border: 2px solid white;

                  &:hover{
                     background: $secondary_color;
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