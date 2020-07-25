<template>
  <div class="container vid-con">
    <div class="heading">
      <h1 class="wow bounceInLeft">Custom Video</h1>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="classic-vid">
          <div class="vid">
            <video
              id="vid1"
              src="/videos/demo2.mp4"
              poster="/images/slider/big_img1.jpg"
              width="100%"
            ></video>
            <!-- <div class="progress">
              <div class="porgress-inner"></div>
            </div>-->
            <div class="p2" @click="togglePlay">
              <i class="icon play" id="1"></i>
            </div>
            <div class="details">
              <div>Category</div>
              <div>4:2</div>
            </div>
          </div>
        </div>
      </div>

       <div class="col-md-4">
        <div class="classic-vid">
          <div class="vid">
            <video
              id="vid2"
              src="/videos/demo1.mp4"
              poster="/images/slider/big_img1.jpg"
              width="100%"
            ></video>
            <!-- <div class="progress">
              <div class="porgress-inner"></div>
            </div>-->
            <div class="p2" @click="togglePlay">
              <i class="icon play" id="2"></i>
            </div>
            <div class="details">
              <div>Category</div>
              <div>4:2</div>
            </div>
          </div>
        </div>
      </div>

     
     

    </div>
  </div>
</template>

<script>
import {each} from 'lodash'
export default {
  components: {},
  data() {
    return {
      options: {
        sources: [
          {
            type: "video/mp4",
            src: "/videos/demo2.mp4"
          }
        ],
        poster: "/images/works/w3.jpg"
      }
    };
  },

  methods: {
    pauseAll:function(){
      
      console.log(control);
      
      control.forEach(e=>function(){
        e.classList.remove("pause");
         e.classList.add("play");
      })
      },
    togglePlay: function(e) {
      let control=document.querySelectorAll('.p2 i');
      let elem = e.target;
      let videos=document.querySelectorAll('video');
      let id = elem.getAttribute("id");
      let vid = document.getElementById("vid" + id);
      
      
      videos.forEach(val=>{
        val.pause();

      })

     
      
      if (elem.classList.contains("play")) {
        elem.classList.remove("play");
        elem.classList.add("pause");
        vid.play();
      } else {
        elem.classList.add("play");
        elem.classList.remove("pause");
        vid.pause();
      }

      //  control.forEach(el=>{       
      //     if (el===elem) {
      //       //  if (elem.classList.contains("play")) {
      //       //     elem.classList.remove("play");
      //       //     elem.classList.add("pause");
      //       //   } else {
      //       //     elem.classList.add("play");
      //       //     elem.classList.remove("pause");
      //       //   }
      //     } 
      //     else{
      //       if (el.classList.contains("play")) {
      //         el.classList.remove("play");
      //         el.classList.add("pause");
      //       } else {
      //         el.classList.add("play");
      //         el.classList.remove("pause");
      //       }
      //     }
           
          // })
      

    }
  },

  mounted() {}
};
</script>

<style lang="scss">
$color: #8783ce;
$secondary: rgb(86, 79, 204);

.classic-vid {
  background: white;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  box-shadow: 2px 3px 4px #ccc;
  padding: 10px;
  position: relative;
  &:hover .p2 {
    opacity: 1;
  }

  & .details {
    display: flex;
    justify-content: space-between;
    color: $secondary;
    font-size: 14px;
    position: relative;
    padding: 5px;
    font-weight: 700;

    & div:nth-child(2) {
      color: #999;
      font-size: 13px;
    }
  }
  & .p2 {
    opacity: 0;
    transition: 1s cubic-bezier(0.215, 0.61, 0.355, 1);
    font-size: 35px;
    color: white;
    position: absolute;
    z-index: 999;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
}

@media screen and(max-width:640px) {
  //   .classic-vid{
  //     height: 260px;
  //     & .details {
  //       bottom: 50px;
  //       color: #fff;
  //       // bottom: 50%;
  //       background: rgba(0, 0, 0, 0.5);

  //       transform: scale(1);
  //     }
  //   }
}
</style>