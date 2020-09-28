@extends('backend.layouts.master')
@section('content')
<style>
    .ck.ck-content.ck-editor__editable {
        height: 300px;
    }
</style>
<div class="content-body">
    <!-- card actions section start -->
    <section id="card-actions">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{isset($product) ? '/admin/work/products/'.$news->id : '/admin/work/products'}}" method="post" id="myFormId" enctype="multipart/form-data">
                        @csrf
                        @if(isset($product))
                            @method('PUT')
                        @endif
                        <div class="card-header fix-header bottom-card">
                            <div class="row" style="align-items: baseline">
                                <h4 class="col-lg-3">{{isset($product) ? 'Cập nhật ' : 'Thêm mới '}}sản phẩm</h4>
                            </div>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col-6 form-group">
                                        <label for="squareText" class="required">Danh mục</label>
                                        <input type="text" id="category_id" name="category_id" class="form-control square">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="squareText" class="required">Hình ảnh</label>
                                        <input type="text" id="images" name="images[]" class="form-control square">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="squareText" class="required">Tiêu đề VN</label>
                                        <input type="text" id="title_vn" name="title_vn" class="form-control square">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="squareText" class="required">Tiêu đề EN</label>
                                        <input type="text" id="title_en" name="title_en" class="form-control square">
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-6 form-group">
                                        <label for="squareText" class="required">Nội dung VN</label>
                                        <textarea name="content_vn" class="editor" id="content_vn" style="height: 300px;">
                                            </p>This is some sample content.</p>
                                        </textarea>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="squareText" class="required">Nội dung EN</label>
                                        <textarea name="content_en" class="editor1" id="content_en" style="height: 300px;">
                                            <p>This is some sample content.</p>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label for="squareText" class="required">vị trí lat</label>
                                        <input type="text" id="lat" name="lat" class="form-control square">
                                    </div>
                                    <div class="col-6 form-group">
                                        <label for="squareText" class="required">vị trí long</label>
                                        <input type="text" id="long" name="long" class="form-control square">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="width: 200px;">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
@include('backend.layouts.script')
<script src="{{asset('backend/plugins/ckeditor/ckeditor.js')}}"></script>
<script>
    $("#myFormId").validate({
        rules: {
            category_id: "required",
            title_vn: "required",
            content_vn: "required",
            lat: "required",
            long: "required"
        },
    })

    ClassicEditor
        .create(document.querySelector('.editor'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('.editor1'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection