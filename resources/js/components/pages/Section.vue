<template>
   <!-- notate che la classe cambia per ogni sezione. tutto é molto gestibile :-) -->
   <section 
      :class="sectionInfo.section.class"
      :id="'section' + sectionInfo.index"
   >


      <div class="row">

         <div class="content-sx" :class="'col-' + sectionInfo.section.col.sx"></div>

         <div class="content-dx" :class="'col-' + sectionInfo.section.col.dx">
            <!-- titolo di esempio (mettetelo dove volete) -->
            <h2>{{ sectionInfo.section.title }}</h2>
         </div>

      </div>
      

   </section>
</template>

<script>
export default {
   name: 'Section',
   props: {
      sectionInfo: Object
   }
}
</script>

<style lang="scss">

@import '../../../sass/guest/_variables.scss';

   section {
      height: 100vh;
      width: 100%;
      
      border-bottom: 20px solid white;

         .row{
            padding-top: 150px;
            .content-sx, .content-dx{
               height: 400px;   
            }
            .content-sx{
               background-color: cyan;
            }
            .content-dx{
               background-color: #fff;
            }
         }
   }

</style>