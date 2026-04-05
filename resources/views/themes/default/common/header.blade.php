<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@hasSection('meta_keyword') @yield('meta_keyword') - @endif {{$setting->site_name}}</title>
     <meta name="title" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">
    <script src="{{asset('theme-assets/js/main.js')}}"></script>
    <link rel="stylesheet" href="{{asset('theme-assets/css/uikit.css')}}">
    <link rel="stylesheet" href="{{asset('theme-assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('theme-assets/css/global.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.18/dist/lenis.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!---------------- Fav icon starts --------------------->
    	<!--<link rel="shortcut icon" href="{{asset('images/favicon.png')}}">-->
    	<!--<link rel="apple-touch-icon-precomposed" href="{{asset('images/favicon.png')}}">-->
    	<!-- Icon code update by sangam since the previous was not wroking properly. And OS specific favicon code are added ----->
    	<link rel="icon" type="image/x-icon" href="{{asset('assets/favicon/favicon.ico')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon/favicon-16x16.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/favicon/android-chrome-192x192.png')}}">
        <link rel="icon" type="image/png" sizes="512x512" href="{{asset('assets/favicon/android-chrome-512x512.png')}}">
        <link rel="apple-touch-icon" href="{{asset('assets/favicon/apple-touch-icon.png')}}">
        <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}">
    <!---------------- Fav icon stops ----------------------->

    <meta property="og:type" content="website"/>
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:site_name" content="{{$setting->site_name}}"/>
    <meta property="og:description" content="@yield('meta_description')"/>
    @if (trim($__env->yieldContent('thumbnail')))
	   <meta property="og:image" content="{{ asset('uploads/original/' ) }}/@yield('thumbnail')" />
	@else
	   <meta property="og:image" content="{{asset('theme-assets/images/favicon.png')}}" />
	@endif
    <meta property="og:image:width" content="1000"/>
    <meta property="og:image:height" content="600"/>
    @if (trim($__env->yieldContent('thumbnail')))
    <meta name="twitter:image" content="{{ asset('uploads/original/' ) }}/@yield('thumbnail')"/>
    @else
    <meta property="twitter:image" content="{{ asset('theme-assets/images/logo.png') }}"/>
    @endif
    <meta name="twitter:url" content="{{url()->current()}}">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('meta_description')">
    <meta name="twitter:card" content="summary_large_image"/>
    <script src="https://unpkg.com/lottie-web@5.10.2/build/player/lottie.min.js"></script>
     <meta name="google-site-verification" content="CPzV52xVx7fgob5gElg8md9t-u2NXSEkEUKAo6Uh3Z8" />
     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JSBZLKSRMH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JSBZLKSRMH');
</script>

    <style>
        /********* google captcha *********/
      .grecaptcha-badge{
          display: none!important;
      }
    </style>
    <style>
        /* Custom notification styles */
        .uk-notification-message-danger {
            background-color: #ffebee !important;
            color: #c62828 !important;
            border-left: 4px solid #d32f2f !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
        }
        .uk-notification-message-danger .uk-notification-close {
            color: #c62828 !important;
        }
        .uk-notification-message-danger:hover {
            background-color: #ffcdd2 !important;
        }

        .uk-notification-message-success {
            background-color: #e8f5e9 !important;
            color: #2e7d32 !important;
            border-left: 4px solid #4caf50 !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
        }
        .uk-notification-message-success .uk-notification-close {
            color: #2e7d32 !important;
        }
        .uk-notification-message-success:hover {
            background-color: #c8e6c9 !important;
        }

        .uk-notification-message-warning {
            background-color: #fff3e0 !important;
            color: #ff9800 !important;
            border-left: 4px solid #ffb74d !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
        }
        .uk-notification-message-warning .uk-notification-close {
            color: #ff9800 !important;
        }
        .uk-notification-message-warning:hover {
            background-color: #ffe0b2 !important;
        }

        .uk-notification-message-info {
            background-color: #e3f2fd !important;
            color: #1976d2 !important;
            border-left: 4px solid #64b5f6 !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
        }
        .uk-notification-message-info .uk-notification-close {
            color: #1976d2 !important;
        }
        .uk-notification-message-info:hover {
            background-color: #bbdefb !important;
        }

        /* Ensure the notification container is positioned correctly */
        .uk-notification {
            top: 10px !important; /* Adjust as needed */
            right: 10px !important; /* Adjust as needed */
            z-index: 100000 !important;
        }
    </style>
