<template>
    <div class="banner">
        <div class="left-detials">
            <h1 class="wow bounceInLeft">We give you a memory You will never forget</h1>
            <p class="wow fadeIn">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut quod perferendis accusamus amet, eos excepturi eum temporibus fugit eveniet esse.</p>
             <div class="ui button wow bounceInUp get-started" data-wow-delay="0.8s">Get started</div> <div class="ui button our-vid" >Our recent Work  <i class="icon play circle outline red wow fadeInRight" data-wow-delay="1.5s"></i></div>
        </div>

        <div class="vid">
             <!-- <video-player width="100%" class="video-player-box"
                 ref="videoPlayer"
                 :options="playerOptions"
                 :playsinline="true"
                >
             </video-player> -->
        <div class="overlay">
        </div>
        <video src="/videos/demo3.mp4" id="vid" muted="muted" autoplay width="100%"></video>
        </div>
    </div> 
</template>

<script>
import 'video.js/dist/video-js.css'
 
import { videoPlayer } from 'vue-video-player'


export default {
    components:{
        videoPlayer
    },
    data() {
      return {
        
        playerOptions: {
          // videojs options
          muted: false,
          autoplay:true,
          controls:true,
          language: 'en',
          playbackRates: [0.7, 1.0, 1.5, 2.0],
          sources: [{
            type: "video/mp4",
            src: "/videos/demo3.mp4"
          }],
          poster: "/static/images/author.jpg",
          breakpoint:{
            tiny:300,
            xsmall:400,
            small:500

        },
        }
      }
    },
    mounted() {
        setTimeout(() => {
          document.getElementById('vid').play()
        },7000);
      
    },
    created () {
    }
}
</script>

<style lang="scss">
 $color: #8783ce;
 $secondary:rgb(86, 79, 204);
 .banner{
      display:grid;
      grid-template-columns: repeat(2,2fr);
      perspective:900px;
      background:url(/images/b1.png);
        background-repeat: no-repeat;
        background-size: 50%;
        background-position: bottom left;
        box-shadow:2px 3px 3px #ddd;

      & .vid{
         width: 80%;
         margin: 50px;
         overflow:hidden;
         position: relative;
         & .overlay{
           top:0px;
           left:0px;
           position:absolute;
           z-index: 999;
           width: 100%;
           height:100%;
           background:url(/images/vidbanner.png);
           background-size: cover;
         }
      }

      & .left-detials{
          padding: 10px;
          margin: 30px;
        & .get-started{
          background:$color;
          color:white;
          transition:0.3s;
          &:hover{
              background:transparent;
              color: $color;
              border: 2px solid $color
          }
        }
        & h1{
                color: #564fcc;
                font-size: 33px;
                font-weight: 800;
                letter-spacing: 1px;
                text-transform: capitalize;
        }
        & p{
            color: #b1afc5;
            font-size: 15px;
        }

        & .our-vid{
            display: inline;
            // font-weight: 600;
            // color: #888888;

            & i{
                padding: 0px 10px;
                animation:blink 0.9s infinite backwards;
                // color:rgb(219, 128, 128) 
            }
        }
      }

        @keyframes blink{
          100%{
              opacity: 0
          }
      }
     
}


  @media screen and(max-width:640px) {
      .banner{
          display: flex;
          flex-direction: column-reverse;
          background-size: 100%;
        & .vid{
           width: 100%;
            overflow: hidden;
            padding: 0px;
            background: #e2dede;
            margin: 0px;
            margin-bottom: 30px;
            box-shadow: 2px 3px 4px #ccc
        }

        & .left-detials{
               padding: 5px;
               top: -28px;
               margin: 20px;
               position: relative;
            & h1{
                // font-weight:700;
                font-size: 25px;
        }
    }
  }


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