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
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif


                @if(isset($home_bg_images) && $home_bg_images)
                    <div id="home-cover-slideshow">
                        @foreach ($home_bg_images as $image)
                            <div class="home-cover-img" data-src="{{ asset('storage') }}/{{ $image }}"></div>
                        @endforeach
                    </div>
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
                <div class="title m-b-md">
                    Slionx
                </div>
                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
        <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js"></script>
        <script src="{{ asset('js/welcome.js') }}"></script>
    </body>
</html>
