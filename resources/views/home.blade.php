@extends('backend.layouts.master')
@section('content')

    <div class="content-body">
        <!-- card actions section start -->
        <section id="card-actions">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Card Actions Example</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="color:red;"></div>
                                    {{$pagi->links()}}
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12" style="color: red">Modal</div>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#bootstrap">
                                        Launch Modal
                                    </button>
                                    {{--modal--}}

                                    <div class="modal fade text-left" id="bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-main">
                                                    <h3 class="modal-title" id="myModalLabel35"> Modal Title</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form>
                                                    <div class="modal-body">
                                                        <fieldset class="form-group floating-label-form-group">
                                                            <label for="email">Email Address</label>
                                                            <input type="text" class="form-control" id="email" placeholder="Email Address">
                                                        </fieldset>

                                                        <fieldset class="form-group floating-label-form-group">
                                                            <label for="title">Password</label>
                                                            <input type="password" class="form-control" id="title" placeholder="Password">
                                                        </fieldset>

                                                        <fieldset class="form-group floating-label-form-group">
                                                            <label for="title1">Description</label>
                                                            <textarea class="form-control" id="title1" rows="3" placeholder="Description"></textarea>
                                                        </fieldset>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="close">
                                                        <input type="submit" class="btn btn-outline-primary" value="Login">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12" style="color: red">Alert</div>
                                    <button class="btn btn-primary delete-item">Delete</button>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12" style="color: red">Alertify</div>
                                    <button class="mr-1 btn btn-primary alert-success">success</button>
                                    <button class="mr-1 btn btn-warning alert-warning">warning</button>
                                    <button class="btn btn-danger alert-error">error</button>
                                </div>
                                <hr>
                                <form action="" id="validateForm">
                                    <div class="row">
                                        <div class="col-12" style="color: red">form</div>
                                        <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group position-relative">
                                                <label for="squareText">Square Input</label>
                                                <select class="form-control square">
                                                    <option selected="">Default select options</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="squareText">Square Input</label>
                                                <input type="text" class="form-control square" placeholder="square Input">
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="squareText">Square Input</label>
                                                <select class="form-control square select2">
                                                    <option selected="">Default select options</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                            <div class="form-group position-relative">
                                                <label for="squareText">username</label>
                                                <input type="number" id="username" name="username" class="form-control square" placeholder="square Input" max="15" min="5">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                            <div class="form-group">
                                                <label for="squareText">PassWord</label>
                                                <input type="password" id="password" name="password" class="form-control square">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                            <div class="form-group">
                                                <label for="squareText">Confirm PassWord</label>
                                                <input type="password" id="confirm_password" name="confirm_password" class="form-control square">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                            <p>
                                                <label for="newsletter">I'd like to receive the newsletter</label>
                                                <input type="checkbox" class="checkbox" id="newsletter" name="newsletter">
                                            </p>
                                            <fieldset id="newsletter_topics">
                                                <label for="topic_marketflash">
                                                    <input type="checkbox" id="topic_marketflash" value="marketflash" name="topic">Marketflash
                                                </label>
                                                <label for="topic_fuzz">
                                                    <input type="checkbox" id="topic_fuzz" value="fuzz" name="topic">Latest fuzz
                                                </label>
                                                <label for="topic_digester">
                                                    <input type="checkbox" id="topic_digester" value="digester" name="topic">Mailing list digester
                                                </label>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="squareText">tesst</label>
                                                <select class="form-control square select2">
                                                    <option selected="">Default select options</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>


                                <div class="row">

                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-12" style="color: red">table</div>
                                    <div class="col-12">
                                        <div class="table-responsive tableFixHead table-bordered table-hover"
                                             style="height: 133px;">
                                            <table class="table">
                                                <thead class="bg-success">
                                                <tr>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>John</td>
                                                    <td>Doe</td>
                                                    <td>john@example.com</td>
                                                    <td>********</td>
                                                </tr>
                                                <tr>
                                                    <td>July</td>
                                                    <td>Dooley</td>
                                                    <td>july@example.com</td>
                                                    <td>********</td>
                                                </tr>
                                                <tr>
                                                    <td>July</td>
                                                    <td>Dooley</td>
                                                    <td>july@example.com</td>
                                                    <td>***********</td>
                                                </tr>
                                                <tr>
                                                    <td>Mary</td>
                                                    <td>Moe</td>
                                                    <td>mary@example.com</td>
                                                    <td>******</td>
                                                </tr>
                                                <tr>
                                                    <td>July</td>
                                                    <td>Dooley</td>
                                                    <td>july@example.com</td>
                                                    <td>********</td>
                                                </tr>
                                                <tr>
                                                    <td>July</td>
                                                    <td>Dooley</td>
                                                    <td>july@example.com</td>
                                                    <td>***********</td>
                                                </tr>
                                                <tr>
                                                    <td>Mary</td>
                                                    <td>Moe</td>
                                                    <td>mary@example.com</td>
                                                    <td>******</td>
                                                </tr>
                                                <tr>
                                                    <td>July</td>
                                                    <td>Dooley</td>
                                                    <td>july@example.com</td>
                                                    <td>********</td>
                                                </tr>
                                                <tr>
                                                    <td>July</td>
                                                    <td>Dooley</td>
                                                    <td>july@example.com</td>
                                                    <td>***********</td>
                                                </tr>
                                                <tr>
                                                    <td>Mary</td>
                                                    <td>Moe</td>
                                                    <td>mary@example.com</td>
                                                    <td>******</td>
                                                </tr>
                                                <tr>
                                                    <td>July</td>
                                                    <td>Dooley</td>
                                                    <td>july@example.com</td>
                                                    <td>********</td>
                                                </tr>
                                                <tr>
                                                    <td>July</td>
                                                    <td>Dooley</td>
                                                    <td>july@example.com</td>
                                                    <td>***********</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // card-actions section end -->
    </div>


