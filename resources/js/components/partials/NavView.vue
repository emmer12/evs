<template>
  <div class style="background:white">
    <div class="bottom-nav-con" :class="{added:scrollPosition > 30}">
      <div class="container">
        <div class="bottom-nav">
          <div class="logo">
            <router-link tag="div" to="/">
              <h1>EVS</h1>
            </router-link>
          </div>
          <div>
            <ul>
              <li>
                <router-link :class="{'active':$route.name==='home'}" to="/">Home</router-link>
              </li>
              <li>
                <router-link :class="{'active':$route.params.category==='Music'}" :to="{name:'category',params:{category:'Music'}}">Music Video<i class="fas fa-file-video    "></i></router-link>
              </li>
              <li>
                <router-link :class="{'active':$route.params.category==='Wedding'}" :to="{name:'category',params:{category:'Wedding'}}">Wedding</router-link>
              </li>
              <li>
                <router-link :class="{'active':$route.params.category==='Film'}" :to="{name:'category',params:{category:'Film'}}">Film</router-link>
              </li>
                  <li>
                <router-link :class="{'active':$route.params.category==='Commercial'}" :to="{name:'category',params:{category:'Commercial'}}">Commercial/Extra</router-link>
              </li>
                 <li>
                <router-link :class="{'active':$route.name==='contact'}" :to="{name:'contact'}">Contact</router-link>
              </li>
            
              <li v-if="loggedIn" @click="dropmenuChange">
                 <i class="user circle outline icon" style="color:grey;font-size:20px"></i> <i style="color:grey" class="angle down icon"></i>
              </li>
            </ul>
          </div>
        </div>

        <!-- <div class="logged-avata-mobile" v-if="loggedIn" @click="dropmenuChange">
          <img class="logged-avata" src="/images/user.png" width="50px" height="50px" alt="img" />
          <i class="angle down icon"></i>
        </div> -->
        <div class="dropdown" :class="{added:dropmenu}">
          <ul>
            <li>
              <router-link to="/dashboard">
                <i class="settings icon"></i> Dashboard
              </router-link>
            </li>
            <li>
              <router-link to="/logout">
                <i class="sign out alternate icon"></i> Logout
              </router-link>
            </li>

            
          </ul>
        </div>
        <div class="bar" :class="{added:sidebar}" @click="openSidebar">
          <span></span>
          <span></span>
        </div>
        <div class="sidebar" :class="{added:sidebar}">
          <!-- <div class="s-header"></div> -->
          <ul class="ul">
             <li>
                <router-link :class="{'active':$route.name==='home'}" to="/">Home</router-link>
              </li>
              <li>
                <router-link :class="{'active':$route.params.category==='service'}" :to="{name:'category',params:{category:'Music'}}">Music Video<i class="fas fa-file-video    "></i></router-link>
              </li>
              <li>
                <router-link :class="{'active':$route.params.category==='Wedding'}" :to="{name:'category',params:{category:'Wedding'}}">Wedding</router-link>
              </li>
              <li>
                <router-link :class="{'active':$route.params.category==='Film'}" :to="{name:'category',params:{category:'Film'}}">Film</router-link>
              </li>
                  <li>
                <router-link :class="{'active':$route.params.categor==='Commercial'}" :to="{name:'category',params:{category:'Commercial'}}">Commercial/Extra</router-link>
              </li>
              <li>
                <router-link :class="{'active':$route.name==='contact'}" :to="{name:'contact'}">Contact</router-link>
              </li>
            <li  v-if="loggedIn">
              <router-link to="/dashboard">
                <i class="user circle outline icon"></i> Dashboard
              </router-link>
            </li>
            <li  v-if="loggedIn">
              <router-link to="/logout">
                <i class="sign out alternate icon"></i> Logout
              </router-link>
            </li>
            
          </ul>
          <div class="s-footer-con">
              <div class="s-footer">
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
              <li>
                <a href>
                  <i class="youtube icon"></i>
                </a>
              </li>
              <li>
                <a href>
                  <i class="instagram icon"></i>
                </a>
              </li>
            </ul>
          </div>
          </div>
        </div>
      </div>
    </div>

    <!--          
         <div class="spacer">

    </div>-->
  </div>
