<template>
    <div >
          <div class="pofollio">
           <div class="container">
            <div class="heading">
               <h1>Portfollio</h1>
            </div>
             </div><br>

            <div style="width:100%;overflow-x:auto">
              <div class="ui menu">
              <div class="item">
                <div class="ui button" ref="all" @click="filter('all','all')">All</div>
              </div>
              <div class="item">
                <div class="ui button" @click="filter('filterByText','Wedding')" >Wedding</div>
              </div>
              <div class="item"  @click="filter('filterByText','Graduation')">
                <div class="ui button">Graduation</div>
              </div>
              <div class="item"  @click="filter('filterByText','Musical')">
                <div class="ui button">musical</div>
              </div>
              <div class="item"  @click="filter('filterByText','Video')">
                <div class="ui button">Videos</div>
              </div>
              
               </div>
            </div>
          </div>

         

            <div class="gri">
                <isotope ref='cpt' :options='option' :list="urls"   v-images-loaded:on.progress="layout" class="wow fadeIn" @filter="filterOption=arguments[0]" :item-selector="'element-item'" id="root_isotope">
                    <div data-toggle="modal" :data-target="'#modelId'+element.id"  v-for="element in urls" :key="element.id" class="grid-items" style="padding:10px;box-shadow: 2px 3px 4px #ccc;margin: 5px;">
                        <div class="grid-sizer"></div> 
                        <!-- <LightBox :media="[{src:element.img}]"></LightBox> -->
                        <img  data-toggle="modal" :data-target="'#modelId'+element.id" v-if="element.category!='Video'" :src="element.img" alt="" width="100%">
                        <video   v-if="element.category=='Video'" :src="element.img" width="100%" ></video>
                        <div class="modal fade" :id="'modelId'+element.id" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">{{element.category}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">

                               <img  v-if="element.category!='Video'" :src="element.img" alt="" width="100%">
                               <video v-if="element.category=='Video'" :src="element.img" width="100%" controls></video>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </isotope>
           </div>                                             

       </div>
</template>


<script>
import isotope from 'vueisotope';
import layout from 'isotope-layout';
import imagesLoaded from 'vue-images-loaded'
import LightBox from 'vue-image-lightbox'
import 'vue-image-lightbox/dist/vue-image-lightbox.min.css';
var count=0;
export default {
  components:{
    isotope,
    LightBox
        },
  directives: {
    imagesLoaded,
        },
        data() {
          var his=this;
            return {
             filterText:"all",
             filterOption:'all',
             layouts:[
               'masonry',
               'fitRows',
               'cellsByRow',
               'vertical',
               'mansoryHorizontal',
               'packery',
               'fitColumn',
               'cellsByColumn',
               'horiz',
             ],
             urls:[
                {
                  id:1,
                  img:'/images/works/w1.jpg',
                  category:"Wedding"
                },
                 {
                  id:2,
                  img:'/images/works/w2.jpg',
                  category:"Wedding"
                },
                 {
                  id:3,
                  img:'/images/works/w3.jpg',
                  category:"Wedding"
                 },
                 {
                   id:5,
                  img:'/images/works/w5.jpg',
                  category:"Graduation"
                },
                 {
                   id:6,
                  img:'/images/works/w6.jpg',
                  category:"Graduation"
                },
                 {
                  id:4,
                  img:'/images/works/w4.jpg',
                  category:"Wedding"
                },
                 {
                   id:7,
                  img:'/images/works/w7.jpg',
                  category:"Graduation"
                },
                 {
                   id:8,
                  img:'/images/works/w8.jpg',
                  category:"Musical"
                },
                 {
                  id:9,
                  img:'/images/works/w9.jpg',
                  category:"Musical"
                },
                 {
                  id:10,
                  img:'/videos/demo3.mp4',
                  category:"Video"
                },
                                                                                                                                                                                                                                                                                                                                                              
             ],                                                                 
              option: {
                getFilterData: {
                    'all':function(){
                      return true;
                    },
                    filterByText: function(itemElem) {
                    if(itemElem=="all") {return false}
                    return itemElem.category.toLowerCase().includes(his.filterText.toLowerCase());
                    
                    },  
                  itemSelector: '.grid-item',
                  percentPosition:true,
                  mansory:{
                    columnWidth:'.grid-sizer'
                  }
                },
           }
         }
        },
        methods: { 
          filter:function(key,value){
            this.filterText=value;
            console.log(key);
            
            this.$refs.cpt.filter(key)
             },
          layout:function(){
            this.$refs.cpt.layout('masonry');
        }     
        },
        mounted() {
          var his=this;
         setTimeout(() => {
            // this.$refs.all.click()
         },10000);
          
        },
}
</script>

<style lang="scss" scoped>
 .pofollio{
   width:100%;
    & .grid{
        display:grid;
        grid-template-columns: repeat(6,2fr);
        grid-auto-rows: 200px;
        grid-gap: 5px;
        grid-auto-flow: dense;

        & .element-item{
             box-shadow: 2px 3px 4px #ddd; 
             padding:3px;
             position: relative;
         }
    }
}
.isoDefault{
  position:relative;
  //min-height: 210px;
}
.grid-items,.grid-sizer{
  width:20%;
}
@media screen and (max-width: 640px){

  .grid-items,.grid-size{
    width: 30%;

    & img{
      width:100%;
    }
}
}
</style>