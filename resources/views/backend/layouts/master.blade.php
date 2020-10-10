<!-- - var navbarShadow = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    @include('backend.layouts.head')
    <style>
        @media only screen and (max-width: 640px){
            .collection-type-blog:not(.view-item) .site-content, .collection-type-gallery .site-content {
                margin: 0;
            }
            .row .sqs-row {
                padding: 17px;
            }
            .uk-hidden{
                display: none;
            }
        }
    </style>
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns" id="app">
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-light bg-gradient-x-grey-blue"
     id="vue-component">
    {{--<div class="navbar-wrapper">--}}
        {{--<div class="navbar-header">--}}
            {{--<ul class="nav navbar-nav flex-row">--}}
                {{--<li class="nav-item mobile-menu d-md-none mr-auto">--}}
                    {{--<a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i--}}
                                {{--class="ft-menu font-large-1"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="navbar-brand" href="/">--}}
                        {{--<img class="brand-logo" alt="stack admin logo"--}}
                             {{--src="/backend/app-assets/images/logo/stack-logo.png">--}}
                        {{--<h2 class="brand-text">Stack</h2>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item d-md-none">--}}
                    {{--<a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">--}}
                        {{--<i class="fa fa-ellipsis-v"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="navbar-container content">--}}
            {{--<div class="collapse navbar-collapse" id="navbar-mobile">--}}
                {{--<ul class="nav navbar-nav mr-auto float-left">--}}
                    {{--<li class="nav-item d-none d-md-block">--}}
                        {{--<a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">--}}
                            {{--<i class="ft-menu"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<ul class="nav navbar-nav float-right">--}}
                    {{--<li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span class="selected-language"></span></a>--}}
                        {{--<div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a>--}}
                            {{--<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a>--}}
                            {{--<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a>--}}
                            {{--<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown dropdown-notification nav-item">--}}
                        {{--<a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>--}}
                            {{--<span class="badge badge-pill badge-default badge-danger badge-default badge-up">5</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">--}}
                            {{--<li class="dropdown-menu-header">--}}
                                {{--<h6 class="dropdown-header m-0">--}}
                                    {{--<span class="grey darken-2">Notifications</span>--}}
                                    {{--<span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>--}}
                                {{--</h6>--}}
                            {{--</li>--}}
                            {{--<li class="scrollable-container media-list ps-container ps-theme-dark ps-active-y" data-ps-id="2a8a15f5-81e6-e7a1-a083-5de650048ae8">--}}
                                {{--<a href="javascript:void(0)">--}}
                                    {{--<div class="media">--}}
                                        {{--<div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h6 class="media-heading">You have new order!</h6>--}}
                                            {{--<p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>--}}
                                            {{--<small>--}}
                                                {{--<time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time>--}}
                                            {{--</small>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0)">--}}
                                    {{--<div class="media">--}}
                                        {{--<div class="media-left align-self-center"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div>--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h6 class="media-heading red darken-1">99% Server load</h6>--}}
                                            {{--<p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p>--}}
                                            {{--<small>--}}
                                                {{--<time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Five hour ago</time>--}}
                                            {{--</small>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0)">--}}
                                    {{--<div class="media">--}}
                                        {{--<div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i></div>--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h6 class="media-heading yellow darken-3">Warning notifixation</h6>--}}
                                            {{--<p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p>--}}
                                            {{--<small>--}}
                                                {{--<time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time>--}}
                                            {{--</small>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0)">--}}
                                    {{--<div class="media">--}}
                                        {{--<div class="media-left align-self-center"><i class="ft-check-circle icon-bg-circle bg-cyan"></i></div>--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h6 class="media-heading">Complete the task</h6>--}}
                                            {{--<small>--}}
                                                {{--<time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time>--}}
                                            {{--</small>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0)">--}}
                                    {{--<div class="media">--}}
                                        {{--<div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal"></i></div>--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h6 class="media-heading">Generate monthly report</h6>--}}
                                            {{--<small>--}}
                                                {{--<time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time>--}}
                                            {{--</small>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 255px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 162px;"></div></div></li>--}}
                            {{--<li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown dropdown-notification nav-item">--}}
                        {{--<a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail"></i>--}}
                            {{--<span class="badge badge-pill badge-default badge-warning badge-default badge-up">3</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">--}}
                            {{--<li class="dropdown-menu-header">--}}
                                {{--<h6 class="dropdown-header m-0">--}}
                                    {{--<span class="grey darken-2">Messages</span>--}}
                                    {{--<span class="notification-tag badge badge-default badge-warning float-right m-0">4 New</span>--}}
                                {{--</h6>--}}
                            {{--</li>--}}
                            {{--<li class="scrollable-container media-list ps-container ps-theme-dark ps-active-y" data-ps-id="8c212ac2-3933-a521-9bf0-ad6fff729a76">--}}
                                {{--<a href="javascript:void(0)">--}}
                                    {{--<div class="media">--}}
                                        {{--<div class="media-left">--}}
                        {{--<span class="avatar avatar-sm avatar-online rounded-circle">--}}
                          {{--<img src="../../../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>--}}
                                        {{--</div>--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h6 class="media-heading">Margaret Govan</h6>--}}
                                            {{--<p class="notification-text font-small-3 text-muted">I like your portfolio, let's start.</p>--}}
                                            {{--<small>--}}
                                                {{--<time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time>--}}
                                            {{--</small>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0)">--}}
                                    {{--<div class="media">--}}
                                        {{--<div class="media-left">--}}
                        {{--<span class="avatar avatar-sm avatar-busy rounded-circle">--}}
                          {{--<img src="../../../app-assets/images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span>--}}
                                        {{--</div>--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h6 class="media-heading">Bret Lezama</h6>--}}
                                            {{--<p class="notification-text font-small-3 text-muted">I have seen your work, there is</p>--}}
                                            {{--<small>--}}
                                                {{--<time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Tuesday</time>--}}
                                            {{--</small>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0)">--}}
                                    {{--<div class="media">--}}
                                        {{--<div class="media-left">--}}
                        {{--<span class="avatar avatar-sm avatar-online rounded-circle">--}}
                          {{--<img src="../../../app-assets/images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span>--}}
                                        {{--</div>--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h6 class="media-heading">Carie Berra</h6>--}}
                                            {{--<p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p>--}}
                                            {{--<small>--}}
                                                {{--<time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Friday</time>--}}
                                            {{--</small>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<a href="javascript:void(0)">--}}
                                    {{--<div class="media">--}}
                                        {{--<div class="media-left">--}}
                        {{--<span class="avatar avatar-sm avatar-away rounded-circle">--}}
                          {{--<img src="../../../app-assets/images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span>--}}
                                        {{--</div>--}}
                                        {{--<div class="media-body">--}}
                                            {{--<h6 class="media-heading">Eric Alsobrook</h6>--}}
                                            {{--<p class="notification-text font-small-3 text-muted">We have project party this saturday.</p>--}}
                                            {{--<small>--}}
                                                {{--<time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">last month</time>--}}
                                            {{--</small>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                                {{--<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 255px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 191px;"></div></div></li>--}}
                            {{--<li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all messages</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown dropdown-user nav-item">--}}
                        {{--<a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">--}}
                {{--<span class="avatar avatar-online">--}}
                  {{--<img src="../../../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>--}}
                            {{--<span class="user-name">John Doe</span>--}}
                        {{--</a>--}}
                        {{--<div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a>--}}
                            {{--<a class="dropdown-item" href="email-application.html"><i class="ft-mail"></i> My Inbox</a>--}}
                            {{--<a class="dropdown-item" href="user-cards.html"><i class="ft-check-square"></i> Task</a>--}}
                            {{--<a class="dropdown-item" href="chat-application.html"><i class="ft-message-square"></i> Chats</a>--}}
                            {{--<div class="dropdown-divider"></div>--}}
                            {{--<a class="dropdown-item" href="login-with-bg-image.html"><i class="ft-power"></i> Logout</a>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
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
