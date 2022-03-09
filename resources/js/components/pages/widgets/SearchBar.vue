<template>
<!-- search-bar -->
   <div class="it-search glass">
      <form method="get" action="">
         <div class="it-table">

            <!-- search-input -->
            <div class="it-td" id="it-search-left">
               <input type="text" 
                  placeholder="Ricerca..."
                  v-model="stringSearched"
                  @keypress="preventTyping"
               >
            </div>

            <!-- search-button -->
            <router-link :to="{name: 'advanced_search', params:{job_role: this.stringSearched}}" >
      
               <div class="it-td" id="it-search-right">
                   <button type="submit">
                          <div id="it-search-circle"></div>
                          <span></span>
                   </button>
               </div>

            </router-link>
            

         </div>
      </form>
   </div>
<!-- /search-bar -->
</template>

<script>
export default {
   name: 'SearchBar',

   data() {
      return {
         stringSearched: ''
      }
   },

   methods:{
      preventTyping(event) {

      },
   },
}

</script>

<style lang='scss' scoped>
@import '../../../../sass/guest/_variables.scss';
/* SEARCH */
.it-search{
   display: flex;
   justify-content: space-between;
   align-items: center;
   width: 100%;
   min-height: 50px;
   // background-color: $primary_color;
   border-radius: 20px;
   border: 5px solid white;
   margin-top: 20px;
   /*box-shadow: 0 5px 20px #f16972, 0 0 0 10px white;*/
   form{
      height: 100%;
      width: 100%;
      .it-table{
         display: flex;
         justify-content: space-between;
         align-items: center;
         width: 100%;
         padding: 0 40px;
         .it-td{
            input[type="text"]{
               width: 100%;
               min-height: 50px;
               font-size: 25px;
               line-height: 1;
               &::placeholder{
                  color: #fff;
               }
            }


            button{
               position: relative;
               display: block;
               height: 96px;
               cursor: pointer;
               #it-search-circle{
                  width: 30px;
                  height: 30px;
                  margin-top: 0;
                  border-width: 5px;
                  border: 5px solid $primary_color;
                  background-color: transparent;
                  border-radius: 50%;
                  transition: 0.5s ease all;
               }
               span{
                  position: absolute;
                  top: 55px;
                  left: 0px;
                  display: block;
                  width: 45px;
                  height: 4px;
                  background-color: transparent;
                  border-radius: 10px;
                  transform: rotateZ(52deg);
                  transition: 0.5s ease all;
                  &:after, &:before{
                     content: "";
                     position: absolute;
                     bottom: 0;
                     right: 0;
                     width: 20px;
                     height: 5px;
                     background-color: $primary_color;
                     border-radius: 10px;
                     transform: rotateZ(0);
                     transition: 0.5s ease all;
                  }
               }
            }

            input, button{
               color: #fff;
               padding: 0;
               margin: 0;
               border: 0;
               background-color: transparent;
            }
         }
         #it-search-left{
            width: 90%;
         }
         #it-search-right{
            display: flex;
            justify-content: flex-end;
            width: 10%;
         }
      }
   }
}

// hover effects
#it-search-right:hover #it-search-circle{
   top: -1px;
   width: 50px;
   height: 5px;
   border-width: 0;
   background-color: $primary_color;
   border-radius: 20px;
}
#it-search-right:hover span{
   top: 55px;
   left: 25px;
   width: 25px;
   margin-top: -8.5px;
   transform: rotateZ(0);
}

#it-search-right:hover button span:before{
   bottom: 6px;
   left: 9px;
   transform: rotateZ(52deg);
}

#it-search-right:hover button span:after{
   bottom: -6px;
   left: 9px;
   transform: rotateZ(-52deg);
}
</style>