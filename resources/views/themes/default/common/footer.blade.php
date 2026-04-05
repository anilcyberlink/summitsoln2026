<div class=" bg-pattern-footer " style="background-position: center;padding-top: 60px;" uk-scrollspy="cls: uk-animation-fade;  delay: 300; repeat: false">
    <div class="uk-text-center uk-margin-top uk-container" style="overflow: hidden;">
        <h3 class="text-black ">Affiliations</h3>
        <img src="{{asset('theme-assets/img/blue-line.png')}}" loading="lazy" alt="underline-img">
        <div class="uk-slider-container-offset" uk-slider>
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                <div class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-match uk-grid uk-margin-large-top">
                    @foreach ($associated as $value)
                    <div>
                        <div class="associate-item uk-scrollspy-inview uk-animation-fade">
                            <div class="uk-scrollspy-inview uk-animation-fade">
                                <a class="associate-img"><img src="{{ asset('uploads/medium/' . $value->file_name) }}" ></a>
                                <!--<div class="associate-text">-->
                                <!--    <p class="uk-margin-remove">Registered with: Adventure Travel Assocaition</p>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
            </div>
            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
        </div>
        <!--<div class="uk-margin-top">-->
        <!--    @foreach ($associated as $value)-->
        <!--    <a href="#">-->
        <!--        <img src="{{ asset('uploads/medium/' . $value->file_name) }}" class="uk-margin-small-right" height="80" width="80" loading="lazy" alt="">-->
        <!--    </a>-->
        <!--    @endforeach-->
        <!--</div>-->
    </div>
    <!--<div class="uk-text-center uk-margin-top">-->
    <!--    <span class="text-black uk-text-bold ">Partnered With</span>-->
    <!--    <br>-->
    <!--    <img src="{{asset('theme-assets/img/blue-line.png')}}" loading="lazy" alt="underline-img">-->
    <!--    <div class="uk-margin-top">-->
    <!--        @foreach ($partners as $value) -->
    <!--        <a href="#">-->
    <!--            <img src="{{ asset('uploads/medium/' . $value->file_name) }}" class="uk-margin-small-right" height="80" width="80" loading="lazy" alt="">-->
    <!--        </a>-->
    <!--        @endforeach-->
    <!--    </div>-->
    <!--</div>-->
</div>

<div data-src="{{asset('theme-assets/img/lowtexture.png')}}" style="height: 35px; background-size:cover; background-color: var(--primary) !important;" uk-img></div>

<footer class="uk-padding bg-primary ">
    <p class="text-white uk-text-center uk-margin-small uk-text-bold uk-text-uppercase" style="font-size:20px;">Professional Affiliations</p>
    <div uk-slider="sets: true; autoplay: true; finite: true;">
        <div class="uk-position-relative uk-visible-toggle uk-margin-medium-bottom" tabindex="-1">
            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-child-width-1-4@l  uk-grid-small uk-flex-center" uk-grid >
                <!--  -->
                 @foreach ($partners as $value)
                <li>
                    <div class="partners-logo-list bg-white uk-border-rounded uk-img-effect">
                        <a><img src="{{ asset('uploads/medium/' . $value->file_name) }}" class="uk-effect-1" alt=""></a>
                    </div>
                </li>
                 @endforeach
                <!--  -->
            </ul>
            <a class="uk-position-center-left uk-position-small full-round" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small full-round " href="#" uk-slidenav-next uk-slider-item="next"></a>
        </div>
        <!-- <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul> -->
    </div>
    <hr>
    <div uk-grid  uk-scrollspy="cls: uk-animation-fade;  delay: 300; repeat: false">
        <div class="uk-width-1-3@m uk-text-left@m uk-text-center">
            <a class="uk-logo" href="{{ url('/') }}">
                <img src="{{asset('theme-assets/img/logo-dark.png')}}" class="footer-logo" width="180" alt="">
            </a>
            <hr style="border-top: 1px solid #e5e5e530;">
            <p class="text-white">{{$setting->copyright_text}}</p>
            <hr style="border-top: 1px solid #e5e5e530;">
            <p class="text-white">All Rights Reserved | Design & Developed By<a href='https://cyberlink.com.np/' target="_blank"> Cyberlink Pvt. Ltd.</a></p>
        </div>
        <div class="uk-width-expand@m">
            <div class="uk-child-width-1-4@m uk-child-width-1-2 uk-grid-small" uk-grid>
                <div>
                    <p class="uk-margin-remove "><a href="{{ route('tour') }}" class="text-secondary f-20 fw-600 uk-text-uppercase ">Destination</a></p>
                    <ul class=" footer-list">
                        @foreach ($destination as $item)
                            <li><a href="{{ route('page.destinationtriplist', $item->uri) }}">{{$item->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <p class="uk-margin-remove "><a href="{{ route('page.trekkinglist') }}" class="text-secondary f-20 fw-600 uk-text-uppercase ">Trekking</a></p>
                    <ul class=" footer-list">
                        @foreach ($trekking as $item)
                            <li><a href="{{ route('trekking-list',$item->uri) }}">{{$item->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <p class="uk-margin-remove "><a href="{{ route('page.expeditionlist') }}" class="text-secondary f-20 fw-600 uk-text-uppercase ">Expedition</a></p>
                    <ul class=" footer-list">
                        @foreach ($expedition as $item)
                            <li><a href="{{ route('expedition-list',$item->uri) }}">{{$item->title}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <p class="uk-margin-remove "><a class="text-secondary f-20 fw-600 uk-text-uppercase ">Links</a></p>
                    <ul class=" footer-list">
                        @if($post_types)
                            @foreach ($post_types as $item)
                                <li><a href="{{route('page.posttype_detail',$item->uri)}}">{{ $item->post_type }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="small-footer uk-child-width-1-2@m uk-padding uk-padding-remove-vertical uk-flex uk-flex-middle " uk-grid >
    <div class="uk-text-center uk-text-left@m uk-margin-top" uk-scrollspy="cls: uk-animation-fade;  delay: 300; repeat: false">
        <a href="{{ url('page/'. geturl($term_condition->uri, $term_condition->page_key)) }}" class="text-white uk-margin-large-right">{{$term_condition->post_title}}</a>
        <a href="{{ url('page/'. geturl($privacy->uri, $privacy->page_key)) }}" class="text-white">{{$privacy->post_title}}</a>
    </div>
    <div class="uk-footer-icon uk-text-right@m uk-text-center uk-margin-top uk-margin-bottom" uk-scrollspy="cls: uk-animation-fade;  delay: 300; repeat: false">
        <a href="{{$setting->instagram_link}}" target="_blank" class="uk-icon-button uk-margin-small-right" uk-icon="instagram"></a>
        <a href="{{$setting->facebook_link}}" target="_blank" class="uk-icon-button  uk-margin-small-right" uk-icon="facebook"></a>
        <a href="{{$setting->youtube_link}}" target="_blank" class="uk-icon-button" uk-icon="youtube"></a>
    </div>
</div>

</body>

<script src="{{asset('theme-assets/js/form.js')}}"></script>
<script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script>
<script src="{{asset('theme-assets/js/lenis.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js?render={{env('SITE_KEY')}}"></script>

<script>
grecaptcha.ready(function() {
    grecaptcha.execute('<?php echo env("SITE_KEY"); ?>', {action: 'homepage'}).then(function(token) {
      document.getElementById('g_recaptcha_response').value=token;
    });
});
</script>
</html>
