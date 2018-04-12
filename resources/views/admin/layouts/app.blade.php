<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>{{ config('blog.title') }} Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loader.css') }}" rel="stylesheet">
    @include('admin.layouts.css')
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div id="loader" class="loader"></div>
{{-- Navigation Bar --}}
{{--<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin/index">{{ config('blog.title') }} Admin</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">

        </div>
        <div class="page-container">

        </div>
    </div>
</nav>--}}
{{--@include('admin.partials.navbar')--}}
@include('admin.layouts.header')



<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        @include('admin.layouts.sidebar')
    </div>
    <!-- END SIDEBAR -->
@yield('content','暂无内容')
@include('admin.layouts.footer')
    <script>
        document.onreadystatechange = function () {
            if (document.readyState === "loading") {
                loading();
            }
            if (window.document.readyState === "interactive") {
                loading();
            }
            if (document.readyState === "complete") {
                completed();
            }
        }
        //加载中显示遮罩
        function loading() {
            $('.loader').show();
            return;
        }
        //加载完成，隐藏遮罩
        function completed() {
            $('.loader').hide();
        }
    </script>

@include('admin.layouts.scripts')
@yield('theme_layout_scripts','')

</body>
</html>