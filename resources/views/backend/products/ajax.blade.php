<div class="table-responsive tableFixHead table-bordered table-hover"
     style="width: 100%; overflow-x: auto;">
    <table class="table table-custom">
        <thead>
        <tr>
            <th class="text-center" style="width: 30px;">#</th>
            <th class="text-center">Danh mục</th>
            <th class="text-center">Hình ảnh</th>
            <th class="text-center">Tiêu đề VN</th>
            <th class="text-center">Tiêu đề EN</th>
            <th class="text-center">Nội dung VN</th>
            <th class="text-center">Nội dung EN</th>
            <th class="text-center" style="width: 90px">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @if(count($products))
            @foreach($products as $k=>$item)
                <tr>
                    <td class="text-center">{{$k+1}}</td>
                    <td class="text-center">{{@$item->category->title_vn}}</td>
                    <td class="text-center">
                        @if($item->images != "[]")
                            <img src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_PRODUCT.json_decode($item->images)[0]->url}}" alt="" style="width: 50px;height: 50px;">
                        @endif
                    </td>
                    <td class="text-center">{{$item->title_vn}}</td>
                    <td class="text-center">{{$item->title_en}}</td>
                    <td class="text-center">{!! @str_limit(strip_tags($item->content_vn),60) !!}</td>
                    <td class="text-center">{!! @str_limit(strip_tags($item->content_en),60) !!}</td>
                    <td class="text-center">
                        <a class="action-control edit" href="/admin/work/products/{{$item->id}}/edit"><i
                                    class="fa fa-edit fa-2x"></i></a>
                        <a class="action-control delete" href="javascript:void(0)"
                           data-id="{{$item->id}}"><i
                                    class="fa fa-trash fa-2x"></i></a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">Không có bản ghi nào !</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
