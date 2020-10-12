<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fff">
    <!-- ** developed by hellobear.co ** -->

    <!-- This is Squarespace. -->
    <!-- effekt -->
    <base #href="">
    <meta charset="utf-8"/>
    <link rel="shortcut icon" type="image/x-icon"
          href="{{isset(\App\Helpers\Functions::getSetting()->favicon) && \App\Helpers\Functions::getSetting()->favicon
          ?\App\Constants\DirectoryConstant::UPLOAD_FOLDER_FAVICON.\App\Helpers\Functions::getSetting()->favicon
          :''}}">
    @yield('title')
    @yield('meta-title')
    @yield('meta-description')
    @include('frontend.layout.head')
    <style>
        .logo img{
            max-height: 50px;
        }
        @media only screen and (max-width: 640px){
            .logo img{
                max-height: 30px;
            }
        }
    </style>
</head>

@yield('body')
<header class="site-header">
    <nav class="site-nav">
        <div class="logo-container">
            @if(App::isLocale('vi'))
                <a class="logo" href="/" data-content-field="site-title">
                    @if(isset(\App\Helpers\Functions::getSetting()->logo) && \App\Helpers\Functions::getSetting()->logo)
                        <img src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_LOGO.\App\Helpers\Functions::getSetting()->logo}}"
                             alt="logo">
                    @else
                        air.concept
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
            @include('frontend.layout.menu')
        </ul>
    </div>
    @yield('trans-nav')
</header>




@yield('content')

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
                        <div class="sqs-block-content"><p class="text-align-center">Copyright © 2018&nbsp; | &nbsp;All
                                rights reserved &nbsp;|&nbsp; <a href="">Privacy Policy</a></p>
                        </div>
                    </div>
                    <div class="sqs-block socialaccountlinks-v2-block sqs-block-socialaccountlinks-v2"
                         data-block-type="54" id="block-yui_3_17_2_80_1508967373173_6221">
                        <div class="sqs-block-content">


                            <div class="sqs-svg-icon--outer social-icon-alignment-center social-icons-color-black social-icons-size-small social-icons-style-regular ">
                                <nav class="sqs-svg-icon--list">
                                    <a href="http://www.linkedin.com/company/effekt" target="_blank"
                                       class="sqs-svg-icon--wrapper linkedin" aria-label="Mikkel Bøgh">
                                        <div>
                                            <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                                <use class="sqs-use--icon" xlink:href="#linkedin-icon"></use>
                                                <use class="sqs-use--mask" xlink:href="#linkedin-mask"></use>
                                            </svg>
                                        </div>
                                    </a>
                                    <a href="http://www.facebook.com/effekt.dk" target="_blank"
                                           class="sqs-svg-icon--wrapper facebook" aria-label="EFFEKT">
                                        <div>
                                            <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                                <use class="sqs-use--icon" xlink:href="#facebook-icon"></use>
                                                <use class="sqs-use--mask" xlink:href="#facebook-mask"></use>
                                            </svg>
                                        </div>
                                    </a>
                                    <a href="https://twitter.com/EffektArch" target="_blank"
                                           class="sqs-svg-icon--wrapper twitter" aria-label="EFFEKT Architects">
                                        <div>
                                            <svg class="sqs-svg-icon--social" viewBox="0 0 64 64">
                                                <use class="sqs-use--icon" xlink:href="#twitter-icon"></use>
                                                <use class="sqs-use--mask" xlink:href="#twitter-mask"></use>
                                            </svg>
                                        </div>
                                    </a>
                                    <a href="http://instagram.com/effektarchitects" target="_blank"
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


<script>
    Squarespace.afterBodyLoad(Y);
    $(document).on('click', '.dropdown-toggle', function () {
        $('.dropdown-menu').toggle();
    })
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOYTBGlUxFOO0am9ZAsM3-q3Fv2GBWxys&callback=myMap"></script>

@yield('script')
</body>

</html>