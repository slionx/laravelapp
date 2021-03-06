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
                        <a href="#">分类</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>添加分类</span>
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
                                <span class="caption-subject font-dark bold uppercase">添加分类</span>
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
                            <form action="{{ route('menu.store') }}" method="post" class="form-horizontal form-bordered">
                                <div class="form-group {{ $errors->has('menu_name') ? ' has-error' : '' }}">
                                    <label for="menu_name" class="col-sm-3 control-label">路径</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('menu_name') ? ' fa fa-warning tooltips' : '' }}" data-original-title="分类名称为必填项，最大长度255。"></i>
                                            <input type="text" name="menu_name" value="{{ old('menu_name') }}" class="form-control" id="menu_name" placeholder="路径">
                                            <span  class="help-block">{{ $errors->has('menu_name') ? ' 路径名称为必填项，最大长度255。' : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('display_name') ? ' has-error' : '' }}">
                                    <label for="display_name" class="col-sm-3 control-label">显示名称</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('display_name') ? ' fa fa-warning tooltips' : '' }}" data-original-title="排序为必填项，序号只能为数字。"></i>
                                            <input type="text" name="display_name" value="{{ old('display_name') }}" class="form-control" id="display_name" placeholder="显示名称">
                                            <span  class="help-block">{{ $errors->has('display_name') ? ' 显示名称为必填项，序号只能为数字。' : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('parentid') ? ' has-error' : '' }}">
                                    <label for="parentid" class="col-sm-3 control-label">父级id</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('parentid') ? ' fa fa-warning tooltips' : '' }}" data-original-title="排序为必填项，序号只能为数字。"></i>
                                            <input type="text" name="parentid" value="{{ old('parentid') }}" class="form-control" id="parentid" placeholder="父级id">
                                            <span  class="help-block">{{ $errors->has('parentid') ? ' 父级id为必填项，序号只能为数字。' : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('icon') ? ' has-error' : '' }}">
                                    <label for="sort" class="col-sm-3 control-label">图标</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('icon') ? ' fa fa-warning tooltips' : '' }}" data-original-title="排序为必填项，序号只能为数字。"></i>
                                            <input type="text" name="icon" value="{{ old('icon') }}" class="form-control" id="icon" placeholder="图标">
                                            <span  class="help-block">{{ $errors->has('icon') ? ' 排序为必填项。' : '' }}</span>
                                            <span  class="help-block">更多图标请查看 <a href="http://fontawesome.io/icons/" target="_black">Font Awesome</a></span>
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