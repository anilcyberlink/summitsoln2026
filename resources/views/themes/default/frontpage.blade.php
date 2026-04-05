@extends('themes.default.common.master')
@section('meta_keyword', trim(($setting->meta_title ?? '') . ', ' . ($setting->meta_key ?? ''), ', '))
@section('meta_description', $setting->meta_description)
@section('content')

<!--banner-section-start-->
<div uk-slideshow="animation: fade; autoplay: true;">
    <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
        <ul class="uk-slideshow-items" uk-height-viewport>
         @foreach ($banners as $item)
            <li>
                <div class="overlay"></div>
                <img src="{{$item->picture ? asset('uploads/banners/'.$item->picture) : asset('theme-assets/img/banner3.jpg')}}" alt="" loading="lazy" uk-cover>
                <div class="uk-position-center uk-banner-text  js-slideshow-animation uk-grid" style="width:100%;">
                    <div class="uk-width-3-5@m">
                        <div class="uk-container">
                            <h1 class="text-secondary" uk-slideshow-parallax="x: 100,-100" uk-scrollspy="cls: uk-animation-fade;  delay: 800; repeat: false">{{$item->title}}</h1>
                            <p uk-slideshow-parallax="x: 200,-200" uk-scrollspy="cls: uk-animation-fade;  delay: 800; repeat: false" class="text-white fw-600">
                              {{$item->caption}}
                            </p>
                            @if($item->link)
                                 <a href="{{$item->link}}" target="_blank" class="uk-btn uk-btn-primary" uk-scrollspy="cls: uk-animation-slide-top-medium;  delay: 800; repeat: false">Explore More<span uk-icon="chevron-right"></span></a>
                            @endif
                        </div>
                    </div>
                    <div class="uk-width-2-5@m uk-flex uk-flex-right uk-visible@m">
                        <div class="uk-banner-icon">
                            <a href="{{$setting->instagram_link}}" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="instagram"></a>
                            <a href="{{$setting->facebook_link}}" target="_blank" class="uk-icon-button  uk-margin-small-right" uk-icon="facebook"></a>
                            <a href="{{$setting->youtube_link}}" target="_blank" class="uk-icon-button" uk-icon="youtube"></a>
                        </div>
                    </div>
                </div>
            </li>
         @endforeach
        </ul>
        <div class="uk-position-bottom-center uk-flex">
            <a class="  uk-banner-arrow" href uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class=" uk-banner-arrow" href uk-slidenav-next uk-slideshow-item="next"></a>
        </div>
    </div>
    <!-- <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul> -->
</div>

<div class="uk-container uk-banner-search">
    <form id="searchForm" action="{{route('search-all')}}" method="post">
        @csrf
        <div class="uk-flex uk-flex-row@m uk-flex-column uk-search-grid">
            <div class="uk-width-5-6@m uk-padding-remove-left">
                <input name="search" class="uk-input" type="text" placeholder="Search your trip here...." aria-label="Input" style="height:45px !important;">
            </div>
            <div class="uk-width-1-6@m search-btn uk-flex uk-flex-middle uk-flex-center">
                <a href="#" onclick="document.getElementById('searchForm').submit();" class="text-white">SEARCH <span uk-icon="triangle-right"></span></a>
            </div>
        </div>
    </form>
