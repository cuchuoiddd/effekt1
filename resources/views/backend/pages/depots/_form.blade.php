<form action="{{route('depots.list.store')}}" id="myFormId" method="post">
    {{--                    {!! Form::open(array('url' => route('depots.list.store'), 'method' => 'post', 'files'=> true, 'id'=>'myFormId','autocomplete'=>'off')) !!}--}}
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row mb-1">
                    <div class="col-4">
                        <label for="" class="control-label required">Tên
                            kho</label>
                    </div>
                    <div class="col-8">
                        <input type="text" name="name" id="name"
                               class="form-control square">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-4">
                        <label for="" class="control-label">Mã kho</label>
                    </div>
                    <div class="col-8">
                        <input type="text" name="code" id="code"
                               class="form-control square">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-4">
                        <label for=""
                               class="control-label required">Tỉnh/TP</label>
                    </div>
                    <div class="col-8">
                        <select class="form-control square select2"
                                name="city" id="city"
                                data-placeholder="--Chọn thành phố--">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-4">
                        <label for="" class="control-label required">Quận/Huyện</label>
                    </div>
                    <div class="col-8">
                        <select class="form-control square select2"
                                name="district" id="district"
                                data-placeholder="--Chọn Quận/Huyện--">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-4">
                        <label for="" class="control-label required">Phường/Xã</label>
                    </div>
                    <div class="col-8">
                        <select class="form-control square select2"
                                name="wards" id="wards"
                                data-placeholder="--Chọn Phường/Xã--">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-4">
                        <label for="" class="control-label required">Địa
                            chỉ</label>
                    </div>
                    <div class="col-8">
                        <input type="text" name="address" id="address"
                               class="form-control square">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-4">
                        <label for="" class="control-label required">Số điện
                            thoại</label>
                    </div>
                    <div class="col-8">
                        <input type="text" name="phone" id="phone"
                               class="form-control square">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row mb-1">
                    <div class="col-4">
                        <label for="" class="control-label">Số thứ
                            tự</label>
                    </div>
                    <div class="col-8">
                        <input type="number" name="position" id="position"
                               class="form-control square" value="0">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-4">
                        <label for="" class="control-label">Quản kho</label>
                    </div>
                    <div class="col-8">
                        <select class="form-control square select2"
                                name="user_id" id="user_id"
                                data-placeholder="--Quản kho--">
                            <option value=""></option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="" class="control-label">Số ĐT quản
                            kho</label>
                    </div>
                    <div class="col-8">
                        <input type="text" name="user_phone" id="user_phone"
                               class="form-control square">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2 mb-1"><label for="" class="control-label">Ghi
                    chú</label></div>
            <div class="col-10 mb-1">
                <input type="text" name="note" id="note"
                       class="form-control square">
            </div>
            <div class="col-2"><label for="" class="control-label">Tỉnh/TP
                    mặc định giao từ kho này</label></div>
            <div class="col-10">
                <select type="text" name="transport_default[]"
                        id="transport_default"
                        class="form-control square select2" multiple>
                    <option value=""></option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <a class="fz-12 mr-1 locationMienBac"><i
                            class="fa fa-plus"></i> Thêm các
                    tỉnh miền Bắc</a>
                <a class="fz-12 mr-1 locationMienTrung"><i
                            class="fa fa-plus"></i> Thêm các
                    tỉnh miền Trung</a>
                <a class="fz-12 mr-1 locationMienNam"><i
                            class="fa fa-plus"></i> Thêm các
                    tỉnh miền Name</a>
                <a class="fz-12 locationDelete"><i class="fa fa-trash"></i>
                    Xóa lựa chọn
                    tỉnh</a>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary"><i
                    class="fa fa-save"> Lưu</i></button>
        <button type="reset" class="btn btn-outline-secondary refresh-data">
            <i class="fa fa-refresh"> Làm lại</i></button>
    </div>
    {{--                    {!! Form::close() !!}--}}
</form>
