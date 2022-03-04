<template>

   <div>
      <header>Header da sostituire</header>
      
      <main>
         <div class="content-left">
            <h3 class="it-title-small it-text-orange text-center">Filtri</h3>
            <div class="filters">

               <div class="specialization">
                  <h3 class="it-title-small it-text-black">Specializzazione</h3>
                  <div class="tag-container">

                     
                     <span 
                        class="tag it-text-info"
                        v-for="job_role in job_roles"
                        :key="job_role.id"
                     >{{job_role.name}}</span>
                     
                  </div>
               </div>

               <div class="reviews">
                  <h3 class="it-title-small it-text-black">Recensioni</h3>
                  <div class="slide">
                     <div class="slide-numbers">
                        <!-- da trasformare in input! -->
                        <span>0</span>
                        <span>100</span>
                     </div>
                     <div class="line">
                        <div class="round"></div>
                     </div>
                  </div>
               </div>

               <div class="vote">
                  <h3 class="it-title-small it-text-black">Voto</h3>
                  <div class="stars">
                     <!-- da sostituire con icona FontAwesome -->
                     <span>&star;</span>
                     <span>&star;</span>
                     <span>&star;</span>
                     <span>&star;</span>
                     <span>&star;</span>
                  </div>
               </div>

            </div>
         </div>
         <div class="content-right">
            <h3 class="it-title-small it-text-orange text-center">Risultati migliori</h3>

            <!-- COMPONENTE DA CICLARE -->
            <div class="profile-box">
               <div class="photo"></div>
               <div class="info-content">
                  <div class="info">
                     <p class="it-title-small it-text-blue">Nome e Cognome</p>
                     <p class="it-text-info it-text-blue">Fullstack Web Developer</p>
                  </div>
                  <div class="info-description">
                     <p class="it-text-info it-text-blue">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                  </div>
               </div>
            </div>

         </div>
      </main>
   </div>
  
</template>

<script>

import ProfileBox from './ProfileBox.vue'

export default {
   name: 'AdvancedSearch',

   components: {
      ProfileBox
   },

   data(){
      return{
          apiUrl: 'http://127.0.0.1:8000/api/job_roles/',
          job_roles: {}
      }
   },

   methods:{
      getApi(){
         axios.get(this.apiUrl + this.$route.params.job_role)
            .then(res => {
               this.job_roles = res.data;
               console.log(this.job_roles);

            })
      }
   },

   mounted(){
      this.getApi();
   }


}
</script>

<style lang="scss" scoped>

@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;800&display=swap');


   header{
      height: 90px;
      background-color: aqua;
   }

   main{
      font-family: 'Open Sans', sans-serif;
      display: flex;

      .content-left, .content-right{
         display: flex;
         flex-direction: column;
      }

      .content-left{
         width: 230px;
         height: calc(100vh - 90px);
         background-color: red;
         margin-right: 50px;
         // display: flex;
         // flex-direction: column;
         justify-content: flex-end;

         // h3{
         //    text-align: center;
         // }

         .filters{
            width: 100%;
            height: calc(100% - 50px);
            background-color: white;
            border-radius: 10px 10px 0px 0px;
            padding: 20px;

            .specialization, .reviews, .vote{
               margin-bottom: 30px;
            }

            .specialization{
               .tag-container{
                  display: flex;
                  flex-wrap: wrap;

                  .tag{
                     color: white;
                     background-color: #FF4D5A;
                     padding: 3px 20px;
                     border-radius: 25px;
                     margin: 5px;
                  }
               }
            }

            .reviews{
               .slide{
                  .slide-numbers{
                     display: flex;
                     justify-content: space-between;

                     span{
                        font-size: 14px;
                        color: #000000;
                        font-weight: 800;
                     }
                  }

                  .line{
                     height: 3px;
                     background-color: #19243F;
                     position: relative;

                     .round{
                        width: 12px;
                        height: 12px;
                        border-radius: 50%;
                        background-color: #FF4D5A;
                        position: absolute;
                        top: -4px;
                        left: 60px;
                     }
                  }
               }
            }

            .vote{
               .stars{
                  span{
                     font-size: 20px;
                     color: rgb(255, 153, 0);
                  }
               }
            }
         }
      }

      .content-right{
         width: calc(100vw - 230px - 50px);
         height: calc(100vh - 90px);
         background-color: green;

         h3{
            margin-top: 20px;
         }

         
      }

   }

   // CUSTOMS

   .it-text-orange{
      color: #FF4D5A;
   }

   .it-text-white{
      color: #ffffff;
   }

   .it-text-black{
      color: #000000;
   }

   .it-text-blue{
      color: #19243F;
   }

   .it-title-small{
      font-weight: 800;
      font-size: 18px;
   }

   .it-text-info{
      font-size: 12px;
      font-weight: 300;
      margin-bottom: 10px;
   }


   

</style>