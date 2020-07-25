<template>
  <div>
    <top-banner :page="'Blog page'" :background="'banner3'"></top-banner>


    <div class="heading">
        <h1>Our Blog Post</h1>
    </div>
    <div class="blog">
      <div class="container">
        <div class="row">



        <div class="col-md-4" v-for="i in 3" :key="i" v-show="loading">
            <div class="load-con">
            <div class="img-area loads">
              
            </div>
            <div class="details loads">
            </div>
          </div>
        </div>


          
          
            <div v-for="(post, index) in posts" :key="index" class="col-md-4" style="margin-top: 20px !important;">
              <router-link :to="{name:'blog-single' , params:{slug:post.id}}">
                <div class="items ui raised segment">
                  <div class="img">
                    <img :src="`/storage/uploads/images/${post.display}`" width="100%" alt />
                  </div>

                  <div class="details">
                    <button>Categry</button>
                    <h4>
                      <strong  v-if="post.title.length<30">{{post.title.substring(0,30)}}</strong>
                      <strong v-else>{{post.title.substring(0,30) + '...'}}</strong>
                    </h4>
                    <p v-html="post.description.substring(0,50) + '...'"></p>
                    <span>23 of Aug</span>
                    <span class="shared">
                      <i class="icon share square outline"></i> 9
                    </span>
                  </div>
                </div>
              </router-link>
          </div>

        </div>
      </div>
    </div>
    <br />
    <br />
  </div>
</template>
<script>
import TopBanner from "../partials/TopBanner";

export default {
  components: {
    TopBanner
  },
  data() {
    return {
      loading:true
    };
  },
  methods: {},
  mounted() {
     this.$store.dispatch('getPost').then(res=>{
       this.loading=false
     });
  },
  computed: {
    posts(){
      return this.$store.getters.posts
    }
  }
};
</script>


<style lang="scss">
.blog {
  & .items {
    background: #fff;
    

    & img {
      height: 200px;
    }
    & .details {
      background: white;
      border-radius: 3px;
      position: relative;
      transform: translateY(-30px);
      margin: auto;
      padding: 5px;
      text-align: center;
      width: 90%;
      box-shadow: 1px -11px 10px #333;

      & strong{
        color:#444
      }

      & button {
        border: none;
        padding: 8px 25px;
        background: rgba(86, 79, 204, 0.9);
        transform: translate(-45px, -24px);
        position: absolute;
        color: white;
        font-weight: 600;
      }

      & p {
        line-height: 23px;
        letter-spacing: 0px;
        color: #777;
        font-size: 15px;
      }

      & span {
        font-size: 12px;
        color: #999 !important;
      }

      & span.shared{
          color:#555 !important;
          font-weight: bold;
          padding-left: 3px;
          font-size: 14px;
      }
    }
  }
}

.load-con{
  background: #888;
    height: 260px;
    width: 100%;
    position: relative;

   & .img-area{
         height: 180px;
        background: #999;
        padding: 10px;
        margin: 10px;
        border-radius: 3px;
        position: relative;
        overflow: hidden;
        top:12px
   }
   & .details{
    height: 26px;
    background: #999;
    padding: 10px;
    margin: 10px;
    width: 30%;
    position: relative;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 3px;
    overflow: hidden;
    top:14px

   }


  
}

.loads{
      background:red;
      
      &::after{
      content: "";
      position: absolute;
      height:100%;
      width: 100%;
      background:linear-gradient(90deg,transparent,rgba(255,255,255,0.2),transparent);
      animation:loading 1s infinite backwards;
      top:0px;
      left:0px;
      transform:translateX(-100%)
    }
  }

 @keyframes loading{
        100%{
           transform: translateX(100%)
       }
   }
</style>