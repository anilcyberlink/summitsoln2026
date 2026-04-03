<div class="uk-news-sidebar uk-width-1-4@m">
    <div uk-sticky="offset: 100;end: #my-id" uk-scrollspy="target: h3,li,p; cls: uk-animation-slide-top-small; delay: 200;">
        <h3 class="text-primary">Useful Links</h3>
        <hr>
        <ul class="uk-news-list">
            @foreach ($sidebar as $row)
                <li class="two-line"><a href="{{ url(geturl($row->uri, $row->page_key)) }}">{{$row->post_title}}</a></li>
            @endforeach
        </ul>
        <div>
        <div class="bg-light border uk-padding-small uk-margin-top border-hover">
            <p class="uk-margin-remove text-black fw-500">Need Help? <br> Contact us:</p>
            <p class="uk-margin-remove text-black fw-500"> <img src="{{asset('theme-assets/img/icon/call.png')}}" class="uk-margin-small-right" alt="">{{$setting->phone}}</p>
        </div>
    </div>
    </div>
    
</div>