@extends('backend.layouts.master')
@section('content')
    <div class="content-body">
        <!-- card actions section start -->
        <section id="card-actions">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {!! Form::open(array('url' => url()->current(), 'method' => 'get', 'id'=> 'gridForm','role'=>'form')) !!}
                        <div class="card-header fix-header bottom-card">
                            <div class="row" style="align-items: baseline">
                                <h4 class="col-lg-3">Quản lý sản phẩm</h4>
                                <div class="col-lg-2 col-md-6">
                                    {!! Form::select('depot_id', $deposts, null, array('id'=>'depot_id','class' => 'form-control square','placeholder'=>'--Chọn kho--')) !!}
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    {!! Form::select('product_id', $products, null, array('id'=>'product_id','class' => 'form-control square select2','placeholder'=>'--Chọn sản phẩm--')) !!}
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <input name="name" type="text" class="form-control square"
                                           placeholder="Tìm kiếm tên ...">
                                </div>
                                <button type="submit" class="btn btn-primary" id="btnSearch"><i
                                        class="fa fa-search"></i> Tìm kiếm
                                </button>
                            </div>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        {{ Form::close() }}
                        <div class="card-content collapse show">
                            <div class="card-body">
                                @include('backend.product_depot.ajax')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // card-actions section end -->
    </div>
@endsection
@section('script')
    @include('backend.layouts.script')
    <script>
        $('body').delegate('#add_new', 'click', function () {
            let depost = $('#depot_id').val();
            let product = $('#product_id').val();
            console.log(depost, product, 'sss');
            $.ajax({
                type: "post",
                url: '{{route('depots.product.store')}}',
                data: {depot_id: depost, product_id: product},
                success: function (data) {
                    location.reload();
                }
            });
        })
        $('body').delegate('.edit', 'click', function () {
            let url = $(this).data('url');
            let form = $('#fvalidate');
            $.ajax({
                type: "get",
                url: url,
                success: function (data) {
                    form.attr('action', location.href + '/' + data.id);
                    form.attr('method', 'POST');
                    $('#myModalLabel').html('CẬP NHẬT SẢN PHẨM').change();
                    $('.value-form').append('<input name="_method" type="hidden" value="PUT">');
                    form.find("input[name='code']").val(data.code);
                    form.find("input[name='name']").val(data.name);
                    form.find("input[name='phone']").val(data.phone);
                    form.find("input[name='price']").val(data.price);
                    form.find("input[name='weight']").val(data.weight);
                    form.find("textarea[name='description']").val(data.description);
                    $('#add_new').modal('show');
                }
            });
        })
    </script>
@endsection
