@extends('layouts.app_page')

@section('style')
<style>
.w-banner{min-width: 800px; width: 800px;}
.w-custom{
    width: 100%;
}
@media (max-width: 575.98px) { 
    .w-banner{min-width: 600px; width: 600px;}
    
    .w-custom{
        width: 180%;
    }
}
@media (min-width: 576px) and (max-width: 767.98px) { 
    .w-custom{
        width: 150%;
    }
}

/* @media (min-width: 768px) and (max-width: 991.98px) { ... } */
.hover img {
	width: 100%;
	height: auto;
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
}
.hover:hover img {
	width: 105%;
}
.row{
    margin-left: 0px !important;
    margin-right: 0px !important;
}
</style>
@endsection

@section('content')
<!-- <page-home>
</page-home> -->
<div class="row">
<div id="carouselMain" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="2000">
      <img src="/images/pages/banner4-scaled.jpg" class="d-block w-custom" alt="banner">
    </div>
    <div class="carousel-item" data-interval="2000">
      <img src="/images/pages/banner5-scaled.jpg" class="d-block w-custom" alt="banner">
    </div>
    <div class="carousel-item" data-interval="2000">
      <img src="/images/pages/banner7-scaled.jpg" class="d-block w-custom" alt="banner">
    </div>
    <div class="carousel-item" data-interval="2000">
      <img src="/images/pages/banner8-scaled.jpg" class="d-block w-custom" alt="banner">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselMain" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselMain" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-sm-3 mt-3 text-center">
            <img src="/images/pages/mini1.jpg" alt="banner" class="banner-left">
            <div class="mini-font mb-2">กีฬา</div>
            <img src="/images/pages/mini2.jpg" alt="banner" class="banner-left">
            <div class="mini-font mb-2">คาสิโน</div>
            <img src="/images/pages/mini3.jpg" alt="banner" class="banner-left">
            <div class="mini-font mb-2">เกมส์</div>
        </div>
        <div class="col-sm-6 mt-3">
            <!-- <page-ha-slick-item></page-ha-slick-item> -->
            <!-- <img src="/images/pages/banner2-1.jpg" alt="banner 4" class="banner-center"> -->

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="/images/pages/banner2-1.jpg" class="d-block w-banner" alt="banner">
                    </div>
                    <div class="carousel-item">
                    <img src="/images/pages/banner3-1.jpg" class="d-block w-banner" alt="banner">
                    </div>
                    <div class="carousel-item">
                    <img src="/images/pages/banner4-2.jpg" class="d-block w-banner" alt="banner">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <div class="col-sm-3 mt-3 text-center">
            <img src="/images/pages/right.jpg" alt="banner" class="banner-right">
        </div>
    </div>
</div>

<div class="nav-custom-line">

</div>

<div class="container">
    <div class="row mb-3">
        <div class="col-md-4 mt-3 text-center pl-4 pr-4">
            <a href="#" class="hover">
                <img src="/images/pages/addline.jpg" alt="banner">
            </a>
        </div>
        <div class="col-md-4 mt-3 text-center pl-4 pr-4">
            <a href="https://tnn88.automebet.com/tnn88/ufabet/register" class="hover">
                <figure><img src="/images/pages/003.jpg" alt="banner"><figure>
            </a>
        </div>
        <div class="col-md-4 mt-3 text-center pl-4 pr-4">
            <a href="https://tnn88.automebet.com/tnn88/ufabet/login" class="hover">
                <figure><img src="/images/pages/004.jpg" alt="banner"> <figure>
            </a>
        </div>
    </div>
</div>

<div class="nav-custom-promotion">

</div>
<div class="container">
    <div class="row mb-3">
        <div class="col-md-4 mt-3 text-center pl-4 pr-4 hover">
            <img src="/images/pages/pro_1.jpg" alt="banner">
        </div>
        <div class="col-md-4 mt-3 text-center pl-4 pr-4 hover">
            <img src="/images/pages/pro_2.jpg" alt="banner">
        </div>
        <div class="col-md-4 mt-3 text-center pl-4 pr-4 hover">
            <img src="/images/pages/pro22.jpg" alt="banner">
        </div>
        <!-- <div class="col-md-4 mt-3 text-center">
            <img src="/images/pages/pro44-1.jpg" alt="banner" style="width:100%">
        </div>
        <div class="col-md-4 mt-3 text-center">
            <img src="/images/pages/pro55-1.jpg" alt="banner" style="width:100%">
        </div>
        <div class="col-md-4 mt-3 text-center">
            <img src="/images/pages/pro66-1.jpg" alt="banner" style="width:100%">
        </div> -->
    </div>
</div>

@endsection

@section('script')
<script>
</script>
@endsection
