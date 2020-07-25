<template>
    <div >
        <div class="row">
           <side-bar></side-bar>
           <user-details></user-details>
        </div>
    </div> 

</template>
<script>
   import SideBar from "../profile/SideBar";
   import UserDetails from "../profile/UserDetails";
   
   export default {
       components: {
           SideBar,
           UserDetails,
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
<style src="cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css"></style>
<style lang="scss">
   
   @keyframes skeleton_loader{
       100%{
           transform:translateX(100%)
       }
   }
   .card{
       overflow:hidden
   }
   .loading{
       position:relative;
       background:#E2E2E2;
       z-index:1000;
       &::after{
           display:block;
           content:"";
           top:0px;
           height: 100%;
           width:100%;
           position: absolute;
           transform: translateX(-100%);
           background:linear-gradient(90deg,transparent,rgba(255,255,255,0.6),transparent);
           animation:skeleton_loader 1.5s infinite;
       }
   }
   .card.loading{
       height:auto;
       max-width:100%
   }


  .input{
      padding:10px;
      border-bottom: 1rem solid #605ca8;
      width:100%;
      //border: none;
      outline: none
  }

  @media screen and (max-width: 480px) {
    .side-contain{
        position: relative;
        transition: all 350ms cubic-bezier(0.6, 0.05, 0.28, 0.91);
        left: -360px;
    }
    .right-side{
        margin-left: 0px;
        & .info{
        height:auto;
        text-align: center;

          & .b1{
             top: -314px;
          }

        }
        & .info img {
            float: none;
        }
        & .info .details {
            margin-left: 0px;
                
        }
         & .info ul{
            justify-content: space-around;
            display: flex;      
        }

    }

}
</style>