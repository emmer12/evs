<template>
    <div class="container" style="background:white">
        <div class="progressBar">
            <ul>
                <li class="active" >Register </li>
                <li class="active">Activate</li>
                <li class="active">Enjoy</li>
            </ul>
        </div>

        <div class="activation-step">
            <h2 class="text-center">Your <strong>TUnnER </strong> account has been successfully activated </h2>

            <div class="row">
              <button class="btn btn-success center-block">Go to Your Dashboard</button>
            </div>
        </div>
    </div> 

</template>
<script>
   export default {
       components: { },
        data(){ 
            return {
             } 
        },
        methods:{

        },
        mounted() {

        },
    }
</script>
<style src="cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css"></style>
<style lang="scss" scoped>
  .progressBar{
      width: 100%;
      height: 100px;
      counter-reset: step;
      margin-top: 80px;
  }
  .progressBar li{
      float:left;
      width:33.33%;
      list-style: none;
      text-align: center;
      position: relative;
      color:white

  }

  .progressBar li::before{
      content: counter(step);
      counter-increment: step;
      border-radius: 50%;
       background-color:#605ca8;
      border:2px solid #423f7f;
      text-align: center;
      display: block;
      height: 50px;
      width:50px;
      line-height:45px;
      margin-left:-5px;
      margin:0px auto 10px auto;
      position: relative;
      z-index:1;

  }

  .progressBar li::after{
      content:"";
      display: block;
      height: 4px;
      width:100%;
      margin-top:-59px;
      background:#ddd;
      position: absolute;
      right: 55%;
  }
   .progressBar li:first-child::after{
      display: none;
  }


  .progressBar li.active::before{
      color:white;
      background-color:#605ca8;
      border:2px solid #423f7f;

  }

  .progressBar li:nth-child(2)::after, .progressBar li:nth-child(3)::after{
      background: #605ca8
  }

   .progressBar li.active{
      color:#605ca8;
  }


  .activation-step{
      background:white;
     & .grid-list{
         padding: 20px;
        display: flex;
       div{
           padding: 10px;
       }
     }
     & h2{
          color:#2c662d;
          font-weight: 500;     
      }
      & i{
          font-size: 50px;
          color:#605ca8;

      }

      & b{
        position: relative;
        padding-bottom: 5px;
        line-height: 20px;
        display: block;
      }
      & p{
          margin: 0 0 10px;
      }

  }


</style>