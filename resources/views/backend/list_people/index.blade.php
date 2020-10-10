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
                                <h4 class="col-lg-3">Danh sách nhân viên</h4>
                                <div class="col-lg-3 col-md-6">
                                        <input type="text" class="form-control square" placeholder="Tìm kiếm tên ...">
                                </div>
                                <button class="btn btn-primary"><i class="fa fa-search"></i> Tìm kiếm</button>
                            </div>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-header fix-header">
                            <a href="/admin/offices/people/create">
                                <button class="btn btn-primary"><i
                                            class="fa fa-plus"></i> Thêm mới
                                </button>
                            </a>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="table-responsive tableFixHead table-bordered table-hover"
                                     style="width: 100%; overflow: hidden; overflow-x: auto;">
                                    <table class="table table-custom">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 30px;">#</th>
                                            <th class="text-center">Hình ảnh</th>
                                            <th class="text-center">Họ tên VN</th>
                                            <th class="text-center">Họ tên EN</th>
                                            <th class="text-center">Công việc VN</th>
                                            <th class="text-center">Công việc EN</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center" style="width: 90px">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($people))
                                            @foreach($people as $k=>$item)
                                                <tr>
                                                    <td class="text-center">{{$k+1}}</td>
                                                    <td class="text-center">
                                                        <img src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PEOPLE.$item->avatar}}" alt=""
                                                        style="width: 70px;">
                                                    </td>
                                                    <td class="text-center">{{$item->full_name_vn}}</td>
                                                    <td class="text-center">{{$item->full_name_en}}</td>
                                                    <td class="text-center">{{$item->job_vn}}</td>
                                                    <td class="text-center">{{$item->job_en}}</td>
                                                    <td class="text-center">{{$item->email}}</td>
                                                    <td class="text-center">
                                                        <a class="action-control edit" href="/admin/offices/people/{{$item->id}}/edit"><i
                                                                    class="fa fa-edit fa-2x"></i></a>
                                                        <a class="action-control delete" href="javascript:void(0)"
                                                           data-id="{{$item->id}}"><i
                                                                    class="fa fa-trash fa-2x"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5">Không có bản ghi nào</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
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
@endsection
