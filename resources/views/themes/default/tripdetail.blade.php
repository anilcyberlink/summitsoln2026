@extends('themes.default.common.master')
@section('title', $data->meta_title ? $data->meta_title : $data->trip_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->thumbnail)
@section('content')

<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{ $data->banner ? asset('uploads/banners/' . $data->banner) : asset('theme-assets/img/detail.png')}}" alt="" uk-img>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
            <ul class="uk-breadcrumb">
                <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a></li>
                @if($data->activities->isNotEmpty())
                    <li><span class="text-secondary uk-text-bold">{{ $data->activities->isNotEmpty() ? strtoupper($data->activities[0]->activity_parent) : $data->activities }}</span></li>
                @endif
            </ul>
            <h2 class="text-secondary uk-margin-remove">{{ $data->trip_title }}</h2>

        <p class="text-white fw-600 uk-width-2-3@m uk-width-1-1">{{ $data->sub_title }}</p>
    </div>
</section>
<!-- banner section end -->

<!-- introduction section start-->
<section class="uk-section bg-primary">
    <div class="uk-container"  uk-scrollspy="target: h2,p; cls: uk-animation-slide-top-medium; delay: 200;">
        <!--<h2 class="text-secondary">{{ $data->trip_title }}</h2>-->
        <span class="text-white uk-text-justify uk-text-content">{!!$data->trip_excerpt!!}</span>
    </div>
</section>
<!-- introduction section end-->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>

