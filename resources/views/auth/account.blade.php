<!DOCTYPE html>
<html dir="ltr" lang="{{ app()->getLocale() }}">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />


    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/magnific-popup.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('welcome/css/responsive.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('welcome/css/radio-checkbox.css') }}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>@yield('title') | Slionx</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap nopadding">

            <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('{{ asset('welcome/images/7.jpg') }}') center center no-repeat; background-size: cover;"></div>

            <div class="section nobg full-screen nopadding nomargin">
                <div class="container vertical-middle divcenter clearfix">

                    <div class="row center">
                        <h1><a href="{{ url('/') }}"><span class="label label-default">Slionx</span></a></h1>
                        {{--<a href="index.html"><img src="images/logo-dark.png" alt="Canvas Logo"></a>--}}
                    </div>

                    <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px; background-color: rgba(255,255,255,0.7);">

                        @yield('panel-body')

                    </div>

                    {{--<div class="row center dark"><small>Copyrights &copy; All Rights Reserved by Canvas Inc.</small></div>--}}

                </div>
            </div>

        </div>

    </section><!-- #content end -->

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