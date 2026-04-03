@extends('themes.default.common.master')
@section('content')

<!-- banner section start -->

<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{asset('theme-assets/img/banner/bg-1.jpeg')}}" alt="{{$data->name}}" uk-img>
    <div class="uk-overlay-banner uk-position-cover" style="background: #000000b3 !important;"></div>
    <div class="uk-position-bottom-center uk-padding-large uk-text-center" uk-scrollspy="target: img,h2,p,a; cls: uk-animation-slide-top-medium; delay: 200;">
        <img src="{{ asset('uploads/team/' . $data->thumbnail) }} " class="uk-border-circle team-img" height="150" width="150" alt="{{$data->name}}">
        <h2 class="text-secondary uk-margin-small uk-margin-medium-top">{{$data->name}}</h2>
        <p class="text-white fw-600 uk-margin-small">{{$data->position}}</p>
        <p class="text-white fw-600 uk-margin-small">
            <span><img src="{{asset('theme-assets/img/icon/call.png')}}" class="uk-margin-small-right" alt="">{{$data->phone}}</span>
            <span class="uk-margin-small-left"><img src="{{asset('theme-assets/img/icon/email.png')}}" class="uk-margin-small-right" alt="">
         {{$data->email}}           
        </span>
        </p>
        <img src="{{asset('theme-assets/img/white-line.png')}}" alt="" class="uk-margin-bottom">
        <div class="uk-banner-con">
            <a href="{{$data->instagram_url}}" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="instagram"></a>
            <a href="{{$data->fb_url}}" target="_blank" class="uk-icon-button  uk-margin-small-right" uk-icon="facebook"></a>
            <a href="{{$data->twitter_url}}" target="_blank" class="uk-icon-button" uk-icon="twitter"></a> 
        </div>
    </div>
</section>
<!-- banner section end -->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>

<!-- introduction section start -->
<section class="uk-section bg-pattern">
    <div class="uk-container"  uk-scrollspy="target: p; cls: uk-animation-fade; delay: 100;">
      {!!$data->content!!}
    </div>
</section>
<!-- introduction section end -->

<!-- gallery section start -->
@if($certificates->count()> 0)
<section class="uk-section bg-primary">
    <div class="uk-container">
        <div class="uk-text-center"  uk-scrollspy="target: h3,img; cls: uk-animation-fade; delay: 100;">
            <h3 class="text-secondary">Certificates & Awards Of {{$data->name}}</h3>
            <img src="{{asset('theme-assets/img/white-line.png')}}" alt="" class="uk-margin-large-bottom">
        </div>
        <div class="uk-child-width-1-4@m uk-grid-small" uk-grid uk-lightbox="animation: fade" uk-scrollspy="target: .award-div; cls: uk-animation-slide-left-small; delay: 100;">
            @foreach($certificates as $certificate)
            <div class="award-div">
                <a class="uk-inline uk-260" href="{{ asset('uploads/team/' . $certificate->image) }}" data-caption="{{$certificate->certificates_title}}">
                    <img src="{{ asset('uploads/team/' . $certificate->image) }}" class="border" width="100%" height="260" alt="" loading="lazy">
                    <div class="uk-overlay-primary uk-position-cover border"></div>
                    <div class="uk-overlay uk-position-bottom uk-light uk-text-center">
                        <p class="fw-600 text-white">{{$certificate->certificates_title}}</p>
                    </div>
                </a>
            </div>
                @endforeach
          
          
        </div>
    </div>
</section>
@endif
<!-- gallery section end -->

<!-- know more start -->
@if($related->count()> 0)
<section class="uk-section">
    <div class="uk-container">
        <div class="uk-grid uk-flex uk-flex-middle">
            <div class="uk-width-1-4@m "  uk-scrollspy="target: h2,a; cls: uk-animation-fade; delay: 100;">
                <h2 class="text-primary">Know more about our team members</h2>
                <a href="{{route('page.posttype_detail','team-members')}}" class="bg-secondary-btn text-white bg-primary ">View All Team</a>
            </div>
            <div class="uk-width-3-4@m" >
                <div class="uk-child-width-1-2@m  uk-child-width-1-3@l uk-grid uk-grid-small " uk-scrollspy="target: .team-div; cls: uk-animation-slide-left-small; delay: 100;">
               
                @foreach($related as $data)
                <div class="uk-margin-top team-div">
                    <a href="{{ url('team/'.team_url($data['uri'], $data['team_key'])) }}">
                        <div class="uk-inline uk-330">
                            <img src="{{ asset('uploads/team/' . $data->thumbnail) }}" class="border" width="1800" height="1200" alt="{{$data->name}}">
                            <div class="uk-overlay-primary uk-position-cover border"></div>
                            <div class="uk-overlay uk-position-bottom  uk-padding-small uk-flex uk-flex-between uk-flex-middle">
                                <div>
                                    <h3 class="text-secondary uk-margin-remove">{{$data->name}}</h3>
                                    <p class="uk-margin-remove text-white">{{$data->position}}</p>
                                </div>
                                <a href="{{ url('team/'.team_url($data['uri'], $data['team_key'])) }}" class="text-primary  fw-500"> <span class="uk-icon-button  uk-margin-small-left bg-primary text-white" uk-icon="forward"></span></a>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
              
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- know more end -->
 @stop