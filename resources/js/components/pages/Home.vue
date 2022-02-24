<template>
   <main>
      <!-- sezione cerca -->
      <section class="search">

         <div class="container">
            <div class="row">

               <div class="content-sx col-6"></div>
               <div class="content-dx col-6"></div>

            </div>
         </div>
         

      </section>
      <!-- sezione categorie -->
      <section class="categories">

         <div class="container">
            <div class="row">

               <div class="content-sx col-6"></div>
               <div class="content-dx col-6"></div>

            </div>
         </div>

      </section>
      <!-- sezione professionisti -->
      <section class="professional">

        <div class="container">
            <div class="row">

               <div class="content-sx col-6"></div>
               <div class="content-dx col-6"></div>

            </div>
         </div>

      </section>
      <!-- sezione about -->
      <section class="about">

         <div class="container">
            <div class="row">

               <div class="content-sx col-6"></div>
               <div class="content-dx col-6"></div>

            </div>
         </div>

      </section>
      <!-- sezione iscriviti -->
      <section class="subscribe">

         <div class="container">
            <div class="row">

               <div class="content-sx col-6"></div>
               <div class="content-dx col-6"></div>

            </div>
         </div>

      </section>
      <!-- sezione contatti -->
      <section class="contact">

         <div class="container">
            <div class="row">

               <div class="content-sx col-6"></div>
               <div class="content-dx col-6"></div>

            </div>

         </div>
      </section>

   </main>
</template>

<script>
export default {
   name: 'Home'
}
</script>

<style lang="scss" scoped>

main{
   width: 100vw;
   margin-top: 90px;
   // background-color: #072142;
   section{
      height: calc(100vh - 90px);
      width: 100vw;
      background-color: #072142;
      
      margin-bottom: 20px;

      .container{
         .row{
            padding-top: 150px;
            .content-sx, .content-dx{
               height: 400px;
                
            }
            .content-sx{
               background-color: cyan;
            }
            .content-dx{
               background-color: #fff;
            }
         }
      }
      
   }
}

</style>