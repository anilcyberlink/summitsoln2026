@extends('themes.default.common.master')
@section('content')

<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom  uk-330" alt="" uk-img>
    <div class="uk-overlay-banner bg-primary uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a></li>
            @if(!empty($uri))
                <li>
                    <span class="text-secondary uk-text-bold">
                        {{ $trips->activities->isNotEmpty() ? strtoupper($trips->activities[0]->activity_parent) : '' }}
                    </span>
                </li>
            @endif
        </ul>
        <h2 class="text-secondary uk-margin-remove">
            @if(!empty($uri))
                Inquiry Form For {{ $trips->trip_title }}
            @else
                Inquiry Now
            @endif
        </h2>
    </div>
</section>
<!-- banner section end -->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>
<!-- form section start -->
<section class="uk-section">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-expand@m">
                <form action="{{route('post-inquiry')}}" uk-scrollspy="target: h3,hr,div; cls: uk-animation-slide-top-medium; delay: 70;" method="post">
                    @csrf
                    <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response"/>
                    <h3 class="text-primary">Personal Detail</h3>
                    <hr>
                    <div class="uk-grid">
                        <div class="uk-width-1-2@s uk-margin-small-top">
                            <label class="uk-form-label text-primary" for="name">Full Name *</label>
                            <input class="uk-input border" type="text" name="name" aria-label="name" required>
                        </div>
                        <div class="uk-width-1-2@s uk-margin-small-top">
                            <label class="uk-form-label text-primary" for="email">Email *</label>
                            <input class="uk-input border" type="email" name="email" aria-label="email" required>
                        </div>
                        <div class="uk-width-1-2@s uk-margin-small-top">
                            <label class="uk-form-label text-primary" for="contact">Contact *</label>
                            <input class="uk-input border" type="number" name="contact" aria-label="contact" required>
                        </div>
                        <div class="uk-width-1-2@s uk-margin-small-top">
                            <label class="uk-form-label text-primary" for="country">Country *</label>
                            <select class="uk-select border" id="country" name="country" required>
                                @include('themes/default/common/country')
                            </select>
                        </div>
                    </div>
                    <small><em>Fields marked with * are required.</em></small>
                    <h3 class="text-primary uk-margin-top">trip details</h3>
                    <hr>
                    <div class="uk-grid">
                        @if(!empty($uri))
                            <div class="uk-width-1-1 uk-margin-small-top">
                                <label class="uk-form-label text-primary" for="type">Activity Type </label>
                                <select class="uk-select border" style="cursor:not-allowed" name="activity_type" id="type" readonly>
                                    <option value="{{$activity->activity_parent}}">{{ucfirst($activity->activity_parent)}}</option>
                                </select>
                            </div>
                            <div class="uk-width-1-1 uk-margin-small-top">
                                <label class="uk-form-label text-primary" for="activity">Activity Package Name *</label>
                                <select class="uk-select border" style="cursor:not-allowed" id="trip" name="trip" required readonly>
                                    <option value="{{$trips->id}}">{{ucfirst($trips->trip_title)}}</option>
                                </select>
                            </div>
                        @else
                            <div class="uk-width-1-1 uk-margin-small-top">
                                <label class="uk-form-label text-primary" for="type">Activity Type </label>
                                <select class="uk-select border" name="activity_type" id="type">
                                    <option value="">Select Activity</option>
                                    <option value="activity">Activity</option>
                                    <option value="expedition">Expedition</option>
                                    <option value="trekking">Trekking</option>
                                    <option value="package">Training Packages</option>
                                </select>
                            </div>
                            <div class="uk-width-1-1 uk-margin-small-top">
                                <label class="uk-form-label text-primary" for="activity">Activity Package Name *</label>
                                <select class="uk-select border" id="trip" name="trip" required>
                                    <option disabled selected>Select Trips</option>
                                    @foreach ($trips as $item)
                                        <option value="{{$item->id}}">{{$item->trip_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="uk-width-1-1 uk-margin-small-top">
                            <label class="uk-form-label text-primary" for="Message">Your Message / Questions</label>
                            <textarea class="uk-textarea border" rows="5" name="message"  placeholder="Message" aria-label="Message" required></textarea>
                        </div>
                    </div>
                 
                     <div class="uk-width-1-1 uk-margin-top">
                        <button type="submit" class="uk-btn1 uk-btn-primary-outline">Submit<span uk-icon="chevron-right"></span></button>
                    </div> 
                </form>
            </div>
            @include('themes/default/common/sidebar')
        </div>
        <div id="my-id"></div>
    </div>
</section>
<!-- form section end -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var originalTrips = $('#trip').html();
        $('#type').change(function() {
            var activityType = $(this).val();

            if (activityType === "") {
                $('#trip').html(originalTrips);
            } else {
                $.ajax({
                    url: "{{ route('getTripsActivity') }}",
                    type: "GET",
                    data: { activity_type: activityType },
                    success: function(response) {
                        $('#trip').empty();
                        $('#trip').append('<option disabled selected>Select Trips</option>');

                        $.each(response, function(key, trip) {
                            $('#trip').append('<option value="' + trip.id + '">' + trip.trip_title + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>

@stop