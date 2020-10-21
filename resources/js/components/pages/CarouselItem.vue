<template>
    <div class="row">
      <carousel :per-page="1" :mouse-drag="true" :autoplay="true">
        <slide>
          <img src="/images/pages/banner2-1.jpg" alt="banner 4" style="width:100%">
        </slide>
        <slide>
          <img src="/images/pages/banner3-1.jpg" alt="banner 5" style="width:100%">
        </slide>
        <slide>
          <img src="/images/pages/banner4-2.jpg" alt="banner 7" style="width:100%">
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
  
</style>
