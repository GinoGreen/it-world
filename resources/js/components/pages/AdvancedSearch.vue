<template>

   <div class="it-container-page container-fluid">
      
      <section class="it-section-page row">
         <div class="content-left glass p-1 col-xl-3 col-md-12 col-sm-12 ml-auto mr-auto">

            <div class="filters-title">
               <h3 class="it-title-small it-text-orange text-center">Filtri</h3>
            </div>
            
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
                  <div class="slider-box">
                     <input v-model="rangeReviewsValue" type="range" min="0" max="100" value="0" class="slider" id="myRange" @click="getApi()">
                     <p>min: <span id="demo">{{rangeReviewsValue}}</span></p>
                  </div>
               </div>

               <div class="vote">
                  <h3 class="it-title-small it-text-black">Voto</h3>
                  <div class="stars">
                     <!-- da sostituire con icona FontAwesome -->
                     <i v-for="(star, index) in starRange" :key="index" class="fa" :class="setRangeStar(star)" aria-hidden="true" @click="activeStar(star)"></i>
                  </div>
                  <div class="star-reset it-btn">
                     <button @click="resetFilters()">Reset Filters</button>
                  </div>
               </div>

            </div>

            <div class="it-links col-12 text-dark">
            </div>

         </div>
         <div class="content-right glass p-1 col-xl-8 col-md-12 col-sm-12 mr-auto d-flex align-items-center">
            
            <div class="results-title">
               <h3 class="it-title-small it-text-orange text-center">Risultati migliori</h3>
            </div>

            <!-- COMPONENTE DA CICLARE -->
            <div class="results-box">
               <div class="profile-box m-3 vis"
                  v-for="(profile, index) in profiles"
                  :key="'profile' + index"
               >
                  <div class="photo">
                     <img :src="profile.avatar_path" alt="avatar">
                  </div>
                  <div class="info-content">
                     <div class="info">
                        <router-link :to="{name: 'profile', params:{profile_id: profile.id}}">
                           <p class="it-title-small it-text-blue">
                              {{ profile.name }} {{ profile.surname }}
                           </p>
                        </router-link>
                        <div class="stars">
                           <i v-for="(star, index) in 5"
                           :key="'star' + index" class="fa" :class="setRangeStarProfile(star, profile.vote_average)" aria-hidden="true"></i>
                        </div>
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
               <div class="message-box">
                  <div class="message not-found" v-if="(profiles.length === 0) && (loading === true)">
                     <h2>Nessun risultato trovato.</h2>
                  </div>
                  <div class="message loading" v-if="(loading === false)">
                     <Loading />
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
import Loading from './widgets/Loading.vue';


export default {
   name: 'AdvancedSearch',
   components: {Loading},

   data(){
      return{
          apiUrl: 'http://127.0.0.1:8000/api/job_roles/',
          allJobRoles: [],
          jobRoles: null,
          profiles: [],
          rangeReviewsValue: 0, 
          actualNumberStar: 0,
          loading: false,
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
      }
   },

   methods:{
      getJobRoles(){
         axios.get(this.apiUrl)
            .then(res => {
               this.allJobRoles = res.data;
               // console.log('all roles: ', res.data);
            });
      },
      getApi(){
         this.loading = false;
         this.profiles = [];
         axios.get(this.apiUrl + this.$route.params.job_role)
            .then(res => {
            
               this.jobRoles = res.data;
               // console.log(res.data);
               
               // profiles

               this.jobRoles.forEach(jobRole => {
                  
                  if(jobRole.users.length !== 0){

                     jobRole.users.forEach(profile => {
                     
                        if (!this.profiles.some(element => element.id === profile.id)) {
                           if((profile.vote_average >= this.actualNumberStar) && (profile.reviews_length >= this.rangeReviewsValue)){
                              profile.jobRole = [jobRole.name];

                              this.profiles.push(profile);
                           }
                        } else {
                           
                           this.profiles.find(element => element.id === profile.id).jobRole.push(jobRole.name);
                        }
                        this.loading = true;
                     });
                  }
               });

               console.log(this.profiles);
         });
      },

      activeJobRole(jobRole){
         for(let i = 0; i < this.jobRoles.length; i++){
            if(jobRole.id === this.jobRoles[i].id){
               return 'active'
            }
         }
      },
      setRangeStar(star){
         if(star.active){
            return 'fa-star';
         }
         else{
            return 'fa-star-o';
         }
      },
      setRangeStarProfile(star, vote){
         if(star <= vote){
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
         this.getApi();
      },

      resetFilters(){
         this.actualNumberStar = 0;
         this.rangeReviewsValue = 0;
         for(let i = 0; i < this.starRange.length; i++){
            const star = this.starRange[i];
            star.active = false;
            this.setRangeStar(star);
         }
         this.getApi();
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
         position: relative;
         display: flex;
         flex-direction: column;
         margin-bottom: 20px;
         .it-links{
            position: absolute;
            bottom: 0;
            left: 0;
            min-height: 20px;
            background-color: $primary-color;
         }
      }

      .content-left{
         overflow: hidden;
         max-height: calc(100vh - 100px);

         .filters-title{
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            min-height: 50px;
            background-color: $primary-color;
            h3{
               line-height: 50px;
               color: white;
            }
         }

         .filters{
            width: 100%;
            // background-color: white;
            overflow: auto;
            border-radius: 10px 10px 0px 0px;
            padding: 50px 10px 20px 10px;

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
               .slider-box{
                  width: 100%;
                  .slider {
                     -webkit-appearance: none;
                     width: 100%;
                     height: 5px;
                     background: $secondary-color;
                     outline: none;
                     opacity: 1;
                     -webkit-transition: .2s;
                     transition: opacity .2s;
                  }

                  .slider:hover {
                     opacity: .7;
                  }

                  .slider::-webkit-slider-thumb {
                     -webkit-appearance: none;
                     appearance: none;
                     width: 15px;
                     height: 15px;
                     border-radius: 50%;
                     background: $primary-color;
                     cursor: pointer;
                  }

                  .slider::-moz-range-thumb {
                     width: 15px;
                     height: 15px;
                     background: $primary-color;
                     cursor: pointer;
                  }
               }
            }

            .vote{
               .stars{
                  i{
                     font-size: 20px;
                     color: rgb(255, 153, 0);
                     cursor: pointer;
                  }
               }
            }
         }
      }

      .content-right{
         height: calc(100vh - 100px);
         overflow: hidden;
         position: relative;
         .results-title{
            width: 100%;
            z-index: 100;
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
            padding: 50px 0;
            overflow-y: auto;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            height: 100%;
            .message-box{
               position: absolute;
               top: 50%;
               transform: translate(0, -50%);
               .message{

               }
            }
            .profile-box{
               width: 80%;
               background-color: white;
               border-radius: 10px;
               margin: 0 auto;
               padding: 20px;
               display: flex;
               align-items: flex-start;

               .photo{
                  width: 23%;
                  min-width: 90px;
                  height: 90px;
                  background-color: $primary_color;
                  margin-right: 20px;
                  overflow: hidden;
                  border-radius: 50%;
                  img{
                     width: 100%;
                  }
               }

               .info-content {
                  width: 77%;
                  
                  min-width: calc(100% - 90px);
               }
               .info{
                  width: 100%;
                  margin-bottom: 15px;
                  p{
                     margin-bottom: 0px;
                     color:black;
                  }
                  .stars{
                     i{
                        font-size: 20px;
                        color: rgb(255, 153, 0);
                        cursor: pointer;
                     }
                  }
               }
            }
         }

      }

   }


</style>