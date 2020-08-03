<template>
    <div>

        <!-- nav area -->
       
         <nav-view></nav-view>

        <!-- Body  -->
         <!-- <router-link :to="{name:'about'}" class="btn btn-default btn-flat">About</router-link> -->
              <transition name="fade" enter-active-class="animated fadeIn"  leave-active-class="animated fadeOut" mode="out-in">
                  <router-view></router-view>
              </transition>


              <vue-progress-bar></vue-progress-bar>
        <!-- Footer -->

              <div class="scroll-top" v-if="showSt" ref="scroll-top" @click="scrollTop">
                  <i class="icon angle double up"></i>
              </div>
        <!-- <footer-view v-if="!['home','feeds','feeds.category'].includes($route.name)"></footer-view> -->

<!-- $route.name!=='home' && $route.name!=='feeds' -->
    </div>


</template>

<script>
 import NavView from "./partials/NavView.vue";
 import FooterView from "./partials/FooterView.vue";
    export default {
        components:{
            NavView,
            FooterView
        },
        data(){
            return {
                users:[],
                show:true,
                showSt:false,
                lastSp:0,
            }
        },
        mounted() {
            this.$Progress.finish()
            console.log('Component mounted dd.');
        },
        methods: {
            scrollTop:function(e){                
              $('html,body').animate({scrollTop:0},'600','swing');
            },
            handleScroll:function(e){
               const cScrollPos=window.pageXOffset || document.documentElement.scrollTop

               if (cScrollPos < 0) return
               this.showSt=cScrollPos > 120
               this.lastSp=cScrollPos
            }
        },
        created(){
            this.$Progress.start();
            this.$router.beforeEach((to, from, next) => {
                this.$Progress.start();
                console.log('started',this.$Progress);
                
                next()
            })

            this.$router.afterEach( route => {
                //these hooks do not get a next function and cannot affect the navigation}
                this.$Progress.finish()
            })

             window.addEventListener('scroll',this.handleScroll)
           
        },
        beforeDestroy(){
            window.removeEventListener('scroll',this.handleScroll)
        }
        
    }
</script>

<style lang="scss" scoped>
   .scroll-top{
       height:50px;
       width:50px;
       right:10px;
       bottom: 60px;
       position: fixed;
       background:white;
       border-radius: 50%;
       box-shadow:2px 3px 4px #888;
       line-height: 50px;
       text-align: center;
       font-size: 16px;
       cursor:pointer;
       z-index: 999;
       
   }

   .leaveing{
       width:100%;
       height:20px;
       background:blue;
       position:fixed;
       top:200px;
       z-index: 999;

   }
</style>
