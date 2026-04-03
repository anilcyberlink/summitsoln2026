@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->page_thumbnail)
@section('content')

<!-- banner section start -->
<section class=" uk-cover-container uk-position-relative uk-flex uk-flex-bottom uk-background-norepeat uk-background-cover uk-background-top-center uk-background-fixed" uk-height-viewport data-src="{{$data->page_thumbnail ? asset('uploads/original/'.$data->page_thumbnail) : asset('theme-assets/img/banner/bg-1.jpeg')}}" alt="" uk-img >
    <div class="uk-overlay-banner uk-position-cover"></div>
    <div class="uk-position-bottom-left uk-padding-large" uk-scrollspy="target: ul,h2,p; cls: uk-animation-slide-top-medium; delay: 800;">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" class="text-white uk-text-bold">Home</a></li>
            <li><span class="text-secondary uk-text-bold">{{$data->post_title}}</span></li>
        </ul>
        <h2 class="text-secondary uk-margin-remove">{{$data->sub_title}}</h2>
    </div>
</section>
<!-- banner section end -->
<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>

<section class="uk-section">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-expand@m">
                <ul class="uk-subnav uk-subnav-pill uk-flex uk-flex-center" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium" uk-scrollspy="target: li; cls: uk-animation-fade; delay: 100;">
                    <li><a href="#" class="uk-team-pill">FAQs</a></li>
                    {{-- <li><a href="#" class="uk-team-pill">Leaders</a></li>
                    <li><a href="#" class="uk-team-pill">Staffs</a></li>
                    <li><a href="#" class="uk-team-pill">Guides</a></li>
                    <li><a href="#" class="uk-team-pill">Trek Guides</a></li> --}}
                </ul>
                <div class="uk-switcher uk-margin-medium-top">
                    <div>
                        <ul uk-accordion uk-scrollspy="target: li; cls: uk-animation-slide-top-small; delay: 200;">
                            @foreach($associated_posts as $row)
                                @php
                                    $index = ($associated_posts->currentPage() - 1) * $associated_posts->perPage() + $loop->iteration;
                                @endphp
                                <li>
                                    <a class="uk-accordion-title f-16 fw-600 bg-light uk-padding-small border-left" href><span class="uk-margin-right">{{ $index }}</span>{{$row->title}}</a>
                                    <div class="uk-accordion-content  uk-padding-small ">
                                        <p>
                                            {!! $row->content !!}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        {!! $associated_posts->links('themes.default.common.pagination') !!}
                    </div>
                </div>
            </div>
            @include('themes/default/common/sidebar')
        </div>
        <div id="my-id"></div>
    </div>
</section>

@endsection
