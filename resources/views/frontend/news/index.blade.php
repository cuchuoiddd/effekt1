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
    <title>News</title>
    @include('frontend.layout.head')
</head>

<body class="product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center newsletter-style-dark hide-opentable-icons opentable-style-light small-button-style-solid small-button-shape-square medium-button-style-solid medium-button-shape-square large-button-style-solid large-button-shape-square image-block-poster-text-alignment-center image-block-card-dynamic-font-sizing image-block-card-content-position-center image-block-card-text-alignment-left image-block-overlap-dynamic-font-sizing image-block-overlap-content-position-center image-block-overlap-text-alignment-left image-block-collage-dynamic-font-sizing image-block-collage-content-position-top image-block-collage-text-alignment-left image-block-stack-dynamic-font-sizing image-block-stack-text-alignment-left button-style-outline button-corner-style-square tweak-product-quick-view-button-style-floating tweak-product-quick-view-button-position-bottom tweak-product-quick-view-lightbox-excerpt-display-truncate tweak-product-quick-view-lightbox-show-arrows tweak-product-quick-view-lightbox-show-close-button tweak-product-quick-view-lightbox-controls-weight-light product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center native-currency-code-usd collection-59f053c6dc2b4a28571da96c collection-type-blog collection-layout-default view-list">

<header class="site-header">
    <nav class="site-nav">
        <div class="logo-container">


            <a class="logo" href="/" data-content-field="site-title">


                effekt

            </a>

        </div>
        <div class="nav-container">


            <!-- Desktop  Nav -->
            <ul class="main-nav">
                @include('frontend.layout.menu')

            </ul>

            <!-- Mobile  Trigger -->
            <div class="hamburger hamburger--spring" tabindex="0" aria-label="Menu" role="button"
                 aria-controls="navigation"
                 uk-toggle="target: .mobile-nav-wrapper">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>


        </div>
    </nav>

    <div class="mobile-nav-wrapper uk-modal-full" uk-modal>
        <ul class="mobile-nav">
            @include('frontend.layout.menu')
        </ul>
    </div>


    <nav class="trans-nav">
        <div class="trans-nav-wrapper">


            <ul class="anchor-nav"></ul>


        </div>
    </nav>


</header>


<main class="site-content" role="main" data-content-field="main-content">
    <div class="blog-list">

        @if(count($news))
            @foreach($news as $item)
                @if(App::isLocale('vi'))
                    <article class="blog-item hentry tag-2020 author-lucrezia-biasutti post-type-text article-index-1"
                             data-ao="{{$item->year}}">
                        <a href="news/{{$item->slug}}"
                           title="{{$item->title_vn}}">
                            <div class="blog-image img-wrap cover">

                                <img alt="{{$item->title_vn}}"
                                     data-sizes="auto"
                                     data-srcset="
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW_THUMB.$item->image}}?format=750w 750w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=2500w 2500w"
                                     class="lazyload "/>
                            </div>
                        </a>
                        <div class="item-meta-wrapper">
                            <div class="item-meta">
                                <date class="publish-date">{{$item->date}}</date>

                                <div class="item-title">{{$item->title_vn}}</div>

                            </div>
                        </div>
                    </article>
                @else
                    <article class="blog-item hentry tag-2020 author-lucrezia-biasutti post-type-text article-index-1"
                             data-ao="{{$item->year}}">
                        <a href="news/{{$item->slug}}"
                           title="{{$item->title_en}}">
                            <div class="blog-image img-wrap cover">

                                <img alt="{{$item->title_en}}"
                                     data-sizes="auto"
                                     data-srcset="
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW_THUMB.$item->image}}?format=750w 750w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=2500w 2500w"
                                     class="lazyload "/>
                            </div>
                        </a>
                        <div class="item-meta-wrapper">
                            <div class="item-meta">
                                <date class="publish-date">{{$item->date}}</date>

                                <div class="item-title">{{$item->title_en}}</div>

                            </div>
                        </div>
                    </article>
                @endif
            @endforeach
        @endif
    </div>
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


<footer class="site-footer">
    <div class="footer-content">
        <div class="sqs-layout sqs-grid-12 columns-12" data-layout-label="Footer" data-type="block-field"
             data-updated-on="1530174401636" id="footer">
            <div class="row sqs-row">
                <div class="col sqs-col-12 span-12">
                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                         id="block-04f6434df3a15da7abb7">
                        <div class="sqs-block-content">
                            <p class="text-align-center">Copyright © 2018&nbsp; | &nbsp;All rights reserved &nbsp;|&nbsp;
                                <a
                                        href="privacy.html">Privacy Policy</a></p>
                        </div>
                    </div>
                    <div class="sqs-block socialaccountlinks-v2-block sqs-block-socialaccountlinks-v2"
                         data-block-type="54"
                         id="block-yui_3_17_2_80_1508967373173_6221">
                        <div class="sqs-block-content">


                            <div
                                    class="sqs-svg-icon--outer social-icon-alignment-center social-icons-color-black social-icons-size-small social-icons-style-regular ">
                                <nav class="sqs-svg-icon--list">
                                    <a href="http://www.linkedin.com/company/effekt" target="_blank"
                                       class="sqs-svg-icon--wrapper linkedin" aria-label="Mikkel Bøgh">
                                        <div>
                                            <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                                <use class="sqs-use--icon" xlink:href="#linkedin-icon"></use>
                                                <use class="sqs-use--mask" xlink:href="#linkedin-mask"></use>
                                            </svg>
                                        </div>
                                    </a><a href="http://www.facebook.com/effekt.dk" target="_blank"
                                           class="sqs-svg-icon--wrapper facebook" aria-label="EFFEKT">
                                        <div>
                                            <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                                <use class="sqs-use--icon" xlink:href="#facebook-icon"></use>
                                                <use class="sqs-use--mask" xlink:href="#facebook-mask"></use>
                                            </svg>
                                        </div>
                                    </a><a href="https://twitter.com/EffektArch" target="_blank"
                                           class="sqs-svg-icon--wrapper twitter"
                                           aria-label="EFFEKT Architects">
                                        <div>
                                            <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                                <use class="sqs-use--icon" xlink:href="#twitter-icon"></use>
                                                <use class="sqs-use--mask" xlink:href="#twitter-mask"></use>
                                            </svg>
                                        </div>
                                    </a><a href="http://instagram.com/effektarchitects" target="_blank"
                                           class="sqs-svg-icon--wrapper instagram" aria-label="EFFEKT Architects">
                                        <div>
                                            <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                                <use class="sqs-use--icon" xlink:href="#instagram-icon"></use>
                                                <use class="sqs-use--mask" xlink:href="#instagram-mask"></use>
                                            </svg>
                                        </div>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{asset('frontend/js/uikit.min.js')}}"></script>
<script src="{{asset('frontend/js/site.js')}}" type="text/javascript"></script>

<script type="text/javascript"
        data-sqs-type="imageloader-bootstrapper">(function () {
        if (window.ImageLoader) {
            window.ImageLoader.bootstrap({}, document);
        }
    })();</script>
<script>
    Squarespace.afterBodyLoad(Y);
    $(document).on('click', '.dropdown-toggle', function () {
        $('.dropdown-menu').toggle();
    })
</script>
</body>

</html>