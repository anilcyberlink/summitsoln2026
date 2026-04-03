@extends('themes.default.common.master')
@section('title', $item->trip_title)
@section('meta_keyword', $item->meta_keyword)
@section('meta_description', $item->meta_description)
@section('thumbnail', $item->thumbnail)
@section('content')
<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-img>
    <img class="uk-banner-img" src="{{$item->banner ? asset('uploads/banners/'.$item->banner) : asset('theme-assets/img/banner/bg-2.jpeg')}}" alt=""/>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a></li>
            <li><span class="text-secondary uk-text-bold">{{ strtoupper($item->activity_parent) }}</span></li>
        </ul>
        <h2 class="text-secondary uk-margin-remove">{{$item->title }}</h2>
    </div>
</section>
<!-- banner section end -->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>
<!-- introduction section start-->
<section class="uk-section bg-pattern">
    <div class="uk-container">
        <div class="" uk-scrollspy="target: h2,p; cls: uk-animation-slide-top-medium; delay: 200;">
            <h2 class="text-secondary">{{$item->sub_title ? $item->sub_title : $item->title }}</h2>
            <p class="text-black  uk-text-justify uk-margin-bottom">
                {!! $item->content !!}  
            </p>
        </div>
    </div>
</section>
<!-- introduction section end-->

<!-- list section start-->
<section class="uk-section uk-padding-remove-top">
    <div class="uk-container">
        <div class=" uk-child-width-1-1 uk-child-width-1-2@m uk-child-width-1-3@l uk-grid uk-grid-small uk-grid-match" uk-height-match="target: .list-text" uk-scrollspy=" cls: uk-animation-slide-left-small; delay: 200;" uk-height-match="target: .list-text">
            @if($data->count() > 0)
                @foreach ($data as $item)
                    <div class="uk-margin-medium-bottom">
                        <div class="uk-card uk-card-default bg-primary border">
                            <a href="{{ url('page/' . tripurl($item->uri)) }}" class="uk-display-block uk-inline-clip uk-transition-toggle uk-link-toggle uk-overflow-hidden border">
                                <div class="uk-card-media-top uk-230">
                                    <img src="{{$item->thumbnail ? asset('uploads/original/'.$item->thumbnail) : asset('theme-assets/img/slider1.jpeg')}}" loading="lazy" alt="{{$item->trip_title}}" class="border uk-transition-scale-up uk-transition-opaque">
                                </div>
                            </a>
                            <div class="uk-card-body uk-padding-small border bg-primary">
                                <div class="list-text">
                                    <h3 class="uk-card-title text-white">{{$item->trip_title}}</h3>
                                    <div class="uk-grid uk-grid-collapse">
                                        @if($item->duration)
                                            <div class="uk-package-badge">{{$item->duration}}</div>
                                        @endif
                                        <div class="uk-package-badge uk-margin-vertical">{{$item->trip_grade ?  grade_message_trek($item->trip_grade) : 'Moderate'}}</div> 
                                        @if($item->max_altitude)
                                            <div class="uk-package-badge">{{$item->max_altitude}}</div>
                                        @endif
                                    </div>
                                    <p class="text-white f-14 fw-500 three-line uk-margin-remove-bottom">{{$item->sub_title}}</p>
                                </div>
                                 <div  class="uk-margin-small-top">
                                    <a href="{{ url('page/' . tripurl($item->uri)) }}" class="uk-btn1 uk-btn-primary uk-width-1-1 uk-flex uk-flex-middle uk-flex-between p-btn">Learn More <span uk-icon="chevron-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="uk-text-center text-muted">Trips Coming Soon...</p>
            @endif
        </div>
        {!! $data->links('themes.default.common.pagination') !!}
    </div>
</section>
@include('themes/default/common/booknow')
@stop