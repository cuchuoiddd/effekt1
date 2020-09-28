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
                                <h4 class="col-lg-3">Kho số seeding</h4>
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
                            <button class="btn btn-primary btnAddNew" data-toggle="modal" data-target="#add_new"><i
                                        class="fa fa-plus"></i> Thêm số seeding
                            </button>
                            <button class="btn btn-warning btnDelete"><i class="fa fa-trash"></i> Xóa nhiều</button>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="table-responsive tableFixHead table-bordered table-hover"
                                     style="width: 100%; overflow-x: auto;">
                                    <table class="table table-custom">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 30px;"><input type="checkbox"
                                                                                                id="checkAll"></th>
                                            <th class="text-center" style="width: 30px;">#</th>
                                            <th class="text-center">Số seeding</th>
                                            <th class="text-center">Người tạo</th>
                                            <th class="text-center">Cập nhật</th>
                                            <th class="text-center" style="width: 90px">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($data))
                                            @foreach($data as $key=>$item)
                                                <tr>
                                                    <td class="text-center"><input type="checkbox" getData value="{{$item->id}}">
                                                    </td>
                                                    <td class="text-center">{{$key+1}}</td>
                                                    <td class="text-center">{{$item->seeding_number}}</td>
                                                    <td class="text-center">
                                                        {{$item->user->name}} <br>
                                                        {{$item->created_at}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{$item->user->name}} <br>
                                                        {{$item->updated_at}}
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="action-control delete" data-id="{{$item->id}}" href="javascript:void(0)">
                                                            <i class="fa fa-trash fa-2x"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6">
                                                    Không có bản ghi nào.
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-2">
                                    {{$data->links()}}
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
                        <h5 class="modal-title" id="myModalLabel35"> Cập nhật số seeding</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @include('backend.marketing.seeding_number._form')
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    @include('backend.layouts.script')
    <script>
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $(document).on('click', '.btnDelete', function () {
            let favorite = [];
            $.each($("input[getData]:checked"), function () {
                favorite.push($(this).val());
            });
            console.log(111, favorite)
        })

        $(document).on('click', '.btnAdd', function () {
            $('#myFormId').submit();
        })


    </script>
@endsection
