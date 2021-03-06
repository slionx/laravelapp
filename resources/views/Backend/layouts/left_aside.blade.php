<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i></button>

<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Menus</h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>

            <li class="m-menu__item @if(request()->is('admin/dashboard*'))  m-menu__item--active @endif" aria-haspopup="true">
                <a href="{{ route('dashboard.index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">Dashboard</span>
                            <span class="m-menu__link-badge">
                                <span class="m-badge m-badge--danger">2</span>
                            </span>
                        </span>
                    </span> </a>
            </li>

            <li class="m-menu__item m-menu__item--submenu @if(request()->is('admin/post*'))  m-menu__item--active @endif" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-share"></i><span class="m-menu__link-text">文章管理</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('post.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">文章管理</span></a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('post.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">添加文章</span></a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('category.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">分类管理</span></a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('category.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">添加分类</span></a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('tag.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">标签管理</span></a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('tag.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">添加标签</span></a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('comment.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">评论管理</span></a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="m-menu__item m-menu__item--submenu @if(request()->is('admin/user*'))  m-menu__item--active @endif" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-share"></i><span class="m-menu__link-text">用户管理</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('user.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">用户列表</span></a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('user.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">添加用户</span></a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('role.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">角色列表</span></a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('role.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">添加角色</span></a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('permission.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">权限列表</span></a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('permission.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">添加权限</span></a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="m-menu__item m-menu__item--submenu @if(request()->is('admin/welcome*'))  m-menu__item--active @endif" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-share"></i><span class="m-menu__link-text">欢迎页管理</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="{{ route('welcome.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">欢迎页列表</span></a>
                        </li>
                    </ul>
                </div>
            </li>
            @if(isset($menulist) && !empty($menulist))
                @foreach($menulist as $item)
                    <li class="m-menu__item m-menu__item--submenu m-menu__item--open" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-share"></i><span class="m-menu__link-text">{{ $item['name'] }}</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                        <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                @if($item['child'])
                                    @foreach($item['child'] as $child_item)
                                        <li class="m-menu__item @if(request()->route()->action['as'] == $child_item['url'])  m-menu__item--active @endif" aria-haspopup="true">
                                            <a href="{{ route($child_item['url']) }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">{{ $child_item['name'] }}</span></a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </li>
                @endforeach
            @endif

            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Components</h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>

        </ul>
    </div>
    <!-- END: Aside Menu -->
</div><!-- END: Left Aside -->

