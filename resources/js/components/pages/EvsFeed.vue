<template>
  <div>
    
    <div class="row">
      <div class="col-md-4" v-for="i in 3" :key="i" v-show="loading">
            <div class="load-con">
            <div class="img-area loads">
              
            </div>
            <div class="leftDetails loads">
            </div>
          </div>
        </div>
    </div>

    <div class="evs-feed" v-if="feeds && feeds.length" style="margin-top:10px">
      
      <div class="ui three stackable cards">
        <div class="card" v-for="(feed, index) in feeds" :key="index">
          <div class="action">
               <button class="circular ui icon button medium red" @click="deletePost([feed.id])">
                <i class="icon trash"></i>
              </button>
               <button class="circular ui icon button medium blue">
                <i class="icon edit"></i>
              </button>
          </div>
          <div class="">
            <img :src="feed.thumb" width="100%" height="200px" /> 
            <h5 class="title">{{ feed.title}}</h5>
          </div>
        </div>
      </div>
      

    </div>
    <div v-else>
      <div class="ui floating text-center empty" v-show="!loading">
        <h4>No posts yet! add the first post</h4>
        <router-link :to="{name:'add'}">
          <i class="icon arrow right animate"></i>
          <button class="circular ui icon button huge green">
            <i class="icon plus"></i>
          </button>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      selected: [],
      loading: false
    };
  },
  methods: {
      deletePost:function(id){
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
                            this.$store.dispatch('deletePost',id).then(r=>{
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
  },
  mounted () {
    this.loading=true
    this.$store.dispatch('getEvsFeed').then(()=>{
      this.loading=false
    });
  },
  computed: {
    feeds(){
      return this.$store.getters.evsFeeds
    }
  }
};
</script>

<style lang="scss" scoped>
.empty {
  height: 400px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;

  & h4 {
    color: rgba(0, 0, 0, 0.2);
    font-size: 20px;
  }
}

.evs-feed{
    & .action{
        position:absolute;
        padding:5px
    }
    & .title{
      position:absolute;
      bottom:5px;
      color:rgba(250,255,255,0.7);
      background:#3d3df6;
      padding:5px 10px;
      border-top-right-radius:10px;
      border-bottom-right-radius:10px;
    }
}
</style>