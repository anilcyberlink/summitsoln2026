@extends('themes.default.common.master')
@section('content')

<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom  uk-330" alt="" uk-img>
    <div class="uk-overlay-banner bg-primary uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a></li>
            @if(!empty($booking))
                <li>
                    <span class="text-secondary uk-text-bold">
                        {{ $booking->activities->isNotEmpty() ? strtoupper($booking->activities[0]->activity_parent) : '' }}
                    </span>
                </li>
            @endif
        </ul>
        <h2 class="text-secondary uk-margin-remove">
            @if(!empty($booking))
                Booking Form For {{ $booking->trip_title }}
            @else
                Booking Form
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
                <form action="{{route('post-booknow')}}" uk-scrollspy="target: h3,hr,div; cls: uk-animation-slide-top-medium; delay: 70;" method="post">
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
                        @if (!empty($booking))
                            <div class="uk-width-1-1 uk-margin-small-top">
                                <label class="uk-form-label text-primary" for="type">Activity Type </label>
                                <select class="uk-select border" style="cursor:not-allowed" name="activity_type" readonly>
                                    <option value="{{ $activity->activity_parent }}">{{ ucfirst($activity->activity_parent) }}</option>
                                </select>
                            </div>
                            <div class="uk-width-1-1 uk-margin-small-top">
                                <label class="uk-form-label text-primary" for="activity">Activity Package Name *</label>
                                <select class="uk-select border" style="cursor:not-allowed" name="trip" readonly>
                                    <option value="{{$booking->id}}">{{ $booking->trip_title }}</option>
                                </select>
                            </div>
                            <div class="uk-width-1-2@s uk-margin-small-top">
                                <label class="uk-form-label text-primary" for="start">Trip Start Date *</label>
                                @if (!empty($start_date))
                                    <input class="uk-input border" type="date" aria-label="start" name="start_date" value="{{$start_date}}" style="cursor:not-allowed" required readonly>
                                    <input type="hidden" id="custom" name="custom" value=""/>
                                @else
                                    <input class="uk-input border" name="start_date" type="date" aria-label="start" required>
                                    <input type="hidden" id="custom" name="custom" value="Custom"/>
                                @endif
                            </div>
                            <div class="uk-width-1-2@s uk-margin-small-top">
                                <label class="uk-form-label text-primary" for="end">Trip End Date *</label>
                                @if (!empty($end_date))
                                    <input class="uk-input border" type="date" aria-label="end" name="end_date" value="{{$end_date}}" style="cursor:not-allowed" required readonly>
                                    <input type="hidden" id="custom" name="custom" value=""/>
                                @else
                                    <input class="uk-input border" name="end_date" type="date" aria-label="end" required>
                                    <input type="hidden" id="custom" name="custom" value="Custom"/>
                                @endif
                            </div>
                        @else
                            <div class="uk-width-1-1 uk-margin-small-top">
                                <label class="uk-form-label text-primary" for="type">Activity Type </label>
                                <select class="uk-select border" name="activity_type" id="type">
                                    <option value="">Select Activity</option>
                                    <option value="activity">Activity</option>
                                    <option value="expedition">Expedition</option>
                                    <option value="trekking">Trekking</option>
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
                            <div class="uk-width-1-2@s uk-margin-small-top">
                                <label class="uk-form-label text-primary" for="start">Trip Start Date *</label>
                                <input class="uk-input border" name="start_date" type="date" aria-label="start" required>
                            </div>
                            <div class="uk-width-1-2@s uk-margin-small-top">
                                <label class="uk-form-label text-primary" for="end">Trip End Date *</label>
                                <input class="uk-input border" name="end_date" type="date" aria-label="end" required>
                            </div>
                            <input type="hidden" id="custom" name="custom" value="Custom"/>
                        @endif
                        <div class="uk-width-1-2@s uk-margin-small-top">
                            <label class="uk-form-label text-primary" for="people">No of People *</label>
                            <input class="uk-input border" name="peoples" type="number" aria-label="people" required>
                        </div>
                        <div class="uk-width-1-1 uk-margin-small-top">
                            <label class="uk-form-label text-primary" for="Message">Extra Requirement</label>
                            <textarea class="uk-textarea border" rows="5" name="requirement" placeholder="Message" aria-label="Message"></textarea>
                        </div>
                    </div>
                  
                     <div class="uk-width-1-1 uk-margin-top">
                        <button type="submit" class="uk-btn1 uk-btn-primary-outline">Submit <span uk-icon="chevron-right"></span></button>
                    </div>
                </form>
            </div>
            @include('themes/default/common/sidebar')
        </div>
        <div id="my-id"></div>
    </div>
</section>
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
<!-- form section end -->
@stop
