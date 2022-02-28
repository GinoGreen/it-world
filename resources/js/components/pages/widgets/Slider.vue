<template>
  <!-- slider -->
    <div class="it-slider container-xl">
      <div class="swiper it-swiper">
        <div class="swiper-wrapper content">

          <!-- card -->
          <div 
          v-for="(card, index) in 6"
          :key="index"
          class="swiper-slide it-card">
            <div class="it-card-content">
              <div class="image">
                <img src="/img/slider/undraw_profile_pic_ic-5-t.svg" alt="avatar">
              </div>

              <div class="media-icons">
                <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                <i class="fa fa-github" aria-hidden="true"></i>
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </div>

              <div class="name-profession">
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

              <div class="button">
                <button class="aboutMe">Dettagli</button>
              </div>
            </div>
          </div>
          <!-- /card -->
          
        </div>
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
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
.it-slider{
  position: relative;
  display: flex;
  min-height: 50vh;
  align-items: center;
}

.swiper{
  max-width: 768px;
}

.it-card{
  position: relative;
  background: #fff;
  margin: 70px 0;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.it-card::before{
  content: "";
  position: absolute;
  height: 40%;
  width: 100%;
  background: #FF4D5A;
}

.it-card .it-card-content{
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 30px;
  position: relative;
  z-index: 100;
}

.it-slider .it-card .image{
  height: 140px;
  width: 140px;
  border-radius: 50%;
  padding: 3px;
  background: #072142;
}

.it-slider .it-card .image img{
  height: 100%;
  width: 100%;
  object-fit: cover;
  border-radius: 50%;
  border: 3px solid white;
}

.it-card .media-icons{
  position: absolute;
  top: 10px;
  right: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.it-card .media-icons i{
  color: white;
  opacity: 0.6;
  margin-top: 10px;
  transition: all 0.3s ease;
  cursor: pointer;
}

.it-card .media-icons i:hover{
  opacity: 1;
}

.it-card .name-profession{
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 10px;
  color: #072142;
} 

.name-profession .name{
  font-size: 20px;
  font-weight: 600;
}

.name-profession .profession{
  font-size:15px;
  font-weight: 500;
}

.it-card .rating{
  display: flex;
  align-items: center;
  margin-top: 18px;
}

.it-card .rating i{
  font-size: 18px;
  margin: 0 2px;
  color: #FF4D5A;
}

.it-card .button{
  width: 100%;
  display: flex;
  justify-content: space-around;
  margin-top: 20px;
}

.it-card .button button{
  background: #072142;
  outline: none;
  border: none;
  color: #fff;
  padding: 10px;
  border-radius: 20px;
  font-size: 14px;
  transition: all 0.3s ease;
  cursor: pointer;
}

.button button:hover{
  background: #FF4D5A;
}

.swiper-pagination{
  position: absolute;
}

.swiper-pagination-bullet{
  height: 7px;
  width: 26px;
  border-radius: 25px;
  background: #FF4D5A;
}

.swiper-button-next, .swiper-button-prev{
  opacity: 0.7;
  color: #FF4D5A;
  transition: all 0.3s ease;
}
.swiper-button-next:hover, .swiper-button-prev:hover{
  opacity: 1;
  color: #FF4D5A;
}
</style>