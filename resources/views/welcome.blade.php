<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/swiper.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/magnific-popup.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('welcome/css/responsive.css') }}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('welcome/css/navigation.css') }}">


    <!-- Document Title
    ============================================= -->
    <title>Slionx | The Multi-Purpose HTML5 Template</title>
    <style>
        #video-slider-play {
            position: absolute;
            left: 45%;
            top: auto;
            bottom: 40px;
            margin-left: -24px;
            width: 48px;
            height: 48px;
            line-height: 48px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.2);
            color: #FFF;
            font-size: 18px;
            text-align: center;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
        }

        #video-slider-play i:nth-of-type(1) {
            position: relative;
            left: 2px;
        }

        #video-slider-play i:nth-of-type(2),
        #video-slider-play.video-played i:nth-of-type(1) { display: none; }

        #video-slider-play.video-played i:nth-of-type(2) { display: block; }

        #video-slider-volume {
            position: absolute;
            left: 55%;
            top: auto;
            bottom: 40px;
            margin-left: -24px;
            width: 48px;
            height: 48px;
            line-height: 48px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.2);
            color: #FFF;
            font-size: 18px;
            text-align: center;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
        }

        #video-slider-volume i:nth-of-type(1) {
            position: relative;
            left: 2px;
        }

        #video-slider-volume i:nth-of-type(2),
        #video-slider-volume.video-played i:nth-of-type(1) { display: none; }

        #video-slider-volume.video-played i:nth-of-type(2) { display: block; }


        .revo-slider-emphasis-text {
            font-size: 64px;
            font-weight: 700;
            letter-spacing: -1px;
            font-family: 'Raleway', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Raleway', sans-serif;
        }
        .tp-video-play-button { display: none !important; }

        .tp-caption { white-space: nowrap; }

    </style>
