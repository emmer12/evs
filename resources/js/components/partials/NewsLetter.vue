<template>
   <flux-parallax src= "/images/slider/big_img5.jpg"  style="height:300px;width:100%">
       <div class="news-con">
        <div class="subscribe">
            <h4>News Leter</h4>  
            <p>Sing up to get weekly emails with inspiration in your inbox</p>

            <div class="input-c">
                <input type="email" placeholder="Your Email">
                <button class="button">Subscribe</button>
            </div>        
        </div> 
   </div>
   </flux-parallax>
</template>

<script>
import {FluxParallax} from 'vue-flux';

export default {
    components:{
        FluxParallax,
    }

}
</script>

<style lang="scss">
 $color: #8783ce;
 $secondary:rgb(86, 79, 204);
 
 .news-con{
    // background:linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)) ,url(/images/slider/big_img5.jpg) no-repeat;
    // background-attachment: fixed;
    background-position: center;
    background-size: cover;
    height:300px;
    width: 100%;
    text-align:center;

    & .subscribe{
           position: relative;
            background: rgba(0,0,0,0.5);
            align-items: center;
            top: 50%;
            transform: translateY(-50%);
            padding:10px;

            & h4{
                color:white;
                text-transform: uppercase;
                line-height: 16px;
                font-size: 20px;
                font-weight: 700;
            }

            & p{
                color:rgba(250,250,250,0.5)
            }

            & input{
                padding:10px;
                background: transparent;
                border:2px solid $secondary;
                color:#eee;
            }
            & button{
               padding: 12px 20px;
                background: #564fcc;
                outline: none;
                border: none;
                border-radius: 3px;
                color: white;
                font-weight: 600;
                transition:0.3s ease;
                &:hover{
                    background: transparent;
                    border: 1px solid $secondary;
                }
            }
    }
}


  @media screen and(max-width:640px) {
  .classic-card{
    height: 260px;
    & .details{
        bottom: 50px;
        color:#fff;
        // bottom: 50%;
        background: rgba(0,0,0,0.5);
        transform: scale(1)

    }
 }
}
    
</style>