@extends('themes.default.common.master')
@section('title','Tour List')
@section('content')
<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{ !empty($destination->banner) ? asset('uploads/original/'.$destination->banner) : asset('theme-assets/img/banner/bg-1.jpeg')}}" alt="" uk-img>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{url('/')}}" class="text-white uk-text-bold">Home</a></li>
            <li><span class="text-secondary uk-text-bold">Destination</span></li>
        </ul>
        <h2 class="text-secondary uk-margin-remove">{{$destination->post_type}}</h2>
    </div>
</section>
<!-- banner section end -->

<!-- introduction section start-->
<section class="uk-section bg-primary">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-2-3@m uk-flex uk-flex-column uk-flex-center" uk-scrollspy="target: h2, p; cls: uk-animation-slide-top-small; delay: 200;">
                <h2 class="text-secondary">{{$destination->associated_title}}</h2>
                <p class="text-white  uk-text-justify uk-margin-bottom">
                    {{$destination->content}}
                </p>
            </div>
            <div class="uk-width-1-3@m" uk-scrollspy=" cls: uk-animation-fade; delay: 200;">
                <div class="uk-grid uk-child-width-expand uk-grid-small">
                    <div><img src="{{$data[0]->thumbnail ? asset('uploads/original/'. $data[0]->thumbnail) : asset('theme-assets/img/expedition.png')}}" class="uk-330 border" loading="lazy" alt=""></div>
                    <div>
                        @if ($data->count() > 1 && $data[1]->thumbnail)
                            <div style="padding-bottom:5px;"><img src="{{asset('uploads/original/'. $data[1]->thumbnail)}}" class="uk-160 border" loading="lazy" alt=""></div>
                        @else
                            <div style="padding-bottom:5px;"><img src="{{asset('theme-assets/img/banner-img1.png')}}" class="uk-160 border" loading="lazy" alt=""></div>
                        @endif
                        @if ($data->count() > 2 && $data[2]->thumbnail)
                            <div style="padding-top:5px;"><img src="{{asset('uploads/original/'. $data[2]->thumbnail)}}" class="uk-160 border" loading="lazy" alt=""></div>
                        @else
                            <div style="padding-top:5px;"><img src="{{asset('theme-assets/img/slider3.jpeg')}}" class="uk-160 border" loading="lazy" alt=""></div>
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
        <div class="uk-child-width-1-2@s" uk-grid uk-scrollspy="target: img,h2,.uk-overlay-primary; cls: uk-animation-fade; delay: 100;">
          @foreach ($data as $row)
            <div>
                <a href="{{ route('page.destinationtriplist', $row->uri) }}" class="uk-display-block uk-inline-clip uk-transition-toggle border ">
                    <div class="uk-inline uk-260">
                        <img src="{{$row->thumbnail ? asset('uploads/original/'. $row->thumbnail) : asset('theme-assets/img/nepal.jpg')}}" loading="lazy" class="border uk-transition-scale-up uk-transition-opaque" alt="{{$row->title}}">
                        <div class="uk-overlay-primary uk-position-cover border"></div>
                        <div class="uk-overlay uk-position-center uk-light">
                            <h2 class="text-secondary"> {{$row->title}}</h2>
                        </div>
                    </div>
                </a>
            </div>
          @endforeach
        </div>
    </div>
</section>
@include('themes/default/common/booknow')
<!-- list section end -->
@endsection