<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <link href="{{ asset('css/loader.css') }}" rel="stylesheet">
        <link href="{{ asset('css/typing.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                overflow: hidden;
                margin: 0;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                /*position: relative;*/
            }

            .top-right {
                position: fixed;
                right: 10px;
                top: 18px;
                z-index: 10;
            }

            .content {
                position: absolute;
                z-index: 10;
                text-align: center;
            }

            .title {
                font-size: 84px;
                background: rgba(154,154,154,.5);
                color: #fff;
                border-radius: 8px;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .no-pad {
                padding: 0px;
            }
            .fullscreen-element{
                position: relative;
                overflow: hidden;
                background-color: #0a6aa1;
            }
        </style>
    </head>
    <body>
    <div id="loader" class="loader" ></div>
    <div class="fullscreen-element no-pad centered-text">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            @if(Cache::get('welcomeType') == 'slide')
                @if(isset($home_bg_images) && $home_bg_images)
                    <div id="home-cover-slideshow">
                        @foreach ($home_bg_images as $image)
                            <div class="home-cover-img" data-src="{{ asset('storage') }}/{{ $image }}"></div>
                        @endforeach
                    </div>
                @endif
            @else
                <video width="100%" height="100%" @if(Cache::has('videoAddress')) src="{{ Cache::get('videoAddress') }}" @endif autoplay="autoplay" loop="loop" ></video>
            @endif

            {{--<div class="container">
                <div class="content">
                    <div class="home-box">
                        <h2 title="{{ $site_title or 'title' }}" style="margin: 0;">
                            {{ $site_title or '我的个人博客' }}
                            <a aria-hidden="true" href="">
                                <img class="img-circle" src="{{ $avatar or 'https://raw.githubusercontent.com/lufficc/images/master/Xblog/logo.png' }}" alt="{{ $author or 'Author' }}">
                            </a>
                        </h2>
                        <h3 title="{{ $description or 'description' }}" aria-hidden="true" style="margin: 0">
                            {{ $description or 'Stay Hungry. Stay Foolish.' }}
                        </h3>
                        <p class="links">
                            <font aria-hidden="true">»</font>
                            <a href="{{ route('post.index') }}" aria-label="点击查看博客文章列表">博客</a>

                            <font aria-hidden="true">/</font>
                            <a href="" aria-label="查看{{ $author or 'author' }}的">name</a>

                        </p>
                        <p class="links">
                            <font aria-hidden="true">»</font>

                            <a href="" target="_blank" aria-label="{{ $author or 'author' }} 的  地址">
                                <i class="fa fa- fa-fw" title=""></i>
                            </a>

                        </p>
                    </div>
                </div>
            </div>--}}
            <div class="content">
                <div id="title" class="title m-b-md">
                    Slionx
                </div>
                <div class="links" >
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="/admin">Admin</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </div>



    <!--
http://ofo.oss-cn-qingdao.aliyuncs.com/ofoweb/official/new.mp4

http://v4.music.126.net/20180228172455/f45baba0207dc0261eb895e29d3573e8/web/cloudmusic/mv/20180201093929/e37174eb-e7b1-4810-a62f-02780b829dac/a45112c9a122c042918ec91532b6e2a6.mp4

-->



    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js"></script>
        <script src="{{ asset('js/welcome.js') }}"></script>
    <script src="{{ asset('js/typing.js') }}"></script>
    <script>

        $('.fullscreen-element').each(function(){
            $(this).css('height', $(window).height());
        });

        $('.content').each(function(){
            $(this).css('margin-top', $(window).height()/5);
        });

        document.onreadystatechange = function () {
            if (window.document.readyState === "interactive") {
                loading();
            }
            if (document.readyState === "complete") {
                setTimeout('completed()', 1000);
                //completed();
            }
        }
        function loading() {
            $('.loader').show();
            return;
        }
        function completed() {
            $('.loader').hide();
        }

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
    </body>
</html>
