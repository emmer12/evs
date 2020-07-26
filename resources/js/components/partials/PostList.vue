<template>
    <div class="post-container">

            <div class="action-con">
                <div class="pull-left" style="float: left;" v-show="selected.length>0">
                    <div class="ui button">{{selected.length}} Selected </div>
                </div>
                <div class="right">

                    <router-link :to="{name:'add'}">
                       <button class="circular ui icon button medium green">
                          <i class="icon plus"></i>
                        </button>
                    </router-link>
                     <button class="circular ui icon button medium">
                        <i class="icon settings"></i>
                    </button>
                   <button class="circular ui icon button medium red" @click="deletePost([selected])">
                        <i class="icon trash"></i>
                    </button>

                </div>
            </div>
        <div class="table-responsive">

        <table class="table table-striped table-inverse table-bordered table-hover">
            <thead class="thead-inverse">
                <tr>
                    <th style="width: 1px;" class="text-center"><input type="checkbox" v-model="selectAll" @click="select"></th>
                    <th>Display Image</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                    <tr class="post-list" v-for="post in posts" :key="post.id">
                        <td scope="row"><input type="checkbox" name="selected[]" :value="post.id" v-model="selected"></td>
                        <td>
                            <img :src="`/storage/uploads/images/${post.display}`" alt="">
                        </td>
                        <td>{{post.title}}</td>
                        <td>
                             <router-link :to="{name:'edit' , params:{id:post.id}}">
                                <button class="ui button blue"><i class="edit icon"></i></button>
                             </router-link>
                        </td>
                    </tr>
                </tbody>
        </table>
                <div class="ui floating message text-center" v-show="noData && !loading">
                    <h4>No posts yet! add the first post</h4>
                    <router-link :to="{name:'add'}">
                    <i class="icon arrow right animate"></i> 
                    <button class="circular ui icon button huge green">
                        <i class="icon plus"></i>
                        </button>
                    </router-link>
                </div>
          <div>
            <div v-for="i in 5" :key="i" class="loading" v-show="loading">
                <div class="load-con"></div>
                <div class="load-con"></div>
                <div class="load-con"></div>
                <div class="load-con"></div>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
import { ValidationProvider } from 'vee-validate';
export default {
        components:{
            ValidationProvider
        },
          props:{

        },
        data() {
            return {
                serverErrors:null,
                selected:[],
                selectAll:false,
                noData:false                                        
            }
        },
        methods: {
            addPost:function(){
                this.$emit("addPost");
            },

            deletePost:function(index){
                if (this.selected.length<1) {
                   this. $swal("No item selected")
                   return
                }
                this.$swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                        if (result.value) {
                            this.$store.dispatch('deletePost',this.selected).then(r=>{
                                this.$swal(
                                    'Deleted!',
                                    'Your post(s) has been deleted.',
                                    'success'
                                    )

                                   this.selected=[];
                            })
                            
                        }
                    })
            },
            select:function(){
                this.selected=[];
                if (!this.selectAll) {
                    for (let i in this.posts) {
                        this.selected.push(this.posts[i].id);
                        
                    }
                }
            }                            
        },
        created() {
            this.$store.dispatch('getPost').then(res=>{
                if (res.data.length<1) {
                    console.log(res);
                    
                    this.noData=true
                }
            });

        },
        computed: {                                                                                                                                                                                                                                                                             
            posts(){
                return this.$store.getters.posts
            },
             loading(){
                return this.$store.getters.loading
            }
        },
}
</script>

<style lang="scss">
   .post-container{
       width: 50%;
       padding: 10px;
       margin: 0px auto;
       & .action-con{
           height: 70px;
           line-height: 70px;
           text-align: right;
           box-shadow: 2px 2px 3px #ccc;
            margin: 5px;
            padding: 0px 10px;
       }
   }
   
   table{
       & thead{
           background: #3f3d56;
           color: white
       }

       & .post-list img{
           width: 55px;
           height: 55px;
           border:1px solid #ccc
       }
   }
   

   @keyframes loading{
        100%{
           transform: translateX(100%)
       }
   }
   @media (max-width: 640px) {
       .post-container{
            width: 100%;
       }
   }


               
</style>                            
    
       
<style lang="scss">
   i.animate{
       animation:sidePoint 1s infinite;
        font-size: 27px;
        margin-left: -20px;
        margin-top: -1px;
   }

   @-webkit-keyframes sidePoint {
    0%,
    100%,
    20%,
    50%,
    80% {
        -webkit-transform: translateX(0)
    }
    40% {
        -webkit-transform: translateX(4px)
    }
    60% {
        -webkit-transform: translateX(6px)
    }
}

@keyframes sidePoint {
    0%,
    100%,
    20%,
    50%,
    80% {
        transform: translateX(0)
    }
    40% {
        transform: translateX(4px)
    }
    60% {
        transform: translateX(6px)
    }
}

  .loading{
       width: 100%;
    //    display: flex;
       & .load-con{
           overflow: hidden;
          background: #ddd;
           position: relative;
           height: 50px;
           width: 150px;
           margin:10px;
           &::after{
               content: "";
               position: absolute;
               background: #ccc;
               height: 100%;
               width: 100%;
               top:0px;
               left: 0px;
               animation:loading 0.7s infinite ;

           }
       } 
   }
</style>