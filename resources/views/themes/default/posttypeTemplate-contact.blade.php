@extends('themes.default.common.master')
@section('title', $data->post_type)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->banner)
@section('content')

<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{asset('theme-assets/img/banner/bg-1.jpeg')}}" alt="" uk-img>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a></li>
            <li><span class="text-secondary uk-text-bold">{{$data->post_type}}</span></li>
        </ul>
        <h2 class="text-secondary uk-margin-remove">{{$data->associated_title}}</h2>
        <p class="text-white fw-600">
            {!!$data->content!!}
        </p>
    </div>
</section>
<!-- banner section end -->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>
<section class="uk-section">
    <div class="uk-container">
        <div class="uk-grid  uk-child-width-1-3@m" uk-scrollspy="target: div; cls: uk-animation-fade; delay: 200;"> 
            <div class="uk-padding">
                <div class="bg-primary uk-padding-small border uk-box-shadow-medium uk-flex uk-flex-middle" style="height:32px;">
                    <img src="{{asset('theme-assets/img/icon/location.png')}}" height="26" width="26" alt="{{$data->post_type}}" class="uk-margin-right">
                    <div>
                        <p class="text-white fw-500 uk-margin-remove f-14">{{$setting->address}}</p>
                    </div>
                </div>
            </div>
            <div class="uk-padding">
                <div class="bg-primary uk-padding-small border uk-box-shadow-medium uk-flex uk-flex-middle" style="height:32px;">
                    <img src="{{asset('theme-assets/img/icon/email.png')}}" height="26" width="26" alt="" class="uk-margin-right">
                    <div>
                        <p class="text-white fw-500 uk-margin-remove f-14">{{$setting->email_primary}}</p>
                    </div>
                </div>
            </div>
            <div class="uk-padding">
                <div class="bg-primary uk-padding-small border uk-box-shadow-medium uk-flex uk-flex-middle" style="height:32px;">
                    <img src="{{asset('theme-assets/img/icon/call.png')}}" height="26" width="26" alt="" class="uk-margin-right">
                    <div>
                        <p class="text-white fw-500 uk-margin-remove f-14">
                            {{$setting->phone}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-text-center" uk-scrollspy="target: img,a,p; cls: uk-animation-fade; delay: 200;"> 
            <p>Follow Us On Social Media</p>
            <img src="{{asset('theme-assets/img/blue-line.png')}}" class="uk-margin-bottom" alt="">
            <div>
                <a href="{{$setting->instagram_link}}" target="_blank" class="uk-icon-button uk-margin-small-right bg-primary text-white" uk-icon="instagram"></a>
                <a href="{{$setting->facebook_link}}" target="_blank" class="uk-icon-button  uk-margin-small-right bg-primary text-white" uk-icon="facebook"></a>
                <a href="{{$setting->youtube_link}}" target="_blank" class="uk-icon-button bg-primary text-white" uk-icon="youtube"></a>
            </div>
        </div>
        <div class="uk-grid uk-grid-collapse uk-grid-match uk-margin-top uk-child-width-1-2@m">
            <div class="uk-margin-top">
                {!! $setting->google_map !!}
            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44668.49294806555!2d85.3261328!3d27.708960349999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e1!3m2!1sen!2snp!4v1733741373198!5m2!1sen!2snp" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
            </div>
            <div class="bg-contour uk-padding uk-margin-top">
            <form action="{{route('contact')}}" method="POST" class="uk-grid-small" uk-grid uk-scrollspy="target: div; cls: uk-animation-slide-top-medium; delay: 200;">
                @csrf    
                <div class="uk-width-1-2@s">
                        <label class="uk-form-label text-white" for="Name">Full Name:</label>
                        <input class="uk-input border" name="full_name" type="text" aria-label="Name">  
                    </div>
                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label text-white" for="Contact">Contact:</label>
                        <input class="uk-input border" name="number" type="number" aria-label="Contact">
                    </div>
                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label text-white" for="Email">Email:</label>
                        <input class="uk-input border" name="email" type="email" aria-label="Email">
                    </div>
              
                    <div class="uk-width-1-2@s">
                        <label class="uk-form-label text-white" for="Email">Country:</label>
                        <select name="country" class="uk-select border" id="form-stacked-select">
                        @include('themes.default.common.country')
                        </select>
                    </div>
                    <div class="uk-width-1-1@s">
                        <label class="uk-form-label text-white" for="adventure">Trip Interested In:</label>
                        <select name="trip" class="uk-select border" id="form-stacked-select">
                            <option selected>--Select Trip--</option>
                            @if($trips->count() > 0)
                            @foreach ($trips as $value)
                            <option value="{{$value->id}}">{{$value->trip_title}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                
                    <div class="uk-width-1-1">
                        <textarea class="uk-textarea border" name="comments"  rows="5" placeholder="Message" aria-label="Message"></textarea>
                    </div>
                    <div class="uk-width-1-1 uk-text-center uk-margin-top">
                        <button type="submit" class="bg-light text-primary uk-form-btn ">SUBMIT</button>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
