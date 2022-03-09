<template>

<div class="it-container-page">

   <section class="it-section-page row">

      <div class="sx-profile col-8">
         <div class="top-sx glass">

            <div class="wrap-image">
               <img :src="profile.avatar_path" alt="avatar">
            </div>

            <div class="wrap-text">
               <h3>{{profile.name}} {{profile.surname}}</h3>
               <div class="it-job-box">
                  <h5 v-for="(job_role, index) in profile.job_roles" :key="index" class="it-job-name">
                     {{job_role.name}}
                  </h5>
               </div>
               <h6>{{profile.region}}</h6>
            </div>
            
         </div>
         <div class="mid-sx glass">
            <h5> Livello: {{profile.level}}</h5>
            <div 
               v-if="profile.description"
               class="wrap-description"
            >
               <h5>Descrizione</h5>
               <p>{{profile.description}}</p>
            </div>

            <div 
               v-if="profile.cv_path"
               class="wrap-cv"
            >
               <h5>Scarica il curriculum</h5>
               <div class="it-btn">
                  <button>
                     <a :href="profile.cv_path">Clicca qui</a>
                  </button>
               </div>
               
            </div>


         </div>
         <div class="bottom-sx glass">
            <h5>Contatti</h5>
            <p>{{profile.email}}</p>
         </div>
      </div>

      <div class="dx-profile col-4">
         <div class="call-to-action glass">

            <h5>Rimani in contatto con {{profile.name}}</h5>
            <p>Proponi la tua idea, entro poche ore verrai contattato dal nostro professionista!</p>
             <router-link :to="{name: 'from_contact', params: this.type.message}">
               <div class="it-btn-edit mb-4">
                  <button>Invia un messaggio</button>
               </div>
             </router-link>
            <h5>Valuta l'esperienza di {{profile.name}}</h5>
            <p>Lascia una recensione e aiuta gli altri utenti!</p>
            <router-link :to="{name: 'from_contact', params: this.type.review}">
               <div class="it-btn-edit">
                  <button>Scrivi una recensione</button>
               </div>
            </router-link>
         </div>
      </div>

      <div class="bottom-profile col-12">
         <div class="top-bottom glass">
            
            <h3>Recensioni</h3>

            <div class="contaier-reviews">

               <div 
                  class="wrap-review duble-glass"
                  v-for="review in profile.reviews"
                  :key="review.id"          
               >

                  <h6>{{review.title}}</h6>
                  <p>{{review.description}}</p>
                  <div class="wrap-span">
                     <div class="wrap-star">
                        <span
                           class="star"
                           v-for="(star, index) in review.vote"
                           :key="index"
                        >
                           <i class="fa fa-star" aria-hidden="true"></i>
                        </span>
                     </div>
      
                     <span class="date">
                        {{review.month}} / {{review.year}}
                     </span>
               
                  </div>

               </div>

            </div>
            
         </div>

      </div>


   </section>

</div>
  
</template>

<script>
export default {
   name: 'SingleProfile',
   data(){
      return{
         apiUrl: 'http://127.0.0.1:8000/api/profile/',
         profile: null,
         type: {
            message: 'message',
            review: 'review',
         }
      }
   },
   methods:{
      getApi(){
         axios.get(this.apiUrl + this.$route.params.profile_id)
            .then(res => {
               this.profile = res.data;
               console.log(res.data);
               // console.log(this.profile.avatar_path);
         });
      }
   },

   mounted(){
      this.getApi();
   }
}

</script>

<style lang="scss" scoped>
@import '../../../sass/guest/_variables.scss';
@import '../../../sass/guest/_generals.scss';

.it-section-page{
   justify-content: space-between;
   .sx-profile, .dx-profile{
      width: 90%;
      // height: calc(100vh - 150px);
   }
   .sx-profile{
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding: 20px;
      overflow: auto;
      max-height: 670px;

      .top-sx{
         display: flex;
         align-items: center;
         justify-content: flex-start;
         width: 100%;
         padding: 15px;
         margin-bottom: 20px;

         h3{
            color: $primary_color;
         }

         .wrap-image{
            height: 150px;
            width: 150px;
            border-radius: 50%;
            overflow: hidden;

            img{
               width: 100%;
            }
         }

         .wrap-text{
            margin-left: 15px;
            display: flex;
            flex-direction: column;

            .it-job-box{
               display: flex;
               justify-content: flex-start;
               flex-wrap: wrap;
               margin-top: 10px;

               .it-job-name{
                  min-width: 40%;
                  font-size: 15px;
                  text-align: center;
                  border: 1px solid $primary_color;
                  border-radius: 30px;
                  padding: 5px;
                  margin: 0px 20px 10px 0px;
               }
            }
         }
         
      }

      .mid-sx{
         width: 100%;
         padding: 15px;
         margin-bottom: 20px;

         .wrap-description{
            margin: 15px 0px;
            h5{
               margin-bottom: 10px;
               color: $primary_color;
            }
         }

         .wrap-cv{

            h5{
               margin-bottom: 10px;
            }

         }
      }

      .bottom-sx{
         width: 100%;
         padding: 15px;
         margin-bottom: 20px;
         h5{
            margin-bottom: 15px;
            color: $primary_color;
         }
      }



      // ::-webkit-scrollbar {
      //    width: 3px !important;
      //    border-radius: 20px !important; 
      // }
      // /* Track */
      // ::-webkit-scrollbar-track {
      //    background: none !important; 
      // }
      // /* Handle */
      // ::-webkit-scrollbar-thumb {
      //    background: $primary_color !important; 
      // }
      // /* Handle on hover */
      // ::-webkit-scrollbar-thumb:hover {
      //    cursor: pointer !important; 
      // }
   }


   .dx-profile{
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 20px 10px;
      .call-to-action{
         height: 350px;
         width: 100%;
         padding: 20px;
         display: flex;
         flex-direction: column;
         align-items: flex-start;
         justify-content: center;
         overflow-y: auto;
         h5{
            color: $primary_color;
         }
         p{
            font-size: 13px;
            margin-top: 10px;
         }

         .it-btn-edit{
            width: 100%;
            margin-top: 15px;
            button{
               background-color: $primary_color;
               outline: none;
               border: none;
               color: #fff;
               border-radius: 30px;
               padding: 7px 15px;
               width: 100%;
               transition: all .4s;
               cursor: pointer;
         
               &:hover{
                  transform: translateY(-3px);
               }

               a{
                  color: white;

               }
            }
         }
      }

   }

   .bottom-profile{
      // background-color: red;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
      padding: 20px;

      .top-bottom{
         width: 100%;
         max-height: 550px;
         display: flex;
         flex-direction: column;
         padding: 15px;

         h3{
               color: $primary_color;
         }
         
         .contaier-reviews{
            overflow: auto;

            .wrap-review{
               margin: 15px 0px;
               width: 100%;          
               padding: 10px;
               h6{
                  color: $primary_color;
               }
               p{
                  font-size: 13px;
                  margin: 5px 0px;
               }

               .wrap-span{
                  display: flex;
                  justify-content: space-between;
                  width: 100%;
               
                  .wrap-star{
                     .star{
                        color: white;
                        font-size: 14px;
                     }
                  }

                  .date{
                     font-size: 15px;
                     color: $primary_color;
                  }

               }  

            }

         }
      }
   }

}



</style>