</div>
<!--banner-section-end-->
<!--about-section-start-->
<section class="uk-section  uk-margin-horizontal uk-padding-remove-top uk-margin-medium-top">
    <div class="uk-container bg-temple">
        @if($whoweare)
            <div class="uk-text-section uk-text-center" uk-scrollspy="cls: uk-animation-fade;  delay: 100; repeat: false">
                <p class="text-secondary uk-text-uppercase uk-text-bold uk-margin-top">GET TO KNOW US</p>
                <h1 class="text-primary uk-margin-remove-top">{{$whoweare->post_title}}</h1>
                <img src="{{asset('theme-assets/img/blue-line.png')}}" loading="lazy" alt="underline-img">
            </div>
            <div class="uk-text-center@m uk-text-justify uk-margin-top" uk-scrollspy="cls: uk-animation-fade;  delay: 100; repeat: false">
                <p class="uk-text-italic text-black uk-text-bold">{{$whoweare->sub_title}}</p>
                <p class="text-black  fw-500 ">{!!$whoweare->post_content!!} </p>
            </div>
        @endif
    </div>
    <div class="uk-container uk-margin-large-top">
        <div class="uk-child-width-1-2@s uk-grid-small uk-flex uk-flex-center" uk-grid uk-scrollspy="target: .uk-position-center; cls: uk-animation-fade;  delay: 250; repeat: false">
         @foreach ($destination as $item)
            <div>
                <a href="{{ route('page.destinationtriplist', $item->uri) }}" class="uk-display-block uk-inline-clip uk-transition-toggle border ">
                    <div class="uk-inline uk-260">
                        <img src="{{ asset('uploads/original/' . $item->thumbnail) }}" loading="lazy" class="border uk-transition-scale-up uk-transition-opaque" alt="{{$item->title}}">
                        <div class="uk-overlay-primary uk-position-cover border"></div>
                        <div class="uk-overlay uk-position-center uk-light">
                            <h2 class="text-secondary"> {{$item->title}}</h2>
                        </div>
                    </div>
                </a>
            </div>
         @endforeach
        </div>
    </div>
    <div class="uk-text-center uk-margin-large-top">
        <a href="{{ route('tour')}}" class="uk-btn1 uk-btn-primary-outline">VIEW ALL DESTINATION<span uk-icon="chevron-right" class="uk-icon"></span></a>
    </div>
</section>
<!--about-section-end-->

<!--expedition-section-start-->
<section class="uk-section uk-position-relative uk-background-norepeat uk-background-cover expedition-section" data-src="{{asset('theme-assets/img/blue-bg.jpeg')}}" uk-parallax="bgx: -100; easing: 1;" uk-img>
    <div class="uk-overlay-blue uk-position-cover"></div>
    <div class="uk-overlay">
        <div class="uk-container uk-padding-remove">
            <div class="uk-grid uk-flex-middle" uk-scrollspy="cls: uk-animation-fade;  delay: 100; repeat: false">
                @if($expeditionParent)
                    <div class="uk-width-1-4@m">
                        <h2 class="text-secondary line-below uk-text-justify uk-margin-bottom">{{$expeditionParent->title}}</h2>
                    </div>
                    <div class="uk-width-3-4@m">
                      <p class="text-white" style="position:relative;">
                         {{$expeditionParent->excerpt}}
                      </p>
                    </div>
                @endif
            </div>
            <div class="uk-position-relative uk-visible-toggle " tabindex="-1" uk-slider uk-scrollspy="cls: uk-animation-slide-left-small;  delay: 200; repeat: false">
                <div class="uk-slider-items uk-child-width-1-1 uk-child-width-1-2@m uk-grid uk-margin-large-top">
                  @foreach ($expedition as $item )
                     <div>
                        <a href="{{ route('expedition-list',$item->uri) }}" class="uk-display-block uk-inline-clip uk-transition-toggle border ">
                           <div class="uk-panel uk-activities-slide uk-400">
                                 <img src="{{$item->thumbnail ? asset('uploads/icon/' . $item->thumbnail) : asset('theme-assets/img/slider1.jpeg')}}" loading="lazy" class="border uk-transition-scale-up uk-transition-opaque" alt="">
                                 <div class="uk-overlay-primary uk-position-cover border"></div>
                                 <div class="uk-overlay uk-position-bottom">
                                    <div>
                                       <h3 class="text-white">{{$item->title}}</h3>
                                       <p class="text-white">
                                          {{$item->excerpt}}
                                       </p>
                                       <a href="{{ route('expedition-list',$item->uri) }}" class="uk-btn uk-btn-primary">Learn More <span uk-icon="chevron-right"></span></a>
                                    </div>
                                 </div>
                           </div>
                        </a>
                     </div>
                  @endforeach
                </div>
                <a class="uk-position-center-left uk-position-small full-round uk-slider-arrow text-white" href uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small full-round uk-slider-arrow text-white" href uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </div>
    </div>
</section>
<!--expedition-section-end-->

