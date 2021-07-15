
@extends('frontend.layout.master')

@if(App::isLocale('vi'))
    @section('title')
        <title>Tin tức | {{$news->title_vn?:''}}</title>
    @endsection
    @section('meta-title')
        <meta property="og:title" content="{{$news->title_vn?:''}}">
    @endsection
    @section('meta-description')
        <meta name="description" content="{!! @str_limit(strip_tags($news->content_vn),150) !!}">
    @endsection
    @else
    @section('title')
        <title>News | {{$news->title_en?:''}}</title>
    @endsection
    @section('meta-title')
        <meta property="og:title" content="{{$news->title_en?:''}}">
    @endsection
    @section('meta-description')
        <meta name="description" content="{!! @str_limit(strip_tags($news->content_en),150) !!}">
    @endsection
@endif

@section('body')
    <body oncontextmenu="return false;" class="product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center newsletter-style-dark hide-opentable-icons opentable-style-light small-button-style-solid small-button-shape-square medium-button-style-solid medium-button-shape-square large-button-style-solid large-button-shape-square image-block-poster-text-alignment-center image-block-card-dynamic-font-sizing image-block-card-content-position-center image-block-card-text-alignment-left image-block-overlap-dynamic-font-sizing image-block-overlap-content-position-center image-block-overlap-text-alignment-left image-block-collage-dynamic-font-sizing image-block-collage-content-position-top image-block-collage-text-alignment-left image-block-stack-dynamic-font-sizing image-block-stack-text-alignment-left button-style-outline button-corner-style-square tweak-product-quick-view-button-style-floating tweak-product-quick-view-button-position-bottom tweak-product-quick-view-lightbox-excerpt-display-truncate tweak-product-quick-view-lightbox-show-arrows tweak-product-quick-view-lightbox-show-close-button tweak-product-quick-view-lightbox-controls-weight-light product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center native-currency-code-usd view-item collection-59f053c6dc2b4a28571da96c collection-type-blog collection-layout-default">

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
            @if(App::isLocale('vi'))
                <article class="blog-post" data-item-id="5f5a0279e5b3165d0c219890">
                    <div class="post-content has-banner">
                        <div class="post-banner">
                            <div class="img-wrap cover p-ratio">
                                <img alt="{{$news->title_vn}}"
                                     data-sizes="auto"
                                     data-srcset="
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW_THUMB.$news->image}}?format=750w 750w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$news->image}}?format=2500w 2500w"
                                     class="lazyload "/>
                            </div>
                        </div>

                        <div class="post-header">
                            <div class="post-title">{{$news->title_vn}}</div>
                        </div>
                        <div class="sqs-layout sqs-grid-12 columns-12" data-layout-label="Post Body" data-type="item"
                             data-updated-on="1599734664841" id="item-5f5a0279e5b3165d0c219890">
                            <div class="row sqs-row">
                                <div class="col sqs-col-12 span-12">
                                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                         id="block-8e63608dd693be8e2963">
                                        <div class="sqs-block-content">
                                            {!! $news->content_vn !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--<div class="pagination">--}}
                        {{--<a class="next" href="sinus-lynge-invited-speaker-at-habitats-2020.html" title="Next">--}}
                        {{--<svg viewBox="0 0 17 10" xmlns="http://www.w3.org/2000/svg">--}}
                        {{--<g fill="none" fill-rule="evenodd">--}}
                        {{--<path class="fill" d="M16.06865 4.86426L11.5784 9.5272V.2013"/>--}}
                        {{--<path class="stroke" d="M1 5h12.51922" stroke-width="2" stroke-linecap="square"/>--}}
                        {{--</g>--}}
                        {{--</svg>--}}
                        {{--</a>--}}
                        {{--</div>--}}
                    </div>
                </article>
            @else
                <article class="blog-post" data-item-id="5f5a0279e5b3165d0c219890">
                    <div class="post-content has-banner">
                        <div class="post-banner">
                            <div class="img-wrap cover p-ratio">
                                <img alt="{{$news->title_en}}"
                                     data-sizes="auto"
                                     data-srcset="
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW_THUMB.$news->image}}?format=750w 750w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$news->image}}?format=2500w 2500w"
                                     class="lazyload "/>
                            </div>
                        </div>

                        <div class="post-header">
                            <div class="post-title">{{$news->title_en}}</div>
                        </div>
                        <div class="sqs-layout sqs-grid-12 columns-12" data-layout-label="Post Body" data-type="item"
                             data-updated-on="1599734664841" id="item-5f5a0279e5b3165d0c219890">
                            <div class="row sqs-row">
                                <div class="col sqs-col-12 span-12">
                                    <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                         id="block-8e63608dd693be8e2963">
                                        <div class="sqs-block-content">
                                            {!! $news->content_en !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination">
                            <a class="next" href="sinus-lynge-invited-speaker-at-habitats-2020.html" title="Next">
                                <svg viewBox="0 0 17 10" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                        <path class="fill" d="M16.06865 4.86426L11.5784 9.5272V.2013"/>
                                        <path class="stroke" d="M1 5h12.51922" stroke-width="2" stroke-linecap="square"/>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @endif

        </main>
    @endsection
