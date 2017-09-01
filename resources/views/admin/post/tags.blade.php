@extends('admin.layouts.app')

@section('theme_layout_styles')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="../global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="../global/plugins/typeahead/typeahead.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="../global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="../layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="../layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
@stop

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <div class="theme-panel hidden-xs hidden-sm">
                <div class="toggler"> </div>
                <div class="toggler-close"> </div>
                <div class="theme-options">
                    <div class="theme-option theme-colors clearfix">
                        <span> THEME COLOR </span>
                        <ul>
                            <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                            <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                            <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                            <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                            <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                            <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
                        </ul>
                    </div>
                    <div class="theme-option">
                        <span> Theme Style </span>
                        <select class="layout-style-option form-control input-sm">
                            <option value="square" selected="selected">Square corners</option>
                            <option value="rounded">Rounded corners</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Layout </span>
                        <select class="layout-option form-control input-sm">
                            <option value="fluid" selected="selected">Fluid</option>
                            <option value="boxed">Boxed</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Header </span>
                        <select class="page-header-option form-control input-sm">
                            <option value="fixed" selected="selected">Fixed</option>
                            <option value="default">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Top Menu Dropdown</span>
                        <select class="page-header-top-dropdown-style-option form-control input-sm">
                            <option value="light" selected="selected">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Mode</span>
                        <select class="sidebar-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Menu </span>
                        <select class="sidebar-menu-option form-control input-sm">
                            <option value="accordion" selected="selected">Accordion</option>
                            <option value="hover">Hover</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Style </span>
                        <select class="sidebar-style-option form-control input-sm">
                            <option value="default" selected="selected">Default</option>
                            <option value="light">Light</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Position </span>
                        <select class="sidebar-pos-option form-control input-sm">
                            <option value="left" selected="selected">Left</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Footer </span>
                        <select class="page-footer-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Components</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <a href="#">
                                    <i class="icon-bell"></i> Action</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-shield"></i> Another action</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-user"></i> Something else here</a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="#">
                                    <i class="icon-bag"></i> Separated link</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Bootstrap Tags Input
                <small>jquery plugin providing a twitter bootstrap user interface for managing tags</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <div class="note note-success">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h3>Bootstrap Tags Input</h3>
                        <p> jQuery plugin providing a Twitter Bootstrap user interface for managing tags. For more info please check out.
                            <a href="http://timschlechter.github.io/bootstrap-tagsinput/examples/" target="_blank">the official documentation</a>. </p>
                    </div>
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light form-fit bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-social-dribbble font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Bootstrap Tags Input</span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-cloud-upload"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-wrench"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="/admin/tag" class="form-horizontal form-bordered " method="post">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Tag States</label>
                                        <div class="col-md-9">
                                            <input type="text" value="" id="state_tagsinput">
                                            <div class="margin-top-10">
                                                <input type="text" class="form-control input-large" placeholder="Tag value" id="state_tagsinput_value"> </div>
                                            <div class="margin-top-10">
                                                <select class="form-control input-large" id="state_tagsinput_continent">
                                                    <option value="America">Continent...</option>
                                                    <option value="1">1</option
                                                    <option value="America">红色</option>
                                                    <option value="Europe">蓝色</option>
                                                    <option value="Australia">淡蓝色</option>
                                                    <option value="Africa">灰色</option>
                                                    <option value="Asia">黄色</option>
                                                </select>
                                            </div>
                                            <div class="margin-top-10">
                                                <input type="text" class="form-control input-large" placeholder="名称" id="state_tagsinput_city"> </div>
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn red" id="state_tagsinput_add">Add tag</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="button" class="btn green">
                                                <i class="fa fa-check"></i> Submit</button>
                                            <button type="button" class="btn default">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@stop

@section('theme_layout_scripts')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<script src="../global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="../global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../pages/scripts/components-bootstrap-tagsinput.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS TAGS -->
<script src="{{ asset('layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS TAGS -->
@stop