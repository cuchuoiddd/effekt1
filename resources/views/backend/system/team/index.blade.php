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
                                <h4 class="col-lg-3">Quản lý đội, nhóm</h4>
                                <div class="col-lg-3 col-md-6">
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control square"
                                               placeholder="Họ tên, số điện thoại">
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
                        <div class="card-header fix-header"></div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="table-responsive tableFixHead table-bordered table-hover"
                                     style="width: 100%; overflow-x: auto;">
                                    <table class="table table-custom">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 30px;">STT</th>
                                            <th class="text-center nowrap">Loại nhóm</th>
                                            <th class="text-center">Mã</th>
                                            <th class="text-center">Tên</th>
                                            <th class="text-center nowrap">Trưởng nhóm</th>
                                            <th class="text-center nowrap">Thành viên</th>
                                            <th class="text-center nowrap">Cập nhật</th>
                                            <th class="text-center nowrap">
                                                <a id="add_new" data-toggle="modal" data-target="#add_new_form"><i class="fa fa-plus"></i> Thêm
                                                </a>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($data))
                                                @foreach($data as $key=>$item)
                                                <tr>
                                                    <td class="text-center">{{$key+1}}</td>
                                                    <td class="text-center">
                                                        {{$item->department_id==\App\Constants\DepartmentConstant::SALE?'Sale'
                                                        :($item->department_id==\App\Constants\DepartmentConstant::MARKETING?'Marketing'
                                                        :($item->department_id==\App\Constants\DepartmentConstant::CSKH?'CSKH':''))}}
                                                    </td>
                                                    <td class="text-center">{{$item->code}}</td>
                                                    <td class="text-center">{{$item->name}}</td>
                                                    <td class="text-center">{{$item->leader_id}}</td>
                                                    <td class="text-center">adam.sale1(Calibee - Trưởng Phòng); adam.sale2(Calibee - Nguyễn Văn Tiến); adam.sale3(Calibee - Phan Văn Cộng); adam.sale4(Calibee - Phạm Hồng Ánh); adam.sale5(Calibee - Bùi Thị Khánh Linh ); adam.sale6(Calibee - Nguyễn Thị Thúy Hiền); adam.sale7(Calibee - Nguyễn Trường Giang); adam.sale8(Calibee - Vũ Ngọc Hằng); adam.sale9(Calibee - Đoàn Phú Quốc); adam.sale10(Calibee - Tạ Thị Minh Phượng); adam.sale11(Calibee - Hoàng Duy Phước); adam.sale12(Calibee - Lê Văn Thức); adam.sale141(HCNS- ĐỐI SOÁT - Calibee); adam.sale139(Sale 139)</td>
                                                    <td class="text-center">18 / 09 / 2020 09:27</td>
                                                    <td class="text-center">
                                                        <a class="action-control edit" href="javascript:void(0)">
                                                            <i class="fa fa-edit fa-2x"></i>
                                                        </a>
                                                        <a class="action-control delete" href="javascript:void(0)">
                                                            <i class="fa fa-trash fa-2x"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                            <tr>
                                                <td colspan="9"></td>
                                            </tr>
                                                @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-2">
                                    {{--{{$posts->links()}}--}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- // card-actions section end -->
        <div class="modal fade text-left" id="add_new_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
             style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-main">
                        <h3 class="modal-title" id="myModalLabel35"> Thêm mới thông tin đội, nhóm</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @include('backend.system.team._form')
                </div>
            </div>
        </div>


    </div>
@endsection
@section('script')
    @include('backend.layouts.script')
    <script>
        $("#team-my-form").validate({
            rules: {
                department_id: "required",
                code: "required",
                name: "required",
                leader_id: "required"
            },
        })

        // edit
        // $(document).on('click', '.edit', function () {
        //     let depot_id = $(this).data('id');
        //     let form = $('#myFormId');
        //     form.attr('action', '/depots/list/' + depot_id);
        //     form.attr('method', 'POST');
        //     $('#myModalLabel35').html('CẬP NHẬT KHO').change();
        //     $('#myFormId').append('<input name="_method" type="hidden" value="PUT" />');
        //
        //
        //     $.ajax({
        //         url: '/ajax/showDepot/' + depot_id,
        //         success: function (resp) {
        //             console.log(1111,resp);
        //             $('#name').val(resp.name);
        //             $('#code').val(resp.code);
        //             $('#address').val(resp.address);
        //             $('#phone').val(resp.phone);
        //             $('#note').val(resp.note);
        //             $('#position').val(resp.position);
        //             $('#user_phone').val(resp.user_phone);
        //
        //             let selected = {
        //                 'city': resp.city,
        //                 'district': resp.district,
        //                 'wards': resp.wards
        //             }
        //             $.ajax({
        //                 url: "/ajax/searchAllUseWards/" + resp.wards,
        //                 success: function (data) {
        //                     console.log(1111, data);
        //                     getLocation(data.cities, data.districts, data.wards, selected);
        //                     $('#transport_default').val(JSON.parse(resp.transport_default)).change();
        //                 }
        //             });
        //         }
        //     })
        //     $('#add_new').modal({show: true})
        // });
    </script>
@endsection
