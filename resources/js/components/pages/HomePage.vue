<template>
  <!-- <slider-view></slider-view> -->
  <div>
    <div class="banner">
      <div>
        <div class="column wow zoomIn" style="cursor:pointer" @click="setIndex(1)">
          <i class="play icon" style="font-size:40px;line-height:40px"></i>
        </div>
        <h1 class="wow fadeIn">Wedding ani</h1>
        <h4 class="wow fadeInUp">Say to me ani</h4>
      </div>
    </div>

    <div class="vid-grid">
      <div class="items" v-for="(image, index) in items" :key="index" @click="setIndex(index)">
        <img :src="image.thumb" width="100%" height="100%" alt="evs" />
        <div class="details">
            {{ image.category }}
        </div>
      </div>
    </div>

    <CoolLightBox
      :items="items"
      :index="index"
      loop
      autoplay
      @on-change="handleChange"
      @close="index = null"
    ></CoolLightBox>

    <!-- :style="{ backgroundImage: 'url(' + image.src + ')' }" -->

    <!-- <LightBox :media="media" :autoPlay="true"></LightBox> -->

    <div :class="{'leaving':leaving}"></div>
    <div style="height:100px"></div>

  </div>
</template>
<style src="slick-carousel/slick/slick.css"></style>

<script>
// import LightBox from 'vue-it-bigger'
//    import CustomVideo from "../partials/CustomVideo"
import CoolLightBox from "vue-cool-lightbox";
import "vue-cool-lightbox/dist/vue-cool-lightbox.min.css";
// require('vue-it-bigger/dist/vue-it-bigger.min.css')
export default {
  components: {
    // LightBox
    CoolLightBox
  },
  data() {
    return {
      leaving:false,
      items: [
        {
          src: "/videos/vid1.mp4",
          thumb: "/images/works/w1.jpg",
          category:"Wedding"
        },
        {
          src: "/videos/vid2.mp4",
          thumb: "/images/works/w2.jpg",
          category:"Graduation"
        },
        {
          src: "/videos/vid3.mp4",
          thumb: "/images/works/w3.jpg",
          category:"Annivasary"
        },
        {
          src: "/videos/vid4.mp4",
          thumb: "/images/works/w4.jpg",
          category:"Perty"
        },
        {
          src: "/videos/vid5.mp4",
          thumb: "/images/works/w5.jpg",
          category:"Baby Shower"
        },
        {
          src: "/videos/vid6.mp4",
          thumb: "/images/works/w6.jpg",
          category:"Birthday"
        },
        {
          src: "/videos/vid1.mp4",
          thumb: "/images/works/w7.jpg",
          category:"Musical Video"
        }
      ],
      index: null,
      media: [
        {
          // For video
          thumb: "/images/works/w1.jpg",
          sources: [
            {
              src: "/videos/vid1.mp4",
              type: "video/mp4"
            }
          ],
          type: "video",
          caption: "<h4>Monsters Inc.</h4>",
          width: 800, // Required
          height: 600, // Required
          autoplay: true // Optional: Autoplay video when the lightbox opens
        },
        {
          // For video
          thumb: "/images/works/w2.jpg",
          sources: [
            {
              src: "/videos/vid2.mp4",
              type: "video/mp4"
            }
          ],
          type: "video",
          caption: "<h4>Monsters Inc.</h4>",
          width: 800, // Required
          height: 600, // Required
          autoplay: false // Optional: Autoplay video when the lightbox opens
        },
        {
          // For video
          thumb: "/images/works/w3.jpg",
          sources: [
            {
              src: "/videos/vid3.mp4",
              type: "video/mp4"
            }
          ],
          type: "video",
          caption: "<h4>Monsters Inc.</h4>",
          width: 800, // Required
          height: 600, // Required
          autoplay: false // Optional: Autoplay video when the lightbox opens
        },
        {
          // For video
          thumb: "/images/works/w4.jpg",
          sources: [
            {
              src: "/videos/vid4.mp4",
              type: "video/mp4"
            }
          ],
          type: "video",
          caption: "<h4>Monsters Inc.</h4>",
          width: 800, // Required
          height: 600, // Required
          autoplay: false // Optional: Autoplay video when the lightbox opens
        }
      ]
    };
  },
  methods: {
    setIndex(index) {
      this.index = index;
    },
    handleChange(e){
       let allVid=document.querySelectorAll('video');
       for (let index = 0; index < allVid.length; index++) {
            allVid[index].pause();
       }
    }
  },
  mounted() {},
  computed: {
    LoggedUser() {
      if (window.loggedUser) {
        return true;
      } else {
        return false;
      }
    }
  },

  beforeRouteLeave (to, from, next) {
    this.leaving=true
    setTimeout(function () {
        next() 
      },1000)
  }
};
</script>
// <style src="slick-carousel/slick/slick.css"></style>
<style src="slick-carousel/slick/slick-theme.css"></style>