<!-- sub-nav section start -->
<div class="uk-container uk-position-relative detail-nav" style="padding-top:60px;">
    <div class=" bg-primary border uk-box-shadow-large" uk-sticky="offset: 100;  animation: uk-animation-slide-top uk-animation-slow uk-transform-origin-bottom-center " style="z-index:998;">
        <div class="">
            <div class="border uk-light">
                <div class="uk-small-details-nav">
                    <div class="uk-container uk-position-relative uk-flex uk-flex-middle">
                        <ul class="uk-width-expand uk-navbar-single uk-flex uk-flex-between uk-flex-middle uk-margin-remove-bottom" id="sidenav">
                            <li>
                                <a href="#features" uk-scroll>Overview </a>
                            </li>
                            @if ($itinerary->count() > 0)
                                <li>
                                    <a href="#itinerary" uk-scroll>Itinerary </a>
                                </li>
                            @endif
                            @if($data->trip_map)
                            <li>
                                <a href="#rout-map" uk-scroll="">Route Map </a>
                            </li>
                            @endif
                            @if ($cost_includes->count() > 0 || $cost_excludes->count() > 0)
                                <li>
                                    <a href="#cost" uk-scroll>Cost Includes /Excludes</a>
                                </li>
                            @endif
                            @if ($photo_videos->count() > 0)
                                <li>
                                    <a href="#gallery" uk-scroll>Gallery </a>
                                </li>
                            @endif

                            <li>
                                <a href="#review" uk-scroll>Review </a>
                            </li>
                        </ul>
                        @if ($schedules->count() > 0)
                            <div class="uk-width-auto">
                                <a href="#offcanvas-usage" class="prices-btn dates-btn"  uk-toggle>Dates & Prices</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<div id="offcanvas-usage" style="width:100%" uk-offcanvas>
    <div class="uk-offcanvas-bar uk-padding-remove">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <div class="bg-primary bg-contour uk-padding" uk-scrollspy="target:h3,p; cls: uk-animation-fade; delay: 100;">
            <h3 class="text-secondary uk-margin-remove">
                {{$setting->text1_title}}
            </h3>
            <p class="text-white uk-margin-remove">
                {{$setting->text1_sub_title}}
            </p>
        </div>
        <div class="uk-padding">
            {{-- <h3 class="text-secondary uk-margin-remove">2025</h3> --}}
            <table class="uk-table uk-table-striped uk-table-responsive" uk-scrollspy=" cls: uk-animation-fade; delay: 100;">
                <thead>
                    <tr>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Group Size</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $item)
                        <tr>
                            <td>{{ $item->start_date }}</td>
                            <td>{{ $item->end_date }}</td>
                            <td>{{ $item->group_size}}</td>
                            <td>
                                @if($item->availability == 'AVAILABLE')
                                    Available
                                @else
                                    Fully Booked
                                @endif
                            </td>
                            @if($item->availability == 'AVAILABLE')
                                <td>
                                    <form id="bookForm" action="{{route('page.booking', $data->uri)}}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $item->start_date }}" name="start_date">
                                        <input type="hidden" value="{{ $item->end_date }}" name="end_date">
                                        @if($item->availability == 'AVAILABLE')
                                            <a onclick="document.getElementById('bookForm').submit();" class="customize-btn bg-primary" type="submit">Book now</a>
                                        @endif
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- sub-nav section end -->
<section class="uk-margin-top">
   <div class="uk-container  ">
      <div class="uk-grid-margin uk-grid uk-grid-stack bg-light border " uk-grid>
         <div class="uk-margin-top uk-margin-bottom uk-grid-item-match uk-flex-middle uk-width-expand@m">
            <div class="uk-panel">
               <div class="uk-margin">
                  <div class="uk-child-width-1-2 uk-child-width-1-2@s uk-child-width-1-4@m uk-grid-match uk-grid uk-flex-left uk-trip-feature" uk-grid="" uk-scrollspy="target:div; cls: uk-animation-fade; delay: 20;">
                    @if ($data->trip_grade)
                        <div>
                            <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                            <div class="uk-width-auto"><img src="{{asset('theme-assets/img/icon/score.png')}}" class="subnav-icon" alt="">
                            </div>
                            <div>
                                <div>
                                    <p class="uk-margin-remove"><strong>Trip Grade</strong></p>
                                    <p class="uk-margin-remove">{{ grade_message_trek($data->trip_grade) }}</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endif
                    @if ($data->duration)
                        <div>
                            <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                            <div class="uk-width-auto"><img src="{{asset('theme-assets/img/icon/clock.png')}}" class="subnav-icon" alt="">
                            </div>
                            <div>
                                <div>
                                    <p class="uk-margin-remove"><strong>Duration</strong></p>
                                    <p class="uk-margin-remove">{{ $data->duration }}</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endif
                    @if ($data->max_altitude)
                        <div>
                            <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                            <div class="uk-width-auto"><img src="{{asset('theme-assets/img/icon/altitude.png')}}" class="subnav-icon" alt="">
                            </div>
                            <div>
                                <div>
                                    <p class="uk-margin-remove"><strong>Max Elevation</strong></p>
                                    <p class="uk-margin-remove">{{ $data->max_altitude }}</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endif
                    @if ($data->group_size)
                        <div>
                            <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                            <div class="uk-width-auto"><img src="{{asset('theme-assets/img/icon/group.png')}}" class="subnav-icon" alt="">
                            </div>
                            <div>
                                <div>
                                    <p class="uk-margin-remove"><strong>Group Size</strong></p>
                                    <p class="uk-margin-remove">{{ $data->group_size }}</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endif
                    @if ($data->accommodation)
                        <div>
                            <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                                <div class="uk-width-auto"><img src="{{asset('theme-assets/img/icon/hotels.png')}}" class="subnav-icon" alt="">
                                </div>
                                <div>
                                    <div>
                                        <p class="uk-margin-remove"><strong>Accommodation</strong></p>
                                        <p class="uk-margin-remove">{{ $data->accommodation }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($data->peak_name)
                        <div>
                            <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                            <div class="uk-width-auto"><img src="{{asset('theme-assets/img/icon/bus.png')}}" class="subnav-icon" alt="">
                            </div>
                            <div>
                                <div>
                                    <p class="uk-margin-remove"><strong>Transporation</strong></p>
                                    <p class="uk-margin-remove">{{ $data->peak_name }}</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endif
                    @if ($data->route )
                        <div>
                            <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid="">
                                <div class="uk-width-auto"><img src="{{asset('theme-assets/img/icon/point.png')}}" class="subnav-icon" alt="">
                                </div>
                                <div>
                                    <div>
                                        <p class="uk-margin-remove"><strong>Start / End</strong></p>
                                        <p class="uk-margin-remove">{{ $data->route }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- features section start -->

<!-- features section end  -->

<!-- description section start -->
<section class="uk-section uk-padding-remove-bottom bg-pattern" id="features" uk-scrollspy="target:h2,img,p; cls: uk-animation-slide-top-medium; delay: 100;">
    <div class="uk-container uk-text-center">
        <h2>{{ $data->trip_highlight }}</h2>
        <img src="{{asset('theme-assets/img/blue-line.png')}}" alt="">
    </div>
    <div class="uk-container uk-margin-top">
        <p class="uk-text-justify fw-500 text-black">
            {!! $data->trip_content !!}
        </p>
        <hr class="uk-divider-icon">
    </div>
</section>
<!-- description section end -->

<!-- itenary sectin start -->
@if ($itinerary->count() > 0)
    <section class="uk-section " id="itinerary" >

        <div class="uk-container ">
            <div class="uk-grid">
                <div class="uk-width-3-4@m uk-margin-top">
                    <div>
                        <h2 class="text-primary uk-margin-remove-top uk-scrollspy-inview " style="">Itinerary</h2>
                    </div>
                    <ul uk-accordion uk-scrollspy="target:li; cls: uk-animation-slide-top-medium; delay: 100;">
                        @foreach ($itinerary as $item)
                            <li>
                                <a class="uk-accordion-title f-16 fw-600 bg-light uk-padding-small border-left" href><span class="uk-margin-right">Day {{ $item->days }}</span> {{ $item->title }}</a>
                                <div class="uk-accordion-content  uk-padding-small ">
                                    {!! $item->content !!}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="uk-width-1-4@m uk-margin-top ">
                    <div uk-sticky="offset:150;end: #my-id" uk-scrollspy="target:div; cls: uk-animation-slide-top-medium; delay: 100;">
                        <div class="customize-btn bg-primary">
                            <a href="{{route('page.booking', $data->uri)}}">Book Now</a>
                        </div>
                        <div class="customize-btn uk-margin-small-top bg-secondary">
                            <a href="{{route('inquiry-now', $data->uri)}}">Trip Inquiry</a>
                        </div>
                        <div class="bg-light border uk-padding-small  uk-margin-top">
                            <p class="uk-margin-remove fw-600 text-black"><img src="{{asset('theme-assets/img/icon/call.png')}}" class="uk-margin-small-right" alt="">Need help with booking:</p>
                            <p class="uk-margin-remove f-16 fw-500">{{$setting->phone}}</p>
                        </div>
                        <div class="bg-light border uk-padding-small uk-margin-top">
                            <p class="uk-margin-remove fw-600 text-black"><img src="{{asset('theme-assets/img/icon/email.png')}}" class="uk-margin-small-right" alt="">Mail us on:</p>
                            <p class="uk-margin-remove f-16 fw-500">{{$setting->email_primary}}</p>
                        </div>
                        <div class="border uk-padding-small">
                            <p class="uk-margin-small-bottom fw-600 text-black">Share this trip:</p>
                            <div>
                                <a href="{{$setting->instagram_link}}" class="uk-icon-button uk-margin-small-right bg-primary text-white" uk-icon="instagram"></a>
                                <a href="{{$setting->facebook_link}}" class="uk-icon-button  uk-margin-small-right bg-primary text-white" uk-icon="facebook"></a>
                                <a href="{{$setting->youtube_link}}" class="uk-icon-button bg-primary text-white" uk-icon="youtube"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="my-id"></div>
        </div>
    </section>
@endif
<!-- iternary section end -->

<!-- route map section end -->
@if($data->trip_map)
<section class="uk-section" id="rout-map">
    <div class="uk-container">
        <div class="uk-grid uk-child-width-1-2@m uk-flex uk-flex-middle" uk-scrollspy="target:h2,a; cls: uk-animation-slide-top-medium; delay: 100;">
            <div>
                <h2 class="text-primary uk-margin-remove-top uk-scrollspy-inview " style="">route map</h2>
            </div>
        </div>
        <div class="uk-position-relative  ">
            <div uk-lightbox="">
                <a href="{{ asset('/uploads/original/'.$data->trip_map) }}" title="{{ $data->trip_title }}" >
                    <img src="{{ asset('/uploads/original/'.$data->trip_map) }}" alt="{{ $data->trip_title }}" title="{{ $data->trip_title }}">
                </a>
            </div>
        </div>
    </div>
</section>
@endif
<!-- route map section end -->

<!-- include/excludes section start -->
@if ($cost_includes->count() > 0 || $cost_excludes->count() > 0)
    <section class="uk-section uk-position-relative uk-background-norepeat uk-background-cover expedition-section" id="cost" data-src="assets/img/blue-bg.jpeg" uk-parallax="bgx: -100; easing: 1;" uk-img>
        <div class="uk-overlay-blue uk-position-cover"></div>
        <div class="uk-overlay" style="position: relative;" uk-scrollspy="target:h2,img,li; cls: uk-animation-slide-top-medium; delay: 100;">
            <div class="uk-container uk-text-center ">
                <h2 class=" text-secondary"> Cost Includes / Excludes</h2>
                <img src="assets/img/white-line.png" alt="">
            </div>
            <div class="uk-container uk-margin-top uk-padding-remove">
                <div class="uk-child-width-1-2@m uk-grid-collapse uk-grid">
                    @if ($cost_includes->count() > 0 )
                        <div class="uk-padding-remove">
                            <h2 class="text-secondary">Included</h2>
                            <ul class="text-white include-ul">
                                @foreach ($cost_includes as $item)
                                    <li>{{$item->title}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($cost_excludes->count() > 0)
                        <div class="uk-padding-remove">
                            <h2 class="text-secondary">Excluded</h2>
                            <ul class="text-white exclude-ul">
                                @foreach ($cost_excludes as $item)
                                    <li>{{ $item->title }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif
<!-- includes / excludes section end -->

<!-- gallery section start -->
@if ($photo_videos->count() > 0)
    <section class="uk-section uk-padding-remove-bottom" id="gallery">

        <div class="uk-container uk-margin-top">
            <div>
                <h2 class="text-primary uk-margin-remove-top">Gallery</h2>
            </div>
            <div class="uk-switcher switcher-container uk-gallery-image" uk-lightbox uk-scrollspy="cls: uk-animation-fade; delay: 200;">
                @foreach ($photos as $row)
                    <div>
                        <a class="uk-inline uk-width-1-1" href="{{ asset('/uploads/original/' . $row->thumbnail) }}">
                            <img src="{{ asset('/uploads/original/' . $row->thumbnail) }}" alt="{{ $row->title }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="uk-position-relative uk-visible-toggle uk-light " tabindex="-1" uk-slider>
                <div class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m uk-gallery-pill uk-gallery-switcher uk-grid " uk-switcher="connect: .switcher-container" uk-scrollspy="target: .route-div; cls: uk-animation-slide-left-small; delay: 100;">
                    @foreach ($photos as $row)
                        <div class="route-div" style="padding:7px 5px;">
                            <a href="{{ asset('/uploads/original/' . $row->thumbnail) }}"><img src="{{ asset('/uploads/original/' . $row->thumbnail) }}" alt="{{ $row->title }}"></a>
                        </div>
                    @endforeach
                </div>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </div>
    </section>
@endif
<!-- gallery section end -->

<!--Client-section-start -->
<section class="uk-section client-section " id="review">
    <div class="uk-container">
        <div class="uk-grid uk-child-width-1-2@m uk-flex uk-flex-middle" uk-scrollspy="target:h2,a; cls: uk-animation-slide-top-medium; delay: 100;">
            <div>
                <h2 class="text-primary uk-margin-remove-top">Testimonials</h2>
            </div>
            <div class="uk-text-left uk-text-right@m">
                <!-- This is an anchor toggling the modal -->
                <a href="#modal-client" class="text-primary  fw-500" uk-toggle>WRITE A REVIEW <span  class="uk-icon-button uk-margin-small-left bg-primary text-white" uk-icon="forward"></span></a>

                <!-- This is the modal -->
                <div id="modal-client" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body uk-padding-remove">
                        <div class="uk-padding uk-padding-remove-bottom" >
                            <h3 class="uk-modal-title uk-text-center text-primary uk-margin-remove">write a review</h3>
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <form class="uk-contact-form" action="{{ route('post-trip-review') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="trip_id" value="{{ $data->id }}"/>
                                <div class=" uk-child-width-1-2@m uk-grid">
                                    <div class="uk-margin-small-top">
                                        <label class="uk-form-label uk-text-bold" for="full_name">Full Name</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="fullname" name="full_name" required type="text">
                                        </div>
                                    </div>
                                    <div class="uk-margin-small-top">
                                        <label class="uk-form-label uk-text-bold" for="email">Email</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="email" name="email" type="email">
                                        </div>
                                    </div>
                                    <div class="uk-margin-small-top">
                                        <label class="uk-form-label uk-text-bold" for="image">Image</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="image" name="photo" required type="file" style="padding: 6px;">
                                        </div>
                                    </div>
                                    <div class="uk-margin-small-top">
                                        <label class="uk-form-label uk-text-bold" for="">Rating</label>
                                        <div class="star-rating">
                                            <input type="radio" id="5-stars" name="rating" value="5">
                                            <label for="5-stars" class="star">&#9733;</label>
                                            <input type="radio" id="4-stars" name="rating" value="4">
                                            <label for="4-stars" class="star">&#9733;</label>
                                            <input type="radio" id="3-stars" name="rating" value="3">
                                            <label for="3-stars" class="star">&#9733;</label>
                                            <input type="radio" id="2-stars" name="rating" value="2">
                                            <label for="2-stars" class="star">&#9733;</label>
                                            <input type="radio" id="1-star" name="rating" value="1">
                                            <label for="1-star" class="star">&#9733;</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin-small-top">
                                    <label class="uk-form-label uk-text-bold" for="country">Country</label>
                                    <div class="uk-form-controls">
                                    <select class="uk-select border" id="country" name="country" required type="text">
                                            @include('themes.default.common.country')
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-margin-small-top">
                                    <label class="uk-form-label uk-text-bold" for="contact">Message</label>
                                    <div class="uk-form-controls">
                                        <textarea name="message" class="uk-textarea" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="uk-text-center uk-margin-top">
                                <button type="submit" class="uk-btn1 uk-btn-primary-outline">Submit<span uk-icon="chevron-right"></span></button>
                                </div>
                            </form>
                        </div>
                        <div data-src="{{asset('theme-assets/img/banner.png')}}" style="height: 160px; background-size:cover;" uk-img>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-position-relative uk-visible-toggle " tabindex="-1" uk-slider uk-height-match=".uk-client">
            @if($trip_review->count () > 0)
                <div class="uk-slider-items uk-child-width-1-1 uk-child-width-1-2@m uk-grid uk-margin-large-top" uk-scrollspy="target:div; cls: uk-animation-fade; delay: 100;">
                    @foreach ($trip_review as $value)
                        <div>
                            <div class="uk-card uk-card-default uk-padding border bg-light uk-box-shadow-large uk-client">
                                <div class="uk-flex">
                                    <img src="{{asset('uploads/reviews/'.$value->image)}}" loading="lazy" class="user-img" alt="" />
                                    <div>
                                        <h4 class="text-secondary uk-margin-remove">{{ $value->full_name }}</h4>
                                        <p class="uk-margin-remove">{{ $value->country }}</p>
                                        <div class="star-list">
                                            <!--@for($i=0; $i < $value->rating; $i++)-->
                                            <!--    <span class=" text-primary f-25">&#9733;</span>-->
                                            <!--@endfor-->
                                        </div>
                                    </div>
                                </div>
                                <p class="uk-text-justify fw-500 uk-margin-remove-top">
                                    {!! $value->message !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <a class="uk-position-center-left uk-position-small uk-hidden" href uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden" href uk-slidenav-next uk-slider-item="next"></a>
            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
        </div>
    </div>
</section>
<!-- Client-section-end -->

<!-- call to action section start -->
@include('themes/default/common/booknow')
{{-- <div class="texture uk-margin-large-bottom top">
    <img src="{{asset('theme-assets/img/lowtexture.png')}}" alt="texture">
</div>
<div class="bg-blue bg-contour uk-section">
    <div class="uk-container">
        <div class="uk-grid uk-child-width-1-2@m" >
            <div class="uk-text-center uk-text-left@m" uk-scrollspy="target:h2,p; cls: uk-animation-slide-top-medium; delay: 100;">
                <h2 class="text-secondary">Call us for inquiry</h2>
                <p class="text-white fw-600">If you have any queries or would like to make a reservation,<br>
                    please don’t hesitate to contact us.</p>
            </div>
            <div class="uk-text-right@m uk-text-center uk-margin-top" uk-scrollspy=" cls: uk-animation-slide-top-medium; delay: 100;">
                <div style="margin-bottom: 26px;">
                    <a href="inquiry.php" class="bg-white text-black  bg-white-btn">INQUIRY NOW</a>
                    <a href="{{route('book-now')}}" class="bg-white text-black bg-white-btn">BOOK NOW</a>
                </div>
                <a href="appointment.php" class="bg-secondary text-white bg-secondary-btn">BOOK AN APPOINTMENT</a>
            </div>
        </div>
    </div>
</div>
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div> --}}
<!-- call to action section end-->

<!-- similar package section start-->
<div class="uk-container uk-margin-large-top">
    <div class="uk-grid uk-flex uk-flex-middle">
        <div class="uk-width-1-4@m uk-margin-large-bottom " uk-scrollspy="target:h2,a; cls: uk-animation-slide-top-medium; delay: 100;">
            <h2 class="text-primary">Know about our similar package</h2>
            <a href="{{ route('page.relatedlist', ['tripId' => $tripUri]) }}" class="bg-secondary-btn text-white bg-primary ">View Packages</a>
        </div>
        <div class="uk-width-3-4@m">
            <div class=" uk-child-width-1-3@l uk-child-width-1-2@m uk-grid uk-grid-small uk-grid-match" uk-scrollspy=" cls: uk-animation-fade; delay: 100;">
            @if($similar_trips->count() > 0)
                @foreach($similar_trips as $item)
                    <div class="uk-margin-medium-bottom">
                        <div class="uk-card uk-card-default bg-primary border">
                            <a href="{{ url('trip/' . tripurl($item->uri)) }}">
                                <div class="uk-card-media-top uk-230">
                                    <img src="{{$item->thumbnail ? asset('uploads/original/'.$item->thumbnail) : asset('theme-assets/img/slider1.jpeg')}}" loading="lazy" alt="{{$item->trip_title}}" class="border">
                                </div>
                            </a>
                            <div class="uk-card-body uk-padding-small border bg-primary">
                                <h3 class="uk-card-title text-white">{{$item->trip_title}}</h3>
                                <div>
                                    <span class="uk-package-badge">{{ $item->duration }}</span>
                                    <span class="uk-package-badge uk-margin-vertical">{{ grade_message_trek($item->trip_grade) }}</span>
                                    <span class="uk-package-badge">{{$item->max_altitude}}</span>
                                </div>
                                <p class="text-white f-14 fw-500">{{$item->sub_title}}</p>
                                <a href="{{ url('trip/' . tripurl($item->uri)) }}">
                                    <div class="uk-btn1 uk-btn-primary uk-width-1-1 uk-flex uk-flex-middle uk-flex-between p-btn">Learn More <span uk-icon="chevron-right"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
</div>
<!-- similar package section end -->
@stop