<!-- Activities-section-start -->
<section class="uk-section">
    <div class="uk-container">
        <div class="uk-text-section uk-text-center" uk-scrollspy="cls: uk-animation-fade;  delay: 100; repeat: false">
            <h2 class="text-primary uk-margin-remove-top uk-margin-remove-bottom">Activities</h2>
            <img src="{{asset('theme-assets/img/blue-line.png')}}" loading="lazy" alt="underline-img">

           <p class="text-black fw-500">
              {!! $setting->fp_activity !!}
           </p>
        </div>

        <div class="uk-position-relative uk-visible-toggle " tabindex="-1" uk-slider uk-scrollspy="cls: uk-animation-slide-left-small;  delay: 200; repeat: false">
            <div class="uk-slider-items uk-child-width-1-1 uk-child-width-1-4@m uk-grid uk-margin-large-top">
               @foreach ($activity_list as $item)
                  <div>
                     @if($item->external_link)
                        <a href="{{$item->external_link}}" class="uk-display-block uk-inline-clip uk-transition-toggle border">
                     @else
                        <a href="{{ route('page.activitydetail', $item->uri) }}" class="uk-display-block uk-inline-clip uk-transition-toggle border" >
                     @endif
                        <div class="uk-panel uk-activities-slide uk-400">
                              <img src="{{asset('uploads/icon/'.$item->thumbnail)}}" class="border uk-transition-scale-up uk-transition-opaque" loading="lazy"  alt="{{$item->title}}">
                              <div class="uk-overlay-primary uk-position-cover border"></div>
                              <div class="uk-overlay uk-position-bottom uk-padding-small">
                                 <h3 class="text-secondary">{{$item->title}}</h3>
                              </div>
                              <div class="uk-overlay uk-position-top uk-padding-small">
                                 @if($item->external_link)
                                    <a href="{{$item->external_link}}" class="uk-icon-button uk-activities-icon">
                                 @else
                                    <a href="{{ route('page.activitydetail', $item->uri) }}" class="uk-icon-button uk-activities-icon">
                                 @endif
                                 {{ $loop->iteration }}
                                 </a>
                              </div>
                        </div>
                     </a>
                  </div>
               @endforeach
            </div>
            <div class="uk-flex uk-flex-right">
                <a class="uk-position-bottom-right uk-position-small full-round " href uk-slidenav-previous uk-slider-item="previous" style="position:relative!important; background:var(--primary);left: 18px !important; color:white;"></a>
                <a class="uk-position-bottom-right uk-position-small full-round " href uk-slidenav-next uk-slider-item="next" style="position:relative!important; background:var(--primary); color:white;"></a>
            </div>
        </div>
    </div>
</section>
<!-- Activities-section-end -->

<!-- Package-section-start -->
@if($sevenSummit)
<section class="uk-section uk-position-relative uk-background-norepeat uk-background-cover  uk-padding-remove-bottom" data-src="{{asset('theme-assets/img/banner/bg-2.jpeg')}}" uk-parallax="bgx: -100; easing: 0.5;" style="overflow:hidden;" uk-img>
    <div class="uk-overlay-blue uk-position-cover"></div>
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-1-5@m" uk-scrollspy="cls: uk-animation-fade;  delay: 200; repeat: false">
                <h2 class="text-secondary line-below  uk-margin-bottom">{{$sevenSummit->title}}</h2>
                <span class="text-white fw-500 uk-text-content" style="position:relative;">
                  {!!$sevenSummit->content!!}
                </span>
                <p>
            </div>
            @if($package_list->isNotEmpty())
               <div class="uk-width-4-5@m">
                  <div class="uk-slider-container-offset" uk-slider uk-scrollspy="cls: uk-animation-slide-left-small;  delay: 200; repeat: false">

                     <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" style="overflow:hidden;">
                           <div class="uk-slider-items uk-child-width-1-2@m uk-child-width-1-3@l uk-grid uk-grid-small uk-grid-match" uk-height-match="target: .list-text">
                              @foreach ($package_list as $item)
                                 <div>
                                    <div class="uk-card uk-card-default bg-primary border">
                                          <a href="{{ url('trip/' . tripurl($item->uri)) }}"  class="uk-display-block uk-inline-clip uk-transition-toggle uk-link-toggle uk-overflow-hidden border">
                                             <div class="uk-card-media-top uk-160" >
                                                <img src="{{$item->thumbnail ? asset('uploads/original/'.$item->thumbnail) : asset('theme-assets/img/mountain-1.jpeg')}}" loading="lazy" alt="" class="border uk-transition-scale-up uk-transition-opaque">
                                             </div>
                                          </a>
                                          <div class="uk-card-body uk-padding-small bg-primary">
                                              <div class="list-text">
                                                <h3 class="uk-card-title text-white">{{$item->trip_title}}</h3>
                                                    <div class="uk-grid uk-grid-collapse">
                                                        <div class="uk-package-badge">{{$item->duration}}</div> <div class="uk-package-badge uk-margin-vertical">{{$item->trip_grade ?  grade_message_trek($item->trip_grade) : 'Moderate'}}</div>  <div class="uk-package-badge">{{$item->max_altitude}}</div>
                                                    </div>
                                                    <p class="text-white f-14 fw-500 three-line uk-margin-remove-bottom">{{$item->sub_title}}</p>
                                              </div>
                                              <div class="uk-margin-small-top">
                                                  <a href="{{ url('trip/' . tripurl($item->uri)) }}" class="uk-btn1 uk-btn-primary uk-width-1-1 uk-flex uk-flex-middle uk-flex-between p-btn">Learn More <span uk-icon="chevron-right"></span></a>
                                              </div>
                                          </div>
                                    </div>
                                 </div>
                              @endforeach
                           </div>
                           <div class="uk-flex uk-flex-right">
                              <a class="uk-position-bottom-right uk-position-small full-round " href uk-slidenav-previous uk-slider-item="previous" style="position:relative!important; border: 1px solid var(--white); left: 16px;"></a>
                              <a class="uk-position-bottom-right uk-position-small full-round " href uk-slidenav-next uk-slider-item="next" style="position:relative!important; border: 1px solid var(--white);"></a>
                           </div>
                     </div>
                  </div>
               </div>
            @else
                <!--<p class="uk-text-center text-muted">Coming Soon...</p>-->
            @endif
        </div>
    </div>
