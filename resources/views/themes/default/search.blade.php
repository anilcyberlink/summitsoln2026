@extends('themes.default.common.master')
@section('title','Expedition List')
@section('content')
<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom  uk-330" alt="" uk-img>
    <div class="uk-overlay-banner bg-primary uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a></li>
            <li><span class="text-secondary uk-text-bold">Search Results</span></li>
        </ul>
        <h2 class="text-secondary uk-margin-remove">Search Results for {{$content_search}}</h2>
    </div>
</section>
<!-- banner section end -->

<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>
<!-- list section start -->
<section class="uk-section">
	<div class="uk-container uk-banner-search">
		<form id="searchForm" action="{{route('search-all')}}" method="post">
			@csrf
			<div class="uk-flex uk-flex-row@m uk-flex-column uk-search-grid">
				<div class="uk-width-5-6@m uk-padding-remove-left">
					<input name="search" class="uk-input" type="text" placeholder="Search your trip here...." aria-label="Input" style="height:45px !important;" value={{$content_search}}>
				</div>
				<div class="uk-width-1-6@m search-btn uk-flex uk-flex-middle uk-flex-center">
					<a href="#" onclick="document.getElementById('searchForm').submit();" class="text-white">SEARCH <span uk-icon="triangle-right"></span></a>
				</div>
			</div>
		</form>
	</div>
	<section class="uk-section">
		<div class="uk-container">
			<div class=" uk-child-width-1-4@s uk-grid uk-grid-small uk-grid-match" uk-scrollspy=" cls: uk-animation-slide-left-small; delay: 200;" uk-height-match="target: .list-text">
				@foreach ($trip as $item)
					<div class="uk-margin-medium-bottom">
						<div class="uk-card uk-card-default bg-primary border">
							<a href="{{ url('page/' . tripurl($item->uri)) }}">
								<div class="uk-card-media-top uk-160">
									<img src="{{ $item->thumbnail ? asset('uploads/original/'.$item->thumbnail) : asset('theme-assets/img/slider1.jpeg')}}" loading="lazy" alt="{{$item->trip_title}}" class="border">
								</div>
							</a>
							<div class="uk-card-body uk-padding-small border bg-primary">
								<div class="list-text">
									<h3 class="uk-card-title text-white">{{$item->trip_title}}</h3>
									<div class="uk-grid uk-grid-collapse">
										<div class="uk-package-badge">{{$item->duration}}</div> <div class="uk-package-badge uk-margin-vertical">{{$item->trip_grade ?  grade_message_trek($item->trip_grade) : 'Moderate'}}</div> <div class="uk-package-badge">{{$item->max_altitude}}</div>
									</div>
									<p class="text-white f-14 fw-500">{{$item->sub_title}}</p>
									<div>
										<a href="{{ url('page/' . tripurl($item->uri)) }}" class="uk-btn1 uk-btn-primary uk-width-1-1 uk-flex uk-flex-middle uk-flex-between p-btn">Learn More <span uk-icon="chevron-right"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			{!! $trip->links('themes.default.common.pagination') !!}
		</div>
	</section>
</section>
<!-- list section end -->
@stop