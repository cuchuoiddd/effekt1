@extends('backend.layouts.master')
@section('content')
    {{--<style>--}}
        {{--.pu-caption {--}}
            {{--font-size: 14px;--}}
            {{--font-weight: 600;--}}
            {{--font-family: "Roboto Condensed";--}}
            {{--color: #fc6d2e;--}}
            {{--text-transform: uppercase;--}}
            {{--padding: 10px 22px 6px 10px;--}}
            {{--border-bottom: 2px solid #ff8f5d;--}}
            {{--margin-bottom: 15px;--}}
        {{--}--}}
        {{--.square{--}}
            {{--position: relative;--}}
            {{--width: 100%;--}}
        {{--}--}}
        {{--.content1{--}}
            {{--position: absolute;--}}
            {{--width: 100%;--}}
            {{--height: 100%;--}}
        {{--}--}}
        {{--.bxh-container {--}}
            {{--position: relative;--}}
            {{--width: 100%;--}}
            {{--height: 100%;--}}
        {{--}--}}
        {{--.bxh .item-rank {--}}
            {{--width: 6.5%;--}}
            {{--height: 6.5%;--}}
            {{--display: inline-block;--}}
            {{--position: absolute;--}}
        {{--}--}}
        {{--.bxh .item-rank1 {--}}
            {{--right: 0%;--}}
        {{--}--}}
        {{--.bxh .item-rank1 .king-sale {--}}
            {{--display: block;--}}
        {{--}--}}
        {{--.bxh .king-sale {--}}
            {{--display: none;--}}
            {{--text-align: center;--}}
            {{--position: absolute;--}}
            {{--width: 100%;--}}
            {{--margin-top: -40%;--}}
        {{--}--}}
        {{--.bxh .king-sale img {--}}
            {{--width: 45%;--}}
        {{--}--}}
        {{--.bxh .item-rank1 .avatar-container {--}}
            {{--border: 6px solid #f49000;--}}
        {{--}--}}
        {{--.bxh .item-rank .avatar-container {--}}
            {{--display: inline-block;--}}
            {{--height: 100%;--}}
            {{--width: 100%;--}}
            {{--overflow: hidden;--}}
            {{--border-radius: 50%;--}}
            {{--border: 6px solid #e8e9ec;--}}
        {{--}--}}
        {{--.blink1 {--}}
            {{--animation: blink1 5.0s linear infinite;--}}
        {{--}--}}
        {{--.bxh .item-rank .item-info {--}}
            {{--text-align: center;--}}
        {{--}--}}
        {{--.bxh .item-rank2 {--}}
            {{--right: 9%;--}}
            {{--top: 2%;--}}
        {{--}--}}
        {{--.bxh .item-rank3 {--}}
            {{--right: 18%;--}}
            {{--top: 4%;--}}
        {{--}--}}
        {{--.bxh .item-rank4 {--}}
            {{--right: 27%;--}}
            {{--top: 6%;--}}
        {{--}--}}
        {{--.bxh .item-rank5 {--}}
            {{--right: 36%;--}}
            {{--top: 8%;--}}
        {{--}--}}
        {{--.bxh .item-rank6 {--}}
            {{--right: 45%;--}}
            {{--top: 10%;--}}
        {{--}--}}
        {{--.bxh .item-rank7 {--}}
            {{--right: 54%;--}}
            {{--top: 12%;--}}
        {{--}--}}
        {{--.bxh .item-rank8 {--}}
            {{--right: 63%;--}}
            {{--top: 14%;--}}
        {{--}--}}
        {{--.bxh .item-rank9 {--}}
            {{--right: 72%;--}}
            {{--top: 16%;--}}
        {{--}--}}
        {{--.bxh .item-rank10 {--}}
            {{--right: 81%;--}}
            {{--top: 18%;--}}
        {{--}--}}
        {{--.bxh .king-sale {--}}
            {{--display: none;--}}
            {{--text-align: center;--}}
            {{--position: absolute;--}}
            {{--width: 100%;--}}
            {{--margin-top: -40%;--}}
        {{--}--}}


    {{--</style>--}}
    <style type="text/css">
        .table-line th{text-align:left;padding:8px;font-size:11px;font-style:italic;vertical-align:bottom;}
        .table-line td{text-align:left;border-top:1px solid #aaa;padding:2px;}

        .pu-caption {
            font-size: 14px;
            font-weight: 600;
            font-family: "Roboto Condensed";
            color: #fc6d2e;
            text-transform: uppercase;
            padding: 10px 22px 6px 10px;
            border-bottom: 2px solid #ff8f5d;
            margin-bottom: 15px;
        }
        .form-control{display:unset;}

        tr.r-caption td{background-color:orange;}

        tr.r-caption-m td{background-color:yellowgreen;}

        .bxh-container{position:relative;width:100%;height:100%;}
        .bxh .item-rank{width:6.5%;height:6.5%;display:inline-block;position:absolute;}
        .bxh .item-rank .avatar-container{display:inline-block;height:100%;width:100%;overflow:hidden;border-radius:50%;border:6px solid #e8e9ec;}
        .bxh .item-rank .item-info{text-align:center;}
        .bxh .item-rank .item-stt{font-size:14px;color:#333;font-weight:bold;padding-top:5px;padding-bottom:5px;}
        .bxh .item-rank .item-tennv{font-size:11px;padding-top:3px;}
        .bxh .item-rank .item-ds{font-size:11px;padding-top:3px;}
        .bxh .item-rank1 .avatar-container{border:6px solid #f49000;}
        .bxh .item-rank.my-rank .avatar-container{border:6px solid #0aa2e1;box-shadow:0 0 15px #0aa2e1;}
        .bxh .item-rank.my-rank .item-stt{color: #0aa2e1;}
        .bxh .item-rank.my-rank .item-tennv{color: #0aa2e1;font-weight:bold;}
        .bxh .item-rank.my-rank .item-ds{color: #0aa2e1;font-weight:bold;}

        .bxh .item-rank1 .item-stt{color: #f48f00;font-size:16px;}
        .bxh .item-rank1 .item-tennv{color: #f48f00;font-weight:bold;font-size:12px;}
        .bxh .item-rank1 .item-ds{color: #f48f00;font-weight:bold;font-size:12px;}


        .bxh .item-rank .avatar-img{width:100%;height:auto;border:1px solid white;border-radius:50%;}
        .bxh .item-rank1{ right:0%;}
        .bxh .item-rank2{ right:9%; top:2%}
        .bxh .item-rank3{ right:18%; top:4%}
        .bxh .item-rank4{ right:27%; top:6%}
        .bxh .item-rank5{ right:36%; top:8%}
        .bxh .item-rank6{ right:45%; top:10%}
        .bxh .item-rank7{ right:54%;top:12%}
        .bxh .item-rank8{ right:63%;top:14%}
        .bxh .item-rank9{ right:72%;top:16%}
        .bxh .item-rank10{ right:81%;top:18%}
        .bxh .item-rank11{ right:94%;top:21%}

        .bxh .king-sale{display:none;text-align:center;position:absolute;width:100%;margin-top:-40%;}
        .bxh .king-sale img{width:45%;}
        .bxh .item-rank1 .king-sale{display:block;}

        .square { position: relative; width: 100%;}
        .square:after { content: ""; display: block; padding-bottom: 100%; }
        .content1 { position: absolute; width: 100%; height: 100%; }

        @keyframes blink1 {
            0% { box-shadow: 0 0 25px #f49000; }
            50% { box-shadow: 0 0 5px #f49000; }
            100% { box-shadow: 0 0 25px #f49000; }
        }
        @-webkit-keyframes blink1 {
            0% { box-shadow: 0 0 25px #f49000; }
            50% { box-shadow: 0 0 5px #f49000; }
            100% { box-shadow: 0 0 25px #f49000; }
        }
        @keyframes blink2 {
            0% { box-shadow: 0 0 25px #0aa2e1; }
            50% { box-shadow: 0 0 5px #0aa2e1; }
            100% { box-shadow: 0 0 25px #0aa2e1; }
        }
        @-webkit-keyframes blink2 {
            0% { box-shadow: 0 0 25px #0aa2e1; }
            50% { box-shadow: 0 0 5px #0aa2e1; }
            100% { box-shadow: 0 0 25px #0aa2e1; }
        }

        .blink1 {animation: blink1 5.0s linear infinite;}
    </style>
    <div class="content-body" style="min-height: 578px;">
        <!-- card actions section start -->
        <section id="card-actions">
            <div class="row" style="height: 670px;">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header fix-header bottom-card">
                            <div class="row" style="align-items: baseline">
                                <h4 class="col-12 pu-caption">FANPAGE</h4>
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
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                                        <div class="square">
                                            <div class="content1">
                                                <div class="bxh bxh-container" style="border:1px solid transparent;">
                                                    <div style="transform: rotate(-12.5deg); height: 8px; width: 100%; background-color: #ecedef; position: absolute; top: 13.5%;"></div>

                                                    <div class="item-rank  item-rank1" title="adam.mkt10">
                                                        <div class="king-sale">
                                                            <img src="https://pushsale.vn/Portals/_default/Skins/APP/images/bxh/bxh2.png">
                                                        </div>
                                                        <div class="avatar-container  blink1">
                                                            <img class="avatar-img"
                                                                 src="https://pushsale.vn/data/file_upload/anh_item/2020_05/88035224_616792242433095_3927100649858138112_n_114559_6ef6fa42-c230-4443-bee7-28fa320f048e.jpg">
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-stt">#1</div>
                                                            <div class="item-tennv">Conaldo - Lê Đức Trí</div>
                                                            <div class="item-ds">
                                                                6,855,000

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="item-rank  item-rank2" title="adam.mkt26">
                                                        <div class="king-sale">
                                                            <img src="https://pushsale.vn/Portals/_default/Skins/APP/images/bxh/bxh2.png">
                                                        </div>
                                                        <div class="avatar-container  blink2">
                                                            <img class="avatar-img"
                                                                 src="https://pushsale.vn/data/file_upload/anh_item/2020_05/29983442_1132725470192479_954460469026897015_o_150300_262b73ed-148d-423e-9086-8ecb0f3204df.jpg">
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-stt">2</div>
                                                            <div class="item-tennv">Conaldo - Phạm Thị Hoài</div>
                                                            <div class="item-ds">
                                                                6,610,000

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="item-rank  item-rank3" title="adam.mkt32">
                                                        <div class="king-sale">
                                                            <img src="https://pushsale.vn/Portals/_default/Skins/APP/images/bxh/bxh2.png">
                                                        </div>
                                                        <div class="avatar-container  blink3">
                                                            <img class="avatar-img"
                                                                 src="https://pushsale.vn/data/file_upload/anh_item/2020_06/101845492_627007068022445_1077795998249517056_n_125710_f35f9522-ee05-4470-a194-5507274276ec.png">
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-stt">3</div>
                                                            <div class="item-tennv">Vinaone - Dương Văn Tuyên</div>
                                                            <div class="item-ds">
                                                                6,360,000

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="item-rank  item-rank4" title="adam.mkt38">
                                                        <div class="king-sale">
                                                            <img src="https://pushsale.vn/Portals/_default/Skins/APP/images/bxh/bxh2.png">
                                                        </div>
                                                        <div class="avatar-container  blink4">
                                                            <img class="avatar-img"
                                                                 src="https://pushsale.vn/data/file_upload/anh_item/2020_07/36d41ec8a6e45aba03f5_200722_06647623-ab19-473c-a8da-51489d74ef81.jpg">
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-stt">4</div>
                                                            <div class="item-tennv">Vinaone - Lý Việt Hoàng</div>
                                                            <div class="item-ds">
                                                                6,335,000

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="item-rank  item-rank5" title="adam.mkt9">
                                                        <div class="king-sale">
                                                            <img src="https://pushsale.vn/Portals/_default/Skins/APP/images/bxh/bxh2.png">
                                                        </div>
                                                        <div class="avatar-container  blink5">
                                                            <img class="avatar-img"
                                                                 src="https://pushsale.vn/data/file_upload/anh_item/2020_09/images_095637_078fce84-da22-4012-97c2-e68f86ea1d6b.jpg">
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-stt">5</div>
                                                            <div class="item-tennv">Conaldo - Nguyễn Văn Thành</div>
                                                            <div class="item-ds">
                                                                5,690,000

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="item-rank  item-rank6" title="adam.mkt39">
                                                        <div class="king-sale">
                                                            <img src="https://pushsale.vn/Portals/_default/Skins/APP/images/bxh/bxh2.png">
                                                        </div>
                                                        <div class="avatar-container  blink6">
                                                            <img class="avatar-img"
                                                                 src="https://pushsale.vn/data/file_upload/anh_item/2020_08/101706411_253714309385290_6991517879493459968_n (1)_093539_2e8059c8-b5b7-4615-97c7-3de4f3256741.png">
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-stt">6</div>
                                                            <div class="item-tennv">Vinaone - Dương Thị Tuyến</div>
                                                            <div class="item-ds">
                                                                4,615,000

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="item-rank  item-rank7" title="adam.mkt22">
                                                        <div class="king-sale">
                                                            <img src="https://pushsale.vn/Portals/_default/Skins/APP/images/bxh/bxh2.png">
                                                        </div>
                                                        <div class="avatar-container  blink7">
                                                            <img class="avatar-img"
                                                                 src="https://pushsale.vn/data/file_upload/anh_item/2020_05/90239461_1594003920766364_8397947165866983424_n_150004_e07066cb-71b2-496c-af68-767fee666504.jpg">
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-stt">7</div>
                                                            <div class="item-tennv">Conaldo - Vũ Hồng Phượng</div>
                                                            <div class="item-ds">
                                                                3,690,000

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="item-rank  item-rank8" title="adam.mkt40">
                                                        <div class="king-sale">
                                                            <img src="https://pushsale.vn/Portals/_default/Skins/APP/images/bxh/bxh2.png">
                                                        </div>
                                                        <div class="avatar-container  blink8">
                                                            <img class="avatar-img"
                                                                 src="https://pushsale.vn/data/file_upload/anh_item/2020_02/ea3c67f2b4564c081547.jpg">
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-stt">8</div>
                                                            <div class="item-tennv">Vinaone - Nguyễn Văn Công</div>
                                                            <div class="item-ds">
                                                                3,680,000

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="item-rank  item-rank9" title="adam.mkt27">
                                                        <div class="king-sale">
                                                            <img src="https://pushsale.vn/Portals/_default/Skins/APP/images/bxh/bxh2.png">
                                                        </div>
                                                        <div class="avatar-container  blink9">
                                                            <img class="avatar-img"
                                                                 src="https://pushsale.vn/data/file_upload/anh_item/2020_07/avt2_101849_2696867c-6edc-48f4-a466-4efcc2b3e686.jpg">
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-stt">9</div>
                                                            <div class="item-tennv">Vinaone Nguyễn Đức Anh</div>
                                                            <div class="item-ds">
                                                                3,435,000

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="item-rank  item-rank10" title="adam.mkt7">
                                                        <div class="king-sale">
                                                            <img src="https://pushsale.vn/Portals/_default/Skins/APP/images/bxh/bxh2.png">
                                                        </div>
                                                        <div class="avatar-container  blink10">
                                                            <img class="avatar-img"
                                                                 src="https://pushsale.vn/data/file_upload/anh_item/2020_05/logo_byt_094130_e1487f68-3379-470f-ace7-71c7f9c1d57f.png">
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-stt">10</div>
                                                            <div class="item-tennv">Conaldo - Nguyễn Xuân Tuấn</div>
                                                            <div class="item-ds">
                                                                3,325,000

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group"></div>
                                                    <span class="small-tip">
                                    * Số contact tính theo ngày contact về<br>
                                    ** Số chốt đơn tính theo ngày sale chốt đơn
                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="row">--}}
                {{--<div class="table-responsive tableFixHead table-bordered table-hover"--}}
                     {{--style="width: 100%; overflow: hidden; overflow-x: auto;">--}}
                    {{--<table class="table table-custom">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th class="text-center" style="width: 5%;"></th>--}}
                            {{--<th class="text-center" style="width: 20%;">Fanpage</th>--}}
                            {{--<th class="text-center" style="width: 15%;">Trạng thái quyền hạn</th>--}}
                            {{--<th class="text-center" style="width: 5%;">Sử dụng</th>--}}
                            {{--<th class="text-center" style="width: 5%;">Tạo source post tự động</th>--}}
                            {{--<th class="text-center" style="width: 7%;">Cho phép post sử dụng source của Fanpage</th>--}}
                            {{--<th class="text-center required" style="width: 15%;">Source</th>--}}
                            {{--<th class="text-center" style="width: 10%;">Thông tin cập nhật cuối</th>--}}
                            {{--<th class="text-center" style="width: 5%;">Đồng bộ</th>--}}
                            {{--<th class="text-center" style="width: 10%">Thao tác</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--<tr>--}}
                            {{--<td class="text-center">gdfg</td>--}}
                            {{--<td class="text-center">--}}
                                {{--Test--}}
                                {{--<br>--}}
                                {{--<span>(3123125646521)</span>--}}
                            {{--</td>--}}
                            {{--<td class="text-center">gdfg</td>--}}
                            {{--<td class="text-center">--}}
                                {{--<input type="checkbox">--}}
                            {{--</td>--}}
                            {{--<td class="text-center">--}}
                                {{--<input type="checkbox">--}}
                            {{--</td>--}}
                            {{--<td class="text-center">--}}
                                {{--<input type="checkbox">--}}
                            {{--</td>--}}
                            {{--<td class="text-center">--}}
                                {{--<select name="" id="" class="select2" data-placeholder="--Source--">--}}
                                    {{--<option></option>--}}
                                    {{--<option>MKT-sdfsdg</option>--}}
                                {{--</select>--}}
                                {{--<p>Source đã cấu hình của marketing: mkt61</p>--}}
                            {{--</td>--}}
                            {{--<td class="text-center">--}}
                                {{--<p>Ngày cập nhật: 21/10/2020</p>--}}
                                {{--<p>Người cập nhật: mkt61</p>--}}
                            {{--</td>--}}
                            {{--<td class="text-center">Dữ liệu đồng bộ tự động</td>--}}
                            {{--<td class="text-center">--}}
                                {{--<a class="action-control edit" data-id="1"><i class="fa fa-save fa-2x"></i></a>--}}
                                {{--<a class="action-control delete" href="javascript:void(0)"--}}
                                   {{--data-id="1"><i class="fa fa-list fa-2x"></i></a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}

        </section>
    </div>
@endsection
@section('script')
    @include('backend.layouts.script')
@endsection