</section>
@endif

<!-- Package-section-end -->
@if($packages->count()>0)
<section class="uk-section uk-position-relative uk-background-norepeat uk-background-cover  uk-padding-remove-bottom" data-src="{{asset('theme-assets/img/banner/bg-2.jpeg')}}" uk-parallax="bgx: -100; easing: 0.5;" style="overflow:hidden;" uk-img>
    <div class="uk-overlay-blue uk-position-cover"></div>
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-1-3@m" uk-scrollspy="cls: uk-animation-fade;  delay: 200; repeat: false">
                <h2 class="text-secondary line-below  uk-margin-bottom">Training Packages</h2>
                <p class="text-white fw-500 uk-text-content" style="position:relative;">
                  {{ $setting->fp_training }}
                </p>
                <p>
            </div>
            <div class="uk-width-2-3@m">
              <div class="uk-slider-container-offset" uk-slider uk-scrollspy="cls: uk-animation-slide-left-small;  delay: 200; repeat: false">

                 <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" style="overflow:hidden;">
                       <div class="uk-slider-items uk-child-width-1-2@m uk-child-width-1-2@l uk-grid uk-grid-small uk-grid-match" uk-height-match="target: .list-text">
                            @foreach ($packages as $item )
                             <div>
                                <div class="uk-card uk-card-default bg-primary border">
                                      <a href="{{ route('package-list',$item->uri) }}"  class="uk-display-block uk-inline-clip uk-transition-toggle uk-link-toggle uk-overflow-hidden border">
                                         <div class="uk-card-media-top uk-160" >
                                            <img src="{{$item->thumbnail ? asset('uploads/icon/'.$item->thumbnail) : asset('theme-assets/img/mountain-1.jpeg') }}" loading="lazy" alt="{{ $item->title }}" class="border uk-transition-scale-up uk-transition-opaque">
                                         </div>
                                      </a>
                                      <div class="uk-card-body uk-padding-small bg-primary">
                                          <div class="list-text">
                                            <h3 class="uk-card-title text-white">{{ $item->title }}</h3>
                                            <p class="text-white f-14 fw-500 three-line uk-margin-remove-bottom">{{ $item->excerpt }}</p>
                                          </div>
                                          <div class="uk-margin-small-top">
                                              <a href="{{ route('package-list',$item->uri) }}" class="uk-btn1 uk-btn-primary uk-width-1-2 uk-flex uk-flex-middle uk-flex-between p-btn">Learn More <span uk-icon="chevron-right"></span></a>
                                          </div>
                                      </div>
                                </div>
                             </div>
                            @endforeach
                       </div>
                       <div class="uk-flex uk-flex-right">
                          <a class="uk-position-bottom-right uk-position-small full-round " href uk-slidenav-previous uk-slider-item="previous" style="position:relative!important; border: 1px solid var(--white); left: 16px;"></a>
                          <a class="uk-position-bottom-right uk-position-small full-round " href uk-slidenav-next uk-slider-item="next" style="position:relative!important; border: 1px solid var(--white);"></a>
                       </div>
                 </div>
              </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- winter-Package-section-start -->
