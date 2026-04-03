@extends('themes.default.common.master')
@section('title','Trekking List')
@section('content')

<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{asset('uploads/original/'.$data->banner)}}" alt="" uk-img>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{url('/')}}" class="text-white uk-text-bold">Home</a></li>
            <li><span class="text-secondary uk-text-bold">Destination</span></li>
        </ul>
        <h2 class="text-secondary uk-margin-remove">{{ $data->title }}</h2>
    </div>
</section>
<!-- banner section end -->

<!-- introduction section start-->
<section class="uk-section bg-primary">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-2-3@m uk-flex uk-flex-column uk-flex-center" uk-scrollspy="target: h2, p; cls: uk-animation-slide-top-small; delay: 200;">
                <h2 class="text-secondary">{{ $data->brief }}</h2>
                <span class="text-white  uk-text-justify uk-margin-bottom uk-text-content">
                    {!! $data->content !!}
                </span>
            </div>
            <div class="uk-width-1-3@m" uk-scrollspy=" cls: uk-animation-fade; delay: 200;">
                <div class="uk-grid uk-child-width-expand uk-grid-small">
                    <div><img src="{{asset('uploads/original/'. $data->banner)}}" class="uk-330 border" loading="lazy" alt="{{ $data->title }}"></div>
                    <div>
                        <div style="padding-bottom:5px;"><img src="{{asset('uploads/original/'. $data->thumbnail)}}" class="uk-160 border" loading="lazy" alt="{{ $data->title }}"></div>
                        <div style="padding-top:5px;"><img src="{{ $expeditions[0]->thumbnail ? asset('uploads/original/'. $expeditions[0]->thumbnail) : asset('theme-assets/img/slider3.jpeg')}}" class="uk-160 border" loading="lazy" alt=""></div>
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
    @if($trips->count()>0)
        <div class="uk-container">
            <div class="uk-child-width-1-1 uk-child-width-1-2@m uk-child-width-1-3@l uk-grid uk-grid-small uk-grid-match" uk-height-match="target: .list-text" uk-scrollspy=" cls: uk-animation-slide-left-small; delay: 200;">
                @foreach ($trips as $item)
                    <div class="uk-margin-medium-bottom">
                        <div class="uk-card uk-card-default bg-primary border">
                            <a href="{{ url('page/' . tripurl($item->uri)) }}" class="uk-display-block uk-inline-clip uk-transition-toggle uk-link-toggle uk-overflow-hidden border">
                                <div class="uk-card-media-top uk-230">
                                    <img src="{{ $item->thumbnail ? asset('uploads/original/'.$item->thumbnail) : asset('theme-assets/img/slider1.jpeg')}}" loading="lazy" alt="{{$item->trip_title}}" class="border uk-transition-scale-up uk-transition-opaque">
                                </div>
                            </a>
                            <div class="uk-card-body uk-padding-small border bg-primary">
                                <div class="list-text">
                                    <h3 class="uk-card-title text-white">{{$item->trip_title}}</h3>
                                    <div class="uk-grid uk-grid-collapse">
                                        @if($item->duration)
                                        <div class="uk-package-badge">{{$item->duration}}</div> 
                                        @endif
                                        <div class="uk-package-badge uk-margin-vertical">{{$item->trip_grade ?  grade_message_trek($item->trip_grade) : 'Moderate'}}</div>
                                        @if($item->max_altitude)
                                        <div class="uk-package-badge">{{$item->max_altitude}}</div>
                                        @endif
                                    </div>
                                    <p class="text-white f-14 fw-500 three-line uk-margin-remove-bottom">{{$item->sub_title}}</p>
                                </div>
                                <div class="uk-margin-small-top">
                                  <a href="{{ url('page/' . tripurl($item->uri)) }}" class="uk-btn1 uk-btn-primary uk-width-1-1 uk-flex uk-flex-middle uk-flex-between p-btn">Learn More <span uk-icon="chevron-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {!! $trips->links('themes.default.common.pagination') !!}
        </div>
    @else
       <p class="uk-text-center text-muted">Trips Coming Soon...</p>
    @endif
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
<!-- call to action section end-->
@stop