 <template>
     
	   <div>
       <!-- Slider Area Start Here -->
			<div class="slider-area slider-direction-layout1 slider-layout1 overlay-slider">
					<div class="bend niceties preview-1">
							<div id="nivoslider" class="slides">
									<img src="/images/slider/big_img1.jpg" alt="slider" title="#slider-direction-1" width="100%" />
									<img src="/images/slider/big_img2.jpg" alt="slider" title="#slider-direction-2" width="100%" />
									<img src="/images/slider/big_img3.jpg" alt="slider" title="#slider-direction-3" width="100%" />
							</div>
							<div id="slider-direction-1" class="t-cn slider-direction">
									<div class="slider-content s-tb slide-1">
											<div class="title-container s-tb-c title-light">
													<div class="container text-center">
															<div class="title2 wow bounceInLeft" data-wow-duration="0.5s" data-wow-delay="0.8s">
																	<p>APPLY ONLINE FROM THE COMFORT OF YOU HOME</p>
															</div>
															<div class="title1 wow bounceInLeft" data-wow-duration="0.5s" data-wow-delay="1s">
																	<p>Building Plan Approval</p>
															</div>
															<div class="title3 wow bounceInLeft"  data-wow-duration="0.5s" data-wow-delay="1.5s">
																	<p>It just take few minutes to apply</p>
															</div><br>
															<div class="slider-btn-area wow zoomInUp" data-wow-duration="0.5s" data-wow-delay="2s">
																	<div class="ui button">APPLY NOW</div>
															</div>
													</div>
											</div>
									</div>
							</div>
							<div id="slider-direction-2" class="t-cn slider-direction">
									<div class="slider-content s-tb slide-1">
											<div class="title-container s-tb-c title-light">
													<div class="container text-center">
															<div class="title2 wow bounceInLeft" data-wow-duration="0.5s" data-wow-delay="0.8s">
																	<p>APPLY ONLINE FROM THE COMFORT OF YOU HOME</p>
															</div>
															<div class="title1 wow flipInY" data-wow-duration="0.5s" data-wow-delay="1s">
																	<p>Building Plan Approval</p>
															</div>
															<div class="title3 wow jello"  data-wow-duration="0.5s" data-wow-delay="1.5s">
																	<p>It just take few minutes to apply</p>
															</div><br>
															<div class="slider-btn-area wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="2s">
																	<div class="ui button">APPLY NOW</div>
															</div>
													</div>
											</div>
									</div>
							</div>


							<div id="slider-direction-3" class="t-cn slider-direction">
									<div class="slider-content s-tb slide-1">
											<div class="title-container s-tb-c title-light">
													<div class="container text-center">
															<div class="title2 wow bounceInLeft" data-wow-duration="0.5s" data-wow-delay="0.8s">
																	<p>APPLY ONLINE FROM THE COMFORT OF YOU HOME</p>
															</div>
															<div class="title1 wow bounceInLeft" data-wow-duration="0.5s" data-wow-delay="1s">
																	<p>Building Plan Approval</p>
															</div>
															<div class="title3 wow bounceInLeft"  data-wow-duration="0.5s" data-wow-delay="1.5s">
																	<p>It just take few minutes to apply</p>
															</div><br>
															<div class="slider-btn-area wow zoomInUp" data-wow-duration="0.5s" data-wow-delay="2s">
																	<div class="ui button">APPLY NOW</div>
															</div>
													</div>
											</div>
									</div>
							</div>

					</div>

			</div>
			<!-- Slider Area End Here -->

     </div>        
              
</template>

<script src="../../../../public/js/plugin/jquery.nivo.slider.js"></script> 
<script>
   export default {
       components: { },
        data(){ 
            return {

            } 
        },
        methods:{

        },
        mounted() {
			 $('#nivoslider').nivoSlider({

					effect: 'random', // Specify sets like: 'sliceDownLeft sliceUp sliceUpLeft sliceUpDown sliceUpDownLeft fold fade random slideInRight slideInLeft boxRandom boxRain boxRainReverse boxRainGrow boxRainGrowReverse'
					slices: 15, // For slice animations
					boxCols: 8, // For box animations
					boxRows: 4, // For box animations
					animSpeed: 1000, // Slide transition speed
					pauseTime: 5000, // How long each slide will show
					startSlide: 0, // Set starting Slide (0 index)
					directionNav: true, // Next & Prev navigation
					controlNav: true, // 1,2,3... navigation
					controlNavThumbs: false, // Use thumbnails for Control Nav
					pauseOnHover: false, // Stop animation while hovering
					manualAdvance: false, // Force manual transitions
					prevText: 'Prev', // Prev directionNav text
					nextText: 'Next', // Next directionNav text
					randomStart: false, // Start on a random slide
					beforeChange: function() {}, // Triggers before a slide transition
					afterChange: function() {}, // Triggers after a slide transition
					slideshowEnd: function() {}, // Triggers after all slides have been shown
					lastSlide: function() {}, // Triggers when last slide is shown
					afterLoad: function() {} // Triggers when slider has loaded

					/*effect: 'fade',

					slices: 15,

					boxCols: 8,

					boxRows: 4,

					animSpeed: 500,

					pauseTime: 5000,

					startSlide: 0,

					directionNav: true,

					controlNavThumbs: true,

					pauseOnHover: true,

					manualAdvance: false*/

       });
        },
    }
</script>
<style lang="scss" scoped>
   
</style>