<!--@if($packages->count()>0)-->
<!--    @foreach ($packages as $item )-->
<!--        @if ($loop->iteration % 2 != 0)-->
<!--            <section class="uk-section uk-flex uk-flex-middle firstDiv" style="background: linear-gradient(93deg, rgba(8,44,80,0.0752472864145658) 0%, rgba(8,44,80,0.8987766981792717) 100%),url({{asset('theme-assets/img/detail.png')}}); background-attachment:fixed;    background-size: 226vh; background-repeat: no-repeat;" uk-height-viewport uk-img>-->
<!--                <div class="uk-container uk-flex uk-flex-right uk-width-1-1">-->
<!--                    <div class="uk-width-1-2@m" uk-scrollspy="cls: uk-animation-slide-right-small;  delay: 200; repeat: false">-->
<!--                        <h2 class="text-secondary">{{$item->title}}</h2>-->
<!--                        <p class="text-white fw-500 uk-text-justify">-->
<!--                            {{$item->excerpt ? $item->excerpt : 'Know more about '.$item->title }}-->
<!--                        </p>-->
<!--                        <a href="{{ route('package-list',$item->uri) }}" class="uk-btn uk-btn-white-outline" uk-scrollspy="cls: uk-animation-fade;  delay: 300; repeat: false">Learn More <span uk-icon="chevron-right"></span></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </section>-->
<!--        @else-->
<!--            <section class="uk-section uk-flex uk-flex-middle" style="background: linear-gradient(280deg, rgba(8,44,80,0.17888874299719892) 0%, rgba(8,44,80,1) 100%),url({{asset('theme-assets/img/mountain-4.jpeg')}}); background-attachment:fixed; background-size: 226vh; background-repeat: no-repeat;" uk-height-viewport uk-img>-->
<!--                <div class="uk-container uk-width-1-1">-->
<!--                    <div class="uk-width-1-2@m" uk-scrollspy="cls: uk-animation-slide-left-small;  delay: 200; repeat: false">-->
<!--                        <h2 class="text-secondary">{{$item->title}}</h2>-->
<!--                        <p class="text-white fw-500 uk-text-justify">-->
<!--                            {{$item->excerpt ? $item->excerpt : 'Know more about '.$item->title}}-->
<!--                        </p>-->
<!--                        <a href="{{ route('package-list',$item->uri) }}" class="uk-btn uk-btn-white-outline" uk-scrollspy="cls: uk-animation-fade;  delay: 300; repeat: false">Learn More <span uk-icon="chevron-right"></span></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </section>-->
<!--            {{-- <section class="uk-section uk-flex uk-flex-middle" style="background: linear-gradient(280deg, rgba(8,44,80,0.17888874299719892) 0%, rgba(8,44,80,1) 100%),url({{asset('theme-assets/img/mountain-4.jpeg')}}); background-attachment:fixed; background-size: 226vh; background-repeat: no-repeat;" uk-height-viewport uk-img>-->
<!--                <div class="uk-container">-->
<!--                    <div class="uk-width-1-2@m" uk-scrollspy="cls: uk-animation-slide-left-small;  delay: 200; repeat: false">-->
<!--                        <h2 class="text-secondary">{{$item->title}}</h2>-->
<!--                        <p class="text-white fw-500 uk-text-justify">-->
<!--                            {{$item->excerpt}}-->
<!--                        </p>-->
<!--                        <a href="{{ route('package-list',$item->uri) }}" class="uk-btn uk-btn-white-outline" uk-scrollspy="cls: uk-animation-fade;  delay: 300; repeat: false">Learn More <span uk-icon="chevron-right"></span></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </section> --}}-->
<!--        @endif-->
<!--    @endforeach-->
<!--@endif-->
<!-- Summer-Package-section-end-->

