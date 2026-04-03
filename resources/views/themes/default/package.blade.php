@extends('themes.default.common.master')
@section('title','Package List')
@section('content')

<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{ $item->banner ? asset('uploads/banners/'.$item->banner) : asset('theme-assets/img/banner/bg-1.jpeg')}}" alt="" uk-img>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a></li>
            <li><span class="text-secondary uk-text-bold">{{ucfirst($item->activity_parent)}}</span></li>
        </ul>
        <h2 class="text-secondary uk-margin-remove">{{$item->title}}</h2>
    </div>
</section>
<!-- banner section end -->

<!-- introduction section start-->
<section class="uk-section bg-primary">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-2-3@m uk-flex uk-flex-column uk-flex-center" uk-scrollspy="target: h2, p; cls: uk-animation-slide-top-small; delay: 200;">
                <h2 class="text-secondary">{{$item->sub_title}}</h2>
                <p class="text-white  uk-text-justify uk-margin-bottom">
                    {{$item->excerpt}}
                </p>
            </div>
            <div class="uk-width-1-3@m">
                <div class="uk-grid uk-child-width-expand uk-grid-small" uk-scrollspy=" cls: uk-animation-fade; delay: 200;">
                    <div><img src="{{ $item->banner ? asset('uploads/banners/'.$item->banner) : asset('theme-assets/img/expedition.png')}}" class="uk-330 border" loading="lazy" alt=""></div>
                    <div>
                        @if ($data->count()>0)
                            <div style="padding-bottom:5px;"><img src="{{$data[0]->thumbnail ? asset('uploads/original/'.$data[0]->thumbnail) : asset('theme-assets/img/banner-img1.png') }}" class="uk-160 border" loading="lazy" alt=""></div>
                        @else
                            <div style="padding-bottom:5px;"><img src="{{asset('theme-assets/img/banner-img1.png')}}" class="uk-160 border" loading="lazy" alt=""></div>
                        @endif
                        @if ($data->count()>1)
                            <div style="padding-bottom:5px;"><img src="{{$data[1]->thumbnail ? asset('uploads/original/'.$data[1]->thumbnail) : asset('theme-assets/img/slider3.jpeg')}}" class="uk-160 border" loading="lazy" alt=""></div>
                        @else
                            <div style="padding-top:5px;"><img src="{{asset('theme-assets/img/slider3.jpeg')}}" class="uk-160 border" loading="lazy" alt=""></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- introduction section end-->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>
<!-- list section start -->
<section class="uk-section">
    <div class="uk-container">
        @if ($data->count()>0)
            @foreach ($data as $item)
                @if ($loop->iteration % 2 != 0)
                    <div class="uk-grid uk-child-width-1-2@m uk-grid-collapse" uk-grid>
                        <div>   
                            <img src="{{$item->thumbnail ? asset('uploads/original/'.$item->thumbnail) : asset('theme-assets/img/slider2.jpeg')}}" class="uk-cover-img uk-400" loading="lazy" alt="{{$item->trip_title}}">
                        </div>
                        <div class="uk-grid-item-match uk-flex-middle uk-width-1-2@m">
                            <div uk-parallax="x: -100,-25; media: @m;">
                                <div class=" uk-box-shadow-large" uk-scrollspy="target:h3, p; cls: uk-animation-slide-top-small; delay: 50;">
                                    <div class="bg-light border uk-padding-large">
                                        <h3 class="text-secondary">{{$item->trip_title}}</h3>
                                        <p class="fw-500 text-black uk-text-justify">
                                            {!!$item->trip_excerpt!!}
                                        </p>
                                        <a href="{{route('packageDetail',$item->uri)}}" class="uk-btn1 uk-btn-primary-outline">Enroll Now <span uk-icon="chevron-right"></span></a>
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
                                        <h3 class="text-secondary">{{$item->trip_title}}</h3>
                                        <p class="fw-500 text-black uk-text-justify">
                                            {!!$item->trip_excerpt!!}
                                        </p>
                                        <a href="{{route('packageDetail',$item->uri)}}" class="uk-btn1 uk-btn-primary-outline">Enroll Now<span uk-icon="chevron-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-flex-last@m uk-flex-first"  >
                            <img src="{{$item->thumbnail ? asset('uploads/original/'.$item->thumbnail) : asset('theme-assets/img/slider3.jpeg')}}" class="uk-cover-img uk-400" loading="lazy" alt="{{$item->trip_title}}">
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <p class="uk-text-center text-muted">Coming Soon...</p>
        @endif
    </div>
    {!! $data->links('themes.default.common.pagination') !!}
</section>
<!-- list section end -->
@stop