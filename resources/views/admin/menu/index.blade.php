@extends('admin.layouts.app')
@section('title','分类')
@section('content')
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
                        <a href="index.html">主页</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>菜单</span>
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
            <h3 class="page-title"> Metronic Alerts API
                <small>metronic api for bootstrap alerts1</small>
            </h3>

            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-social-dribbble font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Demo</span>
                            </div>
                            <div class="actions">
                                <a class=" btn green btn-outline sbold" href="{{ route('menu.create') }}"> 添加菜单 </a>
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
                        <div class="portlet-body">
                            <div id="bootstrap_alerts_demo"></div>
                            <div class="widget-body">
                                {{--<a class="btn pull-right" role="button" data-toggle="modal" data-target="#add-category-modal">
                                    <i class="fa fa-folder-o"></i>
                                </a>--}}
                                <table class="table table-hover table-striped table-bordered table-responsive" style="overflow: auto;width: 65%;">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>索引</th>
                                        <th>名称</th>
                                        <th>父级id</th>
                                        <th>图标</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($result as $val)
                                        <tr>
                                            <td>{{ $val['id'] }}</td>
                                            <td>{{ $val['menu_name'] }}</td>
                                            <td>{{ $val['display_name'] }}</td>
                                            <td>{{ $val['parentid'] }}</td>
                                            <td>{{ $val['icon'] }}</td>
                                            <td>
                                                <div>
                                                    <a href="{{url('admin/menu/'.$val['id'].'/edit')}}" class="btn btn-info"
                                                       data-toggle="tooltip" data-placement="top" title="编辑">
                                                        <i class="fa fa-pencil fa-fw">编辑</i>
                                                    </a>
                                                    <button class="btn btn-danger swal-dialog-target"
                                                            data-toggle="tooltip" data-placement="top" title="删除"
                                                            data-url=""
                                                            data-dialog-msg="删除?">
                                                        <i class="fa fa-trash-o fa-fw">删除</i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>


                            </div>
                            {{--content--}}
                        </div>
                    </div>
                    {{--END PORTLET--}}
                </div>
            </div>

            @include('admin.modals.add-menu-modal')
        </div>
    </div>
    <!-- END CONTENT -->


@stop
@section('theme_layout_scripts')
@stop