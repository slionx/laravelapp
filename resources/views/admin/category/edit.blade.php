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
                        <a href="#">{{ trans('common.category') }}</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>{{ trans('common.edit') }}{{ trans('common.category') }}</span>
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
                                <span class="caption-subject font-dark bold uppercase">{{ trans('common.edit') }}{{ trans('common.category') }}</span>
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
                            <form action="{{ route('category.update',$category->id) }}" method="post" class="form-horizontal form-bordered">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-sm-3 control-label">分类名称</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('name') ? ' fa fa-warning tooltips' : '' }}" data-original-title="分类名称为必填项，最大长度255。"></i>
                                            <input type="text" name="name" value="{{ old('name',$category->name) }}" class="form-control" id="name" placeholder="名称">
                                            <span  class="help-block">{{ $errors->has('name') ? ' 分类名称为必填项，最大长度255。' : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('sort') ? ' has-error' : '' }}">
                                    <label for="sort" class="col-sm-3 control-label">排序</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('sort') ? ' fa fa-warning tooltips' : '' }}" data-original-title="排序为必填项，序号只能为数字。"></i>
                                            <input type="text" name="sort" value="{{ old('sort',$category->sort) }}" class="form-control" id="sort" placeholder="排序">
                                            <span  class="help-block">{{ $errors->has('sort') ? ' 排序为必填项，序号只能为数字。' : '' }}</span>
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