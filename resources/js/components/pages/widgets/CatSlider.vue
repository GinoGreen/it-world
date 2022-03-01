<template>
  <!-- slider -->
    <div class="it-slider container-fluid">
      <div class="swiper it-swiper">
        <div class="swiper-wrapper content">

          <!-- card -->
          <div 
          v-for="(card, index) in 6"
          :key="index"
          class="swiper-slide it-card">
            <div class="it-card-content">

              <div class="it-info">
               <img src="/img/catslider/frontend-dev.svg" alt="image">
              </div>

              <div class="it-btn">
                <button>Categoria</button>
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
   name: 'CatSlider',
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
   min-height: 50vh;
   align-items: center;

   .swiper{
      max-width: 768px;
      .swiper-wrapper{
         .it-card{
            position: relative;
            background: #fff;
            margin: 70px 0;
            border-radius: 30px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            &::before{
               content: "";
               position: absolute;
               border-radius: 30px;
               background: #7B40FF;
               height: 100%;
               width: 100%;
            }

            .it-card-content{
               display: flex;
               flex-direction: column;
               align-items: center;
               padding: 30px;
               position: relative;
               z-index: 100;

               .it-info{
                  display: flex;
                  flex-direction: column;
                  align-items: center;
                  margin-top: 10px;
                  color: $secondary_color;

                  .name{
                     font-size: 20px;
                     font-weight: 600;
                  }
                  img{
                     width: 100%;
                  }
               }

               .rating{
                  display: flex;
                  align-items: center;
                  margin-top: 18px;

                  i{
                     font-size: 18px;
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
      color: $primary_color;
      transition: all 0.3s ease;

      &:hover{
         opacity: 1;
         color: $primary_color;
      }
   }
}
</style>