</head>
<body>
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @foreach ($errors->all() as $index => $error)
                    setTimeout(function() {
                        showNotification("{{ $error }}", 'danger');
                    }, {{ $index * 300 }}); // 300ms delay between each notification
                @endforeach
            });

            function showNotification(message, status) {
                UIkit.notification({
                    message: message,
                    status: status,
                    pos: 'top-right',
                    timeout: 5000,
                    click: true
                });
            }
        </script>
    @endif
    @if(session('success') || session('warning') || session('info') || session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if(session('success'))
                    showNotification("{{ session('success') }}", 'success');
                @endif
                @if(session('warning'))
                    showNotification("{{ session('warning') }}", 'warning');
                @endif
                @if(session('info'))
                    showNotification("{{ session('info') }}", 'info');
                @endif
                @if(session('error'))
                    showNotification("{{ session('error') }}", 'danger');
                @endif
            });

            function showNotification(message, status) {
                UIkit.notification({
                    message: message,
                    status: status,
                    pos: 'top-right',
                    timeout: 5000
                });
            }
        </script>
    @endif
    <!-- Header start -->
    <div id="preloader" class="preloader uk-flex uk-flex-middle uk-flex-center">
         <!--<div class="loader"> <img src="{{asset('theme-assets/img/data.html')}}"> </div>-->
            <div id="lottie-animation" style="width:200px; height:300px;"></div>

            <script>
              var animation = lottie.loadAnimation({
                container: document.getElementById('lottie-animation'), // the dom element
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path:"{{asset('theme-assets/img/data.json')}}"// path to your animation file
              });
            </script>
    </div>


    <header class="uk-position-top">
        <div class="uk-main-header uk-navbar-container uk-navbar-transparent uk-visible@l" uk-sticky="top: 100; animation: uk-animation-slide-top-medium;" style="z-index:1000;">
            <div class="uk-container">
                <nav class="uk-navbar uk-position-relative" uk-navbar uk-scrollspy="target:.uk-navbar-item , .uk-logo; cls: uk-animation-slide-top-medium;   delay: 50; repeat: true;">
                    <div class="uk-navbar-left">
                        <a class=" uk-logo" href="{{ url('/') }}"> <img src="{{asset('theme-assets/img/logo-white.png')}}" class="uk-logo-white" width="180" alt=""></a>
                        <a class=" uk-logo" href="{{ url('/') }}"> <img src="{{asset('theme-assets/img/logo-dark.png')}}" class="uk-logo-dark" width="180" alt="">
                            <img src="{{asset('theme-assets/img/logo-dark.png')}}" alt="" class="uk-logo-primary"></a>
                    </div>
                    <div class="uk-navbar-right">
                        <div class="uk-navbar-item text-white f-18">
                            <ul class="uk-navbar-nav uk-position-relative">
                                <li>
                                    <a href=""> Company <span uk-navbar-parent-icon></span></a>
                                    <div class="uk-dropbar uk-dropbar-top uk-pattern-bg" style="background-color: #2A2929;" uk-drop="boundary:!.uk-main-header-transparent; stretch: x; flip: false; animation: reveal-top; delay-hide: 10; duration: 700;">
                                        <div class="line_wrap">
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                        </div>
                                        <div>
                                            <div class="uk-child-width-1-3 uk-grid uk-flex uk-flex-middle">
                                                <div>
                                                    <ul class="uk-navbar-ul">
                                                        @foreach ($post_types->take(4) as $item)
                                                            <li><a href="{{route('page.posttype_detail',$item->uri)}}">{{$item->post_type}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div>
                                                    <ul class="uk-navbar-ul">
                                                        @foreach ($post_types->skip(4) as $item)
                                                            <li><a href="{{route('page.posttype_detail',$item->uri)}}">{{$item->post_type}}</a></li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                                <div class="uk-padding-remove">
                                                    <div class="uk-grid uk-grid-collapse uk-flex uk-flex-center">
                                                        <div class="uk-width-1-2" style="padding:4px;">
                                                            <img src="{{ ($setting->usa_address) ? asset('uploads/'.$setting->usa_address) : asset('theme-assets/img/expedition.png') }}" class="uk-200 border" loading="lazy" alt="">
                                                        </div>
                                                        <div class="uk-width-1-2" style="padding:4px;">
                                                            <div><img src="{{ ($setting->usa_phone) ? asset('uploads/'.$setting->usa_phone) : asset('theme-assets/img/slider3.jpeg')}}" class="uk-200 border" loading="lazy" alt=""></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{ route('tour')}}"> Destination <span uk-navbar-parent-icon></span></a>
                                    <div class="uk-dropbar uk-dropbar-top uk-pattern-bg" style="background-color: #2A2929;" uk-drop="boundary:!.uk-main-header-transparent; stretch: x; flip: false; animation: reveal-top; delay-hide: 10; duration: 700;">
                                        <div class="line_wrap">
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                        </div>
                                        <div class="uk-slider-container-offset" uk-slider>
                                            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                                                <div class="uk-slider-items uk-child-width-1-3@l uk-child-width-1-2@m uk-grid">
                                                    @foreach ($destinations as $item )
                                                        <div>
                                                            <a href="{{ route('page.destinationtriplist', $item->uri) }}">
                                                                <div class="uk-inline uk-200">
                                                                    <img src="{{ asset('uploads/original/' . $item->thumbnail) }}" loading="lazy" class="border" alt="{{$item->title}}">
                                                                    <div class="uk-overlay-primary uk-position-cover border"></div>
                                                                    <div class="uk-overlay uk-position-center uk-light">
                                                                        <h3 class="text-secondary"> {{$item->title}}</h3>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a class="uk-position-center-left uk-position-small " href uk-slidenav-previous uk-slider-item="previous" style=" background:var(--primary); color:white; border-radius:100%;"></a>
                                                <a class="uk-position-center-right uk-position-small" href uk-slidenav-next uk-slider-item="next" style=" background:var(--primary); color:white; border-radius:100%;"></a>
                                            </div>
                                        </div>
                                        <div class="uk-text-center   uk-margin-top">
                                            <a href="{{ route('tour')}}" class="uk-btn uk-btn-white-outline ">View All <span uk-icon="chevron-right"></span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{ route('page.trekkinglist') }}"> Trekking <span uk-navbar-parent-icon></span></a>
                                    <div class="uk-dropbar uk-dropbar-top uk-pattern-bg" style="background-color: #2A2929;" uk-drop="boundary:!.uk-main-header-transparent; stretch: x; flip: false; animation: reveal-top; delay-hide: 10; duration: 700;">
                                        <div class="line_wrap">
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                        </div>
                                        <div class="uk-slider-container-offset" uk-slider>
                                            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                                                <div class="uk-slider-items uk-child-width-1-3@l uk-child-width-1-2@m uk-grid">
                                                    @foreach ($trekking as $item)
                                                        <div>
                                                            <a href="{{ route('trekking-list',$item->uri) }}">
                                                                <div class="uk-inline uk-200">
                                                                    <img src="{{ asset('uploads/icon/'.$item->thumbnail) }}" loading="lazy" class="border" alt="{{$item->title}}">
                                                                    <div class="uk-overlay-primary uk-position-cover border"></div>
                                                                    <div class="uk-overlay uk-position-center uk-light">
                                                                        <h3 class="text-secondary">{{$item->title}}</h3>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a class="uk-position-center-left uk-position-small " href uk-slidenav-previous uk-slider-item="previous" style=" background:var(--primary); color:white; border-radius:100%;"></a>
                                                <a class="uk-position-center-right uk-position-small" href uk-slidenav-next uk-slider-item="next" style=" background:var(--primary); color:white; border-radius:100%;"></a>
                                            </div>
                                        </div>
                                        <div class="uk-text-center   uk-margin-top">
                                            <a href="{{ route('page.trekkinglist') }}" class="uk-btn uk-btn-white-outline ">View All <span uk-icon="chevron-right"></span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{ route('page.expeditionlist') }}"> Expedition <span uk-navbar-parent-icon></span></a>
                                    <div class="uk-dropbar uk-dropbar-top uk-pattern-bg" style="background-color: #2A2929;" uk-drop="boundary:!.uk-main-header-transparent; stretch: x; flip: false; animation: reveal-top; delay-hide: 10; duration: 700;">
                                        <div class="line_wrap">
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                        </div>
                                        <div class="uk-slider-container-offset" uk-slider>
                                            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                                                <div class="uk-slider-items uk-child-width-1-3@l uk-child-width-1-2@m uk-grid">
                                                    @foreach ($expedition as $item)
                                                        <div>
                                                            <a href="{{ route('expedition-list',$item->uri) }}">
                                                                <div class="uk-inline uk-200">
                                                                    <img src="{{ asset('uploads/icon/'.$item->thumbnail) }}" loading="lazy" class="border" alt="{{ $item->title }}">
                                                                    <div class="uk-overlay-primary uk-position-cover border"></div>
                                                                    <div class="uk-overlay uk-position-center uk-light">
                                                                        <h3 class="text-secondary"> {{ $item->title }}</h3>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a class="uk-position-center-left uk-position-small " href uk-slidenav-previous uk-slider-item="previous" style=" background:var(--primary); color:white; border-radius:100%;"></a>
                                                <a class="uk-position-center-right uk-position-small" href uk-slidenav-next uk-slider-item="next" style=" background:var(--primary); color:white; border-radius:100%;"></a>
                                            </div>
                                        </div>
                                        <div class="uk-text-center   uk-margin-top">
                                            <a href="{{ route('page.expeditionlist') }}" class="uk-btn uk-btn-white-outline ">View All <span uk-icon="chevron-right"></span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{ route('page.activitylist') }}">Activities <span uk-navbar-parent-icon></span></a>
                                    <div class="uk-dropbar uk-dropbar-top uk-pattern-bg" style="background-color: #2A2929;" uk-drop="boundary:!.uk-main-header-transparent; stretch: x; flip: false; animation: reveal-top; delay-hide: 10; duration: 700;">
                                        <div class="line_wrap">
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                        </div>
                                        <div class="uk-slider-container-offset" uk-slider>
                                            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                                                <div class="uk-slider-items uk-child-width-1-3@l uk-child-width-1-2@m uk-grid">
                                                    @foreach ($activity as $row)
                                                        <div>
                                                            @if($row->external_link)
                                                                <a href="{{$row->external_link}}">
                                                            @else
                                                                <a href="{{ route('page.activitydetail', $row->uri) }}">
                                                            @endif
                                                                <div class="uk-inline uk-200">
                                                                    <img src="{{ asset('uploads/icon/'.$row->thumbnail) }}" loading="lazy" class="border" alt="{{ $row->title }}">
                                                                    <div class="uk-overlay-primary uk-position-cover border"></div>
                                                                    <div class="uk-overlay uk-position-center uk-light">
                                                                        <h3 class="text-secondary">{{ $row->title }}</h3>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                    <div>
                                                        <a href="{{route('page.posttype_detail',$training->uri)}}">
                                                            <div class="uk-inline uk-200">
                                                                <img src="{{ asset('uploads/original/'.$training->banner) }}" loading="lazy" class="border" alt="{{ $training->post_type }}">
                                                                <div class="uk-overlay-primary uk-position-cover border"></div>
                                                                <div class="uk-overlay uk-position-center uk-light">
                                                                    <h3 class="text-secondary">{{ $training->post_type }}</h3>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <a class="uk-position-center-left uk-position-small " href uk-slidenav-previous uk-slider-item="previous" style=" background:var(--primary); color:white; border-radius:100%;"></a>
                                                <a class="uk-position-center-right uk-position-small" href uk-slidenav-next uk-slider-item="next" style=" background:var(--primary); color:white; border-radius:100%;"></a>
                                            </div>
                                        </div>
                                        <div class="uk-text-center   uk-margin-top">
                                            <a href="{{ route('page.activitylist') }}" class="uk-btn uk-btn-white-outline ">View All <span uk-icon="chevron-right"></span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    @php
                                    $itemUri = 'cms-pages';
                                    @endphp
                                    <a href="{{route('page.posttype_detail',$itemUri)}}"> CMS Pages <span uk-navbar-parent-icon></span></a>
                                    <div class="uk-dropbar uk-dropbar-top uk-pattern-bg " style="background-color: #2A2929;" uk-drop="boundary:!.uk-main-header-transparent; stretch: x; flip: false; animation: reveal-top; delay-hide: 10; duration: 700;">
                                        <div class="line_wrap">
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                            <div class="line_item"></div>
                                        </div>
                                        <div>
                                            <div class="uk-child-width-1-3 uk-grid uk-flex uk-flex-middle">
                                                <div>
                                                    <ul class="uk-navbar-ul">
                                                        @foreach ($cmspages_posts->take(2) as $row)
                                                            <li><a href="{{ url('page/' . geturl($row->uri, $row->page_key)) }}">{{$row->post_title}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div>
                                                    <ul class="uk-navbar-ul">
                                                        @foreach ($cmspages_posts->skip(2) as $row)
                                                            <li><a href="{{ url('page/' . geturl($row->uri, $row->page_key)) }}">{{$row->post_title}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="uk-padding-remove">
                                                    <div class="uk-grid uk-grid-collapse uk-flex uk-flex-center">
                                                        <div class="uk-width-1-2" style="padding:4px;">
                                                            <img src="{{ ($setting->usa_address) ? asset('uploads/'.$setting->usa_address) : asset('theme-assets/img/expedition.png') }}" class="uk-200 border" loading="lazy" alt="">
                                                        </div>
                                                        <div class="uk-width-1-2" style="padding:4px;">
                                                            <div><img src="{{ ($setting->usa_phone) ? asset('uploads/'.$setting->usa_phone) : asset('theme-assets/img/expedition.png') }}" class="uk-200 border" loading="lazy" alt=""></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @if($setting->fax)
                            <div class="uk-margin-medium-left uk-flex"><i class="fa fa-phone uk-margin-small-right" aria-hidden="true"></i><p class="uk-margin-remove">{{$setting->fax}}</p></div>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="uk-main-header uk-navbar-container uk-navbar-transparent uk-hidden@l" uk-sticky="top: 100; animation: uk-animation-slide-top-medium;" style="z-index:1000;">
            <div class="uk-container">
                <nav class="uk-navbar uk-position-relative" uk-navbar uk-scrollspy="target:.uk-navbar-item , .uk-logo; cls: uk-animation-slide-top-medium;   delay: 50; repeat: true;">
                    <div class="uk-navbar-left">
                        <a class=" uk-logo" href="{{ url('/') }}"> <img src="{{asset('theme-assets/img/logo-white.png')}}" class="uk-logo-white" width="180" alt="">
                        <a class=" uk-logo" href="{{ url('/') }}"> <img src="{{asset('theme-assets/img/logo-dark.png')}}" class="uk-logo-dark" width="180" alt="">
                        <img src="{{asset('theme-assets/img/logo-dark.png')}}" alt="" class="uk-logo-primary" >
                    </div>
                    <div class="uk-navbar-right">
                        <div class="uk-navbar-item text-white f-18">
                            <span class="uk-menu-toggles">MENU</span><a uk-toggle="target: #uk-menu; animation: uk-animation-slide-top ; queued: false; duration: 600" class="toggle"> <span></span> <span></span> </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div id="uk-menu" hidden class="uk-fixed-menu uk-position-fixed bg-black uk-hidden@l" uk-height-viewport>
        <div class="uk-container">
            <div class="line_wrap">
                <div class="line_item"></div>
                <div class="line_item"></div>
                <div class="line_item"></div>
                <div class="line_item"></div>
                <div class="line_item"></div>
            </div>
            <div class="uk-menu-container ">
                <div class="uk-header-mobile " uk-header="">
                    <div class="uk-height-min-1-1 uk-flex uk-flex-column">
                        <div class="uk-margin-auto-bottom">
                            <div class="uk-grid uk-child-width-1-1 uk-grid-stack" uk-grid="">
                                <div>
                                    <div class="uk-panel">
                                        <ul class="uk-nav uk-nav-primary  uk-nav-divider uk-nav-accordion uk-margin-top" uk-nav="targets: > .js-accordion">
                                            <!-- <li><a href="index.php">Company</a></li> -->
                                            <li class="js-accordion uk-parent"> <a href="" aria-expanded="false">
                                                    Company <span uk-nav-parent-icon="" class="uk-icon uk-nav-parent-icon"></span>
                                                </a>
                                                <ul class="uk-nav-sub">
                                                    @foreach ($post_types as $item)
                                                        @if($item->uri!='cms-pages')
                                                            <li><a href="{{route('page.posttype_detail',$item->uri)}}">{{$item->post_type}}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li class="js-accordion uk-parent"> <a href="{{ route('tour')}}" aria-expanded="false">
                                                    Destination <span uk-nav-parent-icon="" class="uk-icon uk-nav-parent-icon"></span>
                                                </a>
                                                <ul class="uk-nav-sub">
                                                    @foreach ($destinations as $item )
                                                        <li><a href="{{ route('page.destinationtriplist', $item->uri) }}">{{$item->title}}</a></li>
                                                    @endforeach
                                                    <li><a href="{{ route('tour')}}"> View All</a></li>
                                                </ul>
                                            </li>
                                            <li class="js-accordion uk-parent"> <a href="{{ route('page.trekkinglist') }}" aria-expanded="false"> Trekking
                                                    <span uk-nav-parent-icon="" class="uk-icon uk-nav-parent-icon"></span>
                                                </a>
                                                <ul class="uk-nav-sub">
                                                    @foreach ($trekking as $item)
                                                        <li><a href="{{ route('trekking-list',$item->uri) }}">{{$item->title}}</a></li>
                                                    @endforeach
                                                    <li><a href="{{ route('page.trekkinglist') }}"> View All</a></li>
                                                </ul>
                                            </li>
                                            <li class="js-accordion uk-parent"> <a href="{{ route('page.expeditionlist') }}" aria-expanded="false"> Expedition
                                                    <span uk-nav-parent-icon="" class="uk-icon uk-nav-parent-icon"></span>
                                                </a>
                                                <ul class="uk-nav-sub">
                                                    @foreach ($expedition as $item)
                                                        <li><a href="{{ route('expedition-list',$item->uri) }}">{{ $item->title }}</a></li>
                                                    @endforeach
                                                    <li><a href="{{ route('page.expeditionlist') }}"> View All</a></li>
                                                </ul>
                                            </li>
                                            <li class="js-accordion uk-parent"> <a href="{{ route('page.activitylist') }}" aria-expanded="false"> Activities
                                                    <span uk-nav-parent-icon="" class="uk-icon uk-nav-parent-icon"></span>
                                                </a>
                                                <ul class="uk-nav-sub">
                                                    @foreach ($activity as $row)
                                                        <li>
                                                            @if($row->external_link)
                                                                <a href="{{$row->external_link}}">
                                                            @else
                                                                <a href="{{ route('page.activitydetail', $row->uri) }}">
                                                            @endif
                                                        {{ $row->title }}</a></li>
                                                    @endforeach
                                                    <li><a href="{{ route('page.activitylist') }}"> View All</a></li>
                                                </ul>
                                            </li>
                                            <li class="js-accordion uk-parent"> <a href="{{route('page.posttype_detail',$itemUri)}}" aria-expanded="false">
                                                    CMS PAGES <span uk-nav-parent-icon="" class="uk-icon uk-nav-parent-icon"></span>
                                                </a>
                                                <ul class="uk-nav-sub">
                                                    @foreach ($cmspages_posts as $row)
                                                        <li><a href="{{ url('page/' . geturl($row->uri, $row->page_key)) }}">{{$row->post_title}}</a></li>
                                                    @endforeach
                                                    <li><a href="{{route('page.posttype_detail',$itemUri)}}"> View All</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header end -->
