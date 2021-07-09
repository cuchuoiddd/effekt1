@extends('frontend.layout.master')

@if(App::isLocale('vi'))
    @section('title')
        <title>Công việc | {{$work->title_vn?:''}}</title>
    @endsection
    @section('meta-title')
        <meta property="og:title" content="{{$work->title_vn?:''}}">
    @endsection
    @section('meta-description')
        <meta name="description" content="{!! @str_limit(strip_tags($work->content_vn),150) !!}">
    @endsection
@else
    @section('title')
        <title>News | {{$work->title_en?:''}}</title>
    @endsection
    @section('meta-title')
        <meta property="og:title" content="{{$work->title_en?:''}}">
    @endsection
    @section('meta-description')
        <meta name="description" content="{!! @str_limit(strip_tags($work->content_en),150) !!}">
    @endsection
@endif

@section('body')

    <body class="product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center newsletter-style-dark hide-opentable-icons opentable-style-light small-button-style-solid small-button-shape-square medium-button-style-solid medium-button-shape-square large-button-style-solid large-button-shape-square image-block-poster-text-alignment-center image-block-card-dynamic-font-sizing image-block-card-content-position-center image-block-card-text-alignment-left image-block-overlap-dynamic-font-sizing image-block-overlap-content-position-center image-block-overlap-text-alignment-left image-block-collage-dynamic-font-sizing image-block-collage-content-position-top image-block-collage-text-alignment-left image-block-stack-dynamic-font-sizing image-block-stack-text-alignment-left button-style-outline button-corner-style-square tweak-product-quick-view-button-style-floating tweak-product-quick-view-button-position-bottom tweak-product-quick-view-lightbox-excerpt-display-truncate tweak-product-quick-view-lightbox-show-arrows tweak-product-quick-view-lightbox-show-close-button tweak-product-quick-view-lightbox-controls-weight-light product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center native-currency-code-usd collection-5c0e760a21c67c1ded501dbc collection-type-project collection-layout-default view-list">

    @endsection
    @section('trans-nav')
        <nav class="trans-nav">
            <div class="trans-nav-wrapper">
                <ul class="category-nav"></ul>
            </div>
        </nav>
    @endsection
    @section('content')
        <main class="site-content" role="main" data-content-field="main-content">
            <section class="project-slideshow swiper-container" data-collection-id="5c0e7f2a03ce6433b48ffa91">
                <div class="swiper-wrapper">
                    @if(count(json_decode($work->images)))
                        @foreach(json_decode($work->images) as $item)
                            <div class="slide swiper-slide">
                                <div class="img-wrap cover p-ratio">

                                    @if(\App\Helpers\Functions::getFileName(\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->url) == 'mp4')
                                        <video class="swiper-lazy">
                                            <source src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->url}}" type="video/mp4">
                                        </video>
                                    @else
                                        <img alt="{{$work->title_vn}}" data-sizes="auto"
                                             data-srcset="
            {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT_THUMB.$item->url}}?format=750w 750w,
          {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->url}}?format=2500w 2500w"
                                             class="swiper-lazy"/>
                                    @endif


                                    <div class="slide-meta"></div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="slick-arrow prev hide">
                        <svg viewBox="0 0 50 71" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <path id="b"
                                      d="M34.90463 6.48785L28.417 0 .907 27.51l27.51 27.51 6.48763-6.48785L13.88248 27.51z"/>
                                <filter x="-39.7%" y="-20.9%" width="173.5%" height="145.4%"
                                        filterUnits="objectBoundingBox"
                                        id="a">
                                    <feMorphology radius=".5" operator="dilate" in="SourceAlpha"
                                                  result="shadowSpreadOuter1"/>
                                    <feOffset dy="2" in="shadowSpreadOuter1" result="shadowOffsetOuter1"/>
                                    <feGaussianBlur stdDeviation="3.5" in="shadowOffsetOuter1"
                                                    result="shadowBlurOuter1"/>
                                    <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.603091033 0"
                                                   in="shadowBlurOuter1"/>
                                </filter>
                            </defs>
                            <g transform="translate(8 7)" fill-rule="nonzero" fill="none">
                                <use fill="#000" filter="url(#a)" xlink:href="#b"/>
                                <use fill="#FFF" fill-rule="evenodd" xlink:href="#b"/>
                            </g>
                        </svg>
                    </div>
                    <div class="slick-arrow next">
                        <svg viewBox="0 0 50 71" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <path id="d"
                                      d="M7.39763 0L.91 6.48785 21.93215 27.51.91 48.53215 7.39763 55.02l27.51-27.51z"/>
                                <filter x="-38.2%" y="-20%" width="176.5%" height="147.3%"
                                        filterUnits="objectBoundingBox"
                                        id="c">
                                    <feMorphology radius=".5" operator="dilate" in="SourceAlpha"
                                                  result="shadowSpreadOuter1"/>
                                    <feOffset dy="2" in="shadowSpreadOuter1" result="shadowOffsetOuter1"/>
                                    <feGaussianBlur stdDeviation="3.5" in="shadowOffsetOuter1"
                                                    result="shadowBlurOuter1"/>
                                    <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.5 0"
                                                   in="shadowBlurOuter1"/>
                                </filter>
                            </defs>
                            <g transform="translate(7 6)" fill-rule="nonzero" fill="none">
                                <use fill="#000" filter="url(#c)" xlink:href="#d"/>
                                <use fill="#FFF" fill-rule="evenodd" xlink:href="#d"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="detail-menu">
                    <div class="counter">
                        <div class="counter-wrap">
                            <span class="current">1</span>/{{count(json_decode($work->images))}}
                        </div>
                    </div>
                    <div class="title"></div>
                    <div class="controls">
                        <a class="detail-btn tooltip" title="Project Description" href="#info">
                            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <g stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                    <path d="M1 1h18M1 7h18M1 13h18M1 19h11"/>
                                </g>
                            </svg>
                        </a>
                        <button class="list-btn tooltip" title="Thumbnails">
                            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <g fill-rule="evenodd">
                                    <path
                                            d="M0 0h4v4H0zM0 8h4v4H0zM0 16h4v4H0zM8 0h4v4H8zM8 8h4v4H8zM8 16h4v4H8zM16 0h4v4h-4zM16 8h4v4h-4zM16 16h4v4h-4z"/>
                                </g>
                            </svg>
                        </button>
                        <button class="fullscreen-btn tooltip" title="Fullscreen">
                            <svg class="icon-open" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <g stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                    <path
                                            d="M1 1h5M1 1v5M2 2l4.5962 4.5962M19 1v5M19 1h-5M18 2l-4.5962 4.5962M19 19h-5M19 19v-5M18 18l-4.5962-4.5962M1 19v-5M1 19h5M2 18l4.5962-4.5962"/>
                                </g>
                            </svg>
                            <svg class="icon-close" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                                <g stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                    <path d="M7 7H2M7 7V2M6 6L1.4038 1.4038M15 7V2M15 7h5M16 6l4.5962-4.5962"/>
                                    <g>
                                        <path d="M15 15h5M15 15v5M16 16l4.5962 4.5962"/>
                                    </g>
                                    <g>
                                        <path d="M7 15v5M7 15H2M6 16l-4.5962 4.5962"/>
                                    </g>
                                </g>
                            </svg>
                        </button>
                    </div>

                </div>
            </section>
            <section class="project-list delay">
                <div class="project-inner">
                    <div class="project-list-menu">
                        <button class="close-btn">
                            <svg width="28" height="28" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                 ratio="1.4">
                                <path fill="none" stroke="#000" stroke-width="1.06" d="M16,16 L4,4"></path>
                                <path fill="none" stroke="#000" stroke-width="1.06" d="M16,4 L4,16"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="project-list-items">

                        @if(count(json_decode($work->images)))
                            @foreach(json_decode($work->images) as $item)
                                <div class="project-item">
                                    <div class="project-image img-wrap cover p-ratio">
                                        @if(\App\Helpers\Functions::getFileName(\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->url) == 'mp4')
                                            <video class="swiper-lazy">
                                                <source src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->url}}" type="video/mp4">
                                            </video>
                                        @else
                                            <img alt="{{$work->title_vn}}" data-sizes="auto"
                                                 data-srcset="
            {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT_THUMB.$item->url}}?format=750w 750w,
          {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->url}}?format=2500w 2500w"
                                                 class="swiper-lazy"/>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>
            </section>


            <section id="info" class="project-detail" data-collection-id="5c0e76a1032be4144a210440">
                <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1544522606354"
                     id="page-5c0e76a1032be4144a210440">
                    <div class="row sqs-row">
                        @if(App::isLocale('vi'))
                            <div class="col sqs-col-12 span-12">
                                <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                     id="block-4e9a4d22cb5900b41bc8">
                                    <div class="sqs-block-content">
                                        <h1 style="white-space: pre-wrap;"><strong>{{$work->title_vn}}</strong></h1>
                                    </div>
                                </div>
                                <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                     id="block-ee6735572059e8004259">
                                    <div class="sqs-block-content">&nbsp;</div>
                                </div>
                                <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                     id="block-b1c600ab74dd474db4cb">
                                    <div class="sqs-block-content">
                                        {!! $work->content_vn !!}
                                    </div>
                                </div>
                                <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                     id="block-0a0b9c5fd321026c814b">
                                    <div class="sqs-block-content">&nbsp;</div>
                                </div>
                                <class class="sqs-block markdown-block sqs-block-markdown" data-block-type="44"
                                       id="block-41a539b53caa01ad1339">
                                    <div class="sqs-block-content">
                                        <hr>
                                        <h3 id="project-name">Project name</h3>
                                        <p>{{$work->project_name_vn}}</p>
                                        <hr>
                                        <h3 id="typology">Typology</h3>
                                        <p>{{$work->typology_vn}}</p>
                                        <hr>
                                        <h3 id="location">Location</h3>
                                        <p>{{$work->address}}</p>
                                        <hr>
                                        <h3 id="year">Year</h3>
                                        <p>{{$work->year}}</p>
                                        <hr>
                                        <h3 id="status">Status</h3>
                                        <p>{{$work->status_vn}}</p>
                                        <hr>
                                        <h3 id="size">Size</h3>
                                        <p>{{$work->size_vn}}</p>
                                        <hr>
                                        <h3 id="client">Client</h3>
                                        <p>{{$work->client_vn}}</p>
                                        <hr>
                                        <h3 id="collaborators">Collaborators</h3>
                                        <p>{{$work->collaborator_vn}}</p>
                                        <hr>
                                        <h3 id="design-team">Design team</h3>
                                        <p> {{$work->getPeopleVN()}} </p>
                                    </div>
                                    <!-- <div id="googleMap" style="width:100%;height:400px; margin-top: 30px;"></div> -->
                                    <!-- <div id="googleMap"></div> -->
                                    <div style="margin-top: 30px;">
                                        {{--<iframe src="https://maps.google.com/maps?q={{$work->lat.','.$work->long}}&hl=es;z=14&amp;output=embed"--}}
                                        {{--width="100%" height="400px"></iframe>--}}
                                        <div class="sqs-block map-block sqs-block-map"
                                             data-aspect-ratio="42.391304347826086"
                                             data-block-json="&#123;&quot;location&quot;:&#123;&quot;mapLat&quot;:{{$work->lat}},&quot;mapLng&quot;:{{$work->long}},&quot;mapZoom&quot;:14,&quot;markerLat&quot;:{{$work->lat}},&quot;markerLng&quot;:{{$work->long}},&quot;addressTitle&quot;:&quot;EFFEKT&quot;,&quot;addressLine1&quot;:&quot;Bl\u00E5g\u00E5rdsgade 8, 2. sal&quot;,&quot;addressLine2&quot;:&quot;K\u00F8benhavn&quot;,&quot;addressCountry&quot;:&quot;Denmark&quot;&#125;,&quot;vSize&quot;:null,&quot;style&quot;:4,&quot;labels&quot;:true,&quot;terrain&quot;:false,&quot;controls&quot;:false,&quot;hSize&quot;:null,&quot;floatDir&quot;:null,&quot;aspectRatio&quot;:42.391304347826086&#125;"
                                             data-block-type="4" id="block-yui_3_17_2_5_1509369643211_11245">
                                            <div class="sqs-block-content">&nbsp;</div>
                                        </div>
                                        <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1"
                                             data-block-type="21"
                                             id="block-yui_3_17_2_3_1509370795243_23617">
                                            <div class="sqs-block-content">&nbsp;</div>
                                        </div>
                                    </div>
                                </class>
                            </div>
                        @else
                            <div class="col sqs-col-12 span-12">
                                <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                     id="block-4e9a4d22cb5900b41bc8">
                                    <div class="sqs-block-content">
                                        <h1 style="white-space: pre-wrap;"><strong>{{$work->title_en}}</strong></h1>
                                    </div>
                                </div>
                                <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                     id="block-ee6735572059e8004259">
                                    <div class="sqs-block-content">&nbsp;</div>
                                </div>
                                <div class="sqs-block html-block sqs-block-html" data-block-type="2"
                                     id="block-b1c600ab74dd474db4cb">
                                    <div class="sqs-block-content">
                                        {!! $work->content_en !!}
                                    </div>
                                </div>
                                <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                     id="block-0a0b9c5fd321026c814b">
                                    <div class="sqs-block-content">&nbsp;</div>
                                </div>
                                <class class="sqs-block markdown-block sqs-block-markdown" data-block-type="44"
                                       id="block-41a539b53caa01ad1339">
                                    <div class="sqs-block-content">
                                        <hr>
                                        <h3 id="project-name">Project name</h3>
                                        <p>{{$work->project_name_en}}</p>
                                        <hr>
                                        <h3 id="typology">Typology</h3>
                                        <p>{{$work->typology_en}}</p>
                                        <hr>
                                        <h3 id="location">Location</h3>
                                        <p>{{$work->address}}</p>
                                        <hr>
                                        <h3 id="year">Year</h3>
                                        <p>{{$work->year}}</p>
                                        <hr>
                                        <h3 id="status">Status</h3>
                                        <p>{{$work->status_en}}</p>
                                        <hr>
                                        <h3 id="size">Size</h3>
                                        <p>{{$work->size_en}}</p>
                                        <hr>
                                        <h3 id="client">Client</h3>
                                        <p>{{$work->client_en}}</p>
                                        <hr>
                                        <h3 id="collaborators">Collaborators</h3>
                                        <p>{{$work->collaborator_en}}</p>
                                        <hr>
                                        <h3 id="design-team">Design team</h3>
                                        <p>{{$work->getPeopleEN()}}</p>
                                    </div>
                                    <!-- <div id="googleMap" style="width:100%;height:400px; margin-top: 30px;"></div> -->
                                    <!-- <div id="googleMap"></div> -->
                                    <div style="margin-top: 30px;">
                                        <div class="sqs-block map-block sqs-block-map"
                                             data-aspect-ratio="42.391304347826086"
                                             data-block-json="&#123;&quot;location&quot;:&#123;&quot;mapLat&quot;:{{$work->lat}},&quot;mapLng&quot;:{{$work->long}},&quot;mapZoom&quot;:14,&quot;markerLat&quot;:{{$work->lat}},&quot;markerLng&quot;:{{$work->long}},&quot;addressTitle&quot;:&quot;EFFEKT&quot;,&quot;addressLine1&quot;:&quot;Bl\u00E5g\u00E5rdsgade 8, 2. sal&quot;,&quot;addressLine2&quot;:&quot;K\u00F8benhavn&quot;,&quot;addressCountry&quot;:&quot;Denmark&quot;&#125;,&quot;vSize&quot;:null,&quot;style&quot;:4,&quot;labels&quot;:true,&quot;terrain&quot;:false,&quot;controls&quot;:false,&quot;hSize&quot;:null,&quot;floatDir&quot;:null,&quot;aspectRatio&quot;:42.391304347826086&#125;"
                                             data-block-type="4" id="block-yui_3_17_2_5_1509369643211_11245">
                                            <div class="sqs-block-content">&nbsp;</div>
                                        </div>
                                        <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1"
                                             data-block-type="21"
                                             id="block-yui_3_17_2_3_1509370795243_23617">
                                            <div class="sqs-block-content">&nbsp;</div>
                                        </div>
                                    </div>
                                </class>
                            </div>
                        @endif
                    </div>
                </div>
                </div>
            </section>
        </main>
        <script>
            $(document).keydown(function (event) {
                if (event.which == 37) {
                    $('.prev').click();
                }
                if (event.which == 39) {
                    $('.next').click();
                }
            });
        </script>
@endsection
