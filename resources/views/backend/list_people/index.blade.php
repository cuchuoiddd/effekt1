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
                                <h4 class="col-lg-3">Quản lý tin tức</h4>
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
                        <div class="card-header fix-header">
                            <a href="/admin/offices/peoples/create">
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
                                            <th class="text-center">Tiêu đề VN</th>
                                            <th class="text-center">Tiêu đề EN</th>
                                            <th class="text-center">Nội dung VN</th>
                                            <th class="text-center">Nội dung EN</th>
                                            <th class="text-center">Ngày</th>
                                            <th class="text-center" style="width: 90px">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">
                                                <a class="action-control edit" data-id="1"><i
                                                            class="fa fa-edit fa-2x"></i></a>
                                                <a class="action-control delete" href="javascript:void(0)"
                                                   data-id="1"><i
                                                            class="fa fa-trash fa-2x"></i></a>
                                            </td>
                                        </tr>
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
