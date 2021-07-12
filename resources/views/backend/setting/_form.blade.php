@extends('backend.layouts.master')
@section('content')

    <div class="content-body">
        <!-- card actions section start -->
        <section id="card-actions">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{isset($setting) ? '/admin/setting/'.$setting->id : '/admin/setting'}}" method="post"
                              id="myFormId" enctype="multipart/form-data">
                            @csrf
                            @if(isset($setting))
                                @method('PUT')
                            @endif
                            <div class="card-header fix-header bottom-card">
                                <div class="row" style="align-items: baseline">
                                    <h4 class="col-lg-3">Quản lý setting</h4>
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
                                        <div class="col-md-6 fileupload fileupload-new mt-1" data-provides="fileupload">
                                            <label for="squareText">Hình ảnh logo</label>
                                            <div class="d-flex mb-1" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-secondary btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-picture-o"></i> Chọn ảnh</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
                                                    <input type="file" id="logo" name="logo" class="btn-secondary">
                                                </button>
                                            </div>

                                            <div class="fileupload-new thumbnail"
                                                 style="border-radius: 5px;width: 200px; height: 150px;">
                                                @if(isset($setting->logo))
                                                    <img class="viewImage" src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_LOGO.$setting->logo}}" alt="Hình ảnh logo" style="width: 65%">
                                                @else
                                                    <img class="viewImage"
                                                         src="{{asset('images/default-image-300x225.jpg')}}" alt="Hình ảnh logo"
                                                         style="width: 65%">
                                                @endif
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        </div>

                                        <div class="col-md-6 fileupload fileupload-new mt-1" data-provides="fileupload">
                                            <label for="squareText">Hình ảnh favicon</label>
                                            <div class="d-flex mb-1" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-secondary btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-picture-o"></i> Chọn ảnh</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
                                                    <input type="file" id="favicon" name="favicon" class="btn-secondary">
                                                </button>
                                            </div>

                                            <div class="fileupload-new thumbnail"
                                                 style="border-radius: 5px;width: 200px; height: 150px;">
                                                @if(isset($setting->favicon))
                                                    <img class="viewImage" src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_FAVICON.$setting->favicon}}" alt="Hình ảnh favicon" style="width: 65%">
                                                @else
                                                    <img class="viewImage"
                                                         src="{{asset('images/default-image-300x225.jpg')}}" alt="Hình ảnh favicon"
                                                         style="width: 65%">
                                                @endif
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="squareText">Meta title VN</label>
                                            <input type="text" id="title_vn" name="title_vn"
                                                   class="form-control square"
                                                   value="{{ $setting->title_vn ?? old('title_vn')}}">
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="squareText">Meta title EN</label>
                                            <input type="text" id="title_en" name="title_en"
                                                   class="form-control square"
                                                   value="{{ $setting->title_en ?? old('title_en')}}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="squareText">Meta description VN</label>
                                            <input type="text" id="description_vn" name="description_vn"
                                                   class="form-control square"
                                                   value="{{ $setting->description_vn ?? old('description_vn')}}">
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="squareText">Meta description EN</label>
                                            <input type="text" id="description_en" name="description_en"
                                                   class="form-control square"
                                                   value="{{ $setting->description_en ?? old('description_en')}}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="squareText">Fanpage Id</label>
                                            <input type="text" id="fanpage_id" name="fanpage_id"
                                                   class="form-control square"
                                                   value="{{ $setting->fanpage_id ?? old('fanpage_id')}}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="squareText">Link Company</label>
                                            <input type="text" id="link_website" name="link_website"
                                                   class="form-control square"
                                                   value="{{ $setting->link_website ?? old('link_website')}}">
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="squareText">Link Facebook</label>
                                            <input type="text" id="link_facebook" name="link_facebook"
                                                   class="form-control square"
                                                   value="{{ $setting->link_facebook ?? old('link_facebook')}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="squareText">Link twitter</label>
                                            <input type="text" id="link_twitter" name="link_twitter"
                                                   class="form-control square"
                                                   value="{{ $setting->link_twitter ?? old('link_twitter')}}">
                                        </div>

                                        <div class="col-6 form-group">
                                            <label for="squareText">Link Instagram</label>
                                            <input type="text" id="link_instagram" name="link_instagram"
                                                   class="form-control square"
                                                   value="{{ $setting->link_instagram ?? old('link_instagram')}}">
                                        </div>
                                    </div>
                                    <div class="row">
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
                                                        <div class="thumb-list product-photo-grid__item" id="sortable">
                                                            @foreach($images as $k => $image)
                                                                <div class="thumb-image">
                                                                    <img class=""
                                                                         data-link="{{$image->link}}"
                                                                         data-image="{{$image->url}}"
                                                                         data-src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE_LOGO.$image->url}}"
                                                                         src="{{url(\App\Constants\DirectoryConstant::UPLOAD_FOLDER_OFFICE_LOGO.$image->url)}}">
                                                                    <div class="overlay">
                                                                        <div class="alter-button clickModalUrl">Url
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
                                    <button type="submit" class="btn btn-primary" style="width: 200px;">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-url" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Thêm đường dẫn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="add-url form-control square">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                    <button type="button" class="btn btn-primary addUrl">Lưu lại</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('backend.layouts.script')
    <script src="/js/file_upload.js"></script>
    <script>
        readURL = async function (input, callback) {
            var fileList = [];
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
            $( "#sortable" ).sortable({
                stop: function(event, ui) {
                    updateImagesJSON()
                    console.log('drag',JSON.parse($('#images_json').val()))
                }
            });

            function updateImagesJSON() {
                var list = [];
                console.log('list',list);

                $('.thumb-image').each(function (index, image) {
                    list.push({
                        position: index,
                        url: $(image).find('img').attr('data-image'),
                        link: $(image).find('img').attr('data-link'),
                        fileName: $(image).find('img').attr('data-name')
                    })
                })
                $('#images_json').val(JSON.stringify(list))
            }

            var arr_delete = [];
            $('body').on('click', '.imagesUploadBox .remove-button', function () {
                let arr_src_delete = $(this).closest('.thumb-image').find('img')[0].getAttribute('data-image');
                arr_delete.push(arr_src_delete);
                $('#images_delete').val(JSON.stringify(arr_delete))
                $(this).closest('.thumb-image').remove()
                updateImagesJSON()
            });


            var current_image = null;
            $(document).on('click','.clickModalUrl',function (e) {
                current_image = $(this).closest('.thumb-image').find('img');
                $('.add-url').val(current_image.data('link'));
                $('#modal-url').modal('show');
            })

            $(document).on('click','.addUrl',function () {
                let value = $('.add-url').val();
                current_image.attr('data-link',value);
                $('#modal-url').modal('hide')
                updateImagesJSON()
            })


            $('input.images').on('change', function () {
                readURL(this, function (fileList) {
                    var curList = JSON.parse($('#images_json').val())
                    var totallyNew = $('.thumb-image:not(.new)').length == 0 ? true : false
                    curList = curList.filter((item) => typeof item.new === 'undefined')

                    var last_position = curList.length ? curList[curList.length - 1].position : -1
                    fileList.forEach((file) => {
                        curList.push({
                            position: ++last_position,
                            url: file.src,
                            link: '',
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
                    <img class="" src="` + item.url + `" data-src="` + item.url + `" alt="` + item.alt + `" data-name="`+ item.fileName +`" data-link=`+item.link+`>
                    <div class="overlay">
                        <!--<div class="alter-button">Url</div>-->
                        <div class="alter-button clickModalUrl">Url</div>
                        <div class="remove-button"><i class="fa fa-trash"></i></div>
                    </div>
                </div>`
                        }
                        if (index == 0) {
                            html_main = `<div class="thumb-image new">
                    <img class="" src="` + item.url + `"  data-src="` + item.url + `" alt="` + item.alt + `">
                    <div class="overlay">
                        <!--<div class="alter-button">Url</div>-->
                        <div class="alter-button clickModalUrl">Url</div>
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
                    updateImagesJSON()
                });
            })
        })
    </script>
@endsection
