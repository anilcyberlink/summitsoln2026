@extends('themes.default.common.master')
@section('title', $data->post_type)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->banner)
@section('content')

<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{ $data->banner ? asset('uploads/original/'.$data->banner) : asset('theme-assets/img/banner/bg-1.jpeg')}}" alt="" uk-img>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a></li>
            <li><span class="text-secondary uk-text-bold">{{$data->post_type}}</span></li>
        </ul>
        <h2 class="text-secondary uk-margin-remove"> {{$data->associated_title}}</h2>
    </div>
</section>
<!-- banner section end -->

<!-- banner section end -->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="{{$data->post_type}}">
</div>
<!-- list section start -->
<section class="uk-section ">
    <div class="uk-container">
        @if($posts->count()>0)
            <div class="uk-child-width-1-2@s" uk-grid uk-scrollspy="target: .news-div; cls: uk-animation-slide-left-small; delay: 100;">
                @foreach ($posts as $row)
                    <div class="uk-margin-medium-bottom news-div">
                        <a href="{{ route('page.blogdetail', $row->uri) }}" class="uk-display-block uk-inline-clip uk-transition-toggle border ">
                            <div class="uk-inline uk-330">
                                <img src="{{$row->page_thumbnail ? asset('uploads/medium/'.$row->page_thumbnail): asset('theme-assets/img/slider1.jpeg')}}" loading="lazy" class="border uk-transition-scale-up uk-transition-opaque" alt="{{$row->post_title}}">
                                <div class="uk-overlay-primary uk-position-cover border"></div>
                                <div class="uk-overlay uk-position-top uk-light">
                                    <small class=" news-badge bg-primary ">{{$row->sub_title}}</small>
                                </div>
                                <div class="uk-overlay uk-position-bottom uk-light">
                                    <p class="text-white uk-margin-remove fw-500 f-18">{{$row->post_title}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {!! $posts->links('themes.default.common.pagination') !!}
        @else
            <p class="uk-text-center text-muted">Coming Soon...</p>
        @endif
    </div>
</section>
<!-- list section end -->
@endsection
