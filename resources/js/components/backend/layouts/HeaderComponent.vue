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
                        <h2 class="brand-text">Air.Concept</h2>
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
                            <a class="dropdown-item" @click="editProfile"><i class="ft-user"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" @click="logout"><i class="ft-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- // Edit profile -->
        <div class="modal fade text-left" id="editProfile" tabindex="-1" role="dialog"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-main">
                        <h3 class="modal-title" id="myModalLabel35"> Sửa thông tin</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label>Họ tên</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" v-model="full_name" id="full_name" class="form-control square">
                            </div>
                        </div>
                        <div class="row form-group" :class="{validate : is_validate && phone_number===null}">
                            <div class="col-sm-3">
                                <label class="required">Số điện thoại</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" v-model="phone_number" id="phone_number" class="form-control square">
                            </div>
                        </div>
                        <div class="row form-group" :class="{validate : is_validate && password===null}">
                            <div class="col-sm-3">
                                <label class="required">Mật khẩu</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="password" v-model="password" id="password" class="form-control square">
                                <small v-if="error" :class="{error:error}">Mật khẩu không giống nhau !</small>
                            </div>
                        </div>
                        <div class="row form-group" :class="{validate : is_validate && re_password===null}">
                            <div class="col-sm-3">
                                <label class="required">Nhập lại mật khẩu</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="password" v-model="re_password" id="re_password"
                                       class="form-control square">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" @click="submitForm()"><i class="fa fa-plus"></i> Lưu</button>
                    </div>
                </div>
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
                user: null,

                full_name: null,
                phone_number: null,
                password: null,
                re_password: null,
                is_validate: false,
                error: false
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
                    .catch(err => {

                    })
            },
            editProfile() {
                $('#editProfile').modal({show: true});
            },
            submitForm() {
                if (!this.phone_number || !this.password || !this.re_password) {
                    this.is_validate = true;
                    return;
                } else if (this.password !== this.re_password) {
                    this.error = true;
                } else {
                    this.error = false;
                    let data = {
                        user_id : this.user.id,
                        name: this.full_name,
                        phone: this.phone_number,
                        password: this.password
                    }
                    axios.post('/admin/edit-profile', data)
                        .then(res => {
                            if (res) {
                                alertify.success('Sửa thành công !');
                                $('#editProfile').modal('hide');
                            } else {
                                alertify.error('Sửa không thành công !');
                                $('#editProfile').modal('hide');
                            }
                        })
                        .catch(err=>{
                            console.log(err)
                        })
                }
            }
        }
    }

</script>

<style>
    .modal-backdrop {
        z-index: 1020;
    }

    .validate {
        color: red;
    }

    .validate input {
        border-color: red;
    }

    .error {
        color: red;
    }
</style>



