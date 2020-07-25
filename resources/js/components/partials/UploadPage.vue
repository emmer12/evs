<template>
    <div class="post-container">
             <div class="action-con">
                <div class="right">
                    <router-link :to="{name:'dashboard'}">
                       <button class="circular ui icon button small">
                          <i class="icon arrow left"></i>
                        </button>
                    </router-link>
                   
                
                </div>
            </div>


    
                <div class="card-body">
                    <form class="ui form" @submit.prevent="processPost" enctype="multipart/formd-data" :class="{loading:loading}">
                        <div v-if="serverErrors">
                            <div class="ui negative message" v-for="(error, index) in serverErrors" :key="index">
                            {{error[0]}}
                          </div>
                          </div>

                            <div id="two" class="tab-pane">
                                <div class="field custum-upload-manager" v-show="!src">
                                    
                                    <label for="display-pic">
                                        <div class="ui segment" style="width:200px"> 
                                            <div class="ui loader" :class="{active:pro}"></div>
                                            <img :src="filePath" width="150px" height="150px" alt=""> 
                                            </div>
                                        </label>
                                    <input type="file" name="display" id="display-pic" style="display:none" v-on:change="processForm" >
                                   <div class="progress" v-show="pro">
                                       <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar"
                                           :style="{'width':progress+'%'}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{progress+'%'}}</div>
                                   </div>
                                </div>
                                <div class="showImg" v-show="src">
                                    <img :src="src" width="100px" height="100px">
                                    <div class="details">
                                        {{filename}}
                                    </div>
                                    <div class="ui button inverted red remove" @click="RemoveFile" >Remove</div>
                                </div>
                            </div>

                            <div class="field">
                                <label for="topic">Topic</label>
                                <input type="text" name="topic" id="topic" placeholder="topic">
                            </div>

                               <button class="circular ui icon button small green" @click="processPost">
                                    <i class="icon save"></i> Save
                                </button>

                        </form>
                    
                </div>
            </div>
</template>

<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
import { ValidationProvider } from 'vee-validate';
import ClassicEditor from "@ckeditor/ckeditor5-build-classic" 
export default {
        components:{
            ValidationProvider
        },
        data() {
            return {
                editor:ClassicEditor,
                editorConfig:{},
                newPost:{
                    title:"",
                    description:"",  
                    fileUp:""
                },  
                loading:false,
                serverErrors:null,
                src:"",
                filename:"",
                pro:false,
                filePath:'/images/upload.jpg'
            }
        },
        methods: {
           fileOpen:function () { 
               window.open(`/laravel-filemanager"?token=${localStorage.getItem('token')}`,'width=900,height=600');
               var self=this;
               window.opener.SetUrl=function(items){
                   self.image=items[0].url
               }
               return false;
            },
           processPost:function(){
               this.$Progress.start();
               this.loading=true;
               this.$store.dispatch('postData',this.newPost).then((response)=>{
                   this.loading=false;
                   this.$Progress.finish();
                   this.newPost.title="" 
                   this.newPost.description=""
                   this.newPost.fileUp="";
                   this.$toast.success({
                        title:"Post Created",
                        message:"post successfully created "
                    });
                    this.$router.push({name:'dashboard'})
               }).catch(err=>{
                   this.loading=false;
                   this.$Progress.fail()
                    this.serverErrors=Object.values(err.response.data.errors);
                    this.serverError=err.response.data.error;
                    this.$toast.error({
                        title:"Server Error",
                        message:"please make sure that each field are filled correctly"
                    });
               })
               
           },
           processForm:function(e){
               let target_e=e.target.files[0];
               this.newPost.fileUp=target_e; 
               this.pro=true;
               this.$store.dispatch('uploadFile',target_e).then(res=>{
                   console.log(res.data);
                   
                   this.filePath='/storage/uploads/images/'+res.data.filename
                   this.pro=false;
               })
                // var current=this;
                //var reader = new FileReader();
                // reader.onload = function(e) {
                //     current.src=e.target.result;
                //     current.filename=target_e.name;
                // };
                // reader.readAsDataURL(target_e);


                          
           },
           RemoveFile:function(){
               this.src="";
               this.filename=""
               this.newPost.fileUp=""
           },
           backList:function(){
               this.$emit('backList');
           }
            
        },
        computed: {
            progress(){
                return this.$store.getters.uploadProgress
            }
        },
}
</script>

<style lang="scss">
    .progress-inner{
        background: green;
        height: 100%;
        transition: 0.3s ease;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px

    }
    .showImg{
       width: 100%;
        height: 120px;
        background: #f9f9f9;
        position: relative;
        padding: 10px;
        box-sizing: border-box;
        & img{
            float:left;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        & .details{
            color: #c3c6d8;
            font-weight: 700;
            width: 70%;
            background: transparent;
            float: left;
            line-height: 26px;
            margin-top: 74px;
            margin-left: 10px
        }

        & .remove{
            position: absolute;
            right: 5%;
            top:3%;
        }
    }
</style>