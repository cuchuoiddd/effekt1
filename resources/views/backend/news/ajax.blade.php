<div class="table-responsive tableFixHead table-bordered table-hover"
     style="width: 100%; overflow-x: auto;">
    <table class="table table-custom">
        <thead>
        <tr>
            <th class="text-center" style="width: 30px;">#</th>
            <th class="text-center">Hình ảnh</th>
            <th class="text-center">Tiêu đề VN</th>
            <th class="text-center">Tiêu đề EN</th>
            <th class="text-center">Nội dung VN</th>
            <th class="text-center">Nội dung EN</th>
            <th class="text-center">Ngày</th>
            <th class="text-center" style="width: 90px">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @if(count($news))
            @foreach($news as $key=>$item)
                <tr>
                    <td class="text-center">{{$key+1}}</td>
                    <td class="text-center">
                        <img src="{{\App\Constants\DirectoryConstant::UPLOAD_FOLDER_NEW.$item->image}}"
                             style="width: 50px" alt="Ảnh tin tức">
                    </td>
                    <td class="text-center">{{$item->title_vn}}</td>
                    <td class="text-center">{{$item->title_en}}</td>
                    <td class="text-center">{!! @str_limit(strip_tags($item->content_vn),60) !!}</td>
                    <td class="text-center">{!! @str_limit(strip_tags($item->content_en),60) !!}</td>
                    <td class="text-center">{{Carbon\Carbon::parse($item->date)->format('d/m/Y')}}</td>
                    <td class="text-center">
                        <a class="action-control"
                           href="{{route('admin.news.edit',$item->id)}}"><i
                                    class="fa fa-edit fa-2x"></i></a>
                        <a class="action-control delete" href="javascript:void(0)"
                           data-id="{{$item->id}}"><i
                                    class="fa fa-trash fa-2x"></i></a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">Không có bản ghi nào !</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