</template>
<script>
export default {
  data() {
    return {
      scrollPosition: null,
      sidebar: false,
      dropmenu: false
    };
  },
  methods: {
    handleScroll: function(e) {
      this.scrollPosition = window.scrollY;
    },
    openSidebar: function() {
      this.sidebar = !this.sidebar;
    },
    dropmenuChange: function() {
      console.log("clo=ickeddn");

      this.dropmenu = !this.dropmenu;
    }
  },
  computed: {
    loggedIn() {
      return this.$store.getters.loggedIn;
    }
  },
  created: function() {
    window.addEventListener("scroll", this.handleScroll);
  },
  destroyed: function() {},
  watch: {
    $route(to, from) {
      this.sidebar = false;
      this.dropmenu = false;
    }
  },
  mounted() {}
};
</script>
<style src="cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css"></style>
<style lang="scss">
li {
  list-style: none;
}
a {
  text-decoration: none;
}
a:hover {
  text-decoration: none;
}
i.facebook {
  color: #3b5998;
}
i.twitter {
  color: #08a0e9;
}
i.youtube {
  color: #c4302b;
}
i.instagram {
  color: #d02a7b;
}
</style>
<style lang="scss" scoped>
.logo{

            & h1{
                // color:#333;
                line-height:120px;
                font-size:35px
            }
        }
      
     .spacer{
         height: 1000px;
         background: #ccc
     } 
    .top-nav{
        display: grid;
        grid-template-columns: repeat(2,3fr);
        background: #222;
        height: 30px;

    }
    .top-nav ul li.space{
        width:100%;
        background: red;
    }
    .top-nav ul li{
        list-style:none;
        display:inline-block;
        line-height: 30px;

        & a{
            color:rgba(224,224, 224,0.7);
            padding: 0px 10px;
        }
    }
    .top-nav div:nth-child(2){
        text-align: right;
        margin-right: 20px

    }
    .bottom-nav-con{
        // box-shadow:1px 2px 3px #9cabc3; 
        // box-shadow: 0px 0px 25px -10px;
        transition: 0.3s ease;
          &.added{
            position: fixed;
            top:0px;
            z-index:999;
            left:0px;
            width: 100%;
            animation:fadeInDown 0.3s;
            background: rgba(0,0,0,0.8)
        }
        

    }
         
    .bottom-nav{
        display: grid;
        grid-template-columns:30% 70%;
        // background: #ccc;
        height: 80px;

    
     
    }
    .bottom-nav ul li{
        display: inline-block;
        list-style: none;
        line-height:120px;
        
        & a{
            position: relative;
            color: #888;
            font-weight: 700;
            text-transform: uppercase;
            padding: 10px 15px;
            &:hover{
                text-decoration: none;
                color:  rgb(16, 32, 102);
            }
            &::after{
                content: "";
                transition: 0.3s ease;
                position: absolute;
                height: 4px;
                width: 0px;
                background: #91959b;
                bottom: 0px;
                // box-shadow: 8px 0px #222, 39px 0px #222;
                text-align: center;
                left: 16px;
            }

            &.active{
                color:#4283c4;
             &::after{
                content: "";
                transition: 0.3s ease;
                position: absolute;
                height: 4px;
                width: 4px;
                background: #91959b;
                bottom: 0px;
                box-shadow: 8px 0px rgb(49, 51, 175), 39px 0px rgb(38, 43, 100);
                text-align: center;
                left: 15px;
            }
        }

            
        }
    }
     .bottom-nav ul li a:hover:after{
        box-shadow: 8px 0px rgb(147, 140, 212), 39px 0px rgb(16, 32, 102);
        width:6px;
     }

    .bottom-nav div:nth-child(1){
        line-height: 70px;
    }
    .sidebar{
        position: absolute;
        left: 0px;
        top: 80px;
        background: #ffff;
        width: 0vw;
        overflow: hidden;
        transition: 0.3s ease-in-out;
        height:100vh;
        z-index: 999;
        & .ul{
            margin: 0px;
            padding: 0px;
            display: flex;
            flex-direction:column
        }
        & .ul li:last-child{
            flex-grow:1;
            
        }
        & .ul li{
            list-style: none;
            transform: translateX(-200px);            
            & a{
                display: block;
                padding: 10px;
                margin: 1px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-weight: 700;
                color: #3b5998;
                background: #f6f9f9;
                &:hover{
                    background: hsl(240, 71%, 8%);
                    color: rgb(174, 188, 226);
                    text-decoration: none;
                }
            }
        }

        &.added{
          & .ul li{
            transform: translateX(0px);
             &:nth-child(1){
               transition:0.3s 0.2s
             }
              &:nth-child(2){
               transition:0.3s 0.4s
             }
              &:nth-child(3){
               transition:0.3s 0.6s
             }
               &:nth-child(4){
               transition:0.3s 0.8s
             }
               &:nth-child(5){
               transition:0.3s 1s
             }
              &:nth-child(6){
               transition:0.3s 1.2s
             }
          }
          
            width: 70vw;
          }
       
    }
    .s-footer-con{
        position:relative;
        background: #f6f7f9;
        height:200px;
        & .s-footer{
        height: 50px;
        width: 100%;
        bottom: 0px;
        position: absolute;
        background: #fff;
        line-height: 50px;

        & ul{
            display: flex;
            justify-content: space-around;
            padding: 0px;
            & li a{
                font-size: 25px;

            }
        }
    }
    }
    .s-header{
        height: 120px;
        width: 100%;
        background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url("/images/slider/sidebar2.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
  
    .bar{
            position: absolute;
            right: 20px;
            top: 21px;
            display: none;
            
          &.added{
             & span:nth-child(1){
            width: 30px;
            transform: rotate(140deg) translateX(7px);
            top: 4px;
           }
            & span:nth-child(2){
            transform: rotate(45deg) translateY(-5px);
        }
        }
        & span{
            height: 8px;
            width: 30px;
            background: #3d3df6;
            display: block;
            margin-top: 4px;
            border-radius: 10px;
            transition: 0.25s ease;

        }

        & span:nth-child(1){
           width: 20px;
            position: relative;
            right: -10px;
            transition: 0.5s ease;
        }
    }
    .logged-avata{
        border-radius: 50%;
        border:2px solid #fff;
        box-shadow: 2px 3px 3px #ddd;
        cursor: pointer;
    }
    .logged-avata-mobile{
        display: none
    }


    .dropdown{
        // padding: 10px;
        background: #fff;
        width: 200px;
        position: absolute;
        right: 10px;
        display: none;
        border-radius: 5px;
        box-shadow: 2px 2px 3px #ddd;
        z-index: 999;
        & ul{
            margin: 0px;
            padding: 0px;
           & li a{
               padding: 10px 10px;
                border-bottom: 1px solid #ccc;
                display: block;
            }
            display: block;
        }
        &.added{
            display: block;
            animation: fadeInRight 0.3s;
        }
    }
    
    

    @media (max-width: 640px) {
        .logo{
            text-align: center;
            // width:100%;
            position: relative;
            padding:0px;
            // margin:0px;
            left:50%;
            transform: translateX(50%);
            & div{
              text-align:center
            }
            & h1{
              color:#3b5998;
                // color:#333;
                line-height:100px;
                font-size:35px;
                
            }
        }
          .bottom-nav div:nth-child(2){
                display: none
         }  
          .top-nav{
                display: none
         }  
         .bar{
             display:block;
             animation: fadeInRight 0.3s;
             margin-top:15px;
         }
         .logged-avata-mobile{
            display: block;
            position: absolute;
            float: right;
            top: 9px;
            right: 60px; 
    }        
    }


    @media screen and (max-width: 320px) {
    }

</style>