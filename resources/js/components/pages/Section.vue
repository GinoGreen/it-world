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
         </div>

         <div v-if="sectionInfo.section.image" 
         class="content-dx" :class="'col-' + sectionInfo.section.col.dx">
            <img :src="sectionInfo.section.image" alt="">
           
         </div>

      </div>
      

   </section>
</template>

<script>
import SearchBar from './widgets/SearchBar'
import Slider from './widgets/Slider'
export default {
   name: 'Section',
   components: { 
      SearchBar, 
      Slider
   },
   props: {
      sectionInfo: Object
   }
}
</script>

<style lang="scss">

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
   }

</style>