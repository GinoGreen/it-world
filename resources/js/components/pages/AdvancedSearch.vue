<template>

   <div class="it-container-page container-fluid">
      
      <section class="it-section-page row">
         <div class="content-left glass p-1 col-xl-3 col-md-3 col-sm-12 ml-auto mr-auto">
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
         <div class="content-right glass p-1 col-xl-8 col-md-5 col-sm-12 mr-auto d-flex align-items-center">
            
            <div class="results-title">
               <h3 class="it-title-small it-text-orange text-center">Risultati migliori</h3>
            </div>

            <!-- COMPONENTE DA CICLARE -->
            <div class="results-box">
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
                        <p class="it-text-info it-text-blue "
                        v-for="(role, index) in profile.jobRole"
                        :key="profile.id + index"
                        >{{ role }}</p>
                     </div>
                     <div class="info-description">
                        <p class="it-text-info it-text-blue">
                           {{ profile.description }}
                        </p>
                     </div>
                  </div>
               </div>
            </div>

            <div class="it-links col-12 text-dark">
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
      getUsers(){
         axios.get('http://127.0.0.1:8000/api/profile/')
            .then(res => {
               this.allUsers = res.data;
               // console.log('all users: ', res.data);
            });
      },
      getJobRoles(){
         axios.get(this.apiUrl)
            .then(res => {
               this.allJobRoles = res.data;
               // console.log('all roles: ', res.data);
            });
      },
      getApi(){
         axios.get(this.apiUrl + this.$route.params.job_role)
            .then(res => {
            
               this.jobRoles = res.data;
               // console.log(res.data);
               
               // profiles

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

               console.log(this.profiles);
         });
      },

      activeJobRole(jobRole){
         for(let i = 0; i < this.jobRoles.length; i++){
            // console.log('ricercati: ', this.jobRoles[i]);
            // console.log('attuale: ', jobRole);
            if(jobRole.id === this.jobRoles[i].id){
               return 'active'
            }
         }
      }
   },

   mounted(){
      this.getApi();
      this.getJobRoles();
      this.getUsers();
      console.log(this.profiles);
      console.log('reviews: ', this.reviews);
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
         position: relative;
         display: flex;
         flex-direction: column;
      }

      .content-left{
         overflow: auto;
         height: calc(100vh - 100px);
         // display: flex;
         // flex-direction: column;
         justify-content: flex-end;

         // h3{
            //    text-align: center;
         // }

         .filters{
            width: 100%;
            height: calc(100% - 50px);
            // background-color: white;
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
                     background-color: transparent;
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
         height: calc(100vh - 100px);
         overflow: hidden;
         
         .results-title{
            width: 100%;
            position: absolute;
            top: 0;
            min-height: 50px;
            background-color: $primary-color;
            h3{
               line-height: 50px;
               color: white;
            }
         }

         .results-box{
            padding-top: 50px;
            overflow-y: auto;
            width: 100%;
            .profile-box{
               width: 80%;
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

         .it-links{
            position: absolute;
            bottom: 0;
            min-height: 50px;
            background-color: $primary-color;
         }

      }

   }


</style>