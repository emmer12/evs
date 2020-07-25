<template>
  <div>
    <div class="single-con">
      <div
        class="single-blog"
        :style="{'background':newPost.background}"
        style="background-size: contain,background-position: center"
      >
        <div class="details">
          <h1>{{newPost.title}}</h1>
          <button>Category</button>
          <span>24th of June</span>
          <br />
          <ul>
            <li>
              <a href>
                <i class="facebook icon"></i>
              </a>
            </li>
            <li>
              <a href>
                <i class="twitter icon"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="body">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div v-html="newPost.description"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <br />

    <div class="heading">
      <h1>Other Related Post</h1>
    </div>
    <div class="blog">
      <div class="container">
        <div class="row">
          <div class="col-md-4" style="margin-top: 20px !important;">
            <div class="items ui raised segment">
              <div class="img">
                <img src="/images/slider/big_img1.jpg" width="100%" alt />
              </div>

              <div class="details">
                <button>Categry</button>
                <h4>
                  <strong>This is the title</strong>
                </h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, minima?</p>
                <span>23 of Aug</span>
                <span class="shared">
                  <i class="icon share square outline"></i> 9
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-4" style="margin-top: 20px !important;">
            <div class="items ui raised segment">
              <div class="img">
                <img src="/images/slider/big_img2.jpg" width="100%" alt />
              </div>

              <div class="details">
                <button>Categry</button>
                <h4>
                  <strong>This is the title</strong>
                </h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, minima?</p>
                <span>23 of Aug</span>
                <span class="shared">
                  <i class="icon share square outline"></i> 9
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-4" style="margin-top: 20px !important;">
            <div class="items ui raised segment">
              <div class="img">
                <img src="/images/slider/big_img3.jpg" width="100%" alt />
              </div>

              <div class="details">
                <button>Categry</button>
                <h4>
                  <strong>This is the title</strong>
                </h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, minima?</p>
                <span>23 of Aug</span>
                <span class="shared">
                  <i class="icon share square outline"></i> 9
                </span>
              </div>
            </div>
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
      newPost:{
        id:"",
        title:"",
        description:"",
        background: ""
      }
    };
  },
  methods: {},
  mounted() {
   window.scrollTo(0,0)
  },

  created() {
     this.$store.dispatch("getById",this.$route.params.slug).then((res)=>{
                this.newPost.id=res[0].id
                this.newPost.title=res[0].title
                this.newPost.description=res[0].description
                // this.filename=res[0].display
                this.newPost.background=`linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0)),url(/storage/uploads/images/${res[0].display}) no-repeat` 
                
            }) 
  },
  computed: {}
};
</script>


<style lang="scss">
.single-con {
  & .body {
    padding: 10px;

    & p{
      line-height: 25px;
      color:#888;
      font-size: 15px;
    }
  }
}

.single-blog {
  height: 400px;
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
  background-position: center;
  text-align: center;

  & .details {
    padding-top: 90px !important;

    & button {
      border: none;
      padding: 8px 25px;
      background: rgba(86, 79, 204, 0.9);
      color: white;
      font-weight: 600;
    }
    & ul {
      padding: 10px;
      display: inline-flex;
      justify-content: space-around;
      width: 100px;
      font-size: 24px;
    }
    & {
      color: rgba(250, 250, 250, 0.7);
      padding: 10px;
    }
  }

  & h1 {
    color: white;
    font-weight: 800;
    font-size: 30px;
  }
}
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
        color: #999;
      }

      & span.shared {
        color: #555;
        font-weight: bold;
        padding-left: 3px;
        font-size: 14px;
      }
    }
  }
}
</style>