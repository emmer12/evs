<template>
   <div class="footer-con">
       <div class="container">
          <div class="footer">
            <div class="row">
              <div class="col-md-4 f-col">
                   <h4>Contact Us</h4>
                   <hr>
                   <ul>
                     <li>
                       <i class="icon map marker alternate"></i>
                       No 34 texas jhfjhja fafadf</li>
                       <li>
                       <i class="icon phone square"></i>
                       <a href="tel:+0947367434">098676566</a></li>
                       <li>
                       <i class="icon envelope outline"></i>
                       <a href="mail:admin@mail.com">admin@mail.com</a></li>
                     

                   </ul>
              </div>
               <div class="col-md-4 f-col">
                   <h4>Information</h4>
                   <hr>
                     <ul>
                     <li><router-link to="/service">Service</router-link></li>
                     <li><router-link to="/contact">Contact</router-link></li>
                     <li><router-link to="/about">About</router-link></li>                   

                   </ul>
              </div>
               <div class="col-md-4 f-col">
                    <div>
                       <img src="/images/logo.png" width="30%"  alt="">
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda asperiores atque cumque doloribus neque vero aut sed amet possimus quia.</p>
                       <hr>
                        <h4>Follow Us On</h4>
                        <ul>
                          <li><a href=""><i class="facebook icon"></i></a></li>
                          <li><a href=""><i class="twitter icon"></i></a></li>
                          <li><a href=""><i class="youtube icon"></i></a></li>
                          <li><a href=""><i class="instagram icon"></i></a></li>
                      </ul>
                    </div>
              </div>
            </div>
          </div> 
       </div>
   </div>
</template>

<script>
export default {

}
</script>

<style lang="scss">
 $color: #8783ce;
 $secondary:rgb(86, 79, 204);
 
 .footer-con{
   background: #333;
   color:white;

   & h4{
     color:$secondary;
     text-transform: uppercase;
     font-size: 20px;
   }
   & .f-col{
     padding:10px;
     & ul{
       margin:0px;
       padding:0px;

       & li{
         line-height: 23px;
          border-bottom: 1px solid #555;
          padding:10px 5px; 
         & a{
           color:white;
           font-weight: 600;
         }
       }
     }
   }

   & .f-col:nth-child(1){
      background:url(/images/footer-bg.png) no-repeat;
    }
    

   & .f-col:nth-child(3){
         & ul li{
           display:inline-block;
           border-bottom:none;

           & i{
             font-size: 25px
           }
         }
      }
      
 }

  @media screen and(max-width:640px) {
 
  }
    
</style>