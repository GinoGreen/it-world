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
                        v-for="jobRole in jobRoles"
                        :key="'jobRole' + jobRole.id"
                     >{{jobRole.name}}</span>
                     
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
            <div class="profile-box m-3"
               v-for="(profile, index) in profiles"
               :key="'profile' + index"
            >
               <div class="photo"></div>
               <div class="info-content">
                  <div class="info">
                     <p class="it-title-small it-text-blue">
                        {{ profile.name }} {{ profile.surname }}
                     </p>
                     <p class="it-text-info it-text-blue">{{ profile.jobRole }}</p>
                  </div>
                  <div class="info-description">
                     <p class="it-text-info it-text-blue">
                        {{ profile.description }}
                     </p>
                  </div>
               </div>
            </div>

         </div>
      </main>
   </div>
  
</template>

<script>


export default {
   name: 'AdvancedSearch',

   data(){
      return{
          apiUrl: 'http://127.0.0.1:8000/api/job_roles/',
          jobRoles: null,
          profiles: [],
      }
   },

   methods:{
      getApi(){
         axios.get(this.apiUrl + this.$route.params.job_role)
            .then(res => {
            
               this.jobRoles = res.data;
               console.log('jobRoles trovati: ', this.jobRoles);
               
               this.jobRoles.forEach(jobRole => {
                  
                  // console.log(jobRole);

                  if(jobRole.users.length !== 0){

                     for (let index = 0; index < jobRole.users.length; index++) {

                        jobRole.users[index].jobRole = [jobRole.name];

                        const profileDuplicate = (element) => element === jobRole.users[index];

                        if (!this.profiles.some(profileDuplicate)) {
                           
                           this.profiles.push(jobRole.users[index]);

                        } else {
                           
                           console.log('duplicato trovato');
                           // const indexProfileDuplicate = this.profiles.findIndex(profileDuplicate);

                           // console.log(indexProfileDuplicate);

                           // jobRole.users[indexProfileDuplicate].jobRole.push(jobRole.name);
                           
                        }
                     }


                  }
               });

               console.log('Profili filtrati: ', this.profiles);
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

@import '../../../sass/guest/_variables.scss';
@import '../../../sass/guest/_generals.scss';

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
                     background-color: $primary_color;
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
                        background-color: $primary_color;
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

         .profile-box{
            width: 700px;
            // height: 140px;
            background-color: white;
            border-radius: 10px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            align-items: flex-start;

            .photo{
               width: 90px;
               height: 90px;
               background-color: $primary_color;
               margin-right: 20px;
            }

            .info{
               margin-bottom: 15px;

               p{
                  margin-bottom: 0px;
               }
            }
         }

      }

   }


</style>