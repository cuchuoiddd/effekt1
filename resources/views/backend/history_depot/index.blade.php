@extends('backend.layouts.master')
@section('content')
    <div class="content-body">
        <section id="card-actions">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {!! Form::open(array('url' => url()->current(), 'method' => 'get', 'id'=> 'gridForm','role'=>'form')) !!}
                        <div class="card-header fix-header bottom-card">
                            <div class="row" style="align-items: baseline">
                                <h4 class="col-lg-3">Lịch sử nhập, xuất kho</h4>
                                <div class="col-lg-3 col-md-6">
                                    <input name="code_order" type="text" class="form-control square" placeholder="Mã đơn">
                                </div>
                                <button type="submit" class="btn btn-primary" id="btnSearch"><i class="fa fa-search"></i> Tìm kiếm
                                </button>
                            </div>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0"><li><a data-action="expand"><i class="ft-maximize"></i></a></li></ul>
                            </div>
                        </div>
                        <div class="card-header fix-header bottom-card">
                            <div class="row">
                                <input type="hidden" name="start_date" id="start_date">
                                <input type="hidden" name="end_date" id="end_date">
                                <div class="col-lg-3 col-md-6">
                                    <input name="name" id="reportrange" type="text" class="form-control square" >
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    {!! Form::select('depot_id', $deposts, null, array('class' => 'form-control square','placeholder'=>'--Chọn kho--')) !!}
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    {!! Form::select('status', $status, null, array('class' => 'form-control square','placeholder'=>'--Nghiệp vụ kho--')) !!}
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    {!! Form::select('product_id', $products, null, array('class' => 'form-control square select2','data-placeholder'=>'--Chọn sản phẩm--')) !!}
                                </div>
                            </div>

                        </div>
                        {{ Form::close() }}
                        <div class="card-content collapse show">
                            <div class="card-body">
                                @include('backend.history_depot.ajax')
                                @include('backend.history_depot._form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // card-actions section end -->
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script>
            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#start_date').val(start.format('DD/MM/YYYY')).change();
                $('#end_date').val(end.format('DD/MM/YYYY')).change();
                $('#reportrange').val(start.format('DD/MM/YYYY')+ ' - ' + end.format('DD/MM/YYYY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                locale: {
                    format: "DD/MM/YYYY",
                    separator: " - ",
                    applyLabel: "Đồng ý",
                    cancelLabel: "Hủy",
                    fromLabel: "Từ",
                    toLabel: "Tới",
                    customRangeLabel: "Tùy chỉnh",
                    weekLabel: "Tuần",
                    daysOfWeek: [
                        "T2",
                        "T3",
                        "T4",
                        "T5",
                        "T6",
                        "T7",
                        "CN"
                    ],
                    monthNames: [
                        "Tháng 1",
                        "Tháng 2",
                        "Tháng 3",
                        "Tháng 4",
                        "Tháng 5",
                        "Tháng 6",
                        "Tháng 7",
                        "Tháng 8",
                        "Tháng 9",
                        "Tháng 10",
                        "Tháng 11",
                        "Tháng 12"
                    ],
                    "firstDay": 1
                },
                ranges: {
                    'Hôm nay': [moment(), moment()],
                    'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Tuần này': [moment().startOf('week'), moment().endOf('week')],
                    'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                    'Tháng trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);
    </script>
@endsection
@section('script')
    @include('backend.layouts.script')
    <script>
        $('#product_id').change(function () {
            let id = $(this).val();;
            if (!id) return false;
            var text = $(this).find(":selected").text();
            var html = `<tr>
                <input type="hidden" name="product[]" value="` + id + `">
                <td><span id="">` + text + `</span></td>
                <td style="width: 20%;">
                    <input type="text" maxlength="5" class="form-control text-center txt-dotted"style="height: 23px !important;" name="quantity[]">
                </td>
            </tr>`;
            $('.list-product').append(html);
        })

        $().ready(function () {
            $("#validateForm").validate({
                rules: {
                    depot_id: 'required',
                    status: 'required',
                    note: 'required',
                    // product_id: 'required',
                },
                messages: {
                    depot_id: "Vui lòng chọn kho !",
                    status: "Vui lòng chọn nghiệp vụ !",
                    note: "Vui lòng nhập ghi chú !"
                    // code: "Vui lòng nhập mã !"
                }
            })
        });

    </script>
@endsection
