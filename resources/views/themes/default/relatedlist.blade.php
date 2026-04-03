@extends('themes.default.common.master')
@section('title','Expedition List')
@section('content')

<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{ $parent->thumbnail ? asset('uploads/icon/'.$parent->thumbnail) : asset('theme-assets/img/banner/bg-2.jpeg')}}" alt="" uk-img>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-positon-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li>
                <a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a>
            </li>
        </ul>
        <h2 class="text-secondary uk-margin-remove">{{$parent->activity_parent }}</h2>
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
            <h2 class="text-secondary"> {{$parent->sub_title ? $parent->sub_title : $parent->title}}</h2>
            <p class="text-black  uk-text-justify uk-margin-bottom">{!! $parent->content !!}</p>
        </div>
    </div>
</section>
<!-- introduction section end-->

<!-- list section start-->
<section class="uk-section">
    <div class="uk-container">
        <div class=" uk-child-width-1-1 uk-child-width-1-2@m uk-child-width-1-4@l uk-grid uk-grid-small uk-grid-match" uk-scrollspy=" cls: uk-animation-slide-left-small; delay: 200;" uk-height-match="target: .list-text">
            @foreach ($data as $row)
                <div class="uk-margin-medium-bottom">
                    <div class="uk-card uk-card-default bg-primary border">
                        <a href="{{ url('page/' . tripurl($row->uri)) }}">
                            <div class="uk-card-media-top uk-160">
                                <img src="{{ $row->thumbnail ? asset('uploads/original/'.$row->thumbnail) : asset('theme-assets/img/slider1.jpeg')}}" loading="lazy" alt="{{$row->trip_title}}" class="border">
                            </div>
                        </a>
                        <div class="uk-card-body uk-padding-small border bg-primary">
                            <div class="list-text">
                                <h3 class="uk-card-title text-white">{{$row->trip_title}}</h3>
                                <div class="uk-grid uk-grid-collapse">
                                    <div class="uk-package-badge">{{$row->duration}}</div> <div class="uk-package-badge uk-margin-vertical">{{$row->trip_grade ?  grade_message_trek($row->trip_grade) : 'Moderate'}}</div> <div class="uk-package-badge">{{$row->max_altitude}}</div>
                                </div>
                                <p class="text-white f-14 fw-500">{{$row->sub_title}}</p>
                                <div>
                                    <a href="{{ url('page/' . tripurl($row->uri)) }}" class="uk-btn1 uk-btn-primary uk-width-1-1 uk-flex uk-flex-middle uk-flex-between p-btn">Learn More <span uk-icon="chevron-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {!! $data->links('themes.default.common.pagination') !!}
    </div>
</section>
<!-- list section end-->
@stop