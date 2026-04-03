@extends('themes.default.common.master')
@section('title','Blogs')
@section('content')
<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{$item->page_banner ? asset('uploads/banners/'.$item->page_banner) : asset('theme-assets/img/banner/bg-1.jpeg')}}" alt="" uk-img>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: h2; cls: uk-animation-slide-top-medium; delay: 800;">
        <h2 class="text-secondary uk-margin-remove">{{$item->post_title}}</h2>
    </div>
</section>
<!-- banner section end -->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>

<section class="uk-section">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-expand@m" uk-scrollspy="target: span, p,a; cls: uk-animation-slide-top-small; delay: 200;">
                <small class=" news-badge bg-primary ">{{$item->sub_title}}</small>
                <div class="uk-margin-top">
                    <p class="fw-600 text-black uk-text-justify">
                        {!!$item->post_content!!}
                    </p>
                </div>
                <div class="uk-child-width-1-2@m" uk-grid uk-lightbox="animation: fade">
                    <div>
                        @if (!empty($item->page_banner))
                            <a class="uk-inline uk-260" href="{{asset('uploads/banners/'.$item->page_banner)}}" data-caption="Caption 1">
                                <img src="{{asset('uploads/banners/'.$item->page_banner)}}" class="border" width="100%" height="260" alt="">
                            </a>
                        @else
                            <a class="uk-inline uk-260" href="{{asset('theme-assets/img/banner/bg-1.jpeg')}}" data-caption="Caption 1">
                                <img src="{{asset('theme-assets/img/banner/bg-1.jpeg')}}" class="border" width="100%" height="260" alt="">
                            </a>
                        @endif
                    </div>
                    <div>
                        @if (!empty($item->page_thumbnail))
                            <a class="uk-inline uk-260" href="{{asset('uploads/medium/'.$item->page_thumbnail)}}" data-caption="Caption 1">
                                <img src="{{asset('uploads/medium/'.$item->page_thumbnail)}}" class="border" width="100%" height="260" alt="">
                            </a>
                        @else
                            <a class="uk-inline uk-260" href="{{asset('theme-assets/img/banner/bg-1.jpeg')}}" data-caption="Caption 1">
                                <img src="{{asset('theme-assets/img/banner/bg-1.jpeg')}}" class="border" width="100%" height="260" alt="">
                            </a>
                        @endif
                    </div>
                </div>
                <p class="text-black fw-600">Share with Friends:</p>
                <div>
                    <a href="{{$setting->instagram_link}}" class="uk-icon-button uk-margin-small-right bg-primary text-white" uk-icon="instagram"></a>
                    <a href="{{$setting->facebook_link}}" class="uk-icon-button  uk-margin-small-right bg-primary text-white" uk-icon="facebook"></a>
                    <a href="{{$setting->youtube_link}}" class="uk-icon-button bg-primary text-white" uk-icon="youtube"></a>
                </div>
            </div>
            @if($related->isNotEmpty())
                <div class="uk-news-sidebar uk-width-1-4@m">
                    <div uk-sticky="offset: 100; end: #my-id" uk-scrollspy="target: h3,li; cls: uk-animation-slide-top-small; delay: 200;">
                        <h3 class="text-primary">Related News</h3>
                        <hr>
                        <ul class="uk-news-list">
                            @foreach ($related as $row )
                                <li class="two-line">
                                    <a href="{{ route('page.blogdetail', $row->uri) }}">
                                        {{$row->post_title}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
        <div id="my-id"></div>
    </div>
</section>
@endsection