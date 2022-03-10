<template>

<div class="it-container-page">

   <section class="it-section-page">

      <h1 v-if="$route.params.type === 'message'">Contatta</h1>
      <h1 v-else-if="$route.params.type === 'review'">Recensisci</h1>

      <div v-if="success">
         <h2 class="sent">Inviato correttamente</h2>
         <router-link :to="'/'">
            <div class="it-btn">
               <button>Torna alla Home</button>
            </div>
         </router-link>
      </div>

      <div v-else>

         <form v-if="$route.params.type === 'message'" id="contact_us" @submit.prevent="sendForm">

            <div class="it_input_contact_us"
               v-for="(field, index) in formFieldsMessage"
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
            <p v-if="errors.name" class="error-field">{{errors.message[0]}}</p>
               <p v-if="errors.name" class="error-field">{{errors.name[0]}}</p>
               <p v-if="errors.email" class="error-field">{{errors.email[0]}}</p>

            <div class="it-btn mt-5">
               <button 
                  type="submit"
                  :class="{active: !sending}"
                  :disabled="sending"
               >{{ sending ? 'Invio in corso...' : 'Invio' }}</button>
            </div>

         </form>

         <form v-else id="contact_us" @submit.prevent="sendForm">

            <div class="vote">
                  <h3 class="it-title-small it-text-black">Voto</h3>
                  <div class="stars">
                     <!-- da sostituire con icona FontAwesome -->
                     <i v-for="(star, index) in starRange" :key="index" class="fa" :class="setRangeStar(star)" aria-hidden="true" @click="activeStar(star)"></i>
                  </div>
               </div>

            <div class="it_input_contact_us"
               v-for="(field, index) in formFieldsReview"
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
            <p v-if="errors.message" class="error-field">{{errors.message[0]}}</p>
            <p v-if="errors.name" class="error-field">{{errors.name[0]}}</p>

            <div class="it-btn mt-5">
               <button 
                  type="submit"
                  :class="{active: !sending}"
                  :disabled="sending"
               >{{ sending ? 'Invio in corso...' : 'Invio' }}</button>
            </div>

         </form>

      </div>



   </section>

</div>
  
</template>

<script>

import gsap from 'gsap';

export default {
   name: 'MessageReviewForm',

   data(){
      return{
         starRange: [
            {
               numberStar: 1,
               active: false,
            },
            {
               numberStar: 2,
               active: false,
            },
            {
               numberStar: 3,
               active: false,
            },
            {
               numberStar: 4,
               active: false,
            },
            {
               numberStar: 5,
               active: false,
            }
         ],
         formFieldsMessage: [
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
         ],
         formFieldsReview: [
            {  
               label: 'Nome',
               for: 'name',
               tag: 'input',
               type: 'text',
               content: '',
            },
            {
               label: 'Messaggio',
               for: 'message',
               tag: 'textarea',
               content: '',
            },
         ],
         name: '',
         email: '',
         message: '',
         errors: {},
         success: false,
         sending: false,
         apiUrl: 'http://127.0.0.1:8000/api/contacts',
         actualNumberStar: 0
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
         if (this.$route.params.type === 'message') {
                  
            this.formFieldsMessage.forEach(field => {
               if ((field.label !== label) && (field.content === '')) {
                  gsap.to('label[for="' + field.for + '"]', {
                     bottom: 10,
                     fontSize: '1em',
                     duration: .1,
                  });
               }
               if ((label !== 'Messaggio') && (this.formFieldsMessage[this.formFieldsMessage.length - 1].content === '')) {
                  gsap.to('textarea.it_input_field', {
                     height: 40,
                     duration: .8,
                     delay: .15,
                     ease: "bounce",
                  })
               }
            });


         } else {
            this.formFieldsReview.forEach(field => {
               if ((field.label !== label) && (field.content === '')) {
                  gsap.to('label[for="' + field.for + '"]', {
                     bottom: 10,
                     fontSize: '1em',
                     duration: .1,
                  });
               }
               if ((label !== 'Messaggio') && (this.formFieldsReview[this.formFieldsReview.length - 1].content === '')) {
                  gsap.to('textarea.it_input_field', {
                     height: 40,
                     duration: .8,
                     delay: .15,
                     ease: "bounce",
                  })
               }
            });

         }
      },

      sendForm() {
         if (this.$route.params.type === 'message') {
                  
            this.name = this.formFieldsMessage[0].content;
            this.email = this.formFieldsMessage[1].content;
            this.message = this.formFieldsMessage[2].content;

         } else {
            this.name = this.formFieldsReview[0].content;
            this.message = this.formFieldsReview[1].content;
         }
         
         this.success = false;
         this.sending = true;
         axios.post(this.apiUrl, {

            name: this.name,
            email: this.email,
            message: this.message,
            type: this.$route.params.type,
            user_id: this.$route.params.userId,
            vote: this.actualNumberStar

         }).then(response => {

            this.sending = false;
            console.log('inviato');
            if (response.data.success) {
               this.success = true;
               this.name = '';
               this.email = '';
               this.message = '';
               if (this.$route.params.type === 'message') {
                  
                  this.formFieldsMessage.forEach(element => {
                     element.content = '';
                  });
               } else if (this.$route.params.type === 'review') {
                  this.formFieldsReview.forEach(element => {
                     element.content = '';
                  });
               }
               this.errors = {};
            } else {
               this.errors = response.data.errors;
            }

         });
      },
      setRangeStar(star){
         if(star.active){
            return 'fa-star';
         }
         else{
            return 'fa-star-o';
         }
      },
      activeStar(star){
         for(let i = 0; i < this.starRange.length; i++){
            this.starRange[i].active = false;
         }
         for(let i = 0; i < star.numberStar; i++){
            this.starRange[i].active = true;
         }
         this.actualNumberStar = star.numberStar;
         console.log('numero stelle attuale:', this.actualNumberStar);
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

      .vote{
         .stars{
            i{
               font-size: 20px;
               cursor: pointer;
            }
         }
      }

      .it-btn {
         cursor: default;
         button.active {
            cursor: pointer;
         }
      }

      label, p {
         color: #fff;
      }
   }
   
   
}

.sent {
   margin: 20px 0;
   color: $primary-color;
}


</style>