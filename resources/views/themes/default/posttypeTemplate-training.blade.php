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
        <h2 class="text-secondary uk-margin-remove">Mountaineering Training</h2>
    </div>
</section>
<!-- banner section end -->

<!-- introduction section start-->
<section class="uk-section bg-primary">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-2-3@m uk-flex uk-flex-column uk-flex-center" uk-scrollspy="target: h2, p; cls: uk-animation-slide-top-small; delay: 200;">
                <h2 class="text-secondary">{{$data->associated_title}}</h2>
                <p class="text-white  uk-text-justify uk-margin-bottom">
                    {{$data->content}}
                </p>
            </div>
            <div class="uk-width-1-3@m">
                <div class="uk-grid uk-child-width-expand uk-grid-small" uk-scrollspy=" cls: uk-animation-fade; delay: 200;">
                    <div><img src="{{$data->banner ? asset('uploads/original/'.$data->banner) : asset('theme-assets/img/banner/bg-1.jpeg')}}" class="uk-330 border" loading="lazy" alt="{{$data->post_type}}"></div>
                    <div>
                        @if ($packages->count()>0)
                            <div style="padding-bottom:5px;"><img src="{{$packages[0]->thumbnail ? asset('uploads/icon/'.$packages[0]->thumbnail) : asset('theme-assets/img/slider2.jpeg')}}" class="uk-160 border" loading="lazy" alt="{{$data->post_type}}"></div>
                        @else
                            <div style="padding-bottom:5px;"><img src="{{asset('theme-assets/img/banner-img1.png')}}" class="uk-160 border" loading="lazy" alt="{{$data->post_type}}"></div>
                        @endif
                        @if ($packages->count()>1)
                            <div style="padding-top:5px;"><img src="{{$packages[1]->thumbnail ? asset('uploads/icon/'.$packages[1]->thumbnail) : asset('theme-assets/img/slider3.jpeg')}}" class="uk-160 border" loading="lazy" alt="{{$data->post_type}}"></div>
                        @else
                            <div style="padding-top:5px;"><img src="{{asset('theme-assets/img/slider3.jpeg')}}" class="uk-160 border" loading="lazy" alt="{{$data->post_type}}"></div>
                        @endif
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
        @if ($packages->count()>0)
            @foreach ($packages as $item)
                @if ($loop->iteration % 2 != 0)
                    <div class="uk-grid uk-child-width-1-2@m uk-grid-collapse" uk-grid>
                        <div>   
                            <img src="{{ $item->thumbnail ? asset('uploads/icon/'.$item->thumbnail) : asset('theme-assets/img/slider2.jpeg') }}" class="uk-cover-img uk-400" loading="lazy" alt="{{$item->title}}">
                        </div>
                        <div class="uk-grid-item-match uk-flex-middle uk-width-1-2@m">
                            <div uk-parallax="x: -100,-25; media: @m;">
                                <div class=" uk-box-shadow-large" uk-scrollspy="target:h3, p; cls: uk-animation-slide-top-small; delay: 50;">
                                    <div class="bg-light border uk-padding-large">
                                        <h3 class="text-secondary">{{$item->title}}</h3>
                                        <p class="fw-500 text-black uk-text-justify">
                                            {{$item->excerpt}}
                                        </p>
                                        <a href="{{ route('package-list',$item->uri) }}" class="uk-btn1 uk-btn-primary-outline">Learn More <span uk-icon="chevron-right"></span></a>
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
                                        <h3 class="text-secondary">{{$item->title}}</h3>
                                        <p class="fw-500 text-black uk-text-justify">
                                            {{$item->excerpt}}
                                        </p>
                                        <a href="{{ route('package-list',$item->uri) }}" class="uk-btn1 uk-btn-primary-outline">Learn More <span uk-icon="chevron-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-flex-last@m uk-flex-first"  >
                            <img src="{{$item->thumbnail ? asset('uploads/icon/'.$item->thumbnail) : asset('theme-assets/img/slider3.jpeg')}}" class="uk-cover-img uk-400" loading="lazy" alt="{{$item->title}}">
                        </div>
                    </div>
                @endif
            @endforeach
            <!--$packages->links('themes.default.common.pagination')-->
        @else
            <p class="uk-text-center text-muted">Coming Soon...</p>
        @endif
    </div>
</section>
<!-- list section end -->
@endsection
