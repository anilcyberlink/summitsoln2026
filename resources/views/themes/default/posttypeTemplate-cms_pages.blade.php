@extends('themes.default.common.master')
@section('title', $data->post_type)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->banner)
@section('content')

<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom  uk-330" alt="" uk-img>
    <div class="uk-overlay-banner bg-primary uk-position-cover"></div>
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
<!-- list section start -->
<section class="uk-section">
    <div class="uk-container">
        <div class="uk-child-width-1-2@s" uk-grid uk-scrollspy="target: img,h2,.uk-overlay-primary; cls: uk-animation-fade; delay: 100;">
            @foreach ($posts as $row)
                <div>
                    <a href="{{ url(geturl($row->uri, $row->page_key)) }}">
                        <div class="uk-display-block uk-inline-clip uk-transition-toggle border  uk-260">
                            <img src="{{$row->page_thumbnail ? asset('uploads/medium/'.$row->page_thumbnail) : asset('theme-assets/img/nepal.jpg')}}" loading="lazy" class="border uk-transition-scale-up uk-transition-opaque" alt="">
                            <div class="uk-overlay-primary uk-position-cover border"></div>
                            <div class="uk-overlay uk-position-center uk-light">
                                <h2 class="text-secondary">{{$row->post_title}}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- list section end -->
@endsection
