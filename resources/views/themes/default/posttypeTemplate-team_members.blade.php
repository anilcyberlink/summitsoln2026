@extends('themes.default.common.master')
@section('title', $data->post_type)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->banner)
@section('content')

<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{$data->banner ? asset('uploads/original/' . $data->banner) : asset('theme-assets/img/banner/bg-1.jpeg')}}" alt="{{$data->post_type}}" uk-img>
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a></li>
            <li><span class="text-secondary uk-text-bold">{{$data->post_type}}</span></li>
        </ul>
        <h2 class="text-secondary uk-margin-remove"> {{$data->post_type}}</h2>
    </div>
</section>
<!-- banner section end -->

<!-- banner section end -->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="{{$data->post_type}}">   
</div>
<!-- list section start -->
<section class="uk-section ">
    <div class="uk-container" uk-scrollspy="target: li; cls: uk-animation-fade; delay: 100;">
        <ul class="uk-subnav uk-subnav-pill uk-flex-center" uk-switcher="animation: uk-animation-slide-left-medium">
            @foreach ($team_category as $item)
                <li><a href="#" class="uk-team-pill">{{$item->category}}</a></li>
            @endforeach
        </ul>

        <div class="uk-switcher uk-margin">
        @if($team_category->count()>0)
        @foreach($team_category as $category)
                <div class="uk-child-width-1-2@m  uk-child-width-1-4@l uk-grid uk-grid-small" uk-scrollspy="target: .team-div; cls: uk-animation-slide-left-small; delay: 100;">
               
                @foreach($related_teams[$category->id] ?? [] as $team)
                            <div class="uk-margin-top team-div">
                                 <a href="{{ url('team/'.team_url($team['uri'], $team['team_key'])) }}">
                                    <div class="uk-inline uk-330">
                                        <img src="{{ asset('uploads/team/' . $team->thumbnail) }}" class="border" width="1800" height="1200" alt="{{$team->name}}">
                                        <div class="uk-overlay-primary uk-position-cover border"></div>
                                        <div class="uk-overlay uk-position-bottom  uk-padding-small uk-flex uk-flex-between uk-flex-middle">
                                            <div>
                                                <h3 class="text-secondary uk-margin-remove">{{$team->name}}</h3>
                                                <p class="uk-margin-remove text-white">{{$team->position}}</p>
                                            </div>
                                              <a href="{{ url('team/'.team_url($team['uri'], $team['team_key'])) }}" class="text-primary  fw-500"> <span class="uk-icon-button  uk-margin-small-left bg-primary text-white" uk-icon="forward"></span></a>  
                                        </div> 
                                    </div>
                                </a>
                            </div>
                        @endforeach 
                   
                </div>
                @endforeach
                @endif
        </div>
    </div>
</section>

<!-- list section end -->
@endsection
