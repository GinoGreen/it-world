<template>
  <!-- slider -->
    <div class="it-slider container-fluid">
      <div class="swiper it-swiper">
        <div class="swiper-wrapper content">

         <!-- card -->
         <div 
         v-for="(card, index) in allJobRoles"
         :key="index"
         class="swiper-slide it-card glass">
            <div class="it-card-content">

              <div class="it-info">
               <img 

               v-if="card.id === 1"
               src="/img/catslider/front-end.svg" alt="image">

               <img 
               v-if="card.id === 2"
               src="/img/catslider/back-end.svg" alt="image">

               <img 
               v-if="card.id === 3"
               src="/img/catslider/social-media.svg" alt="image">

               <img 
               v-if="card.id === 4"
               src="/img/catslider/uex.svg" alt="image">

               <img 
               v-if="card.id === 5"
               src="/img/catslider/ui.svg" alt="image">

               <img 
               v-if="card.id === 6"
               src="/img/catslider/app.svg" alt="image">

               <img 
               v-if="card.id === 7"
               src="/img/catslider/cyber.svg" alt="image">

               
              </div>

            </div>
            <router-link :to="{ name: 'advanced_search', params: { job_role: card.name }}">
               <div class="it-btn">
                  <button>{{card.name}}</button>
               </div>
            </router-link>


         </div>
         <!-- /card -->
          
        </div>
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
   <!-- /slider -->
</template>

<script>
export default {
   name: 'CatSlider',
   data(){
      return{
         swiper: null,
         card: 1,
         apiUrl: 'http://127.0.0.1:8000/api/job_roles/',
         allJobRoles: [],
      }
   },
   methods:{

      getJobRoles(){
         axios.get(this.apiUrl)
            .then(res => {
               this.allJobRoles = res.data;
               console.log('all roles: ', this.allJobRoles);
            });
      },

      mediaSlider() {
         if (window.innerWidth > 970) {
            this.card = 3
         } 
         else if (window.innerWidth > 750){
            this.card = 2
         }
         else {
            this.card = 1
         }
         this.swiper = new Swiper(".it-swiper", {
            slidesPerView: this.card,
            spaceBetween: 10,
            slidesPerGroup: this.card,
            loop: true,
            loopFillGroupWithBlank: true,
            /*pagination: {
               el: ".swiper-pagination",
               clickable: true,
            }, ----> pallini di navigazione */
            navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
            },
         });
      },
   },
   mounted(){
      this.mediaSlider();
      window.addEventListener('resize', this.mediaSlider);

      this.getJobRoles();
     
   }
}

</script>

<style lang='scss' scoped>
@import '../../../../sass/guest/_variables.scss';

.it-slider{
   position: relative;
   display: flex;
   align-items: center;

   .swiper{
      max-width: 70vw;
      .swiper-wrapper{
         .it-card{
            position: relative;
            background: #fff;
            margin: 50px 0;
            padding: 0px 20px 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);

            &::before{
               content: "";
               z-index: -1;
               position: absolute;
               border-radius: 30px;
               // background: #7B40FF;
               height: 100%;
               width: 100%;
            }

            .it-card-content{
               display: flex;
               flex-direction: column;
               justify-content: center;
               align-items: center;
               position: relative;
               z-index: 100;
               height: 280px;
               width: 100%;

               .it-info{
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  width: 100%;

                  img{
                     width: 70%;
                     max-height: 150px;
                  }
                  
               }
               
            }

            .it-btn{
                  z-index: 50;
                  font-size: 13px;
                  width: 100%;
                  display: flex;
                  justify-content: center;
                  
            }

            
         }
      }
   }

   .swiper-button-next, .swiper-button-prev{
      opacity: 0.7;
      color: white;
      transition: all 0.3s ease;

      &:hover{
         opacity: 1;
         color: $primary_color;
      }
   }
}
</style>