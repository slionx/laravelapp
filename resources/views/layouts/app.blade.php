<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/theme-blues.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loader.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('global/plugins/bootstrap-switch/css/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('global/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('global/css/components.min.css') }}" rel="stylesheet" type="text/css" />

</head>
<style>
    .overlay-bar {
        background: none;
    }
    .top-bar {
        position: absolute;
        background: #3b946f;
        width: 100%;
        z-index: 10;
        -webkit-transition: all .5s ease;
        -moz-transition: all .5s ease;
        transition: all .5s ease;
        line-height: 0;
        top: 0;
    }
</style>
<body>
    <div id="app">

        <div id="loader" class="loader" ></div>

        {{--<div class="nav-container">
            <nav class="top-bar overlay-bar">
                <div class="container">

                    <div class="row utility-menu">
                        <div class="col-sm-12">
                            <div class="utility-inner clearfix">
                                <span class="alt-font"><i class="icon icon_pin"></i> 300 Collins St Melbourne</span>
                                <span class="alt-font"><i class="icon icon_mail"></i> hello@pivot.net</span>

                                <div class="pull-right">
                                    <a href="login.html" class="btn btn-primary login-button btn-xs">Login</a>
                                    <a href="#" class="btn btn-primary btn-filled btn-xs">Signup</a>
                                </div>
                            </div>
                        </div>
                    </div><!--end of row-->


                    <div class="row nav-menu">
                        <div class="col-sm-3 col-md-2 columns">
                            <a href="index.html">
                                <img class="logo logo-light" alt="Logo" src="img/logo-light.png">
                                <img class="logo logo-dark" alt="Logo" src="img/logo-dark.png">
                            </a>
                        </div>

                        <div class="col-sm-9 col-md-10 columns">
                            <ul class="menu">
                                <li class="has-dropdown"><a href="#">Home Pages</a>
                                    <div class="subnav subnav-fullwidth" style="width: 1170px; left: -200px;">
                                        <div class="col-md-3">
                                            <h6 class="alt-font">Home Layouts</h6>
                                            <ul class="subnav">
                                                <li><a href="index.html">Home Classic</a></li>
                                                <li><a href="home-2.html">Home Education</a></li>
                                                <li><a href="home-3.html">Home Business</a></li>
                                                <li><a href="home-4.html">Home Agency</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-md-3">
                                            <h6 class="alt-font">Home Layouts</h6>
                                            <ul class="subnav">
                                                <li><a href="home-5.html">Home Corporate</a></li>
                                                <li><a href="personal.html">Home Personal</a></li>
                                                <li><a href="launching-soon-2.html">Service Launch</a></li>
                                                <li><a href="launching-soon.html">Product Launch</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-md-3">
                                            <h6 class="alt-font">Home Layouts</h6>
                                            <ul class="subnav">
                                                <li><a href="home-resume.html">Home Resume</a></li>
                                                <li><a href="launching-soon-3.html">Launch with video</a></li>
                                                <li><a href="coming-soon.html">Launch with countdown</a></li>
                                                <li><a href="one-page.html">One Page</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-md-3">
                                            <a class="btn btn-primary" href="http://www.mediumra.re/pivot/variant/builder.html">Build your own</a>
                                            <a class="btn btn-primary btn-filled" href="#">Purchase Pivot</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="has-dropdown"><a href="#">Pages</a>
                                    <ul class="subnav">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="about-2.html">About Us 2</a></li>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="services-2.html">Services 2</a></li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="404.html">404 Error</a></li>
                                        <li><a href="500.html">500 Error</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown"><a href="#">Blog</a>
                                    <div class="subnav subnav-halfwidth">
                                        <div class="col-sm-6">
                                            <h6 class="alt-font">Article Lists</h6>
                                            <ul class="subnav">
                                                <li><a href="blog-masonry.html">Masonry</a></li>
                                                <li><a href="blog-masonry-sidebar.html">Masonry Sidebar</a></li>
                                                <li><a href="blog.html">Blog Large List</a></li>
                                                <li><a href="blog-large-image.html">Blog Image List</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-sm-6">
                                            <h6 class="alt-font">Article Singles</h6>
                                            <ul class="subnav">
                                                <li><a href="blog-single.html">Article Basic</a></li>
                                                <li><a href="blog-single-2.html">Article Basic 2</a></li>
                                                <li><a href="blog-single-sidebar.html">Article Sidebar</a></li>
                                                <li><a href="blog-single-media.html">Article Media</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="has-dropdown"><a href="#">Projects</a>
                                    <ul class="subnav">
                                        <li><a href="projects.html">Projects Fullwidth</a></li>
                                        <li><a href="projects-2.html">Projects Contained</a></li>
                                        <li><a href="project-single-2.html">Project Single</a></li>
                                        <li><a href="project-single.html">Project Single 2</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown"><a href="#">Contact</a>
                                    <ul class="subnav">
                                        <li><a href="contact-3.html">Large Map</a></li>
                                        <li><a href="contact-2.html">Map with form</a></li>
                                        <li><a href="contact.html">Header with form</a></li>
                                        <li><a href="contact-4.html">Fullscreen photo</a></li>
                                    </ul>
                                </li>
                            </ul>


                        </div>
                    </div><!--end of row-->

                    <div class="mobile-toggle">
                        <i class="icon icon_menu"></i>
                    </div>

                </div><!--end of container-->
            </nav>
        </div>--}}

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    @if(auth()->user()->isadmin())
                                    <li>
                                        <a href="/admin">
                                        {{ trans('common.manageAdmin') }}
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <style>
            .loading_background { cursor: wait; display: block; width: 100%; height: 100%; background: rgba(0,0,0,.5); position: absolute; top: 0; left: 0; z-index: 10001; }
            #loading_manage { color: #666; font-size: 20px; position: absolute; z-index: 10002; left: 45%; top: 40%; border: 1px solid rgb(187, 187, 187); width: auto; height: 80px; line-height: 78px; padding-left: 16px; padding-right: 20px; background: #fff; display: none; cursor: pointer; border-radius: 8px; background-repeat: no-repeat; background-position: 8px 50%; box-shadow: 0 1px 15px rgba(0,0,0,.175); }
            #loading_manage i { font-size: 24px; }
        </style>
        {{--<iframe src="http://www.google.com"></iframe>--}}
        <div id="loading_background" class="loading_background" style="display: none;"></div>
        <div id="loading_manage">
            <i class="fa fa-spinner fa-spin animated"></i> 正在为您玩命加载中…
        </div>
        <div class="progress" style="display: none;" >
            <div id="prog" class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>



        @yield('content')
    </div>
    <div class="scroll-to-top" style="display: block;">
        <i class="icon-arrow-up"></i>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('global/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('global/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script>
    $(document).ready(function(){

        $("input[name='control-loader']").on('switchChange.bootstrapSwitch', function(event, state) {
            //console.log(this); // DOM element
            //console.log(event); // jQuery event
            console.log(state); // true | false
        });

        // Hanles sidebar toggler
        var handleSidebarToggler = function () {
            var body = $('body');
            if ($.cookie && $.cookie('sidebar_closed') === '1' && App.getViewPort().width >= resBreakpointMd) {
                $('body').addClass('page-sidebar-closed');
                $('.page-sidebar-menu').addClass('page-sidebar-menu-closed');
            }

            // handle sidebar show/hide
            $('body').on('click', '.sidebar-toggler', function (e) {
                var sidebar = $('.page-sidebar');
                var sidebarMenu = $('.page-sidebar-menu');
                $(".sidebar-search", sidebar).removeClass("open");

                if (body.hasClass("page-sidebar-closed")) {
                    body.removeClass("page-sidebar-closed");
                    sidebarMenu.removeClass("page-sidebar-menu-closed");
                    if ($.cookie) {
                        $.cookie('sidebar_closed', '0');
                    }
                } else {
                    body.addClass("page-sidebar-closed");
                    sidebarMenu.addClass("page-sidebar-menu-closed");
                    if (body.hasClass("page-sidebar-fixed")) {
                        sidebarMenu.trigger("mouseleave");
                    }
                    if ($.cookie) {
                        $.cookie('sidebar_closed', '1');
                    }
                }

                $(window).trigger('resize');
            });
        };

    });

    var value = 0;
    var time = 10;
    document.onreadystatechange = function () {
        if (document.readyState === "loading") {
            //alert("loading");
        }
        if (window.document.readyState === "interactive") {
            loading();
            //l();
        }
        if (document.readyState === "complete") {
            completed();
            //c();
        }
    }

    //加载中显示遮罩
    function loading() {
        //$('#loading_background').show();
        //$('#loading_manage').show();
        $('.loader').show();
        return;
    }
    //加载完成，隐藏遮罩
    function completed() {
        //$('#loading_background').hide();
        //$('#loading_manage').hide();
        $('.loader').hide();
    }

    // Nav Sticky

    $(window).scroll(function(){
        if($(window).scrollTop() > 260 && !$('.mobile-toggle').is(":visible")){
            $('.top-bar').addClass('nav-sticky');
        }else{
            $('.top-bar').removeClass('nav-sticky');
        }
    });



    function l() {
        $(".progress").show();
        value += 1;
        //$("#prog").css("width",value + "%").text(value + "%");
        $("#prog").css("width",value + "%");
        if (value>=0 && value<=30) {
            $("#prog").addClass("progress-bar-danger");
        }
        else if (value>=30 && value <=60) {
            $("#prog").removeClass("progress-bar-danger");
            $("#prog").addClass("progress-bar-warning");
        }
        else if (value>=60 && value <=90 ) {
            $("#prog").removeClass("progress-bar-warning");
            $("#prog").addClass("progress-bar-info");
        }else{
            return;
        }
        st = setTimeout(l,time);
    }

    function c() {
        value += 1;
        $("#prog").css("width",value + "%");
        if(value >= 90 && value<100 ) {
            $("#prog").removeClass("progress-bar-info");
            $("#prog").addClass("progress-bar-success");
        }else {
            h = setTimeout(hide,1000);
            return;
        }
        st = setTimeout(c,time);
    }

    function hide() {
        $(".progress").hide();
    }

</script>
</body>
</html>
