@extends('backend.layouts.master')
@section('content')
    <style>
        .ck.ck-content.ck-editor__editable {
            height: 300px;
        }
    </style>
    <div class="content-body">
        <!-- card actions section start -->
        <section id="card-actions">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{isset($product) ? '/admin/work/products/'.$product->id : '/admin/work/products'}}"
                              method="post" id="myFormId" enctype="multipart/form-data">
                            @csrf
                            @if(isset($product))
                                @method('PUT')
                            @endif
                            <div class="card-header fix-header bottom-card">
                                <div class="row" style="align-items: baseline">
                                    <h4 class="col-lg-3">{{isset($product) ? 'Cập nhật ' : 'Thêm mới '}}dự án</h4>
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
                                        <div class="col-6 form-group">
                                            <label for="squareText" class="required">Danh mục</label>
                                            {{--<input type="text" id="category_id" name="category_id" class="form-control square">--}}
                                            <select name="category_id" class="select2 form-control" id=""
                                                    data-placeholder="--chọn danh mục--">
                                                <option></option>
                                                @if(count($categories))
                                                    @foreach($categories as $item)
                                                        <option value="{{$item->id}}" {{isset($product->category_id) && $product->category_id == $item->id ? 'selected':''}}>{{$item->title_vn}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                @php
                                                    $images = isset($product) && isset($product->images) && $product->images !='' ? json_decode($product->images) : json_decode('[]');
                                                @endphp
                                                <label for="images"
                                                       class="control-label alt-flex"><span>Ảnh dự án</span><a
                                                            class="addImages"><i class="fa fa-plus"></i> Upload
                                                        ảnh</a></label>
                                                <input type="file" class="hidden images" multiple="multiple" id="images"
                                                       name="images[]">
                                                <input type="hidden" id="images_json" name="images_json"
                                                       value="{{json_encode($images)}}">
                                                @if(isset($product))
                                                    <input type="hidden" id="images_delete" name="images_delete">
                                                @endif
                                                <div class="" style="overflow: scroll">
                                                    <div class="imagesUploadBox product-images">
                                                        <div class="thumb-list product-photo-grid__item" id="sortable">
                                                            @foreach($images as $k => $image)
                                                                <div class="thumb-image">
                                                                    <img class=""
                                                                         data-image="{{$image->url}}"
                                                                         data-src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$image->url}}"
                                                                         src="{{url(\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.$image->url)}}">
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

                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="squareText" class="required">Tiêu đề VN</label>
                                            <input type="text" id="title_vn" name="title_vn"
                                                   class="form-control square"
                                                   value="{{ $product->title_vn ?? old('title_vn') }}">
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="" class="required">Tiêu đề EN</label>
                                            <input type="text" id="title_en" name="title_en"
                                                   class="form-control square"
                                                   value="{{ $product->title_en ?? old('title_en') }}">
                                        </div>
                                    </div>

                                    <div class="row mt-1">
                                        <div class="col-6 form-group">
                                            <label for="squareText" class="required">Nội dung VN</label>
                                            <textarea name="content_vn" class="editor" id="content_vn"
                                                      style="height: 300px;">
                                           {!! $product->content_vn ?? old('content_vn') !!}
                                        </textarea>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="squareText" class="required">Nội dung EN</label>
                                            <textarea name="content_en" class="editor1" id="content_en"
                                                      style="height: 300px;">
                                            {!! $product->content_en ?? old('content_en') !!}
                                        </textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="squareText">Tên dự án VN</label>
                                            <input type="text" id="project_name_vn" name="project_name_vn"
                                                   class="form-control square"
                                                   value="{{ $product->project_name_vn ?? old('project_name_vn') }}">
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="squareText">Tên dự án EN</label>
                                            <input type="text" id="project_name_en" name="project_name_en"
                                                   class="form-control square"
                                                   value="{{ $product->project_name_en ?? old('project_name_en') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="squareText">Phân loại VN</label>
                                            <input type="text" id="typology_vn" name="typology_vn"
                                                   class="form-control square"
                                                   value="{{ $product->typology_vn ?? old('typology_vn') }}">
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="squareText">Phân loại EN</label>
                                            <input type="text" id="typology_en" name="typology_en"
                                                   class="form-control square"
                                                   value="{{ $product->typology_en ?? old('typology_en') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12 listen-address form-group">
                                            <label class="control-label">Địa chỉ</label>
                                            <input class="form-control location square" id="address" type="text"
                                                   size="50" name="address"
                                                   value="{{ $product->address ?? old('address') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="squareText">Trạng thái VN</label>
                                            <input type="text" id="status_vn" name="status_vn"
                                                   class="form-control square"
                                                   value="{{ $product->status_vn ?? old('status_vn') }}">
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="squareText">Trạng thái EN</label>
                                            <input type="text" id="status_en" name="status_en"
                                                   class="form-control square"
                                                   value="{{ $product->status_en ?? old('status_en') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="squareText">Kích thước VN</label>
                                            <input type="text" id="size_vn" name="size_vn" class="form-control square"
                                                   value="{{ $product->size_vn ?? old('size_vn') }}">
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="squareText">Kích thước EN</label>
                                            <input type="text" id="size_en" name="size_en" class="form-control square"
                                                   value="{{ $product->size_en ?? old('size_en') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="squareText">Khách hàng VN</label>
                                            <input type="text" id="client_vn" name="client_vn"
                                                   class="form-control square"
                                                   value="{{ $product->client_vn ?? old('client_vn') }}">
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="squareText">Khách hàng EN</label>
                                            <input type="text" id="client_en" name="client_en"
                                                   class="form-control square"
                                                   value="{{ $product->client_en ?? old('client_en') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="squareText">Cộng tác viên VN</label>
                                            <input type="text" id="collaborator_vn" name="collaborator_vn"
                                                   class="form-control square"
                                                   value="{{ $product->collaborator_vn ?? old('collaborator_vn') }}">
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="squareText">Cộng tác viên EN</label>
                                            <input type="text" id="collaborator_en" name="collaborator_en"
                                                   class="form-control square"
                                                   value="{{ $product->collaborator_en ?? old('collaborator_en') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="squareText">Năm làm dự án</label>
                                            <input type="text" id="year" name="year" class="form-control square"
                                                   value="{{ $product->year ?? old('year') }}">
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="squareText">Nhóm thiết kế</label>
                                            {{--{{dd($product)}}--}}
                                            <select name="design_team[]" id="design_team" class="select2" multiple>
                                                <option></option>
                                                @if(count($people) && isset($product))
                                                    @foreach($people as $item)
                                                        <option value="{{$item->id}}" {{in_array($item->id,$product->design_team) ? 'selected':''}}>{{$item->full_name_vn}}
                                                            ({{$item->full_name_en}})
                                                        </option>
                                                    @endforeach
                                                @else
                                                    @foreach($people as $item)
                                                        <option value="{{$item->id}}">{{$item->full_name_vn}}
                                                            ({{$item->full_name_en}})
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label for="squareText">Slug</label>
                                            <input type="text" id="slug" name="slug" class="form-control square"
                                                   value="{{ $product->slug ?? old('slug') }}">
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
            </div>
        </section>
    </div>
