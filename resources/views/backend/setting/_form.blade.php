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
@endsection
