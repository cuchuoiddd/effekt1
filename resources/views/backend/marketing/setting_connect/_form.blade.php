<form action="{{route('marketing.source.store')}}" method="post" id="setting-my-form">
    @csrf
    <div class="modal-body">
        <div class="row form-group">
            <div class="col-sm-2">
                <label class="required">Loại kết nối</label>
            </div>
            <div class="col-sm-10">
                <select name="type" id="type" class="select2 form-control square">
                    <option value="1">Facebook</option>
                    <option value="2">Landing</option>
                    <option value="3">Website</option>
                    <option value="4">PartnerShip</option>
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-2">
                <label class="required">Tên nguồn dữ liệu</label>
            </div>
            <div class="col-sm-10">
                <input type="text" name="name" id="name" class="form-control square">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-2">
                <label class="required">Kênh quảng cáo</label>
            </div>
            <div class="col-sm-10">
                <select name="chanel" id="chanel" class="select2 form-control square" data-placeholder="-- Chọn kênh quảng cáo --">
                    <option></option>
                    <option value="1">Google ads</option>
                    <option value="2">Facebook ads</option>
                    <option value="3">Zalo adds</option>
                    <option value="4">Native ads</option>
                    <option value="5">TikTok</option>
                    <option value="6">Shopee</option>
                    <option value="7">Tiki</option>
                    <option value="8">Hotline</option>
                    <option value="9">Cốc Cốc</option>
                    <option value="10">SEO</option>
                    <option value="11">Cúc Cu</option>
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-2">
                <label class="required">Sản phẩm</label>
            </div>
            <div class="col-sm-10">
                <select name="product_id[]" id="product_id" class="select2 form-control square" multiple data-placeholder="">
                    <option></option>
                    <option value="1">Tất cả</option>
                    <option value="2">SaraHee 1</option>
                    <option value="3">SaraHee 2</option>
                    <option value="4">SaraHee 3</option>
                    <option value="5">SaraHee 4</option>
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-2">
                <label class="required">Ưu tiên sale</label>
            </div>
            <div class="col-sm-10">
                <select name="sale_id[]" id="sale_id" class="select2" multiple data-placeholder="">
                    <option></option>
                    <option value="1">User Name</option>
                    <option value="2">User Name 1</option>
                    <option value="3">User Name 2</option>
                    <option value="4">User Name 3</option>
                    <option value="5">User Name 4</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Lưu</button>
    </div>
</form>