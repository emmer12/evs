<template>
   <div class="testimony-con">
       <div class="container">
            <div class="heading">
              <h1 class="wow bounceInLeft">Testimonial</h1>
           </div>
        <div class="testmony">
            <slick ref="slick" :options="slickOptions" class="slides">
                <div class="test-m">
                    <img src="/images/people/1.jpg" alt="">
                    <h4>Mrs rose</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt et aspernatur blanditiis sunt dolores fuga, temporibus sit amet  </p>
                </div>


                <div class="test-m">
                    <img src="/images/people/2.jpg" alt="">
                    <h4>Mrs rose</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt et aspernatur blanditiis sunt dolores fuga, temporibus sit amet  </p>
                </div>


                <div class="test-m">
                    <img src="/images/people/3.jpg" alt="">
                    <h4>Mrs rose</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt et aspernatur blanditiis sunt dolores fuga, temporibus sit amet  </p>
                </div>

                <div class="test-m">
                    <img src="/images/people/4.jpg" alt="">
                    <h4>Mrs rose</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt et aspernatur blanditiis sunt dolores fuga, temporibus sit amet  </p>
                </div>
            </slick>  
        </div> 
       </div>
   </div>
</template>




<script>


import Slick from 'vue-slick';
export default {
    components:{
        Slick,
    },
     data(){ 
        return {
            slickOptions: {
                slidesToShow: 2,
                dots: true,
                infinite: true,
                autoplay:true,
                responsive: [
                        {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                        },
                        {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                        },
                        {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                        }
                    ]
            // Any other options that can be got from plugin documentation
        },
        } 
    }, 
}
</script>

<style lang="scss" scoped>
 $color: #8783ce;
 $secondary:rgb(86, 79, 204);
@import '/slick-carousel/slick/slick.css'; 
 .testimony-con{
   background: rgba(245, 245, 245, 0.993);
   padding:10px;

   & .test-m{
       text-align: center;
       width: 100%;
       & h4{
           color:#888;
           font-weight: 700;

       }
       & img{
               width: 100px;
                height: 100px;
                border-radius: 50%;
                border-right: 2px solid $secondary;
                border-left: 2px solid $secondary;
                position: relative;
                left: 50%;
                transform: translateX(-50%);

       }
   }
}
.slick-prev:before, .slick-next:before{
    color:$secondary;
}
    
</style>