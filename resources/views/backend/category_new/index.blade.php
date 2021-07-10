@extends('backend.layouts.master')
@section('content')
    <link href="{{url('css/jquery.nestable.css')}}" rel="stylesheet" type="text/css">
    <div class="content-body">
        <!-- card actions section start -->
        <section id="card-actions">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header fix-header bottom-card">
                            <div class="row" style="align-items: baseline">
                                <h4 class="col-lg-3">Quản lý danh mục tin tức</h4>
                            </div>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-header fix-header"></div>
                        <div class="card-content">
                            <form action="{{url('/admin/news-categories')}}" method="POST" id="myFormId">
                                @csrf
                                <div class="card-body" style="height: 70vh;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="hidden" name="id" class="id" value="">
                                                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                                        <label for="projectinput1">Tên danh mục VN<span
                                                                    class="text-danger">*</span></label>
                                                        <input type="text" class="form-control title" placeholder="Tên danh mục"
                                                               name="title_vn" id="title_vn"
                                                               value="{{ $category->name ?? old('title')}}">
                                                        <span class="help-block">{{ $errors->first('title', ':message') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <input type="hidden" name="id" class="id" value="">
                                                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                                        <label for="projectinput1">Tên danh mục EN<span
                                                                    class="text-danger">*</span></label>
                                                        <input type="text" class="form-control title" placeholder="Tên danh mục"
                                                               name="title_en" id="title_en"
                                                               value="{{ $category->name ?? old('title')}}">
                                                        <span class="help-block">{{ $errors->first('title', ':message') }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-outline-primary mr-1 btn-update">
                                                    <i class="ft-check"></i> Thêm mới
                                                </button>
                                                <button type="button" class="btn btn-outline-warning"
                                                        onclick="location.href='';">
                                                    <i class="ft-x"></i> Trở lại
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Danh Sách</label>
                                            <div class="clear"></div>
                                            <div class="dd" style="width: 70%">
                                                {!! $nestable !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    @include('backend.layouts.script')
    <script src="{{asset('js/jquery.nestable.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $("#myFormId").validate({
            rules: {
                title_vn: "required",
                title_en: "required"
            },
        })

        $(document).ready(function ($) {
            $('.dd').nestable();
            $('#expand-all').on('click', function () {
                $('.dd').nestable('expandAll');
            });
            $('#collapse-all').click(function () {
                $('.dd').nestable('collapseAll');
            })

            $('.edit').on('click', function () {
                const id = $(this).data("id");
                $.ajax({
                    url: `/admin/news-categories/${id}`,
                }).done(function (data) {
                    console.log(1111,data);
                    $('.id').val(data.id)
                    $('#title_vn').val(data.title_vn).change();
                    $('#title_en').val(data.title_en).change();
                    $('.btn-update').html('Lưu lại');
                });
            })
            $('.dd').nestable().on('change', function () {
                $.ajax({
                    url: '/admin/news-categories/serialize',
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        data: $('.dd').nestable('serialize')
                    },
                    success: function (data) {
                        window.location.reload();
                    }
                });
            });
        })

    </script>
@endsection
