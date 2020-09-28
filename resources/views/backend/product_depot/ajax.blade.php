<div class="table-responsive tableFixHead table-bordered table-hover">
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Kho</th>
            <th class="text-center">Sản phẩm</th>
            <th class="text-center">SL kho</th>
            <th class="text-center">SL chờ xuất</th>
            <th class="text-center">Cập nhật</th>
            <th class="text-center">
                <a id="add_new"><i
                        class="fa fa-plus"></i> Thêm mới
                </a></th>
        </tr>
        </thead>
        <tbody>
        @if(count($docs))
            @foreach($docs as $item)
                <tr>
                    <td class="text-center">{{@$item->id}}</td>
                    <td class="text-center">{{@$item->depot->name}}
                    </td>
                    <td class="text-center">{{@$item->product->name}}<br>
                        <span class="text-info">({{@$item->product->code}})</span>
                    </td>
                    <td class="text-center">{{@number_format($item->quantity)}}</td>
                    <td class="text-center">{{@number_format($item->quantity_pending)}}</td>
                    <td class="text-center">{{@parseDate($item->updated_at)}}</td>
                    <td class="text-center">
                        <a class="btn delete" href="javascript:void(0)"
                           data-id="{{ $item->id }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">Không có dữ liệu</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>

