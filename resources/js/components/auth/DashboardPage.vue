<template>
  <div>
    <div class="dashboard container">
      <div class="sidebar" :class="{'added':menu}">
      <button class="dash-bar circular ui icon button small" @click="openMenu">
        <i class="icon th large"></i>
      </button>
        <ul>
          <li>
            <router-link class="active" tag="span" to="/">Feeds</router-link>
          </li>
          <li>
            <router-link tag="span" to="/">Category</router-link>
          </li>
          <li>
            <router-link tag="span" to="/">Settings</router-link>
          </li>
        </ul>
      </div>
      <div class="body">
        <div class="action-con">
          <router-link
            class="pull-left"
            style="float: left;"
            v-if="$route.name==='feeds.add'"
            :to="{name:'feeds'}"
          >
            <button class="circular ui icon button small">
              <i class="icon arrow left"></i>
            </button>
          </router-link>
          <div class="right">
            <button
              v-if="$route.name==='feeds.add'"
              class="circular ui icon button medium green"
              @click="processPost"
            >
              <i class="icon save"></i> Save
            </button>
            <router-link v-else :to="{name:'feeds.add'}">
              <button class="circular ui icon button medium green">
                <i class="icon plus"></i>
              </button>
            </router-link>
          </div>
        </div>

        <router-view></router-view>
        <!-- <div v-if="postList">
              <post-list @addPost="addPost"></post-list>
        </div>-->
      </div>
    </div>
    <!-- <div v-if="addNew">
          <new-post @backList="backList"></new-post> 
    </div>-->
    <!-- <div v-if="postList">
        <post-list @addPost="addPost"></post-list>
    </div>-->
  </div>
</template>
<script>
import NewPost from "../partials/NewPost";
import PostList from "../partials/PostList";
import { EventBus } from "../../event-bus";
export default {
  components: {
    NewPost,
    PostList
  },
  data() {
    return {
      editting: false,
      addNew: false,
      postList: true,
      menu:false
    };
  },
  methods: {
    addPost: function() {
      this.addNew = true;
      this.postList = false;
    },
    backList: function() {
      this.addNew = false;
      this.postList = true;
    },
    processPost() {
      EventBus.$emit("save-evs-feed");
    },
    openMenu(){
      this.menu=!this.menu
    }
  },
  mounted() {}
};
</script>
<style src="cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css"></style>
<style lang="scss" scoped>
@import url("/css/plugin/semantic/input.css");
.dashboard {
  padding:20px;
  background:#fff;
  // top: 20px;
  position: relative;
  & .sidebar {
  & .dash-bar{
   transition:0.3s;
    position:fixed;
    z-index: 999;
    left:20px;
    display:none
  }
   transition:0.3s;
    width: 230px;
    background: #fafafa;
    position: absolute;
    height: 70vh;
    & ul {
      display: flex;
      flex-direction: column;
      margin: 0px;
      padding: 0px;

      & li span {
        display: block;
        padding: 10px 20px;
        font-weight: 700;
        margin: 5px;
        color: #555;
        background: #f5f5f5;
        cursor: pointer;
        width: 90%;
        &.active {
          background: #3d3df6;
          border-top-right-radius: 20px;
          border-bottom-right-radius: 20px;
          width: 100%;
          color: white;
        }
      }
    }
  }
  & .body {
    margin-left: 230px;
    padding: 20px;
    & .action-con {
      height: 50px;
      line-height: 50px;
      text-align: right;
      box-shadow: 2px 2px 3px #ccc;
      margin: 5px;
      padding: 0px 10px;
    }
  }
}

@media (max-width: 640px) {
  .dashboard {
    & .sidebar {
      left: -240px;
      z-index: 999;
       & .dash-bar{
         display:block
         }
     &.added{
      left:0px;
      & .dash-bar{
        left:240px;
      }
     }
    }
    & .body {
      margin-left: 0px;
    }
  }
}
</style>