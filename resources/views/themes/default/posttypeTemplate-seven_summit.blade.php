@extends('themes.default.common.master')
@section('title', $data->post_type)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->banner)
@section('content')

<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{$data->banner ? asset('uploads/original/'.$data->banner) : asset('theme-assets/img/banner/bg-1.jpeg')}}" alt="{{$data->post_type}}" uk-img>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a></li>
            <li><span class="text-secondary uk-text-bold">{{$data->post_type}}</span></li>
        </ul>
        <h2 class="text-secondary uk-margin-remove">{{$data->associated_title}}</h2>
    </div>
</section>
<!-- banner section end -->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>
<!-- introduction section start-->
<section class="uk-section bg-pattern">
    <div class="uk-container" >
        <div class="uk-grid" >
            <div class="uk-width-2-3@m uk-flex uk-flex-column uk-flex-center" uk-scrollspy="target: h2, p; cls: uk-animation-slide-top-small; delay: 200;">
                <h2 class="text-secondary  uk-margin-remove">{{$posts[0]->post_title}}</h2>
                <p class="text-black  uk-text-justify uk-margin-bottom fw-500">
                    {{$posts[0]->post_excerpt}}
                </p>
            </div>
            <div class="uk-width-1-3@m" uk-scrollspy=" cls: uk-animation-fade; delay: 200;">
                <div class="uk-grid uk-child-width-expand uk-grid-small">
                    <div><img src="{{$data->banner ? asset('uploads/original/'.$data->banner) : asset('theme-assets/img/expedition.png')}}" class="uk-330 border" loading="lazy" alt="{{$data->post_type}}"></div>
                    <div>
                        <div style="padding-bottom:5px;"><img src="{{asset('theme-assets/img/banner-img1.png')}}" class="uk-160 border" loading="lazy" alt="{{$data->post_type}}"></div>
                        <div style="padding-top:5px;"><img src="{{asset('theme-assets/img/slider3.jpeg')}}" class="uk-160 border" loading="lazy" alt="{{$data->post_type}}"></div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- introduction section end-->

<!-- list section start -->
<section class="uk-section uk-padding-remove-top">
    <div class="uk-container">
        <div class="uk-child-width-1-3@m" uk-grid uk-lightbox="animation: fade" uk-scrollspy="target: div; cls: uk-animation-slide-left-small; delay: 100;">
            @foreach ($multiphotos as $row)
                <div>
                    <a class="uk-inline uk-260" href="{{asset('uploads/medium/'.$row->file_name)}}" data-caption="Caption 1">
                        <img src="{{asset('uploads/medium/'.$row->file_name)}}" class="border" width="100%" height="260" alt="">
                    </a>
                </div>
            @endforeach
        </div>
        <div uk-scrollspy="target: p; cls: uk-animation-fade; delay: 100;">
            <p class="text-black  uk-text-justify uk-margin-large-top fw-500">
                {!!$posts[0]->post_content!!}
            </p>
        </div>
    </div>
</section>
<!-- list section end -->
@endsection
