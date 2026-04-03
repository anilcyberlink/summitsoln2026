@extends('themes.default.common.master')
@section('content')
<!-- start section -->
<section class="uk-section uk-booking bg-white uk-position-relative" style="background:#3f3e3e!important;">
    <div class="uk-container uk-container-small"
        uk-scrollspy="target:[uk-scrollspy-class], img, h1, h2, h3, h4, h5, h6, hr, .uk-button, li, p; cls: uk-animation-slide-top-small; delay: 50; repeat: false;" style="padding-top:2rem;">
        <div class="uk-text-center uk-card uk-card-default uk-card-body uk-border-rounded">
            <i class="fa fa-check fa-2x uk-text-success" aria-hidden="true"></i>
            <h2 class="uk-text-bold uk-text-success">Booking Success!</h2>
            <h1 class="uk-h4  uk-margin-remove">Dear<b> {{$name}}</b>{!!$message!!}</h1>
            <hr class="uk-divider-icon">
            <p><b>Best Wishes</b>
            {{-- <br>{{$setting->site_name}} --}}
            </p>
            <div>
                <a href="{{url('/')}}" class="uk-button uk-button-primary">Home</a>
            </div>
        </div>
    </div>
</section>
<!--end section  -->
@stop