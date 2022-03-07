<template>

   <div class="it-container-page">
      
      <section class="it-section-page">
         <div class="content-left">
            <h3 class="it-title-small it-text-orange text-center">Filtri</h3>
            <div class="filters">

               <div class="specialization">
                  <h3 class="it-title-small it-text-black">Specializzazione</h3>
                  <div class="tag-container">

                     <span
                        v-for="jobRole in allJobRoles"
                        :key="'jobRole' + jobRole.id"
                        class="tag it-text-info"
                        :class="activeJobRole(jobRole)"
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
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
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
                     <router-link :to="{name: 'profile', params:{profile_id: profile.id}}">
                        <p class="it-title-small it-text-blue">
                           {{ profile.name }} {{ profile.surname }}
                        </p>
                     </router-link>
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
      </section>
   </div>
  
</template>

<script>


export default {
   name: 'AdvancedSearch',

   data(){
      return{
          apiUrl: 'http://127.0.0.1:8000/api/job_roles/',
          allJobRoles: [],
          jobRoles: null,
          profiles: [],
      }
   },

   methods:{
      getJobRoles(){
         axios.get(this.apiUrl)
            .then(res => {
               this.allJobRoles = res.data;
               console.log('all roles: ', res.data);
            });
      },
      getApi(){
         axios.get(this.apiUrl + this.$route.params.job_role)
            .then(res => {
            
               this.jobRoles = res.data;
               console.log(res.data);
               
               this.jobRoles.forEach(jobRole => {
                  
                  if(jobRole.users.length !== 0){

                     jobRole.users.forEach(profile => {
                     
                        if (!this.profiles.some(element => element.id === profile.id)) {

                           profile.jobRole = [jobRole.name];

                           this.profiles.push(profile);
                        } else {
                           
                           this.profiles.find(element => element.id === profile.id).jobRole.push(jobRole.name);
                        }
                     });
                  }
               });
         });
      },

      activeJobRole(jobRole){
         for(let i = 0; i < this.jobRoles.length; i++){
            console.log('ricercati: ', this.jobRoles[i]);
            console.log('attuale: ', jobRole);
            if(jobRole.id === this.jobRoles[i].id){
               return 'active'
            }
         }
      }
   },

   mounted(){
      this.getApi();
      this.getJobRoles();
   }


}
</script>

<style lang="scss" scoped>

@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;800&display=swap');
@import '../../../sass/guest/_variables.scss';
@import '../../../sass/guest/_generals.scss';


   .it-section-page{
      display: flex;
      .content-left, .content-right{
         display: flex;
         flex-direction: column;
      }

      .content-left{
         width: 25%;
         height: calc(100vh - 90px);
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
                     color: $primary_color;
                     background-color: white;
                     border: 2px solid $primary-color;
                     padding: 3px 20px;
                     border-radius: 25px;
                     margin: 5px;
                     &.active{
                        color: white;
                        background-color: $primary-color;
                        border: 2px solid transparent;
                     }
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
                  i{
                     font-size: 20px;
                     color: rgb(255, 153, 0);
                  }
               }
            }
         }
      }

      .content-right{
         overflow-y: auto;
         width: 70%;
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
                  color:black;
               }
            }
         }

      }

   }


</style>