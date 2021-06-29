<li>
    <div class="btn-group show" style="z-index: 1000;position:relative;margin-top: -4px;height: 30px;">
        <button class="btn btn-secondary btn-lg dropdown-toggle" style="border: none;background:none">
            @if(App::isLocale('vi'))
            <img class=" lazyloaded" src="{{asset('images/flag-vietnam.png')}}" width="30" height="60">
                @else
                <img class=" lazyloaded" src="{{asset('images/flag-england.png')}}" width="30" height="60">
            @endif
        </button>
        <div class="dropdown-menu" x-placement="bottom-start"
             style="position: absolute; transform: translate3d(0px, 48px, 0px); top: 0px; left: 7px; will-change: transform;display: none;">
            <a class="dropdown-item" href="{{ App\Helpers\Functions::linkLanguage('vi') }}">
                <img class=" lazyloaded" src="{{asset('images/flag-vietnam.png')}}" width="30" height="60">
            </a>
            <a class="dropdown-item" href="{{ App\Helpers\Functions::linkLanguage('en') }}">
                <img class=" lazyloaded" src="{{asset('images/flag-england.png')}}" width="30" height="60">
            </a>
        </div>
    </div>
</li>
@if(App::isLocale('vi'))
    <li class="{{$active_menu == 'news' ? 'active':''}}" >
        <a href="/vi/news" >Câu chuyện</a>
    </li>
    <li class="{{$active_menu == 'work' ? 'active':''}}" >
        <a href="/vi/work">Dự án</a>
    </li>
    <li class="{{$active_menu == 'office' ? 'active':''}}" >
        <a href="/vi/office">Văn phòng</a>
    </li>
@else
    <li class="{{$active_menu == 'news' ? 'active':''}}">
        <a  href="/news">Story</a>
    </li>
    <li class="{{$active_menu == 'work' ? 'active':''}}">
        <a  href="/work">Work</a>
    </li>
    <li class="{{$active_menu == 'office' ? 'active':''}}">
        <a href="/office">Office</a>
    </li>
@endif
