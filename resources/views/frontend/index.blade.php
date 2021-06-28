@extends('frontend.layout.master')


@if(App::isLocale('vi'))
    @section('title')
    <title>air.concept</title>
    @endsection
    @section('meta-title')
        <meta property="og:title" content="{{isset(\App\Helpers\Functions::getSetting()->title_vn) && \App\Helpers\Functions::getSetting()->title_vn ? \App\Helpers\Functions::getSetting()->title_vn : 'air.concept' }}">
    @endsection
    @section('meta-description')
        <meta name="description" content="{{isset(\App\Helpers\Functions::getSetting()->description_vn) && \App\Helpers\Functions::getSetting()->description_vn ? \App\Helpers\Functions::getSetting()->description_vn : 'air.concept' }}">
    @endsection
@else
    @section('title')
        <title>air.concept</title>
    @endsection
    @section('meta-title')
        <meta property="og:title" content="{{isset(\App\Helpers\Functions::getSetting()->title_en) && \App\Helpers\Functions::getSetting()->title_en ? \App\Helpers\Functions::getSetting()->title_en : 'air.concept' }}">
    @endsection
    @section('meta-description')
        <meta name="description" content="{{isset(\App\Helpers\Functions::getSetting()->description_en) && \App\Helpers\Functions::getSetting()->description_en ? \App\Helpers\Functions::getSetting()->description_en : 'air.concept' }}">
    @endsection
@endif

@section('body')

<body class="product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center newsletter-style-dark hide-opentable-icons opentable-style-light small-button-style-solid small-button-shape-square medium-button-style-solid medium-button-shape-square large-button-style-solid large-button-shape-square image-block-poster-text-alignment-center image-block-card-dynamic-font-sizing image-block-card-content-position-center image-block-card-text-alignment-left image-block-overlap-dynamic-font-sizing image-block-overlap-content-position-center image-block-overlap-text-alignment-left image-block-collage-dynamic-font-sizing image-block-collage-content-position-top image-block-collage-text-alignment-left image-block-stack-dynamic-font-sizing image-block-stack-text-alignment-left button-style-outline button-corner-style-square tweak-product-quick-view-button-style-floating tweak-product-quick-view-button-position-bottom tweak-product-quick-view-lightbox-excerpt-display-truncate tweak-product-quick-view-lightbox-show-arrows tweak-product-quick-view-lightbox-show-close-button tweak-product-quick-view-lightbox-controls-weight-light product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center native-currency-code-usd collection-type-index collection-layout-default collection-59f10dc91f318dc4a4211a4f homepage view-list">
@endsection
@section('trans-nav')
    <nav class="trans-nav">
        <div class="trans-nav-wrapper">
            <ul class="anchor-nav">
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <main class="site-content" role="main" data-content-field="main-content">
        <section class="index-gallery swiper-container full-height" data-collection-id="59f10dd59f8dced90e4fa72f">
            <div class="swiper-wrapper">

                @if(count($slides))
                    @foreach($slides as $item)
                        <div class="slide swiper-slide">
                            <a href="{{$item->url}}">
                                <div class="img-wrap cover">
                                    <img
                                            alt="air.concept"
                                            data-sizes="auto"
                                            data-srcset="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_SLIDE.$item->image}}?format=750w 750w,
                                                {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_SLIDE.$item->image}}?format=1000w 1000w,
                                                {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_SLIDE.$item->image}}?format=1500w 1500w,
                                                {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_SLIDE.$item->image}}?format=2500w 2500w"
                                            class="swiper-lazy" />
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="overlay"></div>


            <div class="swiper-pagination"></div>
        </section>
    </main>

@endsection
@section('script')
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
    @endsection
