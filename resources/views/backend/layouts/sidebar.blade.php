<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" navigation-header">
            <span>General</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
                                   data-original-title="General"></i>
        </li>

        <li class="nav-item {{ \Request::is('admin/news*') ? 'open' : '' }}">
            <a class="menu-item bold" href="/admin/news"><i class="ft-home"></i>
                <span class="menu-title" data-i18n="">1. News</span>
            </a>
        </li>
        <li class="nav-item {{ \Request::is('admin/work*') ? 'open active' : '' }}">
            <a class="menu-item bold" href="#">
                <i class="ft-home"></i>
                <span class="menu-title" data-i18n="">2. Work</span>
            </a>
            <ul class="menu-content">
                <li class="{{ \Request::is('admin/work/categories') ? 'active' : '' }}">
                    <a class="menu-item" href="/admin/work/categories">2.1 Category</a>
                </li>
                <li class="{{ \Request::is('admin/work/products*') ? 'active' : '' }}">
                    <a class="menu-item" href="/admin/work/products">2.2 Product</a>
                </li>

            </ul>
        </li>
        <li class="nav-item {{ \Request::is('admin/offices*') ? 'open active' : '' }}">
            <a class="menu-item" href="#">
                <i class="ft-home"></i>
                <span class="menu-title bold" data-i18n="">3. Office</span>
            </a>
            <ul class="menu-content">
                <li class="{{ \Request::is('admin/offices/contents*') ? 'active' : '' }}">
                    <a class="menu-item" href="/admin/offices/contents">3.1 Content</a>
                </li>
                <li class="{{ \Request::is('admin/offices/people*') ? 'active' : '' }}">
                    <a class="menu-item" href="/admin/offices/people">3.2 List People</a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ \Request::is('admin/slide*') ? 'open' : '' }}">
            <a class="menu-item bold" href="/admin/slide"><i class="ft-home"></i>
                <span class="menu-title" data-i18n="">4. Slide</span>
            </a>
        </li>
    </ul>
</div>
