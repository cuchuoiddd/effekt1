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
                                <h4 class="col-lg-3">Quản lý kho</h4>
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
                            <button class="btn btn-primary btnAddNew"><i
                                        class="fa fa-plus"></i> Thêm mới
                            </button>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="table-responsive tableFixHead table-bordered table-hover"
                                     style="width: 100%; overflow: hidden; overflow-x: auto;">
                                    <table class="table table-custom">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 30px;">#</th>
                                            <th class="text-center">Mã</th>
                                            <th class="text-center">Tên</th>
                                            <th class="text-center">Số điện thoại</th>
                                            <th class="text-center">Tỉnh/TP</th>
                                            <th class="text-center">Quận/Huyện</th>
                                            <th class="text-center">Phường/Xã</th>
                                            <th class="text-center">Địa chỉ</th>
                                            <th class="text-center">Quản kho</th>
                                            {{--<th class="text-center">Cập nhật</th>--}}
                                            <th class="text-center" style="width: 90px">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($depots))
                                            @foreach($depots as $key=>$value)
                                                <tr>
                                                    <td class="text-center">{{$key+1}}</td>
                                                    <td class="text-center">{{$value->code}}</td>
                                                    <td class="text-center">{{$value->name}}</td>
                                                    <td class="text-center">{{$value->phone}}</td>
                                                    <td class="text-center">{{$value->getCity->name}}</td>
                                                    <td class="text-center">{{$value->getDistrict->name}}</td>
                                                    <td class="text-center">{{$value->getWards->name}}</td>
                                                    <td class="text-center">{{$value->address}}</td>
                                                    <td class="text-center">
                                                        {{@$value->user->name}}
                                                        <br>
                                                        <span class="small-tip">{{$value->user_phone}}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="action-control edit" data-id="{{$value->id}}"><i
                                                                    class="fa fa-edit fa-2x"></i></a>
                                                        <a class="action-control delete" href="javascript:void(0)"
                                                           data-id="{{$value->id}}"><i
                                                                    class="fa fa-trash fa-2x"></i></a>
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
    <script>

        $().ready(function () {
            $("#city,#district,#wards,#user_id").select2({
                dropdownParent: $("#add_new"),
                placeholder: 'Chọn',
                width: '100%',
                allowClear: true
            });

            $("#myFormId").validate({
                rules: {
                    name: "required",
                    city: "required",
                    district: "required",
                    wards: "required",
                    address: "required",
                    phone: "required"
                },
            })
        });

        function getLocation(cities, districts, wards, selected) {
            let html_city = '';
            let html_district = '';
            let html_wards = '';
            let html_transport_default = '<option value="9999">--toàn quốc</option>';
            let row_city = $('body').find('#city');
            let row_district = $('body').find('#district');
            let row_wards = $('body').find('#wards');
            let row_transport_default = $('body').find('#transport_default');

            cities.forEach(element => {
                let value = element.code;
                let selected_1 = value == selected.city ? 'selected' : '';
                html_city += `<option value="` + value + `">` + element.name + `</option>`;
                html_transport_default += `<option value="` + value + `" `+ selected_1 +`>` + element.name + `</option>`;
            });
            districts.forEach(element => {
                let value = element.code;
                let selected_1 = value == selected.district ? 'selected' : '';
                html_district += `<option value="` + value + `" `+ selected_1 +`>` + element.name + `</option>`;
            });
            wards.forEach(element => {
                let value = element.code;
                let selected_1 = value == selected.wards ? 'selected' : '';
                html_wards += `<option value="` + value + `" ` + selected_1 + ` >` + element.name + `</option>`;
            })
            row_city.html(html_city);
            row_district.html(html_district);
            row_wards.html(html_wards);
            row_transport_default.html(html_transport_default);
        }

        //show modal + get data location
        $(document).on('click', '.btnAddNew', function () {
             $.ajax({
                url: "/ajax/searchLocation",
                success: function (data) {
                    let selected = {
                        'city': "",
                        'district': "",
                        'wards': ""
                    }
                     getLocation(data.cities, data.districts, data.wards,selected);
                }
            });
            $('#add_new').modal('show')

        })
        //change city
        $('#city').on("change", function (e) {
            const city_code = e.target.value;
            let html_district = '';
            let html_wards = '';
            let row_district = $('body').find('#district');
            let row_wards = $('body').find('#wards');

            $.ajax({
                url: '/ajax/searchDistrict/' + city_code,
                success: function (data) {
                    let districts = data.districts;
                    let wards = data.wards;
                    districts.forEach(element => {
                        let value = element.code;
                        html_district += `<option value="` + value + `">` + element.name + `</option>`
                    });
                    wards.forEach(element => {
                        let value = element.code;
                        html_wards += `<option value="` + value + `">` + element.name + `</option>`
                    })
                    row_district.html(html_district);
                    row_wards.html(html_wards);
                }
            });
        });
        // change district
        $('#district').on("change", function (e) {
            const district_code = e.target.value;
            let html_wards = '';
            let row_wards = $('body').find('#wards');

            $.ajax({
                url: '/ajax/searchWards/' + district_code,
                success: function (data) {
                    let wards = data.wards;
                    wards.forEach(element => {
                        let value = element.code;
                        html_wards += `<option value="` + value + `">` + element.name + `</option>`
                    })
                    row_wards.html(html_wards);
                }
            });
        });

        $(document).on('click', '.locationMienBac', function () {
            $.ajax({
                url: '/ajax/location/cac-tinh-mien-bac',
                success: data => {
                    let arr = data.location_mien_bac.map(m => m.code)
                    console.log(arr);
                    $('#transport_default').val(arr).change();
                }
            })
        });
        $(document).on('click', '.locationMienTrung', function () {
            $.ajax({
                url: '/ajax/location/cac-tinh-mien-trung',
                success: data => {
                    let arr = data.location_mien_trung.map(m => m.code)
                    $('#transport_default').val(arr);
                    $('#transport_default').select2().change();
                }
            })
        });
        $(document).on('click', '.locationMienNam', function () {
            $.ajax({
                url: '/ajax/location/cac-tinh-mien-nam',
                success: data => {
                    let arr = data.location_mien_nam.map(m => m.code)
                    $('#transport_default').val(arr);
                    $('#transport_default').select2().change();
                }
            })
        });
        $(document).on('click', '.locationDelete', function () {
            let arr = [];
            $('#transport_default').val(arr);
            $('#transport_default').select2().change();
        });

        // edit
        $(document).on('click', '.edit', function () {
            let depot_id = $(this).data('id');
            let form = $('#myFormId');
            form.attr('action', '/depots/list/' + depot_id);
            form.attr('method', 'POST');
            $('#myModalLabel35').html('CẬP NHẬT KHO').change();
            $('#myFormId').append('<input name="_method" type="hidden" value="PUT" />');


            $.ajax({
                url: '/ajax/showDepot/' + depot_id,
                success: function (resp) {
                    console.log(1111,resp);
                    $('#name').val(resp.name);
                    $('#code').val(resp.code);
                    $('#address').val(resp.address);
                    $('#phone').val(resp.phone);
                    $('#note').val(resp.note);
                    $('#position').val(resp.position);
                    $('#user_phone').val(resp.user_phone);

                    let selected = {
                        'city': resp.city,
                        'district': resp.district,
                        'wards': resp.wards
                    }
                    $.ajax({
                        url: "/ajax/searchAllUseWards/" + resp.wards,
                        success: function (data) {
                            console.log(1111, data);
                            getLocation(data.cities, data.districts, data.wards, selected);
                            $('#transport_default').val(JSON.parse(resp.transport_default)).change();
                        }
                    });
                }
            })
            $('#add_new').modal({show: true})
        });

        function refreshData(){
            $('#name').val('');
            $('#code').val('');
            $('#address').val('');
            $('#phone').val('');
            $('#note').val('');
            $('#user_id').val('');
            $('#user_phone').val('');
        }
        $(document).on('click','.refresh-data',function () {
            refreshData()
        })


    </script>
@endsection