@endsection
@section('script')
    @include('backend.layouts.script')
    <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        $("#myFormId").validate({
            rules: {
                category_id: "required",
                title_vn: "required",
                title_en: "required",
                content_vn: "required",
                content_en: "required",
                slug: "required"
            },
        })

        CKEDITOR.replace('content_vn');
        CKEDITOR.replace('content_en');
    </script>
    {{--<script>--}}
        {{--readURL = async function (input, callback) {--}}
            {{--var fileList = [];--}}
            {{--console.log(111,input)--}}
            {{--for (var i = 0; i < input.files.length; i++) {--}}
                {{--var reader = new FileReader();--}}
                {{--var count = 0;--}}
                {{--reader.onload = function (e) {--}}
                    {{--fileList.push({--}}
                        {{--src: e.target.result,--}}
                        {{--name: input.files[count].name--}}
                    {{--})--}}
                    {{--count++--}}
                    {{--if (count == input.files.length) {--}}
                        {{--callback(fileList)--}}
                    {{--}--}}
                {{--}--}}
                {{--reader.readAsDataURL(input.files[i]);--}}
            {{--}--}}
        {{--}--}}
        {{--$(document).ready(function () {--}}
            {{--let abc  = $('#images')[0];--}}
            {{--$( "#sortable" ).sortable({--}}
                {{--stop: function(event, ui) {  }--}}
            {{--});--}}


            {{--$('#modal-alt').on('show.bs.modal', function (e) {--}}
                {{--$(e.target).find('#altText').val('')--}}
                {{--$(e.target).find('.btn-primary').removeAttr('data-pos')--}}

                {{--var alt = $(e.relatedTarget).closest('.thumb-image').find('img').attr('alt')--}}
                {{--var pos = $(e.relatedTarget).closest('.thumb-image').index('.imagesUploadBox .thumb-image')--}}
                {{--$(e.target).find('#altText').val(alt)--}}
                {{--$(e.target).find('.btn-primary').attr('data-pos', pos)--}}
            {{--})--}}
            {{--$('#modal-alt .btn-primary').on('click', function () {--}}
                {{--var pos = $(this).attr('data-pos')--}}
                {{--var value = $(this).closest('#modal-alt').find('#altText').val()--}}
                {{--$('.imagesUploadBox .thumb-image').eq(pos).find('img').attr('alt', value)--}}
                {{--$('#modal-alt').modal('hide')--}}
                {{--updateImagesJSON()--}}
            {{--})--}}

            {{--function updateImagesJSON() {--}}
                {{--var list = [];--}}
                {{--$('.thumb-image').each(function (index, image) {--}}
                    {{--console.log(123,image);--}}
                    {{--list.push({--}}
                        {{--position: index,--}}
                        {{--url: $(image).find('img').attr('data-src'),--}}
                        {{--alt: $(image).find('img').attr('alt')--}}
                    {{--})--}}
                {{--})--}}
                {{--$('#images_json').val(JSON.stringify(list))--}}
            {{--}--}}

            {{--$('body').on('click', '.imagesUploadBox .remove-button', function () {--}}
                {{--$(this).closest('.thumb-image').remove()--}}
                {{--updateImagesJSON()--}}
            {{--});--}}
            {{--$('input.images').on('change', function () {--}}
                {{--readURL(this, function (fileList) {--}}
                    {{--var curList = JSON.parse($('#images_json').val())--}}
                    {{--var totallyNew = $('.thumb-image:not(.new)').length == 0 ? true : false--}}
                    {{--curList = curList.filter((item) => typeof item.new === 'undefined')--}}

                    {{--var last_position = curList.length ? curList[curList.length - 1].position : -1--}}
                    {{--fileList.forEach((file) => {--}}
                        {{--curList.push({--}}
                            {{--position: ++last_position,--}}
                            {{--url: file.src,--}}
                            {{--alt: '',--}}
                            {{--new: true,--}}
                            {{--fileName: file.name--}}
                        {{--})--}}
                    {{--})--}}
                    {{--var html = '',--}}
                        {{--html_main = ''--}}
                    {{--$('.product-images').find('.thumb-image.new').remove();--}}
                    {{--curList.forEach((item, index) => {--}}
                        {{--if (item.new) {--}}
                            {{--html += `<div class="thumb-image new">--}}
                        {{--<img class="" src="` + item.url + `" alt="` + item.alt + `">--}}
                        {{--<div class="overlay">--}}
                            {{--<div class="alter-button">Alt</div>--}}
                            {{--<div class="remove-button"><i class="fa fa-trash"></i></div>--}}
                        {{--</div>--}}
                    {{--</div>`--}}
                        {{--}--}}
                        {{--if (index == 0) {--}}
                            {{--html_main = `<div class="thumb-image new">--}}
                        {{--<img class="" src="` + item.url + `" alt="` + item.alt + `">--}}
                        {{--<div class="overlay">--}}
                            {{--<div class="alter-button">Alt</div>--}}
                            {{--<div class="remove-button"><i class="fa fa-trash"></i></div>--}}
                        {{--</div>--}}
                    {{--</div>`--}}
                        {{--}--}}
                    {{--})--}}
                    {{--if (totallyNew) {--}}
                        {{--$('.main-image').append(html_main)--}}
                    {{--}--}}
                    {{--$('.thumb-list').append(html)--}}
                    {{--$('#images_json').val(JSON.stringify(curList))--}}
                {{--});--}}
            {{--})--}}
        {{--})--}}
    {{--</script>--}}

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
                $('.thumb-image').each(function (index, image) {
                    console.log(123,image);
                    list.push({
                        position: index,
                        url: $(image).find('img').attr('data-image'),
                        alt: $(image).find('img').attr('alt'),
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
                    <img class="" src="` + item.url + `" data-src="` + item.url + `" alt="` + item.alt + `" data-name="`+ item.fileName +`">
                    <div class="overlay">
                        <div class="alter-button">Alt</div>
                        <div class="remove-button"><i class="fa fa-trash"></i></div>
                    </div>
                </div>`
                        }
                        if (index == 0) {
                            html_main = `<div class="thumb-image new">
                    <img class="" src="` + item.url + `"  data-src="` + item.url + `" alt="` + item.alt + `">
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


    <script>
        $('#title_vn').on('input', function () {
            ChangeToSlug()
        });

        function ChangeToSlug() {
            var title, slug;

            //Lấy text từ thẻ input title
            title = document.getElementById("title_vn").value;

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('slug').value = slug;
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=AIzaSyAOYTBGlUxFOO0am9ZAsM3-q3Fv2GBWxys"></script>
    <script>
        function init() {
            var autocomplete = new google.maps.places.Autocomplete(document.getElementById("address"));
            console.log(autocomplete, 'complate  ');
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                var address = place.formatted_address;
                var lat = place.geometry.location.lat();
                var long = place.geometry.location.lng();
                var input = '<input type="hidden" name="lat" value="' + lat + '"> <input type="hidden" name="long" value="' + long + '">';
                $('.listen-address').prepend(input);
                console.log(input, 'lat-long');
            });
        }

        google.maps.event.addDomListener(window, 'load', init);

    </script>
@endsection