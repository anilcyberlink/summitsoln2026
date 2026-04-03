@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->page_thumbnail)
@section('content')

<!-- banner section start -->
<!--<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom  uk-330" alt="" uk-img>-->
<!--    <div class="uk-overlay-banner bg-primary uk-position-cover"></div>-->
<!--    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">-->
<!--        <ul class="uk-breadcrumb">-->
<!--            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a></li>-->
<!--            <li><span class="text-secondary uk-text-bold">Privacy</span></li>-->
<!--        </ul>-->
<!--        <h2 class="text-secondary uk-margin-remove">{{$data->post_title}}</h2>-->
<!--    </div>-->
<!--</section>-->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{$data->page_thumbnail ? asset('uploads/original/'.$data->page_thumbnail) : asset('theme-assets/img/banner/bg-1.jpeg')}}" alt="" uk-img >
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a></li>
            <li><span class="text-secondary uk-text-bold">{{$data->post_title}}</span></li>
        </ul>
        <h2 class="text-secondary uk-margin-remove">{{$data->sub_title}}</h2>
    </div>
</section>
<!-- banner section end -->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>

<section class="uk-section">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-expand@m" uk-scrollspy="target: h3,p,span,li; cls: uk-animation-slide-top-medium; delay: 200;">
                <h3 class="text-primary">{{$data->sub_title}}</h3>
                <div class="uk-margin-top">
                    <p class="fw-600 text-black uk-text-justify">
                        {{$data->post_excerpt}}
                    </p>
                    {{-- <div class="bg-light uk-padding uk-margin-bottom border">
                        <span class="text-black fw-500">Note : Regarding Ice Climbing , there are some things to be considered:</span>
                        <ol class="f-14 text-black fw-500">
                            <li>Whether you're seeking the thrill of high-altitude trekking, the challenge of a technical expedition</li>
                            <li>Fitness Level: Participants should have a moderate level of fitness and no severe health issues. Consult a doctor if unsure</li>
                            <li>Ice climbing is weather-dependent; sessions may be adjusted or canceled for safety reasons</li>
                        </ol>
                        
                    </div> --}}
                    <p class="text-black fw-500 uk-text-justify">
                        {!!$data->post_content!!}
                    </p>
                </div>
            </div>
            @include('themes/default/common/sidebar')
        </div>
        <div id="my-id"></div>
    </div>
</section>


@endsection
