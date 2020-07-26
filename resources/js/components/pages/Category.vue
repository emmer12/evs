<template>
  <div class="container">
    <div class="list">
        <transition-group enter-active-class="animated slideInLeft" leave-active-class="animated slideOutRight">
            <div class="item" v-for="category in categories" :key="category.id">
            {{category.name}}
            <button class="ui icon button red circular " @click="deleteCat(category.id)">
            <i class="trash icon"></i>
            </button>
        </div>
        </transition-group>

      <br />
      <button class="button ui" @click="hide=!hide">
        Add
        <i class="plus icon"></i>
      </button>

      <div class="ui icon input" :class="{'hide':hide}">
        <input type="text" placeholder="Category" v-model="category" />
        <button class="ui button green small" style="margin-left:10px" @click="submit">Post</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      hide: true,
      loadingi:false,
      category:'',
      loading:false
    };
  },
  methods: {
      submit(){
          this.loadingi=true
          this.$store.dispatch('saveCategory',{'category':this.category}).then(()=>{
              this.$toast.success({
                        title: "Category Added",
                        message: "category successfully Added "
                    });
              this.category='';
              this.loadingi=false
          })
      },
      deleteCat(id){
          let confirmed=confirm("you are about to delete a category !")
          if (confirmed) {
             this.$store.dispatch('deleteCat',id).then(()=>{
                   this.$toast.success({
                        title: "Category Deleted",
                        message: "category successfully deleted "
                    });
             })
          }else{
              return
          }
      }
  },
  mounted () {
        this.loading=true
      this.$store.dispatch('getCategory').then(()=>{
          this.loading=false;
      })
  },
  computed: {
      categories(){
          return this.$store.getters.category
      }
  },
};
</script>

<style lang="scss" scoped>
.list {
    overflow: hidden;
  & .item {
    padding: 20px 10px;
    box-shadow: 0px 3px 5px #ddd;

    & button {
      float: right;
    }
  }
  & .input{
      opacity:1;
      transition: 0.3s;
  }
  & .hide{
       opacity:0;
      transform: translate(30px);
  }
}
</style>