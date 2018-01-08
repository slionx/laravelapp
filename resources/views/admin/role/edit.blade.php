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
                        <a href="#">{{ trans('common.role') }}</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>{{ trans('common.edit_role') }}</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                data-toggle="dropdown"> Actions
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
                            <li class="divider"></li>
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
                                <span class="caption-subject font-dark bold uppercase">{{ trans('common.edit_role') }}</span>
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
                            <form action="{{ route('role.edit') }}" method="post"
                                  class="form-horizontal form-bordered">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-sm-3 control-label">名称</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('name') ? ' fa fa-warning tooltips' : '' }}"
                                               data-original-title="分类名称为必填项，最大长度255。"></i>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                   class="form-control" id="name" placeholder="名称">
                                            <span class="help-block">{{ $errors->has('name') ? ' 名称为必填项，最大长度255。' : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                                    <label for="slug" class="col-sm-3 control-label">规则</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('slug') ? ' fa fa-warning tooltips' : '' }}"
                                               data-original-title="排序为必填项，序号只能为数字。"></i>
                                            <input type="text" name="slug" value="{{ old('slug') }}"
                                                   class="form-control" id="slug" placeholder="排序">
                                            <span class="help-block">{{ $errors->has('slug') ? ' 规则为必填项，最大长度255。' : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                                    <label for="slug" class="col-sm-3 control-label">权限</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <div class="table-scrollable">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th> 模块</th>
                                                        <th> 权限</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($permissionArray as $controller => $permission)
                                                        <tr>
                                                            <td> {{ $controller }} </td>
                                                            <td>
                                                                @if(is_array($permission))
                                                                    @foreach($permission as $k => $v)
                                                                        <div class="col-md-4">
                                                                            <div class="i-checks">
                                                                                <label>
                                                                                    <input type="checkbox" name="permission[]" @if(in_array($v['id'],$role_permissionArray)) checked @endif   > <i></i> {{ $v['name'] }}
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                    @endforeach


                                                                    <?php

                                                                    ?>

                                                                        {{--@if(array_key_exists($_name['id'],$permission))
                                                                            <input type="checkbox" checked
                                                                                   name="permission[]">{{ $permission[$_name['id']] }}

                                                                        @else
                                                                            --}}{{--<input type="checkbox" name="permission[]">--}}{{--1


                                                                        @endif--}}


                                                                @endif

                                                            </td>
                                                            {{--<td>
                                                                <span class="label label-sm label-success"> Approved </span>
                                                            </td>--}}
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">
                                                <i class="fa fa-check"></i> 提交
                                            </button>
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
