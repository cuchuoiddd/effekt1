@extends('backend.layouts.master')
@section('content')
    <div class="content-body">
        <!-- card actions section start -->
        <section id="card-actions">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{url()->current()}}" method="get" id="gridForm">
                            <div class="card-header fix-header bottom-card">
                                <div class="row" style="align-items: baseline">
                                    <h4 class="col-lg-3">Danh sách sản phẩm</h4>
                                    <div class="col-lg-3 col-md-6">
                                        <input type="text" class="form-control square" placeholder="Tìm kiếm tên ..." name="searchTitle">
                                    </div>
                                    <button class="btn btn-primary"><i class="fa fa-search"></i> Tìm kiếm</button>
                                </div>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                        <div class="card-header fix-header">
                            <a href="/admin/work/products/create">
                                <button class="btn btn-primary btnAddNew"><i
                                            class="fa fa-plus"></i> Thêm mới
                                </button>
                            </a>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                @include('backend.products.ajax')
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
