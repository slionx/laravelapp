@extends('admin.layouts.app')
@section('title','分类')
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
                        <a href="{{ route('dashboard.index') }}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}">用户</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>添加用户</span>
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
                   @if (session('success'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-block alert-danger fade in">
                            <button type="button" class="close" data-dismiss="alert"></button>
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                @endif
                <!-- BEGIN PORTLET-->
                    <div class="portlet light form-fit bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-social-dribbble font-dark"></i>
                                <span class="caption-subject font-dark bold uppercase">添加用户</span>
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
                            <form action="{{ route('user.store') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-sm-3 control-label">{{ trans( 'common.name' ) }}</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('name') ? ' fa fa-warning tooltips' : '' }}" data-original-title="昵称为必填项，最大长度255"></i>
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="用户名">
                                            <span  class="help-block">{{ $errors->has('name') ? ' 昵称为必填项，最大长度255' : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="parentid" class="col-sm-3 control-label">邮箱</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('email') ? ' fa fa-warning tooltips' : '' }}" data-original-title="邮箱为必填项"></i>
                                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="parentid" placeholder="邮箱">
                                            <span  class="help-block">{{ $errors->has('email') ? ' 邮箱为必填项' : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="display_name" class="col-sm-3 control-label">密码</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('password') ? ' fa fa-warning tooltips' : '' }}" data-original-title="密码为必填项"></i>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="密码">
                                            <span  class="help-block">{{ $errors->has('password') ? ' 显示名称为必填项，序号只能为数字。' : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password_confirmation" class="col-sm-3 control-label">确认密码</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('password_confirmation') ? ' fa fa-warning tooltips' : '' }}" data-original-title="确认密码为"></i>
                                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="确认密码">
                                            <span  class="help-block">{{ $errors->has('repassword') ? $error : '' }}</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group {{ $errors->has('avatar') ? ' has-error' : '' }}">
                                    <label for="sort" class="col-sm-3 control-label">头像</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('avatar') ? ' fa fa-warning tooltips' : '' }}" data-original-title="头像为必填项"></i>
                                            <input type="file" name="avatar" value="{{ old('avatar') }}" class="form-control" id="avatar" placeholder="头像">
                                            <span  class="help-block">{{ $errors->has('avatar') ? ' 头像为必填项。' : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">
                                                <i class="fa fa-check"></i> 提交</button>
                                            <button type="button" class="btn btn-outline grey-salsa">取消</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
            </div>
        </div>
    </div>
@stop
@section('theme_layout_scripts')
@stop