<style lang="scss" >
@import url("https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap");
$color: #8783ce;
$secondary: rgb(86, 79, 204);
.heading {
  & h1 {
    color: #555;
    font-size: 30px;
    padding: 10px;
    letter-spacing: 4px;
    font-family: "Fugaz One", cursive;
    position: relative;
    margin: 10px;
  }

  & ::after {
    content: "";
    position: absolute;
    height: 3px;
    width: 100px;
    background: #555;
    bottom: 0px;
    left: 0px;
  }
}

.banner {
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
    url("/images/works/w8.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  height: 90vh;
  width: 100vw;
  text-align: center;
  & div {
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    color: white;

    & h1,
    h4 {
      line-height: 10px;
    }

    & h1 {
      font-size: 50px;
    }
  }
}

.vid-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 10px;
  margin-top: 50px;
  margin-left: 25px;
  margin-right: 25px;
  & .items {
    background:  linear-gradient(rgba(0,0,0,0.5),rgba(255,255,255,1));
    height: 200px;
    cursor: pointer;
    position:relative;
    transition:1s ease;
    & .details{
        //    border-radius:5px;
            position:absolute;
            height: 100%;
            width:100%;
            top:0;
            background:  linear-gradient(rgba(0,0,0,0.5),rgba(255,255,255,0.1));
            color:rgba(255, 255, 255, 0.7);
            padding:10px;
            font-size:16px;
            font-weight:700;
        } 
    &:hover{
        & .details{
            position:absolute;
            height: 100%;
            width:100%;
            top:0;
            background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,200,0.5));
            color:rgba(255, 255, 255, 0.7);
            padding:10px;
            font-size:16px;
            font-weight:700;

        } 
    }

  }
}

@keyframes leftR {
  0%{
    transform: translate3d(-100%,0px,0px);
  }
  100%{
    transform: translate3d(0%,0px,100px);
  }
}


@keyframes rightR {
  0%{
    transform: translate3d(0%,0px,0px);
  }
  90%{
    opacity:1
  }
  100%{
    transform: translate3d(-100%,0px,100px);
    opacity:0
  }
}



.leaving{
  &::before{
    animation-name:leftR;
    animation-duration:0.7s;
    top:0px;
  }
   &::after{
    animation-name:leftR;
    animation-duration:1s;
    bottom: 0;
  }
  &::before,&::after{
    content: "";
    height:50%;
    width:100%;
    position:fixed;
    left:0px;
    transition-property: opacity,translate;
    transition-timing-function: ease-in-out;
    background: #444;
    z-index: 9999;

  }

}

.entring{
  &::before{
    animation-name:rightR ;
    animation-duration:0.7s;
    top:0px;
  }
   &::after{
    animation-name:rightR ;
    animation-duration:1s;
    bottom: 0;
  }
  &::before,&::after{
    content: "";
    height:50%;
    width:100%;
    position:fixed;
    left:0px;
    transition-property: opacity,translate;
    transition-timing-function: ease-in-out;
    background: #444;
    transform-origin: left;
    z-index:9999
  }

}


@media screen and (max-width: 640px) {
  .heading h1 {
    font-size: 20px;
  }
  .vid-grid {
    grid-template-columns: 1fr;
  }
}
</style>