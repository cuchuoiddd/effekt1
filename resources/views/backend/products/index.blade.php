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
                                <h4 class="col-lg-3">Danh sách sản phẩm</h4>
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
                            <a href="/admin/work/products/create">
                                <button class="btn btn-primary btnAddNew"><i
                                            class="fa fa-plus"></i> Thêm mới
                                </button>
                            </a>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="table-responsive tableFixHead table-bordered table-hover"
                                     style="width: 100%; overflow-x: auto;">
                                    <table class="table table-custom">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 30px;">#</th>
                                            <th class="text-center">Danh mục</th>
                                            <th class="text-center">Hình ảnh</th>
                                            <th class="text-center">Tiêu đề VN</th>
                                            <th class="text-center">Tiêu đề EN</th>
                                            <th class="text-center">Nội dung VN</th>
                                            <th class="text-center">Nội dung EN</th>
                                            <th class="text-center" style="width: 90px">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($products))
                                            @foreach($products as $k=>$item)
                                                <tr>
                                                    <td class="text-center">{{$k+1}}</td>
                                                    <td class="text-center">{{@$item->category->title_vn}}</td>
                                                    <td class="text-center">
                                                        <img src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.json_decode($item->images)[0]->url}}" alt="" style="width: 50px;height: 50px;">
                                                    </td>
                                                    <td class="text-center">{{$item->title_vn}}</td>
                                                    <td class="text-center">{{$item->title_en}}</td>
                                                    <td class="text-center">{!! @str_limit(strip_tags($item->content_vn),60) !!}</td>
                                                    <td class="text-center">{!! @str_limit(strip_tags($item->content_en),60) !!}</td>
                                                    <td class="text-center">
                                                        <a class="action-control edit" href="/admin/work/products/{{$item->id}}/edit"><i
                                                                    class="fa fa-edit fa-2x"></i></a>
                                                        <a class="action-control delete" href="javascript:void(0)"
                                                           data-id="{{$item->id}}"><i
                                                                    class="fa fa-trash fa-2x"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="9">Không có bản ghi nào !</td>
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
