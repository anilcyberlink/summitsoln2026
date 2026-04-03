@extends('themes.default.common.master')
@section('title','Blogs')
@section('content')
<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{asset('theme-assets/img/banner/bg-1.jpeg')}}" alt="" uk-img>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: h2; cls: uk-animation-slide-top-medium; delay: 800;">
        <h2 class="text-secondary uk-margin-remove">{{$data->post_type}}</h2>
    </div>
</section>
<!-- banner section end -->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>

<section class="uk-section">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-expand@m" uk-scrollspy="target: span, p,a; cls: uk-animation-slide-top-small; delay: 200;">
                <small class=" news-badge bg-primary ">{{$data->associated_title}}</small>
                <div class="uk-margin-top">
                    <p class="fw-600 text-black uk-text-justify">
                        {!!$data->content!!}
                    </p>
                </div>
                <p class="text-black fw-600">Share with Friends:</p>
                <div>
                    <a href="" class="uk-icon-button uk-margin-small-right bg-primary text-white" uk-icon="instagram"></a>
                    <a href="" class="uk-icon-button  uk-margin-small-right bg-primary text-white" uk-icon="facebook"></a>
                    <a href="" class="uk-icon-button bg-primary text-white" uk-icon="youtube"></a>
                </div>
            </div>
        </div>
        <div id="my-id"></div>
    </div>
</section>
@endsection