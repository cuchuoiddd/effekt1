<div class="table-responsive tableFixHead table-bordered table-hover"
     style="height:500px ;">
    <table class="table table-custom">
        <thead>
        <tr>
            <th class="text-center" style="width: 5%;"></th>
            <th class="text-center" style="width: 20%;">Fanpage</th>
            <th class="text-center" style="width: 15%;">Trạng thái quyền hạn</th>
            <th class="text-center required nowrap" style="width: 5%;">Sử dụng</th>
            <th class="text-center required" style="width: 15%;">Source</th>
            <th class="text-center" style="width: 10%;">Thông tin cập nhật cuối</th>
            <th class="text-center" style="width: 5%;">Đồng bộ</th>
            <th class="text-center" style="width: 10%">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fanpages as $item)
            <tr>
                <td class="text-center"><img src="{{@$item->avatar}}" alt=""></td>
                <td class="text-center">
                    <a href="https://facebook.com/{{$item->page_id}}">{{$item->name}}<br>
                        <span>{{$item->page_id}}</span>
                    </a>
                </td>
                <td class="text-center">{{$item->role_text}}</td>
                <td class="text-center">
                    <input type="checkbox" {{$item->used?'checked':''}} class="used">
                </td>
                <td class="text-center">
                    {!! Form::select('source', $source, @$item->source_id, array('class' => 'form-control square source','placeholder'=>'--Source--')) !!}
                    <p>Source đã cấu hình bởi: {{@$item->user->name}}</p>
                </td>
                <td class="text-center">
                    <p>Ngày cập nhật: 21/10/2020</p>
                </td>
                <td class="text-center">Dữ liệu đồng bộ tự động</td>
                <td class="text-center">
                    <a class="action-control save" href="javascript:void(0)"
                       data-id="{{$item->id}}"
                       data-token="{{$item->access_token}}"
                       data-fanpageId="{{$item->page_id}}"
                       title="Lưu"><i class="fa fa-save fa-2x"></i></a>
                    <a class="action-control"
                       href="{{route('marketing.fanpage-post.index')}}"
                       data-id="1" title="Danh sách bài post"><i
                            class="fa fa-list fa-2x"></i></a>
                    <a class="action-control retweet"
                       data-show="{{$item->used?'true':'false'}}"
                       data-fanpageId="{{$item->page_id}}"
                       data-token="{{$item->access_token}}"
                       href="javascript:void(0)"
                       title="Đồng bộ bài post theo cấu hình"
                    >
                        <i class="fa fa-retweet fa-2x" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
