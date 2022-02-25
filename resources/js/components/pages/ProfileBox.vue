<template>

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
  
</template>

<script>
export default {
   name: 'ProfileBox'
}
</script>

<style lang="scss" scoped>

@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;800&display=swap');

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
      background-color: #FF4D5A;
      margin-right: 20px;
   }

   .info{
      margin-bottom: 15px;

      p{
         margin-bottom: 0px;
      }
   }
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