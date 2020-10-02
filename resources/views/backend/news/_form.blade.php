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
                        <form action="{{isset($news) ? '/admin/news/'.$news->id : '/admin/news'}}" method="post"
                              id="myFormId" enctype="multipart/form-data">
                            @csrf
                            @if(isset($news))
                                @method('PUT')
                            @endif
                            <div class="card-header fix-header bottom-card">
                                <div class="row" style="align-items: baseline">
                                    <h4 class="col-lg-3">{{isset($news) ? 'Cập nhật ' : 'Thêm mới '}}tin tức</h4>
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
                                        <div class="col-6 form-group {{ $errors->has('title_vn') ? 'has-error' : '' }}">
                                            <label for="squareText" class="required">Tiêu đề VN</label>
                                            <input type="text" id="title_vn" name="title_vn"
                                                   class="form-control square"
                                                   value="{{$news->title_vn ?? old('title_vn')}}">
                                            <span class="help-block">{{ $errors->first('title_vn', ':message') }}</span>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="squareText">Tiêu đề EN</label>
                                            <input type="text" id="title_en" name="title_en"
                                                   class="form-control square"
                                                   value="{{$news->title_vn ?? old('title_en')}}">
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-6 form-group">
                                            <label for="squareText" class="required">Nội dung VN</label>
                                            <textarea name="content_vn" class="editor" id="content_vn"
                                                      style="height: 300px;">
                                            <p>{{$news->content_vn ?? old('content_vn')}}</p>
                                        </textarea>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label for="squareText">Nội dung EN</label>
                                            <textarea name="content_en" class="editor1" id="content_en"
                                                      style="height: 300px;">
                                            <p>{{$news->content_en ?? old('content_en')}}</p>
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col-6 form-group">
                                            <label for="squareText">Ngày</label>
                                            <input type="date" id="date" name="date"
                                                   class="form-control square"
                                                   value="{{isset($news->date) ? $news->date : old('date') }}">
                                            {{--<div class="input-group date" id="datetime">--}}
                                                {{--<input type="text" class="form-control" placeholder="Chọn ngày"--}}
                                                       {{--name="date"--}}
                                                       {{--autocomplete="off"--}}
                                                       {{--value="{{isset($news->date) ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$news->date)->format('d/m/Y') : old('date') }}">--}}
                                                {{--<div class="input-group-append">--}}
                                                    {{--<span class="input-group-text">--}}
                                                        {{--<span class="fa fa-calendar"></span>--}}
                                                    {{--</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <br>
                                            <label for="squareText">Slug</label>
                                            <input type="text" id="slug" name="slug"
                                                   class="form-control square" value="{{$news->slug ?? old('slug')}}">
                                        </div>
                                        <div class="col-md-6 fileupload fileupload-new mt-1" data-provides="fileupload">
                                            <label for="squareText">Hình ảnh</label>
                                            <div class="d-flex mb-1" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-secondary btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-picture-o"></i> Chọn ảnh</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
                                                    <input type="file" id="image" name="image" class="btn-secondary">
                                                </button>
                                            </div>

                                            <div class="fileupload-new thumbnail"
                                                 style="border-radius: 5px;width: 200px; height: 150px;">
                                                @if(isset($news->image))
                                                    <img class="viewImage" src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$news->image}}" alt="Hình ảnh tin tức" style="width: 65%">
                                                    @else
                                                    <img class="viewImage"
                                                         src="{{asset('images/default-image-300x225.jpg')}}" alt="Hình ảnh tin tức"
                                                         style="width: 65%">
                                                @endif
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
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
@endsection
@section('script')
    @include('backend.layouts.script')
    <script src="/js/file_upload.js"></script>
    <script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>

        ClassicEditor
            .create(document.querySelector('.editor'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('.editor1'))
            .catch(error => {
                console.error(error);
            });
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
@endsection
