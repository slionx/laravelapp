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
</head>
<body>
    <div id="app">
        <div class="vegas-timer"><div class="vegas-timer-progress" style="transition-duration: 0ms;"></div></div>

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
                        &nbsp;
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

        <div class="progress" style="height: 10px;">
            <div id="prog" class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%;line-height: 10px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-6">
                <button id="pause" class="btn btn-primary" value="pause">暂停</button>
                <button id="stop" class="btn btn-primary" value="stop">停止</button>
                <!--<button id="goon" class="btn btn-primary">继续<button>-->
            </div>
        </div>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<script>
    var value = 0;
    var time = 1;


    //百分数增加，0-30时为红色，30-60为黄色，60-90为蓝色，>90为绿色
    function increment( ) {
        value += 1;
        $("#prog").css("width",value + "%").text(value + "%");
        if (value>=0 && value<=30) {
            $("#prog").addClass("progress-bar-danger");
        }
        else if (value>=30 && value <=60) {
            $("#prog").removeClass("progress-bar-danger");
            $("#prog").addClass("progress-bar-warning");
        }
        else if (value>=60 && value <=90 && document.readyState === "interactive") {
            $("#prog").removeClass("progress-bar-warning");
            $("#prog").addClass("progress-bar-info");
        }
        else if(value >= 90 && value<100 && window.document.readyState == "complete") {
        //else if(window.document.readyState == "complete") {

            $("#prog").removeClass("progress-bar-info");
            $("#prog").addClass("progress-bar-success");
        }
        else{
            return;
        }
        console.log(value);

        st = setTimeout(increment,time);
    }

    increment();



    /*var value = 0;
    var time = 3;
    function increment(t)
    {
        value += 1;
        if( value <90){
            $("#prog").css("width",value + "%").text(value + "%");
        }
        if (value>=0 && value<=30) {
            $("#prog").addClass("progress-bar-danger");
        }
        else if (value>=30 && value <=60) {
            $("#prog").removeClass("progress-bar-danger");
            $("#prog").addClass("progress-bar-warning");
        }
        else if (value>=60 && value <=90) {
            $("#prog").removeClass("progress-bar-warning");
            $("#prog").addClass("progress-bar-info");
        }
        else{
            setTimeout(reset,100);
            return;

        }
        st = setTimeout(increment,time);


        if (window.document.readyState == "complete")
        {
            $("#prog").css("width",value + "%").text(value + "%");
            $("#prog").removeClass("progress-bar-info");
            $("#prog").addClass("progress-bar-success");

            if (t) {
                window.clearInterval(t);
            }
        }
    }
    increment();*/
    /*t = window.setInterval(function () {
        increment(t);
    }, 700);*/



    document.onreadystatechange = function () {
        if (document.readyState === "loading") {
            //alert("loading");
        }
        if (document.readyState === "interactive") {
            //alert("interactive");
        }
        if (document.readyState === "complete") {
            //alert("complete");
        }
    }
    $(window).load(function() {
        //alert("hi");
    });
    /*$(document).ready(function(){
        var value = 0;
        var time = 50;


        //百分数增加，0-30时为红色，30-60为黄色，60-90为蓝色，>90为绿色
        function increment( ) {
            value += 1;
            $("#prog").css("width",value + "%").text(value + "%");
            if (value>=0 && value<=30) {
                $("#prog").addClass("progress-bar-danger");
            }
            else if (value>=30 && value <=60) {
                $("#prog").removeClass("progress-bar-danger");
                $("#prog").addClass("progress-bar-warning");
            }
            else if (value>=60 && value <=90) {
                $("#prog").removeClass("progress-bar-warning");
                $("#prog").addClass("progress-bar-info");
            }
            else if(value >= 90 && value<100) {
                $("#prog").removeClass("progress-bar-info");
                $("#prog").addClass("progress-bar-success");
            }
            else{
                setTimeout(reset,3000);
                return;

            }

            st = setTimeout(increment,time);
        }

        increment();
        if(window.loaded){
            $("#prog").fadeOut();
        }

        //进度条复位函数
        function reset( ) {
            value = 0
            $("#prog").removeClass("progress-bar-success").css("width","0%").text("0%");
            //setTimeout(increment,5000);
        }


        //进度条停止与重新开始
        $("#stop").click(function () {
            if ("stop" == $("#stop").val()) {
                //$("#prog").stop();
                clearTimeout(st);
                $("#prog").css("width","0%").text("等待启动");
                $("#stop").val("start").text("重新开始");
            } else if ("start" == $("#stop").val()) {
                increment();
                $("#stop").val("stop").text("停止");
            }
        });
        //进度条暂停与继续
        $("#pause").click(function() {
            if ("pause" == $("#pause").val()) {
                //$("#prog").stop();
                clearTimeout(st);
                $("#pause").val("goon").text("继续");
            } else if ("goon" == $("#pause").val()) {
                increment();
                $("#pause").val("stop").text("暂停");
            }
        });

    });*/
</script>
</body>
</html>
