@extends('backend.layouts.master')
@section('content')
    <style>
        .ck.ck-content.ck-editor__editable{
            height: 300px;
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
                                <h4 class="col-lg-3">{{isset($people) ? 'Cập nhật ' : 'Thêm mới '}}nhân viên</h4>
                            </div>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <form action="{{isset($people) ? '/admin/offices/people/'.$people->id : '/admin/offices/people'}}" method="post"
                                  id="myFormId" enctype="multipart/form-data">
                                @csrf
                                @if(isset($people))
                                    @method('PUT')
                                @endif
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col-6 form-group">
                                        <label for="squareText" class="required">Họ tên</label>
                                        <input type="text" id="full_name" name="full_name"
                                               class="form-control square" value="{{$people->full_name ?? old('full_name')}}">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="squareText">Email</label>
                                        <input type="email" id="email" name="email"
                                               class="form-control square" value="{{$people->email ?? old('email')}}">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="squareText" >Công việc VN</label>
                                        <input type="text" id="job_vn" name="job_vn"
                                               class="form-control square" value="{{$people->job_vn ?? old('job_vn')}}">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="squareText" >Công việc EN</label>
                                        <input type="text" id="job_en" name="job_en"
                                               class="form-control square" value="{{$people->job_en ?? old('job_en')}}">
                                    </div>
                                </div>
                                <div class="row mt-1">

                                    <div class="col-md-6 fileupload fileupload-new mt-1" data-provides="fileupload">
                                        <label for="squareText">Hình ảnh avatar</label>
                                        <div class="d-flex mb-1" style="margin-top: 10px;">
                                            <button type="button" class="btn btn-secondary btn-file">
                                                <span class="fileupload-new"><i class="fa fa-picture-o"></i> Chọn ảnh</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Thay đổi</span>
                                                <input type="file" id="image" name="image" class="btn-secondary">
                                            </button>
                                        </div>

                                        <div class="fileupload-new thumbnail" style="border-radius: 5px;width: 200px; height: 150px;">
{{--                                            <img class="viewImage" src="{{asset('images/default-image-300x225.jpg')}}" alt="Hình ảnh" style="width: 65%">--}}
                                            @if(isset($people->avatar))
                                                <img class="viewImage"
                                                     src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PEOPLE.$people->avatar}}"
                                                     alt="Hình ảnh tin tức" style="width: 65%">
                                            @else
                                                <img class="viewImage"
                                                     src="{{asset('images/default-image-300x225.jpg')}}"
                                                     alt="Hình ảnh tin tức"
                                                     style="width: 65%">
                                            @endif
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
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
            </div>
        </section>
    </div>
@endsection
@section('script')
    @include('backend.layouts.script')
    <script src="/js/file_upload.js"></script>
@endsection
