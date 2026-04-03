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
            {{-- <li><span class="text-secondary uk-text-bold">Climbing Route</span></li> --}}
        </ul>
        <h2 class="text-secondary uk-margin-remove">{{$data->post_type}}</h2>
    </div>
</section>
<!-- banner section end -->

<!-- introduction part start -->
<section class="uk-section bg-contour">
    <div class="uk-container" uk-scrollspy="target: h2, p; cls: uk-animation-slide-top-small; delay: 200;">
        <div class=" uk-flex uk-flex-column uk-flex-center">
            <h2 class="text-secondary">{{$data->associated_title}}</h2>
            <p class="text-white  uk-text-justify uk-margin-bottom">
                {{$data->content}}
            </p>
        </div>
    </div>
</section>
<!-- introduction part end -->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="{{$data->post_type}}">
</div>
<!-- itenary sectin start -->
<section class="uk-section">

    <div class="uk-container ">
        <div class="uk-grid">
            <div class="uk-width-expand@m uk-margin-top">
                <h3 class="text-primary">Route Climbing Itinerary</h3>
                <ul uk-accordion uk-scrollspy="target: li; cls: uk-animation-slide-top-small; delay: 200;">
                    <li>
                        <a class="uk-accordion-title f-16 fw-600 bg-light uk-padding-small border-left" href><span class="uk-margin-right">01</span> Arrival in Kathmandu and Transfer to the Hotel (1,400m)</a>
                        <div class="uk-accordion-content  uk-padding-small ">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </li>
                    <li>
                        <a class="uk-accordion-title f-16 fw-600 bg-light uk-padding-small border-left" href><span class="uk-margin-right">02</span> Rest in Kathmandu, expedition briefing and Preparation</a>
                        <div class="uk-accordion-content  uk-padding-small ">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </li>
                    <li>
                        <a class="uk-accordion-title f-16 fw-600 bg-light uk-padding-small border-left" href><span class="uk-margin-right">03</span> Fly from Kathmandu to Samagaun by Helicopter (B3e) - 3,541m</a>
                        <div class="uk-accordion-content  uk-padding-small ">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </li>
                    <li>
                        <a class="uk-accordion-title f-16 fw-600 bg-light uk-padding-small border-left" href><span class="uk-margin-right">04</span> Full Rest Day at Samagaun - 3,541m</a>
                        <div class="uk-accordion-content  uk-padding-small ">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </li>
                    <li>
                        <a class="uk-accordion-title f-16 fw-600 bg-light uk-padding-small border-left" href><span class="uk-margin-right">05</span> Trek from Samagaun to Manaslu Basecamp (4,700m)</a>
                        <div class="uk-accordion-content  uk-padding-small ">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </li>
                    <li>
                        <a class="uk-accordion-title f-16 fw-600 bg-light uk-padding-small border-left" href><span class="uk-margin-right">06</span> Rest in Basecamp (Full Rest) - 4,700m</a>
                        <div class="uk-accordion-content  uk-padding-small ">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
</section>
<!-- iternary section end -->

