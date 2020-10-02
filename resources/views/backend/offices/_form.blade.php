@extends('backend.layouts.master')
@section('content')
    <style>
        .ck.ck-content.ck-editor__editable{
            height: 300px;
        }
        .pu-caption{
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
                    <div class="card">
                        <div class="card-header fix-header bottom-card">
                            <div class="row" style="align-items: baseline">
                                <h4 class="col-lg-3">{{isset($news) ? 'Cập nhật ' : 'Thêm mới '}}Office</h4>
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
                                            Profile
                                        </div>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="squareText" >Tiêu đề EN</label>
                                        <input type="text" id="title_en" name="title_en"
                                               class="form-control square">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="squareText" >Tiêu đề EN</label>
                                        <input type="text" id="title_en" name="title_en"
                                               class="form-control square">
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
                                <div class="row mt-1">
                                    <div class="col-6 form-group">
                                        <label for="squareText" class="required">Nội dung VN</label>
                                        <textarea name="content_vn" class="editor" id="content_vn" style="height: 300px;">
                                            &lt;p&gt;This is some sample content.&lt;/p&gt;
                                        </textarea>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="squareText">Nội dung EN</label>
                                        <textarea name="content_en" class="editor1" id="content_en" style="height: 300px;">
                                            &lt;p&gt;This is some sample content.&lt;/p&gt;
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-6 form-group">
                                        <label for="squareText">Ngày</label>
                                        <input type="date" id="date" name="date"
                                               class="form-control square"> <br>
                                        <label for="squareText">Slug</label>
                                        <input type="text" id="slug" name="slug"
                                               class="form-control square">
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

                                        <div class="fileupload-new thumbnail" style="border-radius: 5px;width: 200px; height: 150px;">
                                            <img class="viewImage" src="{{asset('images/default-image-300x225.jpg')}}" alt="Hình ảnh" style="width: 65%">
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    @include('backend.layouts.script')
    <script>
        ClassicEditor
            .create(document.querySelector('.editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
