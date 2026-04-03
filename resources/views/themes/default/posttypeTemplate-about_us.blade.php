@extends('themes.default.common.master')
@section('title', $data->post_type)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->banner)
@section('content')
@php
$posts=$posts->take(5);
@endphp
<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{$data->banner ? asset('uploads/original/'.$data->banner) : asset('theme-assets/img/banner/bg-1.jpeg')}}" alt="{{$data->post_type}}" uk-img>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a></li>
            <li><span class="text-secondary uk-text-bold">{{$data->post_type}}</span></li>
        </ul>
        <h2 class="text-secondary uk-margin-remove">{{$data->associated_title}}</h2>
        <p class="text-white fw-600">
            {{$data->content}}
        </p>
    </div>
</section>
<!-- banner section end -->

<!-- introduction section start-->
<section class="uk-section bg-primary">
    <div class="uk-container">
        <div class="uk-grid" >
            <div class="uk-width-1-3@m" uk-scrollspy=" cls: uk-animation-fade; delay: 200;">
                <div class="uk-grid uk-grid-collapse uk-flex uk-flex-center">
                    <div class="uk-width-2-3" >
                        <img src="{{$posts[0]->page_banner ? asset('uploads/banners/'.$posts[0]->page_banner) : asset('theme-assets/img/expedition.png')}}" class="uk-330 border" alt="{{$data->post_type}}">
                    </div>
                    <div class="uk-width-1-3" style="margin-left: -43px; margin-top: 67px;">
                        <div><img src="{{$posts[0]->page_thumbnail ? asset('uploads/medium/'.$posts[0]->page_thumbnail) : asset('theme-assets/img/slider3.jpeg')}}" class="uk-200 border" alt="{{$data->post_type}}"></div>
                    </div>
                </div>
            </div>
            <div class="uk-width-2-3@m uk-flex uk-flex-column uk-flex-center uk-margin-top uk-text-content" uk-scrollspy="target: h2, p; cls: uk-animation-slide-top-small; delay: 200;">
                <h2 class="text-secondary uk-margin-remove">{{$posts[0]->post_title}}</h2>
                <span class="uk-margin-top" style="color:#fff !important;">{!!$posts[0]->post_content!!}</span>
            </div>

        </div>
</section>
<!-- introduction section end-->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>

<section class="uk-section">

    <div class="uk-text-center uk-margin-large-bottom">
        <h3 class="text-primary">GET TO KNOW MORE ABOUT US</h3>
        <img src="{{asset("theme-assets/img/blue-line.png")}}" alt="">
    </div>
    @foreach ($posts as $item)
        @if ($loop->first)
            @continue
        @endif
        @if ($loop->iteration % 2 == 0)
            <div class="uk-grid uk-child-width-1-2@m uk-grid-collapse" uk-grid>
                <div  >
                    <img src="{{$item->page_thumbnail ? asset('uploads/medium/'.$item->page_thumbnail) : asset('theme-assets/img/slider2.jpeg')}}" class="uk-cover-img" loading="lazy" alt="{{$item->post_title}}" uk-height-viewport>
                </div>
                <div class="uk-grid-item-match uk-flex-middle uk-width-1-2@m">
                    <div uk-parallax="x: -100,-25; media: @m;">
                        <div class=" uk-box-shadow-large" uk-scrollspy="target:h3, p; cls: uk-animation-slide-top-small; delay: 50;">
                            <div class="bg-light border uk-padding-large">
                                <h3 class="text-secondary"> {{$item->post_title}}</h3>
                                <span class="fw-500 text-black uk-text-justify">
                                    {!!$item->post_content!!}
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="uk-grid uk-child-width-1-2@m uk-grid-collapse" uk-grid>
                <div class="uk-grid-item-match uk-flex-middle uk-width-1-2@m uk-flex-first@m uk-flex-last">
                    <div uk-parallax="x: 90,-25; media: @m;">
                        <div class=" uk-box-shadow-large" uk-scrollspy="target:h3, p; cls: uk-animation-slide-top-small; delay: 50;">
                            <div class="bg-light border uk-padding-large">
                                <h3 class="text-secondary"> {{$item->post_title}}</h3>
                                <span class="fw-500 text-black uk-text-justify">
                                    {!!$item->post_content!!}
                                </span>
                            </div>
        
                        </div>
                    </div>
                </div>
                <div class="uk-flex-last@m uk-flex-first"  >
                    <img src="{{$item->page_thumbnail ? asset('uploads/medium/'.$item->page_thumbnail) : asset("theme-assets/img/slider3.jpeg")}}" class="uk-cover-img" loading="lazy" alt="{{$item->post_title}}" uk-height-viewport>
                </div>
            </div>
        @endif
    @endforeach
</section>
@endsection
