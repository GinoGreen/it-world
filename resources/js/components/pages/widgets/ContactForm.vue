<template>


<form>

   <div class="form-group">
      <input class="form-control" id="exampleFormControlInput1" placeholder="Nome">
   </div>

   <div class="form-group">
      <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="Email">
   </div>
  
   <div class="form-group">
      <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Messaggio" rows="3"></textarea>
   </div>
</form>


</template>

<script>
export default {
   name: 'ContactForm',
   data(){
      return{

      }
   },

   methods:{
      
   },
   mounted(){
      
   }
}

</script>

<style lang='scss' scoped>
@import '../../../../sass/guest/_variables.scss';
@import '../../../../sass/guest/_generals.scss';

form{
   width: 90%;
   input, textarea{
      width: 100%;
      margin: 10px 0px;
      padding: 5px;
      height: 50px;
   }

   textarea{
      height: 200px;
   }
}



</style>