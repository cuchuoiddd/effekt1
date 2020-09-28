@extends('backend.layouts.master')
@section('content')
    <style>
        .card-body #myTab {
            border: none;
        }

        .card-body .nav-item {
            width: 250px;
            text-align: center;
        }

        .card-body .nav-item .nav-link {
            border: none;
            width: 250px;
            height: 40px;
            background: #eee;
            display: inline-block !important;
            color: #8a8a8a;
        }

        .card-body .nav-item .nav-link.active {
            border-top: 3px solid #3782dc;
            background: #fff;
            color: #326db5;
            border-radius: unset !important;
        }
    </style>
    <div class="content-body">
        <!-- card actions section start -->
        <section id="card-actions">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header fix-header bottom-card">
                            <div class="row" style="align-items: baseline">
                                <h4 class="col-lg-3">Kết nối dữ liệu</h4>
                                <div class="col-lg-2 col-md-6">
                                    <select name="" id="" class="select2" data-placeholder="--Chọn marketing--">
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <select name="" id="" class="select2" data-placeholder="--Chọn sản phẩm--">
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control square"
                                               placeholder="Tên source / Tài khoản marketing">
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
                                <div class="tabs mb-1">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                               role="tab" data-id="1" aria-selected="true">KẾT NỐI FACEBOOK</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                               role="tab" data-id="2" aria-selected="false">KẾT NỐI LANDIPAGE</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                               role="tab" data-id="3" aria-selected="false">KẾT NỐI WEBSITE</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                               role="tab" data-id="4" aria-selected="false">TẤT CẢ</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="table-responsive tableFixHead table-bordered table-hover"
                                     style="width: 100%; overflow-x: auto;">
                                    <table class="table table-custom">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 30px;">STT</th>
                                            <th class="text-center nowrap">Marketing</th>
                                            <th class="text-center">Tên nguồn kết nối <br>
                                                Url Landing
                                            </th>
                                            <th class="text-center">Loại kết nối <br>
                                                Kênh quảng cáo
                                            </th>
                                            <th class="text-center nowrap">Sản phẩm</th>
                                            <th class="text-center nowrap">Ưu tiên sale</th>
                                            {{--<th class="text-center nowrap">Url kết nối V1</th>--}}
                                            {{--<th class="text-center nowrap">Url kết nối V2</th>--}}
                                            {{--<th class="text-center nowrap">Nhập TC</th>--}}
                                            <th class="text-center nowrap">Duyệt</th>
                                            <th class="text-center nowrap">Cập nhật</th>
                                            <th class="text-center nowrap">
                                                <a id="add_new"><i class="fa fa-plus"></i> Thêm</a>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($source))
                                            @foreach($source as $key=>$item)
                                                <tr>
                                                    <td class="text-center">{{$key+1}}</td>
                                                    <td class="text-center">{{$item->user_id}}</td>
                                                    <td class="text-center">{{$item->name}}</td>
                                                    <td class="text-center">
                                                        {{$item->type == \App\Constants\SourceConstant::GOOGLE_ADS ? 'Google ads'
                                                        :($item->type == \App\Constants\SourceConstant::FACEBOOK_ADS ? 'Facebook ads'
                                                        :($item->type == \App\Constants\SourceConstant::ZALO_ADS ? 'Zalo ads': $item->type))}}
                                                    </td>
                                                    <td class="text-center">{{$item->getProductTextAttribute()}}</td>
                                                    <td class="text-center">{{$item->getUsername()}}</td>
                                                    {{--<td class="text-center">fdgdfgs</td>--}}
                                                    {{--<td class="text-center">fdgdfgs</td>--}}
                                                    {{--<td class="text-center">fdgdfgs</td>--}}
                                                    <td class="text-center">
                                                        <input class="accept" type="checkbox" {{$item->accept == 1 ? 'checked' : ''}}>
                                                    </td>
                                                    <td class="text-center">
                                                        {{@$item->user_id}} <br>
                                                        {{$item->updated_at}}
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="action-control edit" data-item="{{$item}}" href="javascript:void(0)">
                                                            <i class="fa fa-edit fa-2x"></i>
                                                        </a>
                                                        <a class="action-control delete" href="javascript:void(0)" data-id="{{$item->id}}">
                                                            <i class="fa fa-trash fa-2x"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="9">Không có bản ghi nào !</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-2">
                                    {{$source->links()}}
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
                        <h3 class="modal-title" id="myModalLabel35"> Thêm mới source</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @include('backend.marketing.setting_connect._form')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('backend.layouts.script')
    <script>
        $("#setting-my-form").validate({
            rules: {
                type: "required",
                name: "required",
                chanel: "required",
                product_id: "required",
                sale_id: "required"
            },
        })

        // chuyển tab
        $('#myTab a').on('click', function (e) {
            e.preventDefault();
            const connect_fb = 1;
            const connect_landi = 2;
            const connect_website = 3;
            const connect_all = 4;
            let id = $(this).data('id');
            console.log(1111, id);
        })

        // Duyệt
        $(document).on('click','.accept',function () {
            let accept = $(this).is(":checked");
            let item = $(this).closest('tr').find('.edit').data('item');
            let url = '/marketing/source/'+item.id;

            // console.log(1111,url);return;
            $.ajax({
                url:url,
                method:'PUT',
                data:{
                    accept:accept
                },
                success:function (data) {
                    if(data){
                        alertify.success('Cập nhật duyệt thành công !')
                    }
                }
            })
        })

        //thêm mới
        $(document).on('click','#add_new',function () {
            resetValue ();
            $('#add_new_form').modal({show: true});
        })

        // edit
        $(document).on('click', '.edit', function () {
            let data_item = $(this).data('item');
            console.log(1111,data_item);
            let form = $('#setting-my-form');
            form.attr('action', '/marketing/source/'+data_item.id);
            form.attr('method', 'POST');
            $('#myModalLabel35').html('Cập nhật source').change();
            form.append('<input name="_method" type="hidden" value="PUT" />');

            $('#type').val(data_item.type).change();
            $('#name').val(data_item.name).change();
            $('#chanel').val(data_item.chanel).change();
            $('#product_id').val(JSON.parse(data_item.product_id)).change();
            $('#sale_id').val(JSON.parse(data_item.sale_id)).change();

            $('#add_new_form').modal({show: true})
        });
        
        function resetValue () {
            $('#myModalLabel35').html('Thêm mới source').change();
            $('#type').val('1').change();
            $('#name').val('');
            $('#chanel').val('').change();
            $('#product_id').val([]).change();
            $('#sale_id').val([]).change();
        }
        function getAllProduct() {
            $.ajax({
                url:'',
                success:function (data) {
                    console.log(1111,data);
                }
            })
        }
        function getAllSale() {
            $.ajax({
                url:'',
                success:function (data) {
                    console.log(1111,data);
                }
            })
        }
    </script>
@endsection
