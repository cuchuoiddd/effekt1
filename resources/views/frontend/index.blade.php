<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fff">
    <!-- ** developed by hellobear.co ** -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/swiper.min.css')}}">
    <!-- This is Squarespace. -->
    <!-- effekt -->
    <base #href="">
    <meta charset="utf-8"/>
    <title>effekt</title>
    @include('frontend.layout.head')
</head>

<body class="product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center newsletter-style-dark hide-opentable-icons opentable-style-light small-button-style-solid small-button-shape-square medium-button-style-solid medium-button-shape-square large-button-style-solid large-button-shape-square image-block-poster-text-alignment-center image-block-card-dynamic-font-sizing image-block-card-content-position-center image-block-card-text-alignment-left image-block-overlap-dynamic-font-sizing image-block-overlap-content-position-center image-block-overlap-text-alignment-left image-block-collage-dynamic-font-sizing image-block-collage-content-position-top image-block-collage-text-alignment-left image-block-stack-dynamic-font-sizing image-block-stack-text-alignment-left button-style-outline button-corner-style-square tweak-product-quick-view-button-style-floating tweak-product-quick-view-button-position-bottom tweak-product-quick-view-lightbox-excerpt-display-truncate tweak-product-quick-view-lightbox-show-arrows tweak-product-quick-view-lightbox-show-close-button tweak-product-quick-view-lightbox-controls-weight-light product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center native-currency-code-usd collection-type-index collection-layout-default collection-59f10dc91f318dc4a4211a4f homepage view-list">
<header class="site-header">
    <nav class="site-nav">
        <div class="logo-container">
            @if(App::isLocale('vi'))
                <a class="logo" href="/" data-content-field="site-title">
                    @if(isset(\App\Helpers\Functions::getSetting()->logo) && \App\Helpers\Functions::getSetting()->logo)
                        <img src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_LOGO.\App\Helpers\Functions::getSetting()->logo}}"
                             alt="logo">
                    @else
                        effekt
                    @endif
                </a>
            @else
                <a class="logo" href="/en" data-content-field="site-title">
                    @if(isset(\App\Helpers\Functions::getSetting()->logo) && \App\Helpers\Functions::getSetting()->logo)
                        <img src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_LOGO.\App\Helpers\Functions::getSetting()->logo}}"
                             alt="logo">
                    @else
                        effekt
                    @endif
                </a>
            @endif

        </div>
        <div class="nav-container">


            <!-- Desktop  Nav -->
            <ul class="main-nav">
                @include('frontend.layout.menu')
            </ul>

            <!-- Mobile  Trigger -->
            <div class="hamburger hamburger--spring" tabindex="0" aria-label="Menu" role="button"
                 aria-controls="navigation" uk-toggle="target: .mobile-nav-wrapper">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </div>
    </nav>
    <div class="mobile-nav-wrapper uk-modal-full" uk-modal>
        <ul class="mobile-nav">
            {{--<li>--}}
            {{--<div class="btn-group show">--}}
            {{--<button class="btn btn-secondary btn-lg dropdown-toggle" style="border: none;background:none">--}}
            {{--<img class=" lazyloaded" src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/60/twitter/259/flag-vietnam_1f1fb-1f1f3.png" data-src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/60/twitter/259/flag-vietnam_1f1fb-1f1f3.png" data-srcset="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/twitter/259/flag-vietnam_1f1fb-1f1f3.png 2x" alt="Flag: Vietnam on Twitter " width="30" height="60" srcset="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/twitter/259/flag-vietnam_1f1fb-1f1f3.png 2x">--}}
            {{--</button>--}}
            {{--<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 48px, 0px); top: 0px; left: 7px; will-change: transform;">--}}
            {{--<a class="dropdown-item" href=""><img class=" lazyloaded" src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/60/twitter/259/flag-vietnam_1f1fb-1f1f3.png" data-src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/60/twitter/259/flag-vietnam_1f1fb-1f1f3.png" data-srcset="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/twitter/259/flag-vietnam_1f1fb-1f1f3.png 2x" alt="Flag: Vietnam on Twitter " width="30" height="60" srcset="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/twitter/259/flag-vietnam_1f1fb-1f1f3.png 2x">--}}
            {{--</a>--}}
            {{--<a class="dropdown-item" href=""><img class=" lazyloaded" src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/60/twitter/259/flag-england_1f3f4-e0067-e0062-e0065-e006e-e0067-e007f.png" data-src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/60/twitter/259/flag-england_1f3f4-e0067-e0062-e0065-e006e-e0067-e007f.png" data-srcset="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/twitter/259/flag-england_1f3f4-e0067-e0062-e0065-e006e-e0067-e007f.png 2x" alt="Flag: England on Twitter " width="30" height="60" srcset="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/twitter/259/flag-england_1f3f4-e0067-e0062-e0065-e006e-e0067-e007f.png 2x"></a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</li>--}}
            @include('frontend.layout.menu')
        </ul>
    </div>
    <nav class="trans-nav">
        <div class="trans-nav-wrapper">
            <ul class="anchor-nav">
            </ul>
        </div>
    </nav>
</header>


<main class="site-content" role="main" data-content-field="main-content">
    <section class="index-gallery swiper-container full-height" data-collection-id="59f10dd59f8dced90e4fa72f">
        <div class="swiper-wrapper">

            @if(count($slides))
                @foreach($slides as $item)
                    <div class="slide swiper-slide">
                        <div class="img-wrap cover">
                            <img alt="" data-sizes="auto" data-srcset="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_SLIDE_THUMB.$item->image}} 750w,
                                            {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_SLIDE.$item->image}} 2500w"
                                 class="swiper-lazy"/>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="overlay"></div>


        <div class="swiper-pagination"></div>
    </section>
</main>


<div class="to-top hide">
    <a href="#" class="to-top-btn" uk-totop uk-scroll>
        <svg class="to-top-icon" viewBox="0 0 10 17" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" fill-rule="evenodd">
                <path class="fill" d="M4.86426.93135L9.5272 5.4216H.2013"/>
                <path class="stroke" d="M5 16V3.48078M1 16h8" stroke-width="2" stroke-linecap="square"/>
            </g>
        </svg>
    </a>
</div>
<footer class="site-footer"></footer>


<script src="{{asset('frontend/js/uikit.min.js')}}"></script>
<script src="{{asset('frontend/js/site.js')}}" type="text/javascript"></script>


<script>
    Squarespace.afterBodyLoad(Y);
    $(document).on('click', '.dropdown-toggle', function () {
        $('.dropdown-menu').toggle();
    })
</script>



<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>

<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v8.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="{{isset(\App\Helpers\Functions::getSetting()->fanpage_id)?\App\Helpers\Functions::getSetting()->fanpage_id:'104351897844'}}">
</div>
</body>

</html>