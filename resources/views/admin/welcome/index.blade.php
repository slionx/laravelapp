@extends('admin.layouts.app')
@section('title','前台管理')
@section('content')
    <link href="{{ asset('global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
        @include('admin.layouts.theme-panel')
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="{{ route('welcome.index') }}">{{ trans('common.welcome') }}</a>
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
            <h3 class="page-title"> Managed Datatables
                <small>managed datatable samples</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Managed Table</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                        <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                        <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form class="form-horizontal" action="{{ route('welcome.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="title">{{ trans('common.welcome') }}类型:</label>
                                    <div class="col-md-5">
                                        <select name="type"  class="form-control input-small input-inline">
                                            <option value="slide">幻灯</option>
                                            <option value="video">视频</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="title">视频地址:</label>
                                    <div class="col-md-5">
                                        <input type="text" name="videoAddress" class="form-control" @if(Cache::has('videoAddress')) value="{{ Cache::get('videoAddress') }}"  @else value="http://" @endif placeholder="http://"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="title">Align:</label>
                                    <div class="col-md-5">
                                        <select id="growl_align" class="form-control input-small input-inline">
                                            <option value="left">Left</option>
                                            <option value="right">Right</option>
                                            <option value="center">Center</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="title">Width:</label>
                                    <div class="col-md-5">
                                        <input id="growl_width" type="text" class="form-control input-small input-inline" value="250" placeholder="enter a width ..."> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="title">Allow dismiss ?</label>
                                    <div class="col-md-5">
                                        <div class="checkbox-list">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="glowl_dismiss" checked="" value="1"> </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="title">Life:</label>
                                    <div class="col-md-5">
                                        <select id="growl_delay" class="form-control input-small input-inline">
                                            <option value="5000">5 second</option>
                                            <option value="10000">10 seconds</option>
                                            <option value="12000">12 seconds</option>
                                            <option value="15000">15 seconds</option>
                                        </select>
                                        <span class="help-block"> Time while the message will be displayed. </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="title">Offset:</label>
                                    <div class="col-md-5">
                                        <select id="growl_offset" class="form-control input-small input-inline">
                                            <option value="top">Top</option>
                                            <option value="bottom">Bottom</option>
                                        </select>
                                        <input id="growl_offset_val" type="text" class="form-control input-small input-inline" value="100" placeholder="enter offset ..."> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="title"></label>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn red btn-lg" > Show Notification! </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    </div>
@stop
@section('theme_layout_scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('pages/scripts/table-datatables-managed.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('pages/scripts/table-datatables-managed.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>


 <script src="{{ asset('global/plugins/datatables/colResizable-1.5.min.js') }}" type="text/javascript"></script>
 <script type="text/javascript">


 </script>

@stop
