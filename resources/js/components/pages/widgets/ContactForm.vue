<template>


<form id="contact_us">

   <div class="it_input"
      v-for="(field, index) in formFields"
      :key="'field' + index"
   >
      <label :for="field.for">{{ field.label }}</label>

      <input v-if="field.tag === 'input'"
         class="it_input_field" 
         :id="field.for"
         :name="field.for"
         v-model="field.content"
         :type="field.type"
         @click="labelAnimation(field.for), resetLabel(field.label)"
      >
      <textarea v-else
         class="it_input_field"
         :name="field.for" 
         :id="field.for" 
         v-model="field.content"
         @click="labelAnimation(field.for), resetLabel(field.label)"
      ></textarea>
      <div class="it_input_border"></div>
   </div>

   <!-- <div class="it_input">
      <label :for="email.for">Email</label>
      <input class="it_input_field" 
         id=""
         @click="labelAnimation(email.for), resetLabel(email.for)"
      >
      <div class="it_input_border"></div>
   </div> -->

</form>


</template>

<script>

import gsap from 'gsap';
import Elastic from 'gsap/EasePack'

export default {
   name: 'ContactForm',
   data(){
      return{
         formFields: [
            {  
               label: 'Nome',
               for: 'name',
               tag: 'input',
               type: 'text',
               content: '',
            },
            {
               label: 'Email',
               for: 'email',
               tag: 'input',
               type: 'email',
               content: '',
            },
            {
               label: 'Messaggio',
               for: 'message',
               tag: 'textarea',
               content: '',
            },
         ]
      }
   },

   methods:{
      labelAnimation(labelFor) {
         gsap.to('label[for="' + labelFor + '"]', {
            bottom: '100%',
            fontSize: '1.1em',
            duration: .1,
         });

         if (labelFor === 'message') {
            gsap.to('textarea.it_input_field', {
               height: 150,
               duration: 1.4,
               delay: .15,
               ease: "elastic",
            })
         }
      },

      resetLabel(label) {
         this.formFields.forEach(field => {
            if ((field.label !== label) && (field.content === '')) {
               gsap.to('label[for="' + field.for + '"]', {
                  bottom: 10,
                  fontSize: '1em',
                  duration: .1,
               });
            }

         });

         if ((label !== 'Messaggio') && (this.formFields[this.formFields.length - 1].content === '')) {
            gsap.to('textarea.it_input_field', {
               height: 40,
               duration: .8,
               delay: .15,
               ease: "bounce",
            })
         }
      }
   },

   mounted(){
      gsap.registerPlugin(Elastic);
   }
}

</script>

<style lang='scss' scoped>
@import '../../../../sass/guest/_variables.scss';
@import '../../../../sass/guest/_generals.scss';

   form#contact_us {
      margin-top: 40px;
      width: 70%;

      
   }

</style>