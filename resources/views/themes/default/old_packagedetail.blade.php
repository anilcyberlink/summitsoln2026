@extends('themes.default.common.master')
@section('title', $data->meta_title ? $data->meta_title : $data->trip_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->thumbnail)
@section('content')

<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{$item->thumbnail ? asset('uploads/original/' .$item->thumbnail) : asset('theme-assets/img/banner/bg-1.jpeg')}}" alt="" uk-img>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large"  uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Homesss</a></li>
            <li><span class="text-secondary uk-text-bold">{{$data->title}}</span></li>
        </ul>
        <h2 class="text-secondary uk-margin-remove">{{$item->trip_title}}</h2>
    </div>
</section>
<!-- banner section end -->
<!-- introduction section start-->
<section class="uk-section bg-primary">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-1-3@m" uk-scrollspy=" cls: uk-animation-fade; delay: 200;">
                <div class="uk-grid uk-grid-collapse uk-flex uk-flex-center">
                    <div class="uk-width-2-3">
                        <img src="{{$data->banner ? asset('uploads/banners/' . $data->banner) : asset('theme-assets/img/expedition.png')}}" class="uk-330 border" loading="lazy" alt="">
                    </div>
                    <div class="uk-width-1-3" style="margin-left: -55px; margin-top: 54px;">
                        <div><img src="{{$item->thumbnail ? asset('uploads/original/' .$item->thumbnail) : asset('theme-assets/img/slider3.jpeg')}}" class="uk-200 border" loading="lazy" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="uk-width-2-3@m uk-flex uk-flex-column uk-flex-center uk-margin-top" uk-scrollspy="target: h2, p; cls: uk-animation-slide-top-small; delay: 200;">
                <h2 class="text-secondary uk-margin-remove">{{$item->sub_title}}</h2>
                <span class="text-white  uk-text-justify uk-margin-bottom uk-text-content">
                    {!!$item->trip_excerpt!!}
                </span>
            </div>
        </div>
