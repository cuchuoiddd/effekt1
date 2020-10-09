@extends('frontend.layout.master')
@section('body')
    <body class="product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center newsletter-style-dark hide-opentable-icons opentable-style-light small-button-style-solid small-button-shape-square medium-button-style-solid medium-button-shape-square large-button-style-solid large-button-shape-square image-block-poster-text-alignment-center image-block-card-dynamic-font-sizing image-block-card-content-position-center image-block-card-text-alignment-left image-block-overlap-dynamic-font-sizing image-block-overlap-content-position-center image-block-overlap-text-alignment-left image-block-collage-dynamic-font-sizing image-block-collage-content-position-top image-block-collage-text-alignment-left image-block-stack-dynamic-font-sizing image-block-stack-text-alignment-left button-style-outline button-corner-style-square tweak-product-quick-view-button-style-floating tweak-product-quick-view-button-position-bottom tweak-product-quick-view-lightbox-excerpt-display-truncate tweak-product-quick-view-lightbox-show-arrows tweak-product-quick-view-lightbox-show-close-button tweak-product-quick-view-lightbox-controls-weight-light product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center native-currency-code-usd collection-59f053c6dc2b4a28571da96c collection-type-blog collection-layout-default view-list">
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
            <div class="blog-list">

                @if(count($news))
                    @foreach($news as $item)
                        @if(App::isLocale('vi'))
                            <article
                                    class="blog-item hentry tag-2020 author-lucrezia-biasutti post-type-text article-index-1"
                                    data-ao="{{$item->year}}">
                                <a href="news/{{$item->slug}}"
                                   title="{{$item->title_vn}}">
                                    <div class="blog-image img-wrap cover">

                                        <img alt="{{$item->title_vn}}" data-sizes="auto"
                                             data-srcset="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=100w 100w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=300w 300w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=500w 500w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=750w 750w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=1000w 1000w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=1500w 1500w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=2500w 2500w"
                                             class="lazyautosizes ls-is-cached lazyloaded" sizes="342px"
                                             srcset="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=100w 100w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=300w 300w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=500w 500w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=750w 750w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=1000w 1000w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=1500w 1500w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=2500w 2500w">
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
                            <article
                                    class="blog-item hentry tag-2020 author-lucrezia-biasutti post-type-text article-index-1"
                                    data-ao="{{$item->year}}">
                                <a href="news/{{$item->slug}}"
                                   title="{{$item->title_en}}">
                                    <div class="blog-image img-wrap cover">

                                        <img alt="{{$item->title_en}}" data-sizes="auto"
                                             data-srcset="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=100w 100w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=300w 300w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=500w 500w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=750w 750w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=1000w 1000w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=1500w 1500w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=2500w 2500w"
                                             class="lazyautosizes ls-is-cached lazyloaded" sizes="342px"
                                             srcset="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=100w 100w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=300w 300w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=500w 500w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=750w 750w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=1000w 1000w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=1500w 1500w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}?format=2500w 2500w">
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
@endsection