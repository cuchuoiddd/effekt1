@extends('frontend.layout.master')
@section('body')
    <body class="product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center newsletter-style-dark hide-opentable-icons opentable-style-light small-button-style-solid small-button-shape-square medium-button-style-solid medium-button-shape-square large-button-style-solid large-button-shape-square image-block-poster-text-alignment-center image-block-card-dynamic-font-sizing image-block-card-content-position-center image-block-card-text-alignment-left image-block-overlap-dynamic-font-sizing image-block-overlap-content-position-center image-block-overlap-text-alignment-left image-block-collage-dynamic-font-sizing image-block-collage-content-position-top image-block-collage-text-alignment-left image-block-stack-dynamic-font-sizing image-block-stack-text-alignment-left button-style-outline button-corner-style-square tweak-product-quick-view-button-style-floating tweak-product-quick-view-button-position-bottom tweak-product-quick-view-lightbox-excerpt-display-truncate tweak-product-quick-view-lightbox-show-arrows tweak-product-quick-view-lightbox-show-close-button tweak-product-quick-view-lightbox-controls-weight-light product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center native-currency-code-usd collection-59f053c6dc2b4a28571da96c collection-type-blog collection-layout-default view-list">

    @endsection
    @section('content')
        <main class="site-content" role="main" data-content-field="main-content">
            <section id="profile" class="index-page" data-collection-id="59f08bf99f07f5510958fb4b"
                     uk-scrollspy="cls:uk-animation-fade">

                <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1539862941919"
                     id="page-59f08bf99f07f5510958fb4b">
                    <div class="row sqs-row">
                        <div class="col sqs-col-12 span-12">
                            <div class="sqs-block image-block sqs-block-image" data-aspect-ratio="42.934782608695656"
                                 data-block-type="5" id="block-33d80b8bbea1961ffc8c">
                                <div class="sqs-block-content">


                                    <figure
                                            class="
            sqs-block-image-figure
            image-block-outer-wrapper
            image-block-v2
            design-layout-poster
            combination-animation-none
            individual-animation-none
            individual-text-animation-none
            image-position-left
          "
                                            data-scrolled
                                            data-test="image-block-v2-outer-wrapper"
                                    >

                                        <div class="intrinsic">

                                            <div
                                                    style="padding-bottom:42.934783935546875%;"
                                                    class="
                image-inset
                  content-fill has-aspect-ratio
              "
                                                    data-animation-role="image"
                                                    data-description=""


                                            >
                                                <img data-src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_profile}}" data-image="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_profile}}" data-image-dimensions="1000x500" data-image-focal-point="0.5,0.5" alt="office" data-parent-ratio="2.3" style="left: 0px; top: -53px; width: 1504px; height: 752px; position: absolute;" class="loaded" data-image-resolution="2500w" src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_profile}}?format=2500w">
                                                <div class="image-overlay"></div>

                                            </div>


                                        </div>


                                        <figcaption class="image-card-wrapper" data-width-ratio>
                                            <div class="image-card sqs-dynamic-text-container">


                                                <div class="image-title-wrapper">
                                                    <div class="image-title sqs-dynamic-text">
                                                        @if(App::isLocale('vi'))
                                                            <p>Hồ sơ</p>
                                                        @else
                                                            <p>Profile</p>
                                                        @endif
                                                    </div>
                                                </div>


                                            </div>
                                        </figcaption>


                                    </figure>


                                </div>
                            </div>
                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                 id="block-yui_3_17_2_3_1509109870318_86563">
                                <div class="sqs-block-content">&nbsp;</div>
                            </div>
                            @if(App::isLocale('vi'))
                                <div class="row sqs-row">
                                    {!! $office->content_profile_vn !!}
                                </div>
                            @else
                                <div class="row sqs-row">
                                    {!! $office->content_profile_en !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </section>


            <section id="contact" class="index-page" data-collection-id="59f727388e7b0f7a605c0d28"
                     uk-scrollspy="cls:uk-animation-fade">

                <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1600165627667"
                     id="page-59f727388e7b0f7a605c0d28">
                    <div class="row sqs-row">
                        <div class="col sqs-col-12 span-12">
                            <div class="sqs-block map-block sqs-block-map" data-aspect-ratio="42.391304347826086"
                                 data-block-json="&#123;&quot;location&quot;:&#123;&quot;mapLat&quot;:{{$office->contact_lat}},&quot;mapLng&quot;:{{$office->contact_long}},&quot;mapZoom&quot;:14,&quot;markerLat&quot;:{{$office->contact_lat}},&quot;markerLng&quot;:{{$office->contact_long}},&quot;addressTitle&quot;:&quot;EFFEKT&quot;,&quot;addressLine1&quot;:&quot;Bl\u00E5g\u00E5rdsgade 8, 2. sal&quot;,&quot;addressLine2&quot;:&quot;K\u00F8benhavn&quot;,&quot;addressCountry&quot;:&quot;Denmark&quot;&#125;,&quot;vSize&quot;:null,&quot;style&quot;:4,&quot;labels&quot;:true,&quot;terrain&quot;:false,&quot;controls&quot;:false,&quot;hSize&quot;:null,&quot;floatDir&quot;:null,&quot;aspectRatio&quot;:42.391304347826086&#125;"
                                 data-block-type="4" id="block-yui_3_17_2_5_1509369643211_11245">
                                <div class="sqs-block-content">&nbsp;</div>
                            </div>

                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                 id="block-yui_3_17_2_3_1509370795243_23617">
                                <div class="sqs-block-content">&nbsp;</div>
                            </div>
                            <div class="row sqs-row">
                                @if(App::isLocale('vi'))
                                    <div class="row sqs-row">
                                        {!! $office->content_contact_vn !!}
                                    </div>
                                @else
                                    <div class="row sqs-row">
                                        {!! $office->content_contact_en !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </section>


            <section id="people" class="index-page" data-collection-id="59f08863914e6be5ad88318e"
                     uk-scrollspy="cls:uk-animation-fade">

                <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1599483305537"
                     id="page-59f08863914e6be5ad88318e">
                    <div class="row sqs-row">
                        <div class="col sqs-col-12 span-12">
                            <div class="sqs-block image-block sqs-block-image" data-aspect-ratio="42.934782608695656"
                                 data-block-type="5" id="block-yui_3_17_2_12_1508967373173_98504">
                                <div class="sqs-block-content">


                                    <figure
                                            class="
            sqs-block-image-figure
            image-block-outer-wrapper
            image-block-v2
            design-layout-poster
            combination-animation-none
            individual-animation-none
            individual-text-animation-none
            image-position-left

          "
                                            data-scrolled
                                            data-test="image-block-v2-outer-wrapper"
                                    >

                                        <div class="intrinsic">

                                            <div style="padding-bottom:42.934783935546875%;"
                                                 class="image-inset content-fill has-aspect-ratio"
                                                 data-animation-role="image"
                                                 data-description=""
                                            >
                                                <img data-src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_people}}" data-image="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_people}}" data-image-dimensions="2500x1667" data-image-focal-point="0.49990699404761907,0.3630952380952381" data-parent-ratio="2.3" style="left: 0px; top: -41.1363px; width: 1504px; height: 1002.87px; position: absolute;" alt="office" class="loaded" data-image-resolution="2500w" src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_people}}?format=2500w">
                                                <div class="image-overlay"></div>
                                            </div>
                                        </div>
                                        <figcaption class="image-card-wrapper" data-width-ratio>
                                            <div class="image-card sqs-dynamic-text-container">
                                                <div class="image-title-wrapper">
                                                    <div class="image-title sqs-dynamic-text">
                                                        @if(App::isLocale('vi'))
                                                            <p>Con người</p>
                                                        @else
                                                            <p>People</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </figcaption>


                                    </figure>


                                </div>
                            </div>
                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                 id="block-yui_3_17_2_1_1548929908065_1149503">
                                <div class="sqs-block-content">&nbsp;</div>
                            </div>

                            <div class="row sqs-row">
                                @if(count($people))
                                    @foreach($people as $item)
                                        <div class="col sqs-col-4 span-4">
                                            <div class="sqs-block image-block sqs-block-image">
                                                <div class="sqs-block-content">


                                                    <div
                                                            class="
          image-block-outer-wrapper
          layout-caption-below
          design-layout-inline
          combination-animation-none
          individual-animation-none
          individual-text-animation-none
        "
                                                            data-test="image-block-inline-outer-wrapper"
                                                    >


                                                        <figure
                                                                class="sqs-block-image-figure intrinsic"
                                                                style="max-width:2500.0px;"
                                                        >


                                                            <div style="padding-bottom:66.63999938964844%;" class="image-block-wrapper has-aspect-ratio"
                                                                 data-animation-role="image">
                                                                <img class="thumb-image"
                                                                     data-src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PEOPLE.$item->avatar}}"
                                                                     data-image="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PEOPLE.$item->avatar}}"
                                                                     data-image-dimensions="2500x1666"
                                                                     data-image-focal-point="0.5,0.5"
                                                                     alt="{{$item->full_name_vn}} {{$item->job_vn}} {{$item->email}}"
                                                                     data-load="false"
                                                                     data-type="image"/>
                                                            </div>

                                                            @if(App::isLocale('vi'))
                                                                <figcaption class="image-caption-wrapper">
                                                                    <div class="image-caption">
                                                                        <p class="">
                                                                            <strong>{{$item->full_name_vn}} </strong><br>{{$item->job_vn}}
                                                                            <br>
                                                                            <a href="mailto:{{$item->email}}"
                                                                               target="_blank">{{$item->email}}</a>
                                                                        </p></div>
                                                                </figcaption>
                                                            @else
                                                                <figcaption class="image-caption-wrapper">
                                                                    <div class="image-caption">
                                                                        <p class="">
                                                                            <strong>{{$item->full_name_en}} </strong><br>{{$item->job_en}}
                                                                            <br>
                                                                            <a href="mailto:{{$item->email}}"
                                                                               target="_blank">{{$item->email}}</a>
                                                                        </p></div>
                                                                </figcaption>
                                                            @endif


                                                        </figure>


                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>

                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                 id="block-yui_3_17_2_1_1580738892110_223735">
                                <div class="sqs-block-content">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>


            <section id="employment" class="index-page" data-collection-id="59f08a36914e6be5ad884411"
                     uk-scrollspy="cls:uk-animation-fade">

                <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1593771223835"
                     id="page-59f08a36914e6be5ad884411">
                    <div class="row sqs-row">
                        <div class="col sqs-col-12 span-12">
                            <div class="sqs-block image-block sqs-block-image" data-aspect-ratio="42.934782608695656"
                                 data-block-type="5" id="block-yui_3_17_2_12_1508967373173_114525">
                                <div class="sqs-block-content">


                                    <figure
                                            class="
            sqs-block-image-figure
            image-block-outer-wrapper
            image-block-v2
            design-layout-poster
            combination-animation-none
            individual-animation-none
            individual-text-animation-none
            image-position-left

          "
                                            data-scrolled
                                            data-test="image-block-v2-outer-wrapper"
                                    >

                                        <div class="intrinsic">

                                            <div


                                                    style="padding-bottom:42.934783935546875%;"

                                                    class="

                image-inset

                  content-fill has-aspect-ratio

              "
                                                    data-animation-role="image"
                                                    data-description=""


                                            >
                                                <img data-src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_employment}}" data-image="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_employment}}" data-image-dimensions="2500x1667" data-image-focal-point="0.5118117559523809,0.8869047619047619" data-parent-ratio="2.3" style="left: 0px; top: -356.867px; width: 1504px; height: 1002.87px; position: absolute;" alt="IMG_2909.jpg" class="loaded" data-image-resolution="2500w" src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_employment}}?format=2500w">

                                                <div class="image-overlay"></div>

                                            </div>


                                        </div>


                                        <figcaption class="image-card-wrapper" data-width-ratio>
                                            <div class="image-card sqs-dynamic-text-container">


                                                <div class="image-title-wrapper">
                                                    <div class="image-title sqs-dynamic-text">
                                                        @if(App::isLocale('vi'))
                                                            <p>Việc làm</p>
                                                        @else
                                                            <p>Employment</p>
                                                        @endif

                                                    </div>
                                                </div>


                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                 id="block-yui_3_17_2_51_1508922082592_18804">
                                <div class="sqs-block-content">&nbsp;</div>
                            </div>
                            <div class="row sqs-row">
                                @if(App::isLocale('vi'))
                                    {!! $office-> content_employment_vn!!}
                                @else
                                    {!! $office-> content_employment_en!!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </section>


            <section id="awards" class="index-page" data-collection-id="59f08c24b1ffb65236c288d5"
                     uk-scrollspy="cls:uk-animation-fade">

                <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1574346858508"
                     id="page-59f08c24b1ffb65236c288d5">
                    <div class="row sqs-row">
                        <div class="col sqs-col-12 span-12">
                            <div class="sqs-block image-block sqs-block-image" data-aspect-ratio="40.77757685352622"
                                 data-block-type="5" id="block-1652ff24a5f8363e7d6a">
                                <div class="sqs-block-content">


                                    <figure
                                            class="
            sqs-block-image-figure
            image-block-outer-wrapper
            image-block-v2
            design-layout-poster
            combination-animation-none
            individual-animation-none
            individual-text-animation-none
            image-position-left

          "
                                            data-scrolled
                                            data-test="image-block-v2-outer-wrapper"
                                    >

                                        <div class="intrinsic">

                                            <div
                                                    style="padding-bottom:40.7775764465332%;"

                                                    class="

                image-inset

                  content-fill has-aspect-ratio

              "
                                                    data-animation-role="image"
                                                    data-description=""


                                            >

                                                <img data-src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_award}}" data-image="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_award}}" data-image-dimensions="2500x1667" data-image-focal-point="0.49990699404761907,0.3630952380952381" data-parent-ratio="2.3" style="left: 0px; top: -41.1363px; width: 1504px; height: 1002.87px; position: absolute;" alt="IMG_9864.jpg" class="loaded" data-image-resolution="2500w" src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_award}}?format=2500w">

                                                <div class="image-overlay"></div>

                                            </div>


                                        </div>


                                        <figcaption class="image-card-wrapper" data-width-ratio>
                                            <div class="image-card sqs-dynamic-text-container">


                                                <div class="image-title-wrapper">
                                                    <div class="image-title sqs-dynamic-text">
                                                        @if(App::isLocale('vi'))
                                                            <p>Giải thưởng</p>
                                                        @else
                                                            <p>Awards</p>
                                                        @endif
                                                    </div>
                                                </div>


                                            </div>
                                        </figcaption>


                                    </figure>


                                </div>
                            </div>
                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                 id="block-yui_3_17_2_3_1509109870318_80845">
                                <div class="sqs-block-content">&nbsp;</div>
                            </div>
                            <div class="row sqs-row">
                                @if(App::isLocale('vi'))
                                    {!! $office->content_award_vn !!}
                                @else
                                    {!! $office->content_award_en !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </section>


            <section id="clients" class="index-page" data-collection-id="59f08d0418b27d403f5de6bd"
                     uk-scrollspy="cls:uk-animation-fade">

                <div class="sqs-layout sqs-grid-12 columns-12" data-type="page" data-updated-on="1509294554992"
                     id="page-59f08d0418b27d403f5de6bd">
                    <div class="row sqs-row">
                        <div class="col sqs-col-12 span-12">
                            <div class="sqs-block image-block sqs-block-image" data-aspect-ratio="41.048824593128394"
                                 data-block-type="5" id="block-yui_3_17_2_3_1509109870318_62352">
                                <div class="sqs-block-content">


                                    <figure
                                            class="
            sqs-block-image-figure
            image-block-outer-wrapper
            image-block-v2
            design-layout-poster



            image-position-left

          "
                                            data-scrolled
                                            data-test="image-block-v2-outer-wrapper"
                                    >

                                        <div class="intrinsic">

                                            <div


                                                    style="padding-bottom:41.048824310302734%;"

                                                    class="

                image-inset

                  content-fill has-aspect-ratio

              "
                                                    data-animation-role="image"
                                                    data-description=""

                                                    data-animation-override

                                            >

                                                <img data-src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_client}}" data-image="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_client}}" data-image-dimensions="2500x2000" data-image-focal-point="0.5047619047619047,0.7440476190476191" data-parent-ratio="2.4" style="left: 0%; top: -70.6906%; width: 100%; height: 195.008%; position: absolute;" alt="Carlsberg_UCC.jpg" class="loaded" data-image-resolution="2500w" src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_client}}?format=2500w">
                                                <div class="image-overlay"></div>

                                            </div>


                                        </div>


                                        <figcaption class="image-card-wrapper" data-width-ratio>
                                            <div class="image-card sqs-dynamic-text-container">


                                                <div class="image-title-wrapper">
                                                    <div class="image-title sqs-dynamic-text"

                                                         data-animation-override
                                                    >
                                                        @if(App::isLocale('vi'))
                                                            <p>Khách hàng</p>
                                                        @else
                                                            <p>Clients</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </figcaption>


                                    </figure>


                                </div>
                            </div>
                            <div class="sqs-block spacer-block sqs-block-spacer sized vsize-1" data-block-type="21"
                                 id="block-yui_3_17_2_3_1509109870318_75202">
                                <div class="sqs-block-content">&nbsp;</div>
                            </div>
                            <div class="sqs-block gallery-block sqs-block-gallery"
                                 data-block-json="&#123;&quot;show-meta-only-title&quot;:false,&quot;methodOption&quot;:&quot;existing&quot;,&quot;existingGallery&quot;:&quot;55faa0d8e4b03c227ed5532d&quot;,&quot;newWindow&quot;:false,&quot;design&quot;:&quot;grid&quot;,&quot;aspectRatio&quot;:null,&quot;auto-crop&quot;:true,&quot;square-thumbs&quot;:false,&quot;aspect-ratio&quot;:&quot;standard&quot;,&quot;show-meta&quot;:true,&quot;thumbnails-per-row&quot;:5,&quot;padding&quot;:0,&quot;lightbox&quot;:false,&quot;collectionId&quot;:&quot;55faa0d8e4b03c227ed5532d&quot;,&quot;existingGalleryId&quot;:&quot;55faa0d8e4b03c227ed5532d&quot;,&quot;vSize&quot;:null&#125;"
                                 data-block-type="8" id="block-6d6b8f13922937a7002c">
                                <div class="sqs-block-content">


                                    <div class="
                                  sqs-gallery-container
                                  sqs-gallery-block-grid
                                  sqs-gallery-aspect-ratio-standard
                                  sqs-gallery-thumbnails-per-row-5
                                  clear"
                                    >
                                        <div class="sqs-gallery">
                                            @if(count($office->image_client_logo))
                                                @foreach($office->image_client_logo as $item)
                                                    <div class="slide" data-type="image" data-animation-role="image">
                                                        <div class="margin-wrapper">

                                                            <a href="" class=" image-slide-anchor content-fit">
                                                                <img class="thumb-image"
                                                                     data-src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE_LOGO.$item->url}}"
                                                                     data-image="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE_LOGO.$item->url}}"
                                                                     data-image-dimensions="600x400" data-image-focal-point="0.5,0.5"
                                                                     data-load="false"
                                                                     data-type="image"
                                                                     alt="office"
                                                                />
                                                            </a>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>


                                    </div>


                                    <style type="text/css" id="design-grid-css">
                                        #block-6d6b8f13922937a7002c .sqs-gallery-block-grid .sqs-gallery-design-grid {
                                            margin-right: -0px;
                                        }

                                        #block-6d6b8f13922937a7002c .sqs-gallery-block-grid .sqs-gallery-design-grid-slide .margin-wrapper {
                                            margin-right: 0px;
                                            margin-bottom: 0px;
                                        }
                                    </style>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </main>
@endsection

