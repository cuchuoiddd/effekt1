<!-- - var navbarShadow = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    @include('backend.layouts.head')
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns" id="app">
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-light bg-gradient-x-grey-blue"
     id="vue-component">
    <header-component></header-component>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    @include('backend.layouts.sidebar')
</div>
<div class="app-content content">
    <div class="content-wrapper">
        @include('backend.layouts.breadcrumb')
        @yield('content')
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-dark navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2"
                                                                                     href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
                                                                                     target="_blank">PIXINVENT </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Hand-crafted & Made with <i
                    class="ft-heart pink"></i></span>
    </p>
</footer>
<div class="loading-custom" style="display: none;">
    <div class="" style="margin: auto">
        <img src="{{url('images/loading.gif')}}" alt="">
    </div>
</div>
@yield('script')
</body>
</html>
