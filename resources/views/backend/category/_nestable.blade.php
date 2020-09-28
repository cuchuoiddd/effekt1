<ol class="dd-list">
    @if(count($data))
        @foreach($data as $d)
            <li class="dd-item dd3-item" data-id="{{ $d->id }}"data-position="{{ $d->position }}">
                <div class="dd-handle dd3-handle"></div>
                <div class="dd3-content">
                    <span class="name">{{ $d->title_vn }} ({{$d->title_en}})</span>
                    <a href="javascript:void(0)" class="pull-right danger delete" title="{{trans('table.delete')}}" data-id="{{@$d->id}}"><i class="fa fa-times"></i></a>
                    <a href="javascript:void(0)" class="pull-right primary edit mr-1" title="Edit" data-id="{{ $d->id }}" data-toggle="modal" data-target="#edit-modal"><i class="fa fa-pencil"></i></a>
                </div>
            </li>
        @endforeach
    @endif
</ol>
