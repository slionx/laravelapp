
<!-- Header
============================================= -->
<header id="header" class="transparent-header full-header" data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="index.html" class="standard-logo" data-dark-logo="{{ asset('welcome/images/logo-dark.png') }}"><img src="{{ asset('welcome/images/logo.png') }}" alt="Canvas Logo"></a>
                <a href="index.html" class="retina-logo" data-dark-logo="{{ asset('welcome/images/logo@2x.png') }}"><img src="{{ asset('welcome/images/') }}" alt="Canvas Logo"></a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="dark">

                <ul>
                    <li @if (Request::is('/')) class="current" @endif><a href="/"><div>welcole</div></a></li>
                    <li @if (Request::is('post*')) class="current" @endif ><a href="{{ route('post.list') }}"><div>post</div></a></li>

                    <li><a href="#"><div>Features</div></a>
                        <ul>
                            <li><a href="#"><div><i class="icon-stack"></i>Sliders</div></a>
                                <ul>
                                    <li><a href="slider-revolution.html"><div>Revolution Slider</div></a>
                                        <ul>
                                            <li><a href="rs-demo-premium-concept.html"><div>Premium Templates</div></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="slider-canvas.html"><div>Canvas Slider</div></a>
                                        <ul>
                                            <li><a href="slider-canvas.html"><div>Full Width</div></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="slider-flex.html"><div>Flex Slider</div></a>
                                        <ul>
                                            <li><a href="slider-flex.html"><div>Default Layout</div></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="slider-owl.html"><div>Owl Slider</div></a>
                                        <ul>
                                            <li><a href="slider-owl-full.html"><div>Full Width</div></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="static-parallax.html"><div>Static Media</div></a>
                                        <ul>
                                            <li><a href="static-parallax.html"><div>Static - Parallax</div></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="slider-camera.html"><div>Camera Slider</div></a></li>
                                </ul>
                            </li>
                            <li><a href="widgets.html"><div><i class="icon-gift"></i>Widgets</div></a>
                                <ul>
                                    <li><a href="widgets.html"><div>Links</div></a></li>
                                </ul>
                            </li>
                            <li><a href="#"><div><i class="icon-umbrella"></i>Headers</div></a>
                                <ul>
                                    <li><a href="header-light.html"><div>Light Version</div></a></li>
                                    <ul>
                                        <li><a href="header-semi-transparent.html"><div>Light Version</div></a></li>
                                    </ul>
                                    </li>
                                    <li><a href="header-side-left.html"><div>Left Side Header</div></a>
                                        <ul>
                                            <li><a href="header-side-left.html"><div>Fixed Position</div></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="header-side-right.html"><div>Right Side Header</div></a>
                                        <ul>
                                            <li><a href="header-side-right.html"><div>Fixed Position</div></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="header-floating.html"><div>Floating Version</div></a></li>
                                </ul>
                            </li>
                            <li><a href="side-panel.html"><div><i class="icon-line-layout"></i>Side Panel</div></a>
                                <ul>
                                    <li><a href="side-panel-left-overlay.html"><div>Left Overlay</div></a></li>
                                </ul>
                            </li>
                            <li><a href="mega-menu.html"><div><i class="icon-line-columns"></i>Mega Menu</div></a></li>
                            <li><a href="#"><div><i class="icon-align-justify2"></i>Menu Styles</div></a>
                                <ul>
                                    <li><a href="header-light.html"><div>Menu - Style 1</div></a></li>
                                </ul>
                            </li>
                            <li><a href="#"><div><i class="icon-ok-sign"></i>Page Titles</div></a>
                                <ul>
                                    <li><a href="page.html"><div>Left Align</div></a></li>
                                    <li><a href="page-title-right.html"><div>Right Align</div></a></li>
                                    <li><a href="page-title-center.html"><div>Center Align</div></a></li>
                                    <li><a href="page-titledark.html"><div>Dark Style</div></a></li>
                                    <li><a href="page-title-pattern.html"><div>Pattern Background</div></a></li>
                                    <li><a href="page-title-parallax.html"><div>Parallax Background</div></a>
                                        <ul>
                                            <li><a href="page-title-parallax.html"><div>Default Header</div></a></li>
                                            <li><a href="page-title-parallax-header.html"><div>Transparent Header</div></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="page-title-video.html"><div>HTML5 Video</div></a></li>
                                    <li><a href="page-title-nobg.html"><div>No Background</div></a></li>
                                    <li><a href="page-title-mini.html"><div>Mini Version</div></a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html"><div><i class="icon-envelope-alt"></i>Contact Pages</div></a>
                                <ul>
                                    <li><a href="contact.html">Contact 1</a></li>
                                </ul>
                            </li>
                            <li><a href="#footer" data-scrollto="#footer"><div><i class="icon-th"></i>Footers</div></a>
                                <ul>
                                    <li><a href="sticky-footer.html"><div>Sticky Footer</div></a></li>
                                </ul>
                            </li>
                            <li><a href="#"><div><i class="icon-calendar3"></i>Events</div></a>
                                <ul>
                                    <li><a href="events-calendar.html"><div>Full Width Calendar</div></a></li>
                                    <li><a href="events-list.html"><div>Events List</div></a>
                                        <ul>
                                            <li><a href="events-list.html"><div>Right Sidebar</div></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="event-single.html"><div>Single Event</div></a>
                                        <ul>
                                            <li><a href="event-single-right-sidebar.html"><div>Right Sidebar</div></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="event-single-full-width-image.html"><div>Single Event - Full</div></a>
                                        <ul>
                                            <li><a href="event-single-full-width-image.html"><div>Parallax Image</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="modal-onload.html"><div><i class="icon-line-expand"></i>Modal OnLoad</div></a>
                                <ul>
                                    <li><a href="modal-onload.html"><div>Simple Layout</div></a></li>
                                </ul>
                            </li>
                            <li><a href="coming-soon.html"><div><i class="icon-time"></i>Coming Soon</div></a>
                                <ul>
                                    <li><a href="coming-soon.html"><div>Simple Layout</div></a></li>
                                </ul>
                            </li>
                            <li><a href="profile.html"><div><i class="icon-user"></i>User Profile</div></a></li>
                        </ul>
                    </li>
                    <li class="mega-menu"><a href="#"><div>Blog</div></a>
                        <div class="mega-menu-content style-2 clearfix">
                            <ul class="mega-menu-column col-md-3">
                                <li class="mega-menu-title"><a href="#"><div>Default</div></a>
                                    <ul>
                                        <li><a href="blog.html"><div>Right Sidebar</div></a></li>
                                    </ul>
                                </li>
                                <li class="mega-menu-title"><a href="#"><div>Timeline</div></a>
                                    <ul>
                                        <li><a href="blog-timeline-right-sidebar.html"><div>Right Sidebar</div></a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="mega-menu-column col-md-3">
                                <li class="mega-menu-title"><a href="#"><div>Masonry</div></a>
                                    <ul>
                                        <li><a href="blog-masonry.html"><div>4 Columns</div></a></li>
                                    </ul>
                                </li>
                                <li class="mega-menu-title"><a href="#"><div>Grid</div></a>
                                    <ul>
                                        <li><a href="blog-grid.html"><div>4 Columns</div></a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="mega-menu-column col-md-3">
                                <li class="mega-menu-title"><a href="#"><div>Small Thumbs</div></a>
                                    <ul>
                                        <li><a href="blog-small-left-sidebar.html"><div>Left Sidebar</div></a></li>
                                    </ul>
                                </li>
                                <li class="mega-menu-title"><a href="#"><div>Item Splitting</div></a>
                                    <ul>
                                        <li><a href="blog-grid.html"><div>Pagination</div></a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="mega-menu-column col-md-3">
                                <li class="mega-menu-title"><a href="#"><div>Single</div></a>
                                    <ul>
                                        <li><a href="blog-single.html"><div>Default Layout</div></a></li>
                                    </ul>
                                </li>
                                <li class="mega-menu-title"><a href="#"><div>Comments Module</div></a>
                                    <ul>
                                        <li><a href="blog-single-left-sidebar.html#comments"><div>Facebook Comments</div></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mega-menu"><a href="#"><div>Shortcodes</div></a>
                        <div class="mega-menu-content clearfix">
                            <ul class="mega-menu-column col-5">
                                <li><a href="animations.html"><div><i class="icon-magic"></i>Animations</div></a></li>
                            </ul>
                            <ul class="mega-menu-column col-5">
                                <li><a href="dividers.html"><div><i class="icon-indent-right"></i>Dividers</div></a></li>
                            </ul>
                            <ul class="mega-menu-column col-5">
                                <li><a href="lists-panels.html"><div><i class="icon-th-list"></i>Lists &amp; Panels</div></a></li>
                            </ul>
                            <ul class="mega-menu-column col-5">
                                <li><a href="pricing.html"><div><i class="icon-dollar"></i>Pricing Boxes</div></a></li>
                            </ul>
                            <ul class="mega-menu-column col-5">
                                <li><a href="style-boxes.html"><div><i class="icon-exclamation-sign"></i>Alert Boxes</div></a></li>
                            </ul>
                        </div>
                    </li>

                    <li><a href="#"><div><i class="icon-user"></i>{{ auth()->user()->name or 'User Profile'}}</div></a>
                        <ul>
                            @guest
                                <li ><a href="{{ url('/login') }}"><div>login</div></a></li>
                                <li ><a href="{{ url('/register') }}"><div>register</div></a></li>
                            @else
                                    @if(auth()->user()->isadmin())
                                        <li>
                                            <a href="/admin"><div>
                                                    {{ trans('common.manageAdmin') }}</div>
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><div>
                                                Logout</div>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                @endguest

                        </ul>
                    </li>
                </ul>
                <!-- Top Search
                ============================================= -->
                <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                    <form action="search.html" method="get">
                        <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                    </form>
                </div><!-- #top-search end -->

            </nav><!-- #primary-menu end -->

        </div>

    </div>

</header><!-- #header end -->
