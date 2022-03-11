<template>
   <!-- slider -->
   <div class="it-slider container-fluid">
      <div class="swiper it-swiper">
         <div class="swiper-wrapper content ">

            <!-- card -->
            <div 
               v-for="(card, index) in 6"
               :key="index"
               class="swiper-slide it-card glass"
            >
               <div class="it-card-content">
                  <div class="it-slider-avatar">
                     <img src="/img/slider/undraw_profile_pic_ic-5-t.svg" alt="avatar">
                  </div>

                  <div class="it-info">
                     <span class="name">Nome Cognome</span>
                     <span class="profession">Web Developer</span>
                  </div>

                  <div class="rating">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                  </div>

                  <div class="it-btn">
                     <button class="aboutMe">Dettagli</button>
                  </div>
               </div>
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
   name: 'Slider',
   data(){
      return{
         swiper: null,
         card: 1,
      }
   },
   methods:{
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
      max-width: 50vw;

      .swiper-wrapper{
         
         .it-card{
            position: relative;
            margin: 10px 0;
            border-radius: 30px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            
            &::before{
               content: "";
               position: absolute;
               border-radius: 10px 10px 0 0;
               height: 25%;
               width: 100%;
               background: $primary_color;
            }

            .it-card-content{
               display: flex;
               flex-direction: column;
               align-items: center;
               padding: 20px;
               position: relative;
               z-index: 100;
               
               .it-slider-avatar{
                  // height: 140px;
                  height: 90px;
                  // width: 140px;
                  width: 90px;
                  border-radius: 50%;
                  padding: 3px;
                  background: $secondary_color;

                  img{
                     height: 100%;
                     width: 100%;
                     object-fit: cover;
                     border-radius: 50%;
                     border: 3px solid white;
                  }
               }

               .it-info{
                  display: flex;
                  flex-direction: column;
                  align-items: center;
                  margin-top: 10px;
                  color: white;

                  .name{
                     font-size: 80%;
                     font-weight: 600;
                  }
                  
                  .profession{
                     font-size: 12px;
                     font-weight: 500;
                  }
               }

               .rating{
                  display: flex;
                  align-items: center;
                  margin-top: 18px;

                  i{
                     font-size: 12px;
                     margin: 0 2px;
                     color: $primary_color;
                  }                    
               }
            }
         }
      }
   }

   .swiper-button-next, .swiper-button-prev{
      opacity: 0.7;
      color: #fff;
      transition: all 0.3s ease;

      &:hover{
         opacity: 1;
         color: $primary_color;
      }
   }
}
</style>