<!--Client-section-start -->
<section class="uk-section client-section bg-pattern uk-margin-large-top uk-padding-remove-top">
    <div class="uk-container">
        <div class=" uk-flex uk-flex-middle uk-flex-between uk-margin" uk-scrollspy="cls: uk-animation-fade;  delay: 200; repeat: false">
            <div>
                <p class="text-secondary uk-text-uppercase uk-text-bold uk-margin-remove-bottom -top">{{$setting->text3_title}}</p>
                <h2 class="text-primary uk-margin-remove-top">{{$setting->text3_sub_title}}</h2>
            </div>
            <div class=" uk-text-right">
                <!-- This is an anchor toggling the modal -->
                <a href="#modal-client" class="text-primary  fw-500" uk-toggle>ADD REVIEW <span class="uk-icon-button  uk-margin-small-left bg-primary text-white" uk-icon="forward"></span></a>

                <!-- This is the modal -->
                <div id="modal-client" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body uk-padding-remove">
                        <div class="uk-padding uk-padding-remove-bottom">
                            <h3 class="uk-modal-title uk-text-center text-primary uk-margin-remove">write a review</h3>
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <form class="uk-contact-form" action="{{ route('post-trip-review') }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class=" uk-child-width-1-2@m uk-grid">
                                    <div class="uk-margin-small-top">
                                        <label class="uk-form-label uk-text-bold" for="full_name">Full Name</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="fullname" name="full_name" required type="text">
                                        </div>
                                    </div>
                                    <div class="uk-margin-small-top">
                                        <label class="uk-form-label uk-text-bold" for="email">Email</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="email" name="email" type="email">
                                        </div>
                                    </div>
                                    <div class="uk-margin-small-top">
                                        <label class="uk-form-label uk-text-bold" for="image">Image</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="image" name="photo" required type="file" style="padding: 6px;">
                                        </div>
                                    </div>
                                    <div class="uk-margin-small-top">
                                        <label class="uk-form-label uk-text-bold" for="">Rating</label>
                                        <div class="star-rating">
                                            <input type="radio" id="5-stars" name="rating" value="5">
                                            <label for="5-stars" class="star">&#9733;</label>
                                            <input type="radio" id="4-stars" name="rating" value="4">
                                            <label for="4-stars" class="star">&#9733;</label>
                                            <input type="radio" id="3-stars" name="rating" value="3">
                                            <label for="3-stars" class="star">&#9733;</label>
                                            <input type="radio" id="2-stars" name="rating" value="2">
                                            <label for="2-stars" class="star">&#9733;</label>
                                            <input type="radio" id="1-star" name="rating" value="1">
                                            <label for="1-star" class="star">&#9733;</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin-small-top">
                                    <label class="uk-form-label uk-text-bold" for="country">Country</label>
                                    <div class="uk-form-controls">
                                        <select class="uk-select border" id="country" name="country" required type="text">
                                            @include('themes.default.common.country')
                                        </select>
                                    </div>
                                </div>

                                <div class="uk-margin-small-top">
                                    <label class="uk-form-label uk-text-bold" for="contact">Message</label>
                                    <div class="uk-form-controls">
                                        <textarea name="message" class="uk-textarea" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="uk-text-center uk-margin-top">
                                     <button type="submit" class="uk-btn1 uk-btn-primary-outline">Submit<span uk-icon="chevron-right"></span></button>
                                    </div>
                            </form>
                        </div>
                        <div data-src="{{asset('theme-assets/img/banner.png')}}" style="height: 160px; background-size:cover;" uk-img>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($reviews->count() > 0)
            <div class="uk-position-relative uk-visible-toggle " tabindex="-1" uk-slider uk-height-match=".uk-client" uk-scrollspy="cls: uk-animation-fade;  delay: 200; repeat: false">
                <div class="uk-slider-items uk-child-width-1-1 uk-child-width-1-2@m uk-grid uk-margin-large-top">
                    @foreach ($reviews as $value)
                        <div>
                            <div class="uk-card uk-card-default uk-padding border bg-light uk-box-shadow-large uk-client" style="background: #082c5026;">
                                <div class="uk-flex">
                                    <img src="{{$value->image ? asset('uploads/reviews/'.$value->image) : asset('theme-assets/img/user.jpg')}}" loading="lazy" class="user-img" alt="" />
                                    <div>
                                        <h4 class="text-secondary uk-margin-remove">{{ $value->full_name }}</h4>
                                        <p class="uk-margin-remove">{{ $value->country }}</p>
                                        <div class="star-list">
                                            <!--@for($i=0; $i < $value->rating; $i++)-->
                                            <!--    <span class=" text-primary f-25">&#9733;</span>-->
                                            <!--@endfor-->
                                        </div>
                                    </div>
                                </div>
                                <p class="uk-text-justify fw-500 uk-margin-remove-top">
                                    {!! $value->message !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="uk-position-center-left uk-position-small uk-hidden" href uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden" href uk-slidenav-next uk-slider-item="next"></a>
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
            </div>
        @endif
    </div>
</section>
<!-- Client-section-end -->

<!--customization-section-start-->
<div class="texture uk-margin-large-bottom top">
    <img src="{{asset('theme-assets/img/lowtexture.png')}}" alt="texture">
</div>

<div class="bg-blue bg-contour uk-section" style="padding-top:115px; padding-bottom: 115px;">
    <div class="uk-container" uk-scrollspy="cls: uk-animation-fade;  delay: 200; repeat: false">
        <div class="uk-text-center">
            <h2 class="text-secondary">{{$setting->fp_about}}</h2>
            <img src="{{asset('theme-assets/img/white-line.png')}}" >
            <p class="text-white fw-600">
                {{$setting->fp_about_content}}
            </p>
            <a href="{{route('page.posttype_detail',$aboutUs->uri)}}" class="bg-secondary text-white bg-secondary-btn">EXPLORE MORE</a>
        </div>
    </div>
</div>

<div class="texture">
    <img src="{{asset('theme-assets/img/highertexture.png')}}" alt="texture">
</div>
<!--customization-section-end-->

<!--blog-section-start-->
@if($blogs->count()>0)
    <section class="uk-section">
        <div class="uk-container">
            <div class=" uk-flex uk-flex-middle uk-flex-between uk-margin-top" uk-scrollspy="cls: uk-animation-fade;  delay: 200; repeat: false">
                <div>
                    <p class="text-secondary uk-text-uppercase uk-text-bold uk-margin-remove-bottom ">Recent from</p>
                    <h2 class="text-primary uk-margin-remove-top">Our Blog</h2>
                </div>
                <div class="uk-text-right">
                    <a href="{{route('page.posttype_detail',$blog->uri)}}" class="text-primary  fw-600" uk-toggle>LEARN MORE <span class="uk-icon-button  uk-margin-small-left bg-primary text-white" uk-icon="forward"></span></a>
                </div>
            </div>
            <div class="uk-child-width-1-2@s" uk-grid uk-scrollspy="cls: uk-animation-slide-left-small;  delay: 200; repeat: false">
                @foreach ($blogs as $row)
                    <div>
                        <a href="{{ route('page.blogdetail', $row->uri) }}" class="uk-display-block uk-inline-clip uk-transition-toggle border ">
                            <div class="uk-inline uk-330">
                                <img src="{{$row->page_thumbnail ? asset('uploads/medium/'.$row->page_thumbnail) : asset('theme-assets/img/slider1.jpeg')}}" loading="lazy" class="border uk-transition-scale-up uk-transition-opaque" alt="">
                                <div class="uk-overlay-primary uk-position-cover border"></div>
                                <div class="uk-overlay uk-position-bottom uk-light">
                                    <small class="text-white">{{$row->sub_title}}</small>
                                    <p class="text-white uk-margin-remove fw-500 f-18">{{$row->post_title}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
<!--blog-end-start-->

<!--contact-section-start-->
<section div class="bg-pattern uk-section">
    <div class="uk-text-center uk-flex uk-flex-column uk-flex-middle" uk-scrollspy="cls: uk-animation-fade;  delay: 200; repeat: false">
        @if($setting->text2_title)
            <h3 class="text-secondary">" {{$setting->text2_title}}
                <br>
                <span class="text-primary">{{$setting->text2_sub_title}} "</span>
            </h3>
        @endif
        <hr class="uk-divider-icon" style="width:50%;">
        <div class="uk-container">
        <div class="border uk-box-shadow-large uk-padding-large bg-contour" uk-scrollspy="cls: uk-animation-fade;  delay: 200; repeat: false">
            <h3 class="text-white">Call us for Inquiry</h3>
            <p class="text-white fw-500">{{$contact->content}}</p>
            <a href="{{route('page.posttype_detail',$contact->uri)}}" class="uk-btn uk-btn-primary" uk-scrollspy="cls: uk-animation-fade;  delay: 300; repeat: false">Learn More <span uk-icon="chevron-right"></span></a>
        </div>
        </div>
    </div>
</section>
<!--contact-section-end-->

@stop