@endsection
@section('script')
    @include('backend.layouts.script')
    <script>
        $().ready(function () {

            $("#validateForm").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 2
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    topic: {
                        required: "#newsletter:checked",
                        minlength: 2
                    },
                    agree: "required"
                },
                // messages: {
                //     username: {
                //         required: "Please enter a username",
                //         minlength: "Your username must consist of at least 2 characters"
                //     },
                //     password: {
                //         required: "Please provide a password",
                //         minlength: "Your password must be at least 5 characters long"
                //     },
                //     confirm_password: {
                //         required: "Please provide a password",
                //         minlength: "Your password must be at least 5 characters long",
                //         equalTo: "Please enter the same password as above"
                //     },
                //     email: "Please enter a valid email address",
                //     agree: "Please accept our policy",
                //     topic: "Please select at least 2 topics"
                // }
            });

            
            $('.alert-success').on('click',function () {
                alertify.success('Wait time updated to 3 Seconds',3);
            })
            $('.alert-warning').on('click',function () {
                alertify.warning('Wait time updated to 3 Seconds',3);
            })
            $('.alert-error').on('click',function () {
                alertify.error('Wait time updated to 3 Seconds',3);
            })



            // $("#username").focus(function () {
            //     var firstname = $("#firstname").val();
            //     var lastname = $("#lastname").val();
            //     if (firstname && lastname && !this.value) {
            //         this.value = firstname + "." + lastname;
            //     }
            // });

            //code to hide topic selection, disable for demo
            var newsletter = $("#newsletter");
            // newsletter topics are optional, hide at first
            var inital = newsletter.is(":checked");
            var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
            var topicInputs = topics.find("input").attr("disabled", !inital);
            // show when newsletter is checked
            newsletter.click(function () {
                topics[this.checked ? "removeClass" : "addClass"]("gray");
                topicInputs.attr("disabled", !this.checked);
            });
        });
    </script>

@endsection
