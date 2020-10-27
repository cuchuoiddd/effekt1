
@extends('frontend.layout.master')

@if(App::isLocale('vi'))
    @section('title')
        <title>Công việc</title>
    @endsection
    @section('meta-title')
        <meta property="og:title" content="Công việc">
    @endsection
    @section('meta-description')
        <meta name="description" content="">
    @endsection
    @else
    @section('title')
        <title>Work</title>
    @endsection
    @section('meta-title')
        <meta property="og:title" content="Work">
    @endsection
    @section('meta-description')
        <meta name="description" content="">
    @endsection
@endif

@section('body')
    <body class="product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center newsletter-style-dark hide-opentable-icons opentable-style-light small-button-style-solid small-button-shape-square medium-button-style-solid medium-button-shape-square large-button-style-solid large-button-shape-square image-block-poster-text-alignment-center image-block-card-dynamic-font-sizing image-block-card-content-position-center image-block-card-text-alignment-left image-block-overlap-dynamic-font-sizing image-block-overlap-content-position-center image-block-overlap-text-alignment-left image-block-collage-dynamic-font-sizing image-block-collage-content-position-top image-block-collage-text-alignment-left image-block-stack-dynamic-font-sizing image-block-stack-text-alignment-left button-style-outline button-corner-style-square tweak-product-quick-view-button-style-floating tweak-product-quick-view-button-position-bottom tweak-product-quick-view-lightbox-excerpt-display-truncate tweak-product-quick-view-lightbox-show-arrows tweak-product-quick-view-lightbox-show-close-button tweak-product-quick-view-lightbox-controls-weight-light product-list-titles-overlay product-list-alignment-center product-item-size-11-square product-image-auto-crop product-gallery-size-11-square product-gallery-auto-crop show-product-price show-product-item-nav product-social-sharing tweak-v1-related-products-image-aspect-ratio-11-square tweak-v1-related-products-details-alignment-center native-currency-code-usd collection-type-gallery collection-59efd73cb7411c1c8d05538c collection-layout-default view-list">

    @endsection
    @section('trans-nav')
        <nav class="trans-nav">
            <div class="trans-nav-wrapper">

                <ul class="category-nav">

                    @if(count($categories))
                        @if(App::isLocale('vi'))
                            <li>
                                <a href="#" class="iso-btn" title="All">Tất cả</a>
                            </li>
                            @foreach($categories as $item)
                                <li>
                                    <a href="#category={{$item->title_en}}" class="iso-btn" title="{{$item->title_vn}}">{{$item->title_vn}}</a>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <a href="#" class="iso-btn" title="All">All</a>
                            </li>
                            @foreach($categories as $item)
                                <li>
                                    <a href="#category={{$item->title_en}}" class="iso-btn" title="{{$item->title_en}}">{{$item->title_en}}</a>
                                </li>
                            @endforeach
                        @endif
                    @endif

                </ul>


            </div>
        </nav>
    @endsection
    @section('content')
        <main class="site-content" role="main" data-content-field="main-content">
            <div class="gallery-list iso-grid">
                @if(count($works))
                    @if(App::isLocale('vi'))
                        @foreach($works as $item)
                            <div
                                    class="gallery-item iso-item hentry category-{{$item->category->title_en}} author-lucrezia-biasutti post-type-image article-index-1">
                                <a href="work/{{$item->slug}}" title="Rosenhøj Youth Housing">
                                    <div class="iso-image img-wrap cover">
                                        @if(count($item->images))
                                        <img alt="{{$item->title_vn}}" data-sizes="auto" data-srcset="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=100w 100w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=300w 300w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=500w 500w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=750w 750w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=1000w 1000w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=1500w 1500w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=2500w 2500w" class="lazyautosizes ls-is-cached lazyloaded" sizes="434px" srcset="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=100w 100w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=300w 300w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=500w 500w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=750w 750w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=1000w 1000w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=1500w 1500w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=2500w 2500w">
                                        @endif

                                    </div>
                                    <div class="item-meta-wrapper">
                                        <div class="item-meta">

                                            <div class="item-title">{{$item->title_vn}}</div>


                                            <p>{{$item->year}}</p>
                                            <p>{{$item->category->title_vn}}</p>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        @foreach($works as $item)
                            <div
                                    class="gallery-item iso-item hentry category-{{$item->category->title_en}} author-lucrezia-biasutti post-type-image article-index-1">
                                <a href="work/{{$item->slug}}" title="Rosenhøj Youth Housing">
                                    <div class="iso-image img-wrap cover">

                                        @if(count($item->images))
                                        <img alt="{{$item->title_en}}" data-sizes="auto" data-srcset="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=100w 100w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=300w 300w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=500w 500w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=750w 750w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=1000w 1000w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=1500w 1500w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=2500w 2500w" class="lazyautosizes ls-is-cached lazyloaded" sizes="434px" srcset="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=100w 100w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=300w 300w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=500w 500w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=750w 750w,
	    {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=1000w 1000w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=1500w 1500w,
      {{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$item->images[0]->url}}?format=2500w 2500w">
                                            @endif
                                    </div>
                                    <div class="item-meta-wrapper">
                                        <div class="item-meta">

                                            <div class="item-title">{{$item->title_en}}</div>


                                            <p>{{$item->year}}</p>
                                            <p>{{$item->category->title_en}}</p>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                @endif


            </div>
        </main>
    @endsection