<template>
    <div class="container" style="background:white">
        <div class="progressBar">
            <ul>
                <li class="active" >Register </li>
                <li>Activate</li>
                <li>Enjoy</li>
            </ul>
        </div>

        <div class="activation-step">
            <h2 class="text-center">Activate Your Account</h2>

            <div class="row">
                <div class="col-md-4">
                    <div class="grid-list">
                    <i class="fa fa-envelope-o"></i>
                    <div>
                        <b>This email address you registe</b><br>
                        <button class="btn btn-default">email@gmail.com</button><br>
                        <small>if this is incorect you can edit it <a href="#">here</a> </small>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="grid-list">
                    <i class="fa fa-clock-o"></i>
                    <div>
                        <b>Open the activation email </b>
                        <p>It may take upto 1 hour to arrive. Also don't forget to check spam folder.</p>
                        <small>if you haven't recived the activation email after 1 hour, click  <a href="#">here</a> to request for new one. </small>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="grid-list">
                    <i class="fa fa-hand-o-down"></i>
                    <div>
                        <b>Click the activation link in your email</b>
                        <p>And enjoy TUnnER</p>
                    </div>
                   </div> 
                </div>
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
<style lang="scss" scope>
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
      color:#ababab

  }

  .progressBar li::before{
      content: counter(step);
      counter-increment: step;
      border-radius: 50%;
      border:2px solid #aaa;
      text-align: center;
      display: block;
      height: 50px;
      width:50px;
      line-height:45px;
      margin-left:-5px;
      margin:0px auto 10px auto;
      background:#ddd;
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

  .progressBar li:nth-child(2)::after{
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
          color:#605ca8;
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