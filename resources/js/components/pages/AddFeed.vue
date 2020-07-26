<template>
  <div class="feed-container">
    
    <div class="ui elevate">
      <form
        class="ui form"
        @submit.prevent="processPost"
        enctype="multipart/formd-data"
        :class="{loading:loading}"
      >
        <div v-if="serverErrors">
          <div
            class="ui negative message"
            v-for="(error, index) in serverErrors"
            :key="index"
          >{{error[0]}}</div>
        </div>

        <validation-provider rules="required" v-slot="{ errors }">
          <div class="field" :class="{error:errors[0],success:errors[0]}">
            <label>Title</label>
            <input type="text" name="title" placeholder="Post title" v-model="newPost.title" />
            <span class="error" style="color:#9f3a38">{{errors[0]}}</span>
          </div>
        </validation-provider>
        <div class="field " style="margin-top:10px">
            <label>Category</label>
        <select class="ui fluid dropdown" v-model="newPost.category">
          <option  value=""> Select Category</option>
          <option v-for="category in categories" :key="category.id" :value="category.name">{{category.name}}</option>
        </select>
        </div>

           <div class="progress" v-show="proImg">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar"
                  :style="{'width':progress+'%'}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{progress+'%'}}</div>
          </div>
        <div class="field custum-upload-manager" v-show="!src">
          <label for="display-pic">
            <div class="ui btn">
              <img src="/images/icons/img-icon.jpeg" ref="img" width="150px" height="150px" alt />
            </div>
          </label>
          <input
            type="file"
            name="thumb"
            id="display-pic"
            style="display:none"
            v-on:change="processForm"
          />
        </div>

        
           <div class="progress" v-show="proVid">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar"
                  :style="{'width':progress+'%'}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{progress+'%'}}</div>
          </div>
        <div class="field custum-upload-manager" v-show="!src">
          <label for="video">
            <div class="ui btn">
              <img src="/images/icons/vid-icon.png" v-if="!newPost.vid" width="150px" height="150px" alt />
              <video src="" ref="vid" width="150px" height="150px" :class="{'hide':!newPost.vid}"></video>
            </div>
          </label>
          <input
            type="file"
            name="video"
            id="video"
            style="display:none"
            v-on:change="processForm"
          />
        </div>

        <div class="showImg" v-show="src">
          <img :src="src" width="100px" height="100px" />
          <div class="details">{{filename}}</div>
          <div class="ui button inverted red remove" @click="RemoveFile">Remove</div>
        </div>
      </form>
    </div>
  </div>
</template>

<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
import { ValidationProvider } from "vee-validate";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { EventBus } from '../../event-bus'

export default {
  components: {
    ValidationProvider
  },
  data() {
    return {
      editor: ClassicEditor,
      editorConfig: {},
      newPost: {
        title: "",
        category: "",
        img: "",
        vid:""
      },
      loading: false,
      serverErrors: null,
      src: "",
      filename: "",
      proImg:false,
      proVid:false
    };
  },
  methods: {
    fileOpen: function() {
      window.open(
        `/laravel-filemanager"?token=${localStorage.getItem("token")}`,
        "width=900,height=600"
      );
      var self = this;
      window.opener.SetUrl = function(items) {
        self.image = items[0].url;
      };
      return false;
    },
    processPost: function() {
      this.$Progress.start();
      this.loading = true;
      this.$store
        .dispatch("postData", this.newPost)
        .then(response => {
          this.loading = false;
          this.$Progress.finish();
          this.newPost.title = "";
          this.newPost.description = "";
          this.newPost.fileUp = "";
          this.$toast.success({
            title: "Post Created",
            message: "post successfully created "
          });
          this.$router.push({ name: "feeds" });
        })
        .catch(err => {
          this.loading = false;
          this.$Progress.fail();
          this.serverErrors = Object.values(err.response.data.errors);
          this.serverError = err.response.data.error;
          this.$toast.error({
            title: "Server Error",
            message: "please make sure that each field are filled correctly"
          });
        });
    },
    processForm: function(e) {
      if (e.target.name==='thumb') {
        this.proImg=true
      }else{
        this.proVid=true
      }
      let target_e = e.target.files[0];
      this.newPost.fileUp = target_e;
      var current = this;
      this.$store.dispatch('uploadFile',{file:target_e,field:e.target.name}).then((res)=>{
        if (e.target.name==='thumb') {
          this.newPost.img=res.data.filepath
          this.$refs.img.src=res.data.filepath
          this.proImg=false
       }else{
          this.proVid=false
           this.newPost.vid=res.data.filepath
          this.$refs.vid.src=res.data.filepath
       }
      })

    },
    RemoveFile: function() {
      this.src = "";
      this.filename = "";
      this.newPost.fileUp = "";
    },
    backList: function() {
      this.$emit("backList");
    }
  },
   created () {
    EventBus.$on('save-evs-feed',()=>{
      this.processPost()
    })
  },

  mounted() {
    this.$store.dispatch('getCategory')
  },

  computed: {
    progress(){
      return this.$store.getters.uploadProgress
    },
    categories(){
      return this.$store.getters.category;
    }
  },
};
</script>

<style lang="scss">
.feed-container{
    margin:0px 40px;
}
.custum-upload-manager{
  border:1px dashed gray
}
.showImg {
  width: 100%;
  height: 120px;
  background: #f9f9f9;
  position: relative;
  padding: 10px;
  box-sizing: border-box;

  & img {
    float: left;
    border: 1px solid #ddd;
    border-radius: 3px;
  }
  & .details {
    color: #c3c6d8;
    font-weight: 700;
    width: 70%;
    background: transparent;
    float: left;
    line-height: 26px;
    margin-top: 74px;
    margin-left: 10px;
  }

  & .remove {
    position: absolute;
    right: 5%;
    top: 3%;
  }
}
.hide{
    display:none
}


@media (max-width: 640px) {
  .feed-container{
    margin:0px 5px;
}
}
</style>