</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

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
                        <li class="current"><a href="index.html"><div>Home</div></a>
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

    <section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">
        <div class="slider-parallax-inner">
            @if(Cache::get('welcomeType') == 'slide')
            <div class="tp-banner-container">
                <div class="tp-banner" >
                    <ul>    <!-- SLIDE  -->
                        <li class="dark" data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="{{ asset('welcome/images/5.jpg') }}" data-delay="10000"  data-saveperformance="off" data-title="Responsive Design">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('welcome/images/5.jpg') }}"  alt="kenburns1"  data-bgposition="center bottom" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scale="100" data-scaleend="120" data-bgpositionend="center top">
                            <!-- LAYERS -->

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                                 data-x="355"
                                 data-y="215"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1000"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; white-space: nowrap;">Picture Perfect on Every Device Bcoz</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                                 data-x="200"
                                 data-y="230"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1200"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; white-space: nowrap;">It's Completely Responsive</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text"
                                 data-x="245"
                                 data-y="340"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1400"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; max-width: 650px; white-space: normal;">We have created a Design that looks Awesome, performs Brilliantly &amp; senses Orientations.</div>

                            <div class="tp-caption customin ltl tp-resizeme"
                                 data-x="496"
                                 data-y="450"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1550"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3;"><a href="#" class="button button-border button-white button-light button-large button-rounded tright nomargin"><span>Start Tour</span> <i class="icon-angle-right"></i></a></div>

                        </li>

                        <li class="dark" data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="{{ asset('welcome/images/6.jpg') }}" data-delay="10000"  data-saveperformance="off"  data-title="Unlimited Possibilities">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('welcome/images/6.jpg') }}"  alt="kenburns6"  data-bgposition="center bottom" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scale="100" data-scaleend="120" data-bgpositionend="center top">
                            <!-- LAYERS -->

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                                 data-x="453"
                                 data-y="215"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1000"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; white-space: nowrap;">Why Choose Canvas?</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                                 data-x="264"
                                 data-y="230"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1200"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; white-space: nowrap;">Unlimited Possibilities</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text"
                                 data-x="245"
                                 data-y="340"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1400"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; max-width: 650px; white-space: normal;">Create whatever you require for your Business to bloom with Tons of Customization Possibilities.</div>

                            <div class="tp-caption customin ltl tp-resizeme"
                                 data-x="508"
                                 data-y="450"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1550"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3;"><a href="#" class="button button-border button-large button-rounded tright nomargin"><span>Browse</span><i class="icon-angle-right"></i></a></div>

                        </li>

                        <li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-thumb="{{ asset('welcome/images/7.jpg') }}" data-delay="10000"  data-saveperformance="off"  data-title="Unlimited Possibilities">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('welcome/images/8.jpg') }}"  alt="kenburns6"  data-bgposition="center bottom" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scale="100" data-scaleend="120" data-bgpositionend="center top">
                            <!-- LAYERS -->

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                                 data-x="453"
                                 data-y="215"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1000"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; white-space: nowrap;">Why Choose Canvas?</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                                 data-x="264"
                                 data-y="230"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1200"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; white-space: nowrap;">Unlimited Possibilities</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text"
                                 data-x="245"
                                 data-y="340"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1400"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; max-width: 650px; white-space: normal;">Create whatever you require for your Business to bloom with Tons of Customization Possibilities.</div>

                            <div class="tp-caption customin ltl tp-resizeme"
                                 data-x="508"
                                 data-y="450"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1550"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3;"><a href="#" class="button button-border button-large button-rounded tright nomargin"><span>Browse</span><i class="icon-angle-right"></i></a></div>

                        </li>

                        <li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-thumb="{{ asset('welcome/images/8.jpg') }}" data-delay="10000"  data-saveperformance="off"  data-title="Unlimited Possibilities">
                            <!-- MAIN IMAGE -->
                            <img src="{{ asset('welcome/images/8.jpg') }}"  alt="kenburns6"  data-bgposition="center bottom" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scale="100" data-scaleend="120" data-bgpositionend="center top">
                            <!-- LAYERS -->

                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                                 data-x="453"
                                 data-y="215"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1000"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; white-space: nowrap;">Why Choose Canvas?</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                                 data-x="264"
                                 data-y="230"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1200"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; white-space: nowrap;">Unlimited Possibilities</div>

                            <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text"
                                 data-x="245"
                                 data-y="340"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1400"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; max-width: 650px; white-space: normal;">Create whatever you require for your Business to bloom with Tons of Customization Possibilities.</div>

                            <div class="tp-caption customin ltl tp-resizeme"
                                 data-x="508"
                                 data-y="450"
                                 data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
                                 data-speed="800"
                                 data-start="1550"
                                 data-easing="easeOutQuad"
                                 data-splitin="none"
                                 data-splitout="none"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1000"
                                 data-endeasing="Power4.easeIn" style="z-index: 3;"><a href="#" class="button button-border button-large button-rounded tright nomargin"><span>Browse</span><i class="icon-angle-right"></i></a></div>

                        </li>
                    </ul>
                </div>
            </div><!-- END REVOLUTION SLIDER -->
        @else



            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    <div class="swiper-slide dark" style="background-image: url('{{ asset('welcome/images/5.jpg') }}');">
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-caption-animate="fadeInUp">Welcome to Slionx</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200">Create just what you need for your Perfect Website. Choose from a wide range of Elements &amp; simply put them on your own Canvas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide dark">
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-caption-animate="fadeInUp" id="title">Beautifully Flexible Mp4</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200">Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
                            </div>
                            <a href="#" id="video-slider-play"><i class="icon-line-play"></i><i class="icon-line-pause"></i></a>
                            <a href="#" id="video-slider-volume"><i class="icon-line2-volume-off"></i><i class="icon-line-volume"></i></a>
                        </div>
                        <div class="video-wrap">
                            <video id="slide-video" poster="images/videos/explore.jpg" preload="auto" controls loop>
                                &lt;!&ndash;<source src='images/videos/explore.webm' type='video/webm' />&ndash;&gt;
                                <source src='{{ asset('welcome/mp4/a45112c9a122c042918ec91532b6e2a6.mp4') }}' type='video/mp4' />
                            </video>
                            <div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="background-image: url('{{ asset('welcome/images/7.jpg') }}'); background-position: center top;">
                        <div class="container clearfix">
                            <div class="slider-caption">
                                <h2 data-caption-animate="fadeInUp">Great Performance</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200">You'll be surprised to see the Final Results of your Creation &amp; would crave for more.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
                <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
                <div id="slide-number"><div id="slide-number-current"></div><span>/</span><div id="slide-number-total"></div></div>
                <div class="swiper-pagination"></div>
            </div>
        @endif

            <!--<a href="#" data-scrollto="#content" data-offset="100" class="dark one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>-->

        </div>
    </section>

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row clearfix">
                    <div class="col-lg-5">
                        <div class="heading-block topmargin">
                            <h1>Welcome to Canvas.<br>MultiPurpose Template.</h1>
                        </div>
                        <p class="lead">Create a website that you are gonna be proud of. Be it Business, Portfolio, Agency, Photography, eCommerce &amp; much more.</p>
                    </div>
                    <div class="col-lg-7">
                        <div style="position: relative; margin-bottom: -60px;" class="ohidden" data-height-lg="426" data-height-md="567" data-height-sm="470" data-height-xs="287" data-height-xxs="183">
                            <img src="" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="100" alt="Chrome">
                            <img src="" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="400" alt="iPad">
                        </div>
                    </div>
                </div>
            </div>
    </section><!-- #content end -->
    <!-- Footer ============================================= -->
    <footer id="footer" class="dark">
        <!-- Copyrights ============================================= -->
        <div id="copyrights">

            <div class="container clearfix">

                <div class="col_half">
                    Copyrights &copy; 2018 All Rights Reserved by Slionx Inc.<br>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-pinterest">
                            <i class="icon-pinterest"></i>
                            <i class="icon-pinterest"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-vimeo">
                            <i class="icon-vimeo"></i>
                            <i class="icon-vimeo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-github">
                            <i class="icon-github"></i>
                            <i class="icon-github"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-yahoo">
                            <i class="icon-yahoo"></i>
                            <i class="icon-yahoo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>

                    <div class="clear"></div>

                    <i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
                </div>

            </div>

        </div><!-- #copyrights end -->

    </footer><!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="{{ asset('welcome/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/plugins.js') }}"></script>
