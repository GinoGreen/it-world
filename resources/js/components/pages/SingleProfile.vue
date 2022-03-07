<template>

<div class="it-container-page">

   <section class="it-section-page row">

      <div class="sx-profile col-6">
         <div class="top-sx glass">

            <div v-if="profile.avatar_path === null" class="wrap-image">
               <img src="/img/slider/undraw_profile_pic_ic-5-t.svg" alt="avatar">
            </div>

            <div v-else class="wrap-image">
               <img :src="profile.avatar_path" alt="avatar">
            </div>

            <div class="wrap-text">
               <h3>{{profile.name}} {{profile.surname}}</h3>
               <h5>{{profile.job_roles[0].name}}</h5>
               <h6>{{profile.region}}</h6>
            </div>
            
         </div>
         <div class="mid-sx glass">
            <h5> Livello d'esperienza: {{profile.level}}</h5>
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
               <a>{{profile.cv_path}}</a>
            </div>


         </div>
         <div class="bottom-sx glass">
            <h5>Contatti</h5>
            <p>Email: {{profile.email}}</p>
         </div>
      </div>

      <div class="dx-profile col-6">
         <div class="top-dx glass">
            <h3>Recensioni</h3>

            <div class="wrap-review duble-glass">
               <h6>Nome Cognome</h6>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio provident distinctio laudantium ipsa, reprehenderit, quibusdam aut voluptate, labore omnis iure voluptates deserunt. Illo dicta officiis placeat nulla!</p>
               <span>star</span>
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
               this.profile = res.data[0];
               console.log(res.data);
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
      overflow: scroll;

      .top-sx{
         display: flex;
         align-items: center;
         justify-content: flex-start;
         width: 100%;
         padding: 15px;
         margin-bottom: 20px;

         .wrap-image{
            height: 150px;
            width: 150px;
            border-radius: 50%;

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
            margin: 15px 0px 15px 0px;
            h5{
               margin-bottom: 15px;
            }
         }
      }

      .bottom-sx{
         width: 100%;
         padding: 15px;
         margin-bottom: 20px;
         h5{
            margin-bottom: 15px;
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

         .wrap-review{
            margin: 15px 0px;
            width: 100%;
            min-height: 100px;
            padding: 10px;
         }
      }
   }
}

</style>