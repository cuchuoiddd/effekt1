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