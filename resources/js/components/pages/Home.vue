<template>

   <div class="container">

      <aside></aside>

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
   components: { Section },
   data() {
      return {
         sections
      }
   }
}
</script>

<style lang="scss" scoped>

@import '../../../sass/guest/_variables.scss';

   main{
      width: 100%;
      color: #000;
   }

</style>