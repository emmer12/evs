<template>
        <div class="container">
            <portfolio></portfolio>
        </div> 
</template>
<script>

import Portfolio from "../partials/Portfoleo" 
   
   
   export default {
       components: {
          Portfolio
        },
        data(){ 
            return {
                
            } 
        }, 
        methods:{

        },
        mounted() {

        },
        computed:{
           LoggedUser(){
            if(window.loggedUser){
                return true;
            }else{
                return false;
            }
           }
        }
    }
</script>


<style lang="scss" scoped>
   
</style>