<form action="{{route('system.team.store')}}" method="post" id="team-my-form">
    @csrf
    <div class="modal-body">
        <div class="row form-group">
            <div class="col-sm-2">
                <label class="required">Kiểu nhóm</label>
            </div>
            <div class="col-sm-10">
                <select name="department_id" id="department_id" class="select2 form-control square">
                    <option value="{{\App\Constants\DepartmentConstant::SALE}}">Nhóm sale</option>
                    <option value="{{\App\Constants\DepartmentConstant::CSKH}}">Nhóm CSKH</option>
                    <option value="{{\App\Constants\DepartmentConstant::MARKETING}}">Nhóm Marketing</option>
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-2">
                <label class="required">Mã nhóm</label>
            </div>
            <div class="col-sm-10">
                <input type="text" name="code" id="code" class="form-control square">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-2">
                <label class="required">Tên nhóm</label>
            </div>
            <div class="col-sm-10">
                <input type="text" name="name" id="name" class="form-control square">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-2">
                <label class="required">Trưởng nhóm</label>
            </div>
            <div class="col-sm-10">
                <select name="leader_id" class="select2 form-control square">
                    <option value="1">User name</option>
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-2">
                <label>Nhóm CSKH tương ứng</label>
            </div>
            <div class="col-sm-10">
                <select name="" class="select2" data-placeholder="-- Nhóm CSKH --">
                    <option></option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Thêm mới</button>
    </div>
</form>