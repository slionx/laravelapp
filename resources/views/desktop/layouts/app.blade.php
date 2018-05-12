<!DOCTYPE html>
<html dir="ltr" lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Slionx" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('welcome/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/magnific-popup.css') }}" type="text/css" />

    {{--<link rel="stylesheet" href="{{ asset('welcome/css/swiper.css') }}" type="text/css" />--}}

    <link rel="stylesheet" href="{{ asset('welcome/css/responsive.css') }}" type="text/css" />
    <style>
        .plans-bg{
        background: url(/images/plans-bg.png) no-repeat 50% 0px;
        padding-bottom: 60px;
        }
    </style>


    <!-- Document Title
    ============================================= -->
    <title>@yield('title'){{ config('app.name', 'Slionx') }}</title>

</head>
<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">
    @include('desktop.layouts.header')

    <!-- Page Title
		============================================= -->
        <section id="page-title">

            <div class="container clearfix">
                <h1>Slionx</h1>
                <span>The quieter you become, the more you are able to hear.</span>
            </div>

        </section>
        <!-- #page-title end -->

        @yield('content')

        @include('desktop.layouts.footer')

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

</body>
</html>