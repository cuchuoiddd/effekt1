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
                                <h4 class="col-lg-3">Hồ sơ khách hàng</h4>
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
                        <div class="card-header fix-header">
                            <div class="row">
                                <div class="col-4">
                                    <input class="form-control square" type="text" value="04/09/2020">
                                </div>
                                <div class="col-2">
                                    <select class="select2 square" name="" id="" data-placeholder="--Kiểu ngày--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select class="select2 square" name="" id="" data-placeholder="--Care đơn--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select class="select2 square" name="" id=""
                                            data-placeholder="--Trạng thái chốt đơn--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-2">
                                    <select class="select2 square" name="" id=""
                                            data-placeholder="--Trạng thái chốt đơn--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select class="select2 square" name="" id=""
                                            data-placeholder="--Trạng thái chốt đơn--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select class="select2 square" name="" id=""
                                            data-placeholder="--Trạng thái chốt đơn--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select class="select2 square" name="" id=""
                                            data-placeholder="--Trạng thái chốt đơn--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select class="select2 square" name="" id=""
                                            data-placeholder="--Trạng thái chốt đơn--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select class="select2 square" name="" id=""
                                            data-placeholder="--Trạng thái chốt đơn--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-2">
                                    <select class="select2 square" name="" id=""
                                            data-placeholder="--Trạng thái chốt đơn--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select class="select2 square" name="" id=""
                                            data-placeholder="--Trạng thái chốt đơn--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select class="select2 square" name="" id=""
                                            data-placeholder="--Trạng thái chốt đơn--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select class="select2 square" name="" id=""
                                            data-placeholder="--Trạng thái chốt đơn--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select class="select2 square" name="" id=""
                                            data-placeholder="--Trạng thái chốt đơn--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select class="select2 square" name="" id=""
                                            data-placeholder="--Trạng thái chốt đơn--">
                                        <option></option>
                                        <option value="1">Ngày data về hệ thống</option>
                                    </select>
                                </div>
                            </div>
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
                                            <th class="text-center" style="min-width: 110px">Mã đơn</th>
                                            <th class="text-center">Landing <br> Ngày data về</th>
                                            <th class="text-center">Họ tên <br> Số điện thoại</th>
                                            <th class="text-center">Tin Nhắn</th>
                                            <th class="text-center">Sale <br> Ngày nhận data</th>
                                            <th class="text-center">Tác nghiệp <br> Ngày chốt đơn</th>
                                            <th class="text-center">Kết quả <br> Ngày sale tác nghiệp</th>
                                            <th class="text-center">Sản phẩm</th>
                                            <th class="text-center">SL</th>
                                            <th class="text-center">Đơn giá</th>
                                            <th class="text-center">Thành tiền</th>
                                            <th class="text-center">CK</th>
                                            <th class="text-center">Phí VC <br> Thu của khách</th>
                                            <th class="text-center">Khách đặt cọc</th>
                                            <th class="text-center">Tổng tiền</th>
                                            <th class="text-center">Kho <br> PTGH <br> Mã giao vận</th>
                                            <th class="text-center">Trạng thái <br> giao hàng</th>
                                            <th class="text-center">ĐSBN</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($data))
                                            @foreach($data as $key=>$item)
                                                <tr>
                                                    <td class="text-center"><input type="checkbox" getData value="1">
                                                    </td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"> mkt10 trí-giải pháp
                                                        (adam.mkt10)
                                                        18 / 09 / 2020 09:27
                                                    </td>
                                                    <td class="text-center">Customer Facebook
                                                        {{$item->phone}}
                                                    </td>
                                                    <td class="text-center">{{$item->message}}</td>
                                                    <td class="text-center">{{$item->user->name}}
                                                        18 / 09 / 2020 09:27
                                                    </td>
                                                    <td class="text-center">KH Mới</td>
                                                    <td class="text-center">18 / 09 / 2020 09:27</td>
                                                    <td class="text-center">Viên uống Lavenda Plus <br>
                                                        Xịt thảo dược Lavenda <br>
                                                        Dung dịch vệ sinh Lavenda
                                                    </td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="15">Không có bản ghi nào.</td>
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


    </script>
@endsection
