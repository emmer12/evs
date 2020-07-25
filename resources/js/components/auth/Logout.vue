<template>
    <div style="padding:20px">
      <h4>logging out...</h4>
      <img src="/images/logout.gif" width="100%" alt="logout">
    </div>
   </template>
<script>
//local registrationimport 


import { ValidationProvider } from 'vee-validate';
   export default {
       created(){
         this.$store.dispatch('destroyToken').then(response=>{
           this.$router.push({name:'admin'})
         })
       }
    }
</script>
