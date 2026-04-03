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
<!--            <li><span class="text-secondary uk-text-bold">{{$data->post_title}}</span></li>-->
<!--        </ul>-->
<!--        <h2 class="text-secondary uk-margin-remove">{{$data->sub_title}}</h2>-->
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
            <div class="uk-width-expand@m">
                <h3 class="text-primary" uk-scrollspy="cls: uk-animation-slide-top-medium; delay: 200;">{{$data->post_excerpt}}</h3>
                <div class="uk-margin-top" uk-scrollspy="target: p; cls: uk-animation-slide-top-medium; delay: 200;">
                    <p class="fw-600 text-black uk-text-justify">{!!$data->post_content!!}
                    </p>
                </div>
                <div class="uk-child-width-1-2@m" uk-grid uk-lightbox="animation: fade" uk-scrollspy="target: div; cls: uk-animation-slide-left-small; delay: 100;">
                    @foreach ($multiphotos as $item)
                        <div>
                            <a class="uk-display-block uk-inline-clip uk-transition-toggle border uk-260" href="{{asset('uploads/medium/'.$item->file_name)}}" data-caption="DOCUMENT 1">
                                <img src="{{asset('uploads/medium/'.$item->file_name)}}" class="border uk-transition-scale-up uk-transition-opaque" width="100%" height="260" alt="">
                                <div class="uk-overlay-primary uk-position-cover border"></div>
                                <div class="uk-overlay uk-position-bottom uk-light uk-padding-small ">
                                    <h4 class=" text-white uk-margin-remove">{{$item->title}}</h4>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            @include('themes/default/common/sidebar')
        </div>
        <div id="my-id"></div>
    </div>
</section>

@endsection
