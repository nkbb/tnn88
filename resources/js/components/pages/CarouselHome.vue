<template>
    <div class="container-fluid" style="padding:0px">
      <carousel :per-page="1" :mouse-drag="false"  :autoplayTimeout="2000" :paginationActiveColor="colors" :paginationColor="colors" :autoplay="true">
        <slide>
          <img src="/images/pages/banner4-scaled.jpg" alt="banner 4" style="width:100%">
        </slide>
        <slide>
          <img src="/images/pages/banner5-scaled.jpg" alt="banner 5" style="width:100%">
        </slide>
        <slide>
          <img src="/images/pages/banner7-scaled.jpg" alt="banner 7" style="width:100%">
        </slide>
        <slide>
          <img src="/images/pages/banner8-scaled.jpg" alt="banner 8" style="width:100%">
        </slide>
      </carousel>
    </div>
</template>


<script>
import { Carousel, Slide } from 'vue-carousel';


    export default {
        data() {
            return {
              colors: '#efefef',
            };
        },
        components: {
            Carousel,
            Slide
        },
        mounted() {
            // console.log('Component mounted.')
        }
    }
</script>
<style>
  .VueCarousel-pagination{
    margin-top: -70px;
  }
</style>