</section>
<!-- introduction section end-->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>
<!-- iternary section start -->
<section class="uk-section">
    <div class="uk-container">
        <div class="uk-grid">
            <!--<div class="uk-width-3-4@m uk-margin-top">-->
            <!--    <div class="bg-contour uk-padding uk-margin-bottom border" uk-scrollspy="target: h3, span,li; cls: uk-animation-slide-top-small; delay: 200;">-->
            <!--        <h3 class="text-white">Itenary for {{$item->trip_title}}</h3>-->
            <!--        {!! $item->trip_content !!}-->
            <!--    </div>-->
            <!--    <ul uk-accordion uk-scrollspy="target:li; cls: uk-animation-slide-top-medium; delay: 100;">-->
            <!--        @if($itinerary->count()>0)-->
            <!--            @foreach ($itinerary as $row)-->
            <!--                <li>-->
            <!--                    <a class="uk-accordion-title f-16 fw-600 bg-light uk-padding-small border-left" href><span class="uk-margin-right">Day {{ $row->days }}</span> {{ $row->title }}</a>-->
            <!--                    <div class="uk-accordion-content  uk-padding-small ">-->
            <!--                        {!! $row->content !!}-->
            <!--                    </div>-->
            <!--                </li>-->
            <!--            @endforeach-->
            <!--        @else-->
            <!--            <p class="uk-text-center text-muted">Itinerary Coming Soon...</p>-->
            <!--        @endif-->
            <!--    </ul>-->
            <!--</div>-->
            <div class="uk-news-sidebar uk-width-1-4@m" >
                <div uk-sticky="offset: 100; end: #my-id" uk-scrollspy="target: div; cls: uk-animation-slide-top-small; delay: 200;">
                    <!--<div class="bg-contour border uk-padding-small border-hover">-->
                    <!--    <p class="uk-margin-remove text-white fw-500 f-18 uk-text-uppercase">Duration : {{ $item->duration }} Day(s)</p>-->
                    <!--    <p class="uk-margin-remove text-white fw-500 f-18 uk-text-uppercase">Price : ${{ $item->price }}</p>-->
                    <!--</div>-->
                    <div class="customize-btn uk-margin-small-top bg-secondary">
                        <a href="{{route('inquiry-now', $item->uri)}}">Training Inquiry</a>
                    </div>
                    <div class="bg-light border uk-padding-small uk-margin-top border-hover">
                        <p class="uk-margin-remove text-black fw-500"><img src="{{asset('theme-assets/img/icon/call.png')}}" class="uk-margin-small-right" alt="">Need Help with this booking:</p>
                        <p class="uk-margin-remove text-black fw-500"> {{$setting->phone}}</p>
                    </div>
                    <div class=" border uk-padding-small uk-margin-top light-border border-hover">
                        <p class="uk-margin-remove text-black fw-500"><img src="{{asset('theme-assets/img/icon/email.png')}}" class="uk-margin-small-right" alt="">Mail Us On:</p>
                        <p class="uk-margin-remove text-black fw-500 "> {{$setting->email_primary}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="my-id"></div>
    </div>
</section>
<!-- iternary section END -->
<!-- form section start -->
<section class="uk-section bg-light uk-margin-large-bottom">
    <div class="uk-container">
        <div class="uk-text-center" uk-scrollspy="target: h3,img; cls: uk-animation-fade; delay: 100;">
            <h3 class="text-primary">
                Enrollment Form
            </h3>
            <img src="assets/img/blue-line.png" alt="">
        </div>
        <div>
            <small><em>Fields marked with * are required.</em></small>
            <form action="{{route('post-enrollment')}}" class="uk-grid-small uk-padding bg-white border uk-box-shadow-medium" uk-grid uk-scrollspy="target: div; cls: uk-animation-slide-top-small; delay: 200;" method="post">
                @csrf
                <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response"/>
                <div class="uk-width-1-3@s">
                    <label class="uk-form-label text-black" for="Full Name">Full Name *</label>
                    <input class="uk-input border" type="text" name="name" aria-label="Full Name" placeholder="Full Name" required>
                </div>
                <div class="uk-width-1-3@s">
                    <label class="uk-form-label text-black" for="Phone Number">Contact *</label>
                    <input class="uk-input border" type="text" name="contact" aria-label="Phone Number" placeholder="Phone Number" required>
                </div>
                <div class="uk-width-1-3@s">
                    <label class="uk-form-label text-black" for="Email"> Email *</label>
                    <input class="uk-input border" type="text" name="email" aria-label="Email" placeholder="Email" required>
                </div>
                <div class="uk-width-1-3@s">
                    <label class="uk-form-label text-black" for="Country">Country *</label>
                    <select class="uk-select border" id="country" name="country" required>
                        @include('themes/default/common/country')
                    </select>
                </div>
                <div class="uk-width-1-3@s">
                    <label class="uk-form-label text-black" for="training">Training Name *</label>
                    <select class="uk-select border" id="training" name="training_title" style="cursor:not-allowed" required readonly>
                        <option value="{{ $item->trip_title }}">{{ucfirst($item->trip_title)}}</option>
                    </select>
                </div>
                <div class="uk-width-1-3@s">
                    <label class="uk-form-label text-black" for="Budget">Budget</label>
                    <input class="uk-input border" style="cursor:not-allowed" type="text" aria-label="Budget" value="$ {{ $item->price }}" readonly>
                    <input type="hidden" name="price" value="{{ $item->price }}">
                </div>
                <div class="uk-width-1-3@s">
                    <label class="uk-form-label text-black" for="Duration">Duration</label>
                    <input class="uk-input border" type="text" aria-label="Duration" style="cursor:not-allowed" value="{{ $item->duration }} Day(s)" readonly >
                    <input type="hidden" name="duration" value="{{ $item->duration }}">
                </div>
                <div class="uk-width-1-3@s">
                    <label class="uk-form-label text-black" for="start">Training Start Date</label>
                    <input class="uk-input border" type="date" name="start_date" aria-label="start">
                </div>
                <div class="uk-width-1-1">
                    <textarea class="uk-textarea border" name="message" rows="5" placeholder="Message" aria-label="Message"></textarea>
                </div>
                <button type="submit" class="uk-btn1 uk-btn-primary-outline">Submit<span uk-icon="chevron-right"></span></button>
                {{-- <div class="uk-width-1-1 uk-text-center uk-margin-large-top">
                <a href="climbing.php" class="uk-btn1 uk-btn-primary-outline">Learn More <span uk-icon="chevron-right"></span></a>
                </div> --}}
            </form>
        </div>
    </div>
</section>
<!-- form section end -->
@stop
