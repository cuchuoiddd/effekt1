@extends('backend.layouts.master')
@section('content')
    <div class="content-body">
        <!-- card actions section start -->
        <section id="card-actions">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header fix-header bottom-card">
                            <div class="row" style="align-items: baseline">
                                <h4 class="col-lg-3">Danh sách bài post</h4>
                                <div class="col-lg-3 col-md-6">
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control square" placeholder="Tìm kiếm tên ...">
                                    </fieldset>
                                </div>
                                <button class="btn btn-primary"><i class="fa fa-search"></i> Tìm kiếm</button>
                            </div>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="table-responsive tableFixHead table-bordered table-hover"
                                     style="width: 100%; overflow-x: auto;">
                                    <table class="table table-custom">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 30px;">#</th>
                                            <th class="text-center">Fanpage</th>
                                            <th class="text-center">Mã bài viết</th>
                                            <th class="text-center">Nội dung</th>
                                            <th class="text-center nowrap">Ngày đăng</th>
                                            <th class="text-center nowrap">Sử dụng</th>
                                            <th class="text-center required" style="width: 10%;">Source</th>
                                            <th class="text-center" style="width: 90px">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($posts))
                                            @foreach($posts as $key=>$value)
                                                <tr>
                                                    <td class="text-center">{{$key+1}}</td>
                                                    <td class="text-center">
                                                        <img src="{{$value->fanpage->avatar}}" style="border-radius: 50%">
                                                    </td>
                                                    <td class="text-center">{{$value->post_id}}</td>
                                                    <td class="text-center">{{$value->title}}</td>
                                                    <td class="text-center">{{$value->post_created}}</td>
                                                    <td class="text-center">
                                                        <input type="checkbox" {{$value->used == \App\Constants\FanpageConstant::FANPAGE_POST_USED?'checked':''}}>
                                                    </td>
                                                    <td class="text-center">
                                                        <select class="select2" name="" id="" data-placeholder="--Source--">
                                                            <option></option>
                                                            <option value="1">Source 1</option>
                                                        </select>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="action-control edit"
                                                           data-id="{{$value->id}}"
                                                           href="javascript:void(0)"
                                                           title="Lưu"
                                                        >
                                                            <i class="fa fa-save fa-2x"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="10">Không có dữ liệu</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-2">
                                    {{$posts->links()}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- // card-actions section end -->
        <div class="modal fade text-left" id="add_new" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel35"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-main">
                        <h5 class="modal-title" id="myModalLabel35"> THÊM MỚI KHO</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @include('backend.pages.depots._form')
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    @include('backend.layouts.script')

@endsection
