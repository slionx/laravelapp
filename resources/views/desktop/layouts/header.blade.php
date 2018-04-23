
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
                        <li class="current"><a href="l.cn"><div>welcole</div></a></li>
                        @if (Route::has('login'))
                            <li ><a href="{{ url('/login') }}"><div>login</div></a>
                            <li ><a href="{{ url('/register') }}"><div>register</div></a>
                        @endif
                        <li><a href="index.html"><div>Home</div></a>
                            <ul>
                                <li><a href="index-corporate.html"><div>Home - Corporate</div></a>
                                    <ul>
                                        <li><a href="index-corporate.html"><div>Corporate - Layout 1</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="index-portfolio.html"><div>Home - Portfolio</div></a>
                                    <ul>
                                        <li><a href="index-portfolio.html"><div>Portfolio - Layout 1</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="index-blog.html"><div>Home - Blog</div></a>
                                    <ul>
                                        <li><a href="index-blog.html"><div>Blog - Layout 1</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="index-shop.html"><div>Home - Shop</div></a>
                                    <ul>
                                        <li><a href="index-shop.html"><div>Shop - Layout 1</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="index-magazine.html"><div>Home - Magazine</div></a>
                                    <ul>
                                        <li><a href="index-magazine.html"><div>Magazine - Layout 1</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="landing.html"><div>Home - Landing Page</div></a>
                                    <ul>
                                        <li><a href="landing.html"><div>Landing Page - Layout 1</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="index-fullscreen-image.html"><div>Home - Full Screen</div></a>
                                    <ul>
                                        <li><a href="index-fullscreen-image.html"><div>Full Screen - Image</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="index-onepage.html"><div>Home - One Page</div></a>
                                    <ul>
                                        <li><a href="index-onepage.html"><div>One Page - Default</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="index-wedding.html"><div>Home - Wedding</div></a></li>
                            </ul>
                        </li>
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
                        <li class="mega-menu"><a href="#"><div>Pages</div></a>
                            <div class="mega-menu-content style-2 clearfix">
                                <ul class="mega-menu-column col-md-3">
                                    <li class="mega-menu-title"><a href="#"><div>Introduction</div></a>
                                        <ul>
                                            <li><a href="about.html"><div>About Us</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="mega-menu-column col-md-3">
                                    <li class="mega-menu-title"><a href="#"><div>Utility</div></a>
                                        <ul>
                                            <li><a href="services.html"><div>Services - Layout 1</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="mega-menu-column col-md-3">
                                    <li class="mega-menu-title"><a href="#"><div>Layout Grids</div></a>
                                        <ul>
                                            <li><a href="full-width.html"><div>Full Width</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="mega-menu-column col-md-3">
                                    <li class="mega-menu-title"><a href="#"><div>Miscellaneous</div></a>
                                        <ul>
                                            <li><a href="login-register.html"><div>Login/Register</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="mega-menu"><a href="#"><div>Portfolio</div></a>
                            <div class="mega-menu-content style-2 clearfix">
                                <ul class="mega-menu-column col-5">
                                    <li class="mega-menu-title"><a href="#"><div>Grids</div></a>
                                        <ul>
                                            <li><a href="portfolio-1.html"><div>1 Column</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="mega-menu-column col-5">
                                    <li class="mega-menu-title"><a href="#"><div>Masonry</div></a>
                                        <ul>
                                            <li><a href="portfolio-mixed-masonry.html"><div>Mixed Columns</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="mega-menu-column col-5">
                                    <li class="mega-menu-title"><a href="#"><div>Loading Styles</div></a>
                                        <ul>
                                            <li><a href="portfolio.html"><div>jQuery Filter</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="mega-menu-column col-5">
                                    <li class="mega-menu-title"><a href="#"><div>Single Project</div></a>
                                        <ul>
                                            <li><a href="portfolio-single-extended.html"><div>Extended Item</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="mega-menu-column col-5">
                                    <li class="mega-menu-title"><a href="#"><div>Layouts</div></a>
                                        <ul>
                                            <li><a href="portfolio-nomargin.html"><div>Default</div></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
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
                        <li><a href="shop.html"><div>Shop</div></a>
                            <ul>
                                <li><a href="shop.html"><div>4 Columns</div></a></li>
                                <li><a href="shop-3.html"><div>3 Columns</div></a>
                                    <ul>
                                        <li><a href="shop-3.html"><div>Full Width</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="shop-2.html"><div>2 Columns</div></a>
                                    <ul>
                                        <li><a href="shop-2-right-sidebar.html"><div>Right Sidebar</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="shop-1.html"><div>1 Columns</div></a>
                                    <ul>
                                        <li><a href="shop-1.html"><div>Full Width</div></a></li>
                                    </ul>
                                </li>
                                <li><a href="shop-category-parallax.html"><div>Categories - Parallax</div></a></li>
                                <ul>
                                    <li><a href="shop-single.html"><div>Full Width</div></a></li>
                                </ul>
                                </li>
                                <li><a href="cart.html"><div>Cart</div></a></li>
                                <li><a href="checkout.html"><div>Checkout</div></a></li>
                            </ul>
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
