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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('global/plugins/bootstrap-switch/css/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('global/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="app">

        <div class="progress" style="display: none;" >
            <div id="prog" class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div id="loader" class="loader" ></div>

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
                        <li class="nav-item">
                            <div class="switch" data-on="success" data-off="warning">
                                <input type="checkbox" name="control-loader" data-size="mini" checked />
                            </div>
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
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
        <iframe src="http://www.google.com"></iframe>
        <div id="loading_background" class="loading_background" style="display: none;"></div>
        <div id="loading_manage">
            <i class="fa fa-spinner fa-spin animated"></i> 正在为您玩命加载中…
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

    function l() {
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
