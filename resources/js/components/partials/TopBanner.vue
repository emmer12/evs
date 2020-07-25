<template>
  <div>
    <div class="top-banner-area" :class="background">
      <div class="container">
        <div class="row">
          <div class="video-text">
            <p>
              <strong>
                <span class="wow zoomInUp">
                  <span class="wrap">{{page}}</span>
                </span>
              </strong>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <!--start-shop-head -->
          <nav class="breadcrumb">
            <router-link to="/" class="breadcrumb-item">
              <i class="icon home"></i> Home Page
            </router-link>
            <span class="breadcrumb-item active">{{page}}</span>
          </nav>
          <!--end-shop-head-->
        </div>
      </div>
    </div>
  </div>
</template>
                   
<script>
export default {
  props: ["page", "background"]
};
</script>

<style lang="scss" scoped>
.banner1 {
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0)),
    url(/images/banners/banner1.jpg);
}
.banner2 {
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0)),
    url(/images/banners/banner2.jpg);
}
.banner3 {
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0)),
  url(/images/banners/banner3.jpg);
  background-position: bottom;
}
.top-banner-area {
  color: White;
  position: relative;
  height: 180px;
  background-position-y: unset;
  transition: 3s ease-in-out;
  &:hover {
    background-position-y: bottom;
  }

  & span.wrap {
    position: absolute;
    top: 45%;
    font-size: 20px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-family: sans-serif;
  }
}

@media screen and (max-width: 640px) {
  .top-banner-area {
    background-position-x: center;
    background-size: cover;

    & span.wrap {
      left: 10%;
    }
  }
}
</style>