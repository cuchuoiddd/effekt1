<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" navigation-header">
            <span>General</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
                                   data-original-title="General"></i>
        </li>

        <li class="nav-item {{ \Request::is('admin/news*') ? 'open active' : '' }}">
            <a class="menu-item bold" href="#"><i class="ft-home"></i>
                <span class="menu-title" data-i18n="">1. News</span>
            </a>

            <ul class="menu-content">
                <li class="{{ \Request::is('admin/news') ? 'active' : '' }}">
                    <a class="menu-item" href="/admin/news">1.1 News</a>
                </li>
                <li class="{{ \Request::is('admin/news/products*') ? 'active' : '' }}">
                    <a class="menu-item" href="/admin/news-categories">1.2 Category</a>
                </li>

            </ul>
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
        <li class="nav-item {{ \Request::is('admin/setting*') ? 'open' : '' }}">
            <a class="menu-item bold" href="/admin/setting"><i class="ft-home"></i>
                <span class="menu-title" data-i18n="">5. Setting</span>
            </a>
        </li>
    </ul>
</div>
