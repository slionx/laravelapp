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
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">用户</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>修改用户</span>
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
                                <span class="caption-subject font-dark bold uppercase">修改用户</span>
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
                            <form action="{{ route('user.store') }}" method="post" class="form-horizontal form-bordered">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-sm-3 control-label">昵称</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('name') ? ' fa fa-warning tooltips' : '' }}" data-original-title="用户名为必填项，最大长度255。"></i>
                                            <input type="text" name="menu_name" value="{{ old('name') }}" class="form-control" id="name" placeholder="昵称">
                                            <span  class="help-block">{{ $errors->has('name') ? ' 路径名称为必填项，最大长度255。' : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('display_name') ? ' has-error' : '' }}">
                                    <label for="display_name" class="col-sm-3 control-label">密码</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('display_name') ? ' fa fa-warning tooltips' : '' }}" data-original-title="排序为必填项，序号只能为数字。"></i>
                                            <input type="text" name="display_name" value="{{ old('display_name') }}" class="form-control" id="display_name" placeholder="密码">
                                            <span  class="help-block">{{ $errors->has('display_name') ? ' 显示名称为必填项，序号只能为数字。' : '' }}</span>
                                            <span class="help-block text-warning m-b-none">默认空为不修改密码</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('parentid') ? ' has-error' : '' }}">
                                    <label for="parentid" class="col-sm-3 control-label">邮箱</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('parentid') ? ' fa fa-warning tooltips' : '' }}" data-original-title="排序为必填项，序号只能为数字。"></i>
                                            <input type="text" name="parentid" value="{{ old('parentid') }}" class="form-control" id="parentid" placeholder="邮箱">
                                            <span  class="help-block">{{ $errors->has('parentid') ? ' 父级id为必填项，序号只能为数字。' : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('icon') ? ' has-error' : '' }}">
                                    <label for="sort" class="col-sm-3 control-label">用户角色</label>
                                    <div class="col-sm-4">
                                        @foreach($roles as $role)
                                            <label class="checkbox-inline"><div class="i-checks">
                                                    <label class="">
                                                        <div class="icheckbox_square-green checked" style="position: relative;">
                                                            <input type="checkbox" name="role[]" checked="checked" value="{{ $role->id }}" >
                                                            <ins class="iCheck-helper"></ins></div> {{ $role->name }} [<a data-target="#myModal" data-toggle="modal" href="http://any.cn/admin/role/qln8XnvO">查看角色权限</a>]
                                                    </label>
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
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