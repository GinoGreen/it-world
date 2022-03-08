<template>

<div class="it-container-page">

   <section class="it-section-page">

      <h1>Form Dinamico</h1>

      <form id="contact_us">

         <div class="it_input_contact_us"
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

         <div class="it-btn mt-5">
            <button>
               Invia 
            </button>
         </div>

      </form>

   </section>

</div>
  
</template>

<script>

import gsap from 'gsap';

export default {
   name: 'MessageReviewForm',
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
      
   }
}

</script>

<style lang="scss" scoped>
@import '../../../sass/guest/_variables.scss';
@import '../../../sass/guest/_generals.scss';

.it-section-page{
   
   form#contact_us {
      margin-top: 40px;
      width: 70%;

      .it_input_contact_us {
         display: flex;
         flex-direction: column;
         margin-top: 70px;
         margin-bottom: 0;

            position: relative;
         
         
            textarea {
               max-height: 200px;
            }
            .it_input_field {
               z-index: 200;
               display: block;
               height: 40px;
               width: 100%;
               background-color: transparent;
               border: 0;
               border-bottom: 2px solid #fff;
               caret-color: $primary_color;
               color: #fff;
         
               &:focus ~ .it_input_border {
                  width: 100%;
               }
               
            }
            label {
               position: absolute;
               left: 0;
               bottom: 10px;
               font-size: .9em;
               z-index: 100;
               transition: all .1s;
            }
            .it_input_border {
               z-index: 300;
               width: 0;
               height: 3px;
               transform: translateY(-3px);
               transition: all .5s;
            }

      }

      label, p {
         color: #fff;
      }
   }
   
   
}


</style>