<!-- gallery section start -->
<section class="uk-section uk-padding-remove-top">
    <div class="uk-container uk-margin-top">
        <h3 class="text-primary">Learn More About the Climbing Route</h3>
        <div class="uk-switcher switcher-container  uk-gallery-image" uk-scrollspy="cls: uk-animation-fade; delay: 200;">
            <div><img src="{{asset('theme-assets/img/mountain-1.jpeg')}}" alt=""></div>
            <div><img src="{{asset('theme-assets/img/mountain-2.jpeg')}}" alt=""></div>
            <div><img src="{{asset('theme-assets/img/mountain-3.jpeg')}}" alt=""></div>
            <div><img src="{{asset('theme-assets/img/mountain-4.jpeg')}}" alt=""></div>
            <div><img src="{{asset('theme-assets/img/slider2.jpeg')}}" alt=""></div>
            <div><img src="{{asset('theme-assets/img/slider3.jpeg')}}" alt=""></div>
        </div>

        <div class="uk-position-relative uk-visible-toggle uk-light " tabindex="-1" uk-slider>
            <div class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m uk-gallery-pill uk-gallery-switcher uk-grid " uk-switcher="connect: .switcher-container" uk-scrollspy="target: .route-div; cls: uk-animation-slide-left-small; delay: 100;">
                <div class="route-div" style="padding:7px 5px;">
                    <a href="#"><img src="{{asset('theme-assets/img/mountain-1.jpeg')}}" alt=""></a>
                </div>
                <div class="route-div" style="padding:7px 5px;">
                    <a href="#"><img src="{{asset('theme-assets/img/mountain-2.jpeg')}}" alt=""></a>
                </div>
                <div class="route-div" style="padding:7px 5px;">
                    <a href="#"><img src="{{asset('theme-assets/img/mountain-3.jpeg')}}" alt=""></a>
                </div>
                <div class="route-div" style="padding:7px 5px;">
                    <a href="#"><img src="{{asset('theme-assets/img/mountain-4.jpeg')}}" alt=""></a>
                </div>
                <div class="route-div" style="padding:7px 5px; ">
                    <a href="#"><img src="{{asset('theme-assets/img/slider2.jpeg')}}" alt=""></a>
                </div>
                <div class="route-div" style="padding:7px 5px; ">
                    <a href="#"><img src="{{asset('theme-assets/img/slider3.jpeg')}}" alt=""></a>
                </div>
            </div>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
        </div>
    </div>
</section>
<!-- gallery section end -->

<!-- form section start -->
<section class="uk-section bg-light uk-margin-large-bottom">
    <div class="uk-container">
        <div class="uk-text-center" uk-scrollspy="target: h3,img; cls: uk-animation-fade; delay: 100;">
            <h3 class="text-primary">
                Booking Form
            </h3>
            <img src="{{asset('theme-assets/img/blue-line.png')}}" alt="">
        </div>
        <div>
            <small><em>Fields marked with * are required.</em></small>
            <form action="" class="uk-grid-small uk-padding bg-white border uk-box-shadow-medium" uk-grid uk-scrollspy="target: div; cls: uk-animation-slide-top-small; delay: 200;">
                <div class="uk-width-1-3@s">
                    <label class="uk-form-label text-black" for="activity">Activity Name *</label>
                    <select class="uk-select border" id="activity">
                        <option>Select Activity</option>
                        <option>Climbing</option>
                    </select>
                </div>
                <div class="uk-width-1-3@s">
                    <label class="uk-form-label text-black" for="destination">Destination *</label>
                    <select class="uk-select border" id="destination">
                        <option>Select Destination</option>
                        <option>Nepal</option>
                    </select>
                </div>

                <div class="uk-width-1-3@s">
                    <label class="uk-form-label text-black" for="region">Region *</label>
                    <select class="uk-select border" id="region">
                        <option>Select Region</option>
                        <option>Everest</option>
                    </select>
                </div>
                <div class="uk-width-1-3@s">
                    <label class="uk-form-label text-black" for="Duration">Duration</label>
                    <input class="uk-input border" type="text" aria-label="Duration">
                </div>
                <div class="uk-width-1-3@s">
                    <label class="uk-form-label text-black" for="Budget">Budget</label>
                    <input class="uk-input border" type="text" aria-label="Budget">
                </div>
                <div class="uk-width-1-3@s">
                    <label class="uk-form-label text-black" for="start">Trip Start Date</label>
                    <input class="uk-input border" type="date" aria-label="start">
                </div>
                <div class="uk-width-1-1">
                    <textarea class="uk-textarea border" rows="5" placeholder="Message" aria-label="Message"></textarea>
                </div>
                <div class="uk-width-1-1 uk-text-center uk-margin-large-top">
                    <a href="climbing.php" class="uk-btn1 uk-btn-primary-outline">Learn More <span uk-icon="chevron-right"></span></a>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- form section end -->
@endsection
