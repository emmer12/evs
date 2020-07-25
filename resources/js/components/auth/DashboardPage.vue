<template>
    <div>
        <!-- <div v-if="addNew">
          <new-post @backList="backList"></new-post> 
       </div>        -->
      <div v-if="postList">
        <post-list @addPost="addPost"></post-list>
      </div>
    </div>
</template>
<script>
   import NewPost from "../partials/NewPost"
   import PostList from "../partials/PostList"
   export default {
        components:{
          NewPost,
          PostList
        },
        data(){ 
            return {
              editting:false,
              addNew:false,
              postList:true
            } 
        },    
        methods:{
          addPost:function(){
            this.addNew=true
            this.postList=false
          },
           backList:function(){
            this.addNew=false
            this.postList=true
          }
        },
        mounted() {

        },
    }
</script>
<style src="cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css"></style>
<style lang="scss" scoped>
  @import url("/css/plugin/semantic/input.css");
  

</style>