<template>
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto">
                    <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                            class="ft-menu font-large-1"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand" href="/">
                        <img class="brand-logo" alt="stack admin logo"
                             src="/backend/app-assets/images/logo/stack-logo.png">
                        <h2 class="brand-text">Stack</h2>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
                        <i class="fa fa-ellipsis-v"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                            <i class="ft-menu"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <!--<li class="dropdown dropdown-notification nav-item" :class="{show: show_notify === true}">-->
                        <!--<a class="nav-link nav-link-label" href="#" data-toggle="dropdown" @click="showNotify()"-->
                           <!--v-click-outside="hideNotify">-->
                            <!--<i class="ficon ft-bell"></i>-->
                            <!--<span class="badge badge-pill badge-default badge-danger badge-default badge-up">5</span>-->
                        <!--</a>-->
                        <!--<ul :class="{show: show_notify === true}"-->
                            <!--class="dropdown-menu dropdown-menu-media dropdown-menu-right">-->
                            <!--<li class="dropdown-menu-header">-->
                                <!--<h6 class="dropdown-header m-0">-->
                                    <!--<span class="grey darken-2">Notifications</span>-->
                                    <!--<span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>-->
                                <!--</h6>-->
                            <!--</li>-->
                            <!--<li class="scrollable-container media-list">-->
                                <!--<a href="javascript:void(0)">-->
                                    <!--<div class="media">-->
                                        <!--<div class="media-left align-self-center"><i-->
                                                <!--class="ft-plus-square icon-bg-circle bg-cyan"></i></div>-->
                                        <!--<div class="media-body">-->
                                            <!--<h6 class="media-heading">You have new order!</h6>-->
                                            <!--<p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit-->
                                                <!--amet, consectetuer elit.</p>-->
                                            <!--<small>-->
                                                <!--<time class="media-meta text-muted"-->
                                                      <!--datetime="2015-06-11T18:29:20+08:00">30 minutes ago-->
                                                <!--</time>-->
                                            <!--</small>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</a>-->
                            <!--</li>-->
                            <!--<li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"-->
                                                                <!--href="javascript:void(0)">Read all notifications</a>-->
                            <!--</li>-->
                        <!--</ul>-->
                    <!--</li>-->
                    <!--<li class="dropdown dropdown-notification nav-item" :class="{show: show_mail === true}">-->
                        <!--<a class="nav-link nav-link-label" href="#" data-toggle="dropdown" @click="showMail()"-->
                           <!--v-click-outside="hideMail">-->
                            <!--<i class="ficon ft-mail"></i>-->
                            <!--<span class="badge badge-pill badge-default badge-warning badge-default badge-up">3</span>-->
                        <!--</a>-->
                        <!--<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right"-->
                            <!--:class="{show: show_mail === true}">-->
                            <!--<li class="dropdown-menu-header">-->
                                <!--<h6 class="dropdown-header m-0">-->
                                    <!--<span class="grey darken-2">Messages</span>-->
                                    <!--<span class="notification-tag badge badge-default badge-warning float-right m-0">4 New</span>-->
                                <!--</h6>-->
                            <!--</li>-->
                            <!--<li class="scrollable-container media-list">-->
                                <!--<a href="javascript:void(0)">-->
                                    <!--<div class="media">-->
                                        <!--<div class="media-left">-->
                                            <!--<span class="avatar avatar-sm avatar-online rounded-circle">-->
                                                <!--<img src="/backend/app-assets/images/portrait/small/avatar-s-1.png"-->
                                                     <!--alt="avatar"><i></i>-->
                                            <!--</span>-->
                                        <!--</div>-->
                                        <!--<div class="media-body">-->
                                            <!--<h6 class="media-heading">Margaret Govan</h6>-->
                                            <!--<p class="notification-text font-small-3 text-muted">I like your portfolio,-->
                                                <!--let's start.</p>-->
                                            <!--<small>-->
                                                <!--<time class="media-meta text-muted"-->
                                                      <!--datetime="2015-06-11T18:29:20+08:00">Today-->
                                                <!--</time>-->
                                            <!--</small>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</a>-->
                            <!--</li>-->
                            <!--<li class="dropdown-menu-footer">-->
                                <!--<a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all-->
                                    <!--messages</a>-->
                            <!--</li>-->
                        <!--</ul>-->
                    <!--</li>-->
                    <li class="dropdown dropdown-user nav-item" :class="{show: show_user === true}">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"
                           @click="showUser()"
                           v-click-outside="hideUser">
                            <span class="avatar avatar-online">
                                <img src="/backend/app-assets/images/portrait/small/avatar-s-1.png"
                                     alt="avatar"><i></i>
                            </span>
                            <span class="user-name">{{user && user.name?user.name:'Admin' }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" :class="{show: show_user === true}">
                            <a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" @click="logout"><i class="ft-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>


    export default {
        data() {
            return {
                show_notify: false,
                show_mail: false,
                show_user: false,
                user:null
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.getUser();
        },
        methods: {
            showNotify() {
                this.show_notify = !this.show_notify;
            },
            hideNotify() {
                this.show_notify = false;
            },
            showMail() {
                this.show_mail = !this.show_mail;
            },
            hideMail() {
                this.show_mail = false;
            },
            showUser() {
                this.show_user = !this.show_user;
            },
            hideUser() {
                this.show_user = false;
            },
            logout() {
                axios.post('/logout', {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(response => {
                    console.log(response);
                        window.location.reload();
                    })
            },
            getUser() {
                axios.get('/admin/get-user')
                    .then(res => {
                        this.user = res.data.user;
                    })
                    .catch(err=>{

                    })
            }
        }
    }

</script>




