<template>
   <div class="container wwd-con">
            <div class="heading">
              <h1 class="wow bounceInLeft">What we Do</h1>
            </div>
            <div class="row">


                <div class="col-md-4" v-for="i in 3" :key="i" v-show="loading">
                    <div class="load-con">
                    <div class="img-area loads">
                    
                    </div>
                    <div class="details loads">
                    </div>
                </div>
                </div>



              
                <div class="col-md-4">
                    <div class="classic-card">
                       <div>
                           <video-player class="video-player-box"
                             ref="videoPlayer" :options="options" src="" width="100%" ></video-player>
                       </div>
                       <div class="details">   
                             <i class="play icon"></i>
                        </div>
                    </div>
                </div>

                 <div class="col-md-4">
                    <div class="classic-card">
                       <div>
                           <img v-lazy="'/images/works/w1.jpg'" alt="" width="100%" height="240px">
                       </div>
                       <div class="details">   
                           <h4>Studio Photography</h4>
                        </div>
                    </div>
                </div>  

                 <div class="col-md-4">
                    <div class="classic-card">
                       <div>
                           <img v-lazy="'/images/works/w10.jpg'" alt="" width="100%" height="240px">
                       </div>
                       <div class="details">   
                           <h4>Wedding Photography</h4>
                        </div>
                    </div>
                </div>  



              


            </div>
        </div>
</template>

<script>
import 'video.js/dist/video-js.css'

import { videoPlayer } from 'vue-video-player'

export default {
 components: {
    videoPlayer
  },
  data() {
      return {
          loading:false,
          options:{
                    sources: [{
                    type: "video/mp4",
                    src: "/videos/demo2.mp4"
                }],
                poster: "/images/works/w3.jpg",
          }
      }
  },

  mounted() {
      console.log(videoPlayer);
  },
}
</script>

<style lang="scss">
 $color: #8783ce;
 $secondary:rgb(86, 79, 204);
 
 .wwd-con{
    background: url(/images/svg/liveShape-bg.svg) no-repeat;
    background-position: right;
}
.classic-card{
    height: 260px;
    overflow: hidden;
    // padding:10px;
    background: white;
    border-radius: 5px;
    border:1px solid #ccc;
    cursor: pointer;
    transition:0.3s;
    & img{
            transition: 0.3s ease;
        }
    &:hover .details{
        color:#fff;
        bottom: 50%;
        background: rgba(0,0,0,0.5);
        transform: scale(1)
        
    }

    &:hover img{
        transform: scale(1.2);
        opacity:0.7;
        bottom:0px;
    }

    & .details{
        position: relative;
        font-family: cursive;
        transition:all 0.3s 0.7s;
        padding: 10px;
        text-align: center;
        transform: scale(0.5);
        bottom: -5px;
        border-left:4px solid $color; 
        border-right:4px solid $color 

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