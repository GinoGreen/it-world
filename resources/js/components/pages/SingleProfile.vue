<template>

<div class="it-container-page">

   <section class="it-section-page row">

      <div class="sx-profile col-6">
         <div class="top-sx glass">

            <div class="wrap-image">
               <img :src="profile.avatar_path" alt="avatar">
            </div>

            <div class="wrap-text">
               <h3>{{profile.name}} {{profile.surname}}</h3>
               <h5>{{profile.job_roles[0].name}}</h5>
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
               <a :href="profile.cv_path">Clicca Qui</a>
               
            </div>


         </div>
         <div class="bottom-sx glass">
            <h5>Contatti</h5>
            <p>{{profile.email}}</p>
         </div>
      </div>

      <div class="dx-profile col-6">
         <div class="top-dx glass">
            
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
      height: calc(100vh - 150px);
   }
   .sx-profile{
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding: 20px;
      overflow: auto;
      height: 570px;

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
               width: 150px;
               height: 150px;
            }
         }

         .wrap-text{
            margin-left: 15px;
            display: flex;
            flex-direction: column;
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

            a{
               padding: 5px 10px;
               background-color: $primary_color;
               color: white;
               border-radius: 10px;
               border: 1px solid white;
               font-size: 12px;
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
   }
   .dx-profile{
      // background-color: red;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
      padding: 20px;

      .top-dx{
         width: 100%;
         height: 550px;
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
                        color: gold;
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