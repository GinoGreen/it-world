<template>
   <!-- notate che la classe cambia per ogni sezione. tutto é molto gestibile :-) -->
   <section 
      :class="sectionInfo.section.class"
      :id="'section' + sectionInfo.index"
   >


      <div class="row">

         <!-- SECTION ORIGINALE -->
         <!-- <div class="content-sx" :class="'col-' + sectionInfo.section.col.sx">
            <h2>{{ sectionInfo.section.title }}</h2>
            <SearchBar 
            v-if="sectionInfo.section.class === 'search'"
            />
            <CatSlider 
            v-if="sectionInfo.section.class === 'categories'"
            />
            <Slider 
            v-if="sectionInfo.section.class === 'professionals'"
            />
         </div> -->

         <div class="content-sx" :class="'col-' + sectionInfo.section.col.sx">
            <h1 v-if="sectionInfo.section.title" class="it-title-big">{{ sectionInfo.section.title }}</h1>
            <h2 v-if="sectionInfo.section.subtitle" class="it-title-medium">{{ sectionInfo.section.subtitle }}</h2>
            <p v-if="sectionInfo.section.text" class="it-text">{{ sectionInfo.section.text }}</p>
            <SearchBar 
            v-if="sectionInfo.section.class === 'search'"
            />
            <Slider 
            v-if="sectionInfo.section.class === 'professionals'"
            />

            <div 
            v-if="sectionInfo.section.class === 'join'"
            class="it-btn">
               <button>Unisciti a noi</button>
            </div>

            <ContactForm
            v-if="sectionInfo.section.class === 'contact'"
            />
            
         </div>

         <div v-if="sectionInfo.section.image" 
         class="content-dx" :class="'col-' + sectionInfo.section.col.dx">
            <img :src="sectionInfo.section.image" alt="">
           
         </div>

      </div>
      
      <div class="section-details">
         <div class="line-1"></div>
         <div class="line-2"></div>
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
            .content-sx, .content-dx{
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
                  color: $primary_color;
                  margin-bottom: 40px;
               }

               h2{
                  color: #fff;
                  margin-bottom: 20px;
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
         .line-1, .line-2{
            background-color: $primary_color;
            height: 7px;
            margin: 10px;
            border-radius: 10px;
         }

         .line-1{
            width: 150px;
         }

         .line-2{
            width: 90px;
         }
      }
   }
}
</style>