<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="{{ asset('welcome/js/functions.js') }}"></script>

<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
<script type="text/javascript" src="{{ asset('welcome/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/jquery.themepunch.revolution.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.video.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('welcome/js/extensions/revolution.extension.parallax.min.js') }}"></script>


<script type="text/javascript" src="{{ asset('welcome/js/typing.js') }}"></script>
<script>
    jQuery('#video-slider-play').on('click', function(e){
        e.preventDefault();
        if( jQuery(this).hasClass('video-played') ) {
            jQuery('#slide-video').get(0).play();
        } else {
            jQuery('#slide-video').get(0).pause();
        }
        jQuery(this).toggleClass('video-played');
    });
    $('#slide-video').get(0).volume = 0;
    jQuery('#video-slider-volume').on('click', function(e){
        e.preventDefault();
        if( jQuery(this).hasClass('video-played') ) {
            jQuery('#slide-video').get(0).volume = 0;
        } else {
            jQuery('#slide-video').get(0).volume = 1;
        }
        jQuery(this).toggleClass('video-played');
    });

    var app = document.getElementById('title');
    var typewriter = new Typewriter(app, {
        loop: true,
        cursor:'_'
    });
    typewriter.pauseFor(500)
        .typeString('Slionx')
        .pauseFor(2500)
        .deleteAll()
        .typeString('The quieter you become')
        .pauseFor(1500)
        .deleteChars(19)
        .typeString(' more you are able to hear!')
        .pauseFor(1500)
        .start();
</script>

<script type="text/javascript">

    var tpj=jQuery;
    tpj.noConflict();

    tpj(document).ready(function() {

        var apiRevoSlider = tpj('.tp-banner').show().revolution(
            {
                sliderType:"standard",
                jsFileLocation:"include/rs-plugin/js/",
                dottedOverlay:"none",
                delay:16000,
                startwidth:1140,
                startheight:600,
                hideThumbs:200,

                thumbWidth:100,
                thumbHeight:50,
                thumbAmount:5,

                navigation: {
                    keyboardNavigation: "on",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style: "hades",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: false,
                        tmp: '<div class="tp-arr-allwrapper">	<div class="tp-arr-imgholder"></div></div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        }
                    },
                },

                touchenabled:"on",
                onHoverStop:"on",

                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,

                parallax:"mouse",
                parallaxBgFreeze:"on",
                parallaxLevels:[7,4,3,2,5,4,3,2,1,0],

                keyboardNavigation:"off",

                navigationHAlign:"center",
                navigationVAlign:"bottom",
                navigationHOffset:0,
                navigationVOffset:20,

                soloArrowLeftHalign:"left",
                soloArrowLeftValign:"center",
                soloArrowLeftHOffset:20,
                soloArrowLeftVOffset:0,

                soloArrowRightHalign:"right",
                soloArrowRightValign:"center",
                soloArrowRightHOffset:20,
                soloArrowRightVOffset:0,

                shadow:0,
                fullWidth:"off",
                fullScreen:"on",

                spinner:"spinner4",

                stopLoop:"off",
                stopAfterLoops:-1,
                stopAtSlide:-1,

                shuffle:"off",

                autoHeight:"off",
                forceFullWidth:"off",



                hideThumbsOnMobile:"off",
                hideNavDelayOnMobile:1500,
                hideBulletsOnMobile:"off",
                hideArrowsOnMobile:"off",
                hideThumbsUnderResolution:0,

                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                startWithSlide:0,
            });

        apiRevoSlider.bind("revolution.slide.onloaded",function (e) {
            setTimeout( function(){ SEMICOLON.slider.sliderParallaxDimensions(); }, 200 );
        });

        apiRevoSlider.bind("revolution.slide.onchange",function (e,data) {
            SEMICOLON.slider.revolutionSliderMenu();
        });

    }); //ready

</script>
</body>
</html>