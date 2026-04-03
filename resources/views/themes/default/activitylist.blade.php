@extends('themes.default.common.master')
{{-- @section('title',$data->title)
@section('meta_keyword',$data->meta_keyword)
@section('meta_description',$data->meta_description)
@section('thumbnail',$data->thumbnail)
@section('brief',$data->brief) --}}
@section('content')
<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{asset('theme-assets/img/banner/bg-1.jpeg')}}" alt="" uk-img>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home </a></li>
            <li><span class="text-secondary uk-text-bold">Activity-list</span></li>
        </ul>
        <h2 class="text-secondary uk-margin-remove">Activity</h2>
    </div>
</section>
<!-- banner section end -->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>

<section class="uk-section bg-pattern">
    <div class="uk-container">
        <div class="" uk-scrollspy="target: h2,p; cls: uk-animation-slide-top-medium; delay: 200;">
            <h2 class="text-secondary">Reach New Heights with Everest !</h2>
            @if($data->count() > 1)
                <p class="text-black  uk-text-justify uk-margin-bottom">{{$data[0]->excerpt}}. {{$data[1]->excerpt}} </p>
            @else
                <p class="text-black  uk-text-justify uk-margin-bottom">Whether you're seeking the thrill of high-altitude trekking, the challenge of a technical expedition, or a serene journey through Nepal's cultural treasures, we provide expertly guided tours designed to exceed your expectations. With years of experience, professional guides, and a deep passion for the mountains, we ensure safe, sustainable, and enriching experiences that connect you to the majestic beauty of nature. Embark on your dream adventure with Summit Solution Treks & Expeditions today!</p>
            @endif
        </div>
    </div>
</section>

{{-- <section class="uk-section bg-primary">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-2-3@m uk-flex uk-flex-column uk-flex-center" uk-scrollspy="target: h2, p; cls: uk-animation-slide-top-small; delay: 200;">
                <h2 class="text-secondary"></h2>
                <p class="text-white  uk-text-justify uk-margin-bottom"></p>
            </div>
            <div>
                @if ($trips->count() > 1 && $trips[1])
                    <div style="padding-bottom:5px;">
                        <img src="{{ $trips[1]->thumbnail ? asset('uploads/original/'.$trips[1]->thumbnail) : asset('theme-assets/img/banner-img1.png')}}" class="uk-160 border" loading="lazy" alt="{{$trips[1]->trip_title}}">
                    </div>
                @endif
                @if ($trips->count() > 2 && $trips[2])
                    <div style="padding-top:5px;">
                        <img src="{{ $trips[2]->thumbnail ? asset('uploads/original/'.$trips[2]->thumbnail) : asset('theme-assets/img/slider3.jpeg')}}" class="uk-160 border" loading="lazy" alt="{{$trips[2]->trip_title}}">
                    </div>
                @endif
            </div>
        </div>
</section> --}}

<!-- list section start -->
<section class="uk-section">
    <div class="uk-container">
        <div class="uk-child-width-1-2@s" uk-grid  uk-grid uk-scrollspy="target: img,h2,.uk-overlay-primary; cls: uk-animation-fade; delay: 100;">
            @foreach ($data as $item)
                <div>
                    @if($item->external_link)
                        <a href="{{$item->external_link}}" class="uk-display-block uk-inline-clip uk-transition-toggle border ">
                    @else
                        <a href="{{ route('page.activitydetail', $item->uri) }}" class="uk-display-block uk-inline-clip uk-transition-toggle border ">
                    @endif
                        <div class="uk-inline uk-260">
                            <img src="{{asset('uploads/icon/'.$item->thumbnail)}}" loading="lazy" class="border uk-transition-scale-up uk-transition-opaque"  alt="{{ $item->title }}">
                            <div class="uk-overlay-primary uk-position-cover border"></div>
                            <div class="uk-overlay uk-position-center uk-light">
                                <h2 class="text-secondary">{{ $item->title }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {!! $data->links('themes.default.common.pagination') !!}
    </div>
</section>
<!-- list section end -->
<!-- call to action section start -->
@include('themes/default/common/booknow')
{{-- <div class="texture uk-margin-large-bottom top">
    <img src="{{asset('theme-assets/img/lowtexture.png')}}" alt="texture">
</div>
<div class="bg-blue bg-contour uk-section">
    <div class="uk-container">
        <div class="uk-grid uk-child-width-1-2@m">
            <div>
                <h2 class="text-secondary">Call us for inquiry</h2>
                <p class="text-white fw-600">If you have any queries or would like to make a reservation,<br>
                    please don’t hesitate to contact us.</p>
            </div>
            <div class="uk-text-right@m uk-text-left uk-margin-top">
                <div style="margin-bottom: 26px;">
                <a href="inquiry.php" class="bg-white text-black  bg-white-btn">INQUIRY NOW</a>
                <a href="book.php" class="bg-white text-black bg-white-btn">BOOK NOW</a>
                </div>
                <a href="appointment.php" class="bg-secondary text-white bg-secondary-btn">BOOK AN APPOINTMENT</a>
            </div>
        </div>
    </div>
</div>
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div> --}}
@stop