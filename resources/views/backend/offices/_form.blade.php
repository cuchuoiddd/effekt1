@extends('backend.layouts.master')
@section('content')
    <style>
        .ck.ck-content.ck-editor__editable {
            height: 300px;
        }

        .pu-caption {
            font-size: 14px;
            font-weight: 600;
            font-family: "Roboto Condensed";
            color: #fc6d2e;
            text-transform: uppercase;
            padding: 10px 0px 0px 0px;
            border-bottom: 2px solid #ff8f5d;
            margin-bottom: 15px;
        }
    </style>
    <div class="content-body">
        <!-- card actions section start -->
        <section id="card-actions">
            <div class="row">
                <div class="col-12">
                    <form action="{{$office ? '/admin/offices/contents/'.$office->id : '/admin/offices/contents'}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($office)
                            @method('PUT')
                        @endif
                        <div class="card">
                            <div class="card-header fix-header bottom-card">
                                <div class="row" style="align-items: baseline">
                                    <h4 class="col-lg-3">Quản lý Office</h4>
                                </div>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="pu-caption">
                                                Hồ sơ
                                            </div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="squareText">Nội dung hồ sơ VN</label>
                                            <textarea name="content_profile_vn" class="editor"
                                                      style="min-height: 500px;">
                                            {!! $office->content_profile_vn ?? old('content_profile_vn') !!}
                                        </textarea>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="squareText">Nội dung hồ sơ EN</label>
                                            <textarea name="content_profile_en" class="editor1"
                                                      style="min-height: 500px;">
                                            {!!  $office->content_profile_en ?? old('content_profile_en') !!}
                                        </textarea>

                                        </div>
                                        <div class="col-md-6 fileupload fileupload-new mt-1" data-provides="fileupload">
                                            <label for="squareText">Hình ảnh hồ sơ</label>
                                            <div class="d-flex mb-1" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-secondary btn-file">
                                                <span class="fileupload-new"><i
                                                            class="fa fa-picture-o"></i> Chọn ảnh</span>
                                                    <span class="fileupload-exists"><i
                                                                class="fa fa-undo"></i> Thay đổi</span>
                                                    <input type="file" id="image_profile" name="image_profile"
                                                           class="btn-secondary">
                                                </button>
                                            </div>

                                            <div class="fileupload-new thumbnail"
                                                 style="border-radius: 5px;width: 200px; height: 150px;">
                                                @if(isset($office->image_profile))
                                                    <img class="viewImage"
                                                         src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_profile}}"
                                                         alt="Hình ảnh tin tức" style="width: 65%">
                                                @else
                                                    <img class="viewImage"
                                                         src="{{asset('images/default-image-300x225.jpg')}}"
                                                         alt="Hình ảnh tin tức"
                                                         style="width: 65%">
                                                @endif
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="pu-caption">
                                                Liên lạc
                                            </div>
                                        </div>
                                            {{--<label for="squareText">Vị trí liên lạc (lat)</label>--}}
                                            {{--<input type="text" class="form-control square" name="contact_lat" value="{{ $office->contact_lat ?? old('contact_lat') }}">--}}
                                            <div class="col-md-12 col-xs-12 listen-address form-group">
                                                <label class="control-label required">Địa chỉ</label>
                                                <input class="form-control location square" id="location" type="text" size="50" name="contact_address" value="{{ $office->contact_address ?? old('contact_address') }}">
                                            </div>
                                        <div class="col-12 form-group">
                                            <label for="squareText">Nội dung liên lạc VN</label>
                                            <textarea name="content_contact_vn" class="editor2"
                                                      style="min-height: 500px;">
                                            {!! $office->content_contact_vn ?? old('content_contact_vn') !!}
                                        </textarea>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="squareText">Nội dung liên lạc EN</label>
                                            <textarea name="content_contact_en" class="editor7"
                                                      style="min-height: 500px;">
                                            {!! $office->content_contact_en ?? old('content_contact_en') !!}
                                        </textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="pu-caption">
                                                Mọi người
                                            </div>
                                        </div>
                                        <div class="col-md-6 fileupload fileupload-new mt-1" data-provides="fileupload">
                                            <label for="squareText">Hình ảnh nền</label>
                                            <div class="d-flex mb-1" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-secondary btn-file">
                                                <span class="fileupload-new"><i
                                                            class="fa fa-picture-o"></i> Chọn ảnh</span>
                                                    <span class="fileupload-exists"><i
                                                                class="fa fa-undo"></i> Thay đổi</span>
                                                    <input type="file" id="image_people" name="image_people"
                                                           class="btn-secondary">
                                                </button>
                                            </div>

                                            <div class="fileupload-new thumbnail"
                                                 style="border-radius: 5px;width: 200px; height: 150px;">
                                                @if(isset($office->image_people))
                                                    <img class="viewImage"
                                                         src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_people}}"
                                                         alt="Hình ảnh tin tức" style="width: 65%">
                                                @else
                                                    <img class="viewImage"
                                                         src="{{asset('images/default-image-300x225.jpg')}}"
                                                         alt="Hình ảnh tin tức"
                                                         style="width: 65%">
                                                @endif
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        </div>

                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="pu-caption">
                                                Công việc
                                            </div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="squareText">Nội dung công việc VN</label>
                                            <textarea name="content_employment_vn" class="editor3"
                                                      style="min-height: 500px;">
                                            {!! $office->content_employment_vn ?? old('content_employment_vn') !!}
                                        </textarea>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="squareText">Nội dung công việc EN</label>
                                            <textarea name="content_employment_en" class="editor4"
                                                      style="min-height: 500px;">
                                            {!! $office->content_employment_en ?? old('content_employment_en') !!}
                                        </textarea>

                                        </div>
                                        <div class="col-md-6 fileupload fileupload-new mt-1" data-provides="fileupload">
                                            <label for="squareText">Hình ảnh công việc</label>
                                            <div class="d-flex mb-1" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-secondary btn-file">
                                                <span class="fileupload-new"><i
                                                            class="fa fa-picture-o"></i> Chọn ảnh</span>
                                                    <span class="fileupload-exists"><i
                                                                class="fa fa-undo"></i> Thay đổi</span>
                                                    <input type="file" id="image_employment" name="image_employment"
                                                           class="btn-secondary">
                                                </button>
                                            </div>

                                            <div class="fileupload-new thumbnail"
                                                 style="border-radius: 5px;width: 200px; height: 150px;">
                                                @if(isset($office->image_employment))
                                                    <img class="viewImage"
                                                         src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_employment}}"
                                                         alt="Hình ảnh tin tức" style="width: 65%">
                                                @else
                                                    <img class="viewImage"
                                                         src="{{asset('images/default-image-300x225.jpg')}}"
                                                         alt="Hình ảnh tin tức"
                                                         style="width: 65%">
                                                @endif
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        </div>

                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="pu-caption">
                                                Giải thưởng
                                            </div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="squareText">Nội dung giải thưởng VN</label>
                                            <textarea name="content_award_vn" class="editor5"
                                                      style="min-height: 500px;">
                                            {!! $office->content_award_vn ?? old('content_award_vn') !!}
                                        </textarea>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="squareText">Nội dung giải thưởng EN</label>
                                            <textarea name="content_award_en" class="editor6"
                                                      style="min-height: 500px;">
                                            {!! $office->content_award_en ?? old('content_award_en') !!}
                                        </textarea>

                                        </div>
                                        <div class="col-md-6 fileupload fileupload-new mt-1" data-provides="fileupload">
                                            <label for="squareText">Hình ảnh giải thưởng</label>
                                            <div class="d-flex mb-1" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-secondary btn-file">
                                                <span class="fileupload-new"><i
                                                            class="fa fa-picture-o"></i> Chọn ảnh</span>
                                                    <span class="fileupload-exists"><i
                                                                class="fa fa-undo"></i> Thay đổi</span>
                                                    <input type="file" id="image_award" name="image_award"
                                                           class="btn-secondary">
                                                </button>
                                            </div>

                                            <div class="fileupload-new thumbnail"
                                                 style="border-radius: 5px;width: 200px; height: 150px;">
                                                @if(isset($office->image_award))
                                                    <img class="viewImage"
                                                         src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_award}}"
                                                         alt="Hình ảnh giải thưởng" style="width: 65%">
                                                @else
                                                    <img class="viewImage"
                                                         src="{{asset('images/default-image-300x225.jpg')}}"
                                                         alt="Hình ảnh giải thưởng"
                                                         style="width: 65%">
                                                @endif
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        </div>

                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <div class="pu-caption">
                                                Khách hàng
                                            </div>
                                        </div>
                                        <div class="col-md-6 fileupload fileupload-new mt-1" data-provides="fileupload">
                                            <label for="squareText">Hình ảnh khách hàng</label>
                                            <div class="d-flex mb-1" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-secondary btn-file">
                                                <span class="fileupload-new"><i
                                                            class="fa fa-picture-o"></i> Chọn ảnh</span>
                                                    <span class="fileupload-exists"><i
                                                                class="fa fa-undo"></i> Thay đổi</span>
                                                    <input type="file" id="image_client" name="image_client"
                                                           class="btn-secondary">
                                                </button>
                                            </div>

                                            <div class="fileupload-new thumbnail"
                                                 style="border-radius: 5px;width: 200px; height: 150px;">
                                                @if(isset($office->image_client))
                                                    <img class="viewImage"
                                                         src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE.$office->image_client}}"
                                                         alt="Hình ảnh khách hàng" style="width: 65%">
                                                @else
                                                    <img class="viewImage"
                                                         src="{{asset('images/default-image-300x225.jpg')}}"
                                                         alt="Hình ảnh khách hàng"
                                                         style="width: 65%">
                                                @endif
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                @php
                                                    $images = isset($office) && isset($office->image_client_logo) && $office->image_client_logo !='' ? json_decode($office->image_client_logo) : json_decode('[]');
                                                @endphp
                                                <label for="images"
                                                       class="control-label alt-flex"><span>Ảnh dự án</span><a
                                                            class="addImages"><i class="fa fa-plus"></i> Upload
                                                        ảnh</a></label>
                                                <input type="file" class="hidden images" multiple="multiple" id="images"
                                                       name="images[]">
                                                <input type="hidden" id="images_json" name="images_json"
                                                       value="{{json_encode($images)}}">
                                                <div class="" style="overflow: scroll">
                                                    <div class="imagesUploadBox product-images">
                                                        <div class="thumb-list product-photo-grid__item">
                                                            @foreach($images as $k => $image)
                                                                <div class="thumb-image">
                                                                    <img class=""
                                                                         data-src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE_LOGO.$image->url}}"
                                                                         src="{{url(\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE_LOGO.$image->url)}}">
                                                                    <div class="overlay">
                                                                        <div class="alter-button" data-toggle="modal"
                                                                             data-target="#modal-alt">Alt
                                                                        </div>
                                                                        <div class="remove-button"><i
                                                                                    class="fa fa-trash"></i></div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="width: 200px;">Save
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    @include('backend.layouts.script')
    <script src="/js/file_upload.js"></script>
    <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('content_profile_vn');
        CKEDITOR.replace('content_profile_en');
        CKEDITOR.replace('content_contact_vn');
        CKEDITOR.replace('content_contact_en');
        CKEDITOR.replace('content_employment_vn');
        CKEDITOR.replace('content_employment_en');
        CKEDITOR.replace('content_award_vn');
        CKEDITOR.replace('content_award_en');
    </script>
    <script>
        readURL = async function (input, callback) {
            var fileList = []
            for (var i = 0; i < input.files.length; i++) {
                var reader = new FileReader();
                var count = 0;
                reader.onload = function (e) {
                    fileList.push({
                        src: e.target.result,
                        name: input.files[count].name
                    })
                    count++
                    if (count == input.files.length) {
                        callback(fileList)
                    }
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
        $(document).ready(function () {
            $('#modal-alt').on('show.bs.modal', function (e) {
                $(e.target).find('#altText').val('')
                $(e.target).find('.btn-primary').removeAttr('data-pos')

                var alt = $(e.relatedTarget).closest('.thumb-image').find('img').attr('alt')
                var pos = $(e.relatedTarget).closest('.thumb-image').index('.imagesUploadBox .thumb-image')
                $(e.target).find('#altText').val(alt)
                $(e.target).find('.btn-primary').attr('data-pos', pos)
            })
            $('#modal-alt .btn-primary').on('click', function () {
                var pos = $(this).attr('data-pos')
                var value = $(this).closest('#modal-alt').find('#altText').val()
                $('.imagesUploadBox .thumb-image').eq(pos).find('img').attr('alt', value)
                $('#modal-alt').modal('hide')
                updateImagesJSON()
            })

            function updateImagesJSON() {
                var list = [];
                $('.thumb-image').each(function (index, image) {
                    list.push({
                        url: $(image).find('img').attr('data-src'),
                        alt: $(image).find('img').attr('alt')
                    })
                })
                $('#images_json').val(JSON.stringify(list))
            }

            $('body').on('click', '.imagesUploadBox .remove-button', function () {
                $(this).closest('.thumb-image').remove()
                updateImagesJSON()
            });
            $('input.images').on('change', function () {
                readURL(this, function (fileList) {
                    var curList = JSON.parse($('#images_json').val())
                    var totallyNew = $('.thumb-image:not(.new)').length == 0 ? true : false
                    curList = curList.filter((item) => typeof item.new === 'undefined')

                    fileList.forEach((file) => {
                        curList.push({
                            url: file.src,
                            alt: '',
                            new: true,
                            fileName: file.name
                        })
                    })
                    var html = '',
                        html_main = ''
                    $('.product-images').find('.thumb-image.new').remove();
                    curList.forEach((item, index) => {
                        if (item.new) {
                            html += `<div class="thumb-image new">
                        <img class="" src="` + item.url + `" alt="` + item.alt + `">
                        <div class="overlay">
                            <div class="alter-button">Alt</div>
                            <div class="remove-button"><i class="fa fa-trash"></i></div>
                        </div>
                    </div>`
                        }
                        if (index == 0) {
                            html_main = `<div class="thumb-image new">
                        <img class="" src="` + item.url + `" alt="` + item.alt + `">
                        <div class="overlay">
                            <div class="alter-button">Alt</div>
                            <div class="remove-button"><i class="fa fa-trash"></i></div>
                        </div>
                    </div>`
                        }
                    })
                    if (totallyNew) {
                        $('.main-image').append(html_main)
                    }
                    $('.thumb-list').append(html)
                    $('#images_json').val(JSON.stringify(curList))
                });
            })
        })
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=AIzaSyAOYTBGlUxFOO0am9ZAsM3-q3Fv2GBWxys"></script>
    <script>
        function init() {
            var autocomplete = new google.maps.places.Autocomplete(document.getElementById("location"));
            console.log(autocomplete,'complate  ');
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                var address = place.formatted_address;
                var lat = place.geometry.location.lat();
                var long = place.geometry.location.lng();
                var input = '<input type="hidden" name="contact_lat" value="' + lat + '"> <input type="hidden" name="contact_long" value="' + long + '">';
                $('.listen-address').prepend(input);
                console.log(input,'lat-long');
            });
        }

        google.maps.event.addDomListener(window, 'load', init);

    </script>
@endsection
