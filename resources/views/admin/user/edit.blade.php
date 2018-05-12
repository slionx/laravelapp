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
                        <a href="{{ route('dashboard.index') }}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}">用户</a>
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
                            <form action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data" method="post" class="form-horizontal form-bordered">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-sm-3 control-label">昵称</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('name') ? ' fa fa-warning tooltips' : '' }}" data-original-title="昵称为必填项，最大长度255。"></i>
                                            <input type="text" name="name" value="{{ $user->name or old('name') }}" class="form-control" id="name" placeholder="昵称">
                                            <span  class="help-block">{{ $errors->has('name') ? $error : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-sm-3 control-label">邮箱</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('email') ? ' fa fa-warning tooltips' : '' }}" data-original-title="邮箱为必填项"></i>
                                            <input type="text" name="email" value="{{ $user->email or old('email') }}" class="form-control" id="email" placeholder="邮箱">
                                            <span  class="help-block">{{ $errors->has('email') ? $error : '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-sm-3 control-label">密码</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('password') ? ' fa fa-warning tooltips' : '' }}" data-original-title="密码"></i>
                                            <input type="text" name="password" value="{{ old('password') }}" class="form-control" id="password" placeholder="密码">
                                            <span  class="help-block">{{ $errors->has('password') ? $error : '' }}</span>
                                            <span class="help-block text-warning m-b-none">默认空为不修改密码</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password_confirmation" class="col-sm-3 control-label">确认密码</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('password_confirmation') ? ' fa fa-warning tooltips' : '' }}" data-original-title="确认密码"></i>
                                            <input type="text" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="确认密码">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('avatar') ? ' has-error' : '' }}">
                                    <label for="avatar" class="col-sm-3 control-label">头像</label>
                                    <div class="col-sm-4">
                                        <div class="input-icon right">
                                            <i class="{{ $errors->has('avatar') ? ' fa fa-warning tooltips' : '' }}" data-original-title="头像为必填项"></i>
                                            <img src="{{ $user->avatar }}" height="128">
                                            <input type="file" name="avatar" value="{{ old('avatar') }}" class="form-control" id="avatar" placeholder="头像">
                                            <span  class="help-block">{{ $errors->has('avatar') ? $error : '' }}</span>
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
                                                            <input type="checkbox" name="role[]" @if (in_array($role->id,$now_role))  checked="checked" @endif value="{{ $role->id }}" >
                                                            <ins class="iCheck-helper"></ins></div> {{ $role->slug }} [<a data-target="#myModal" data-toggle="modal" href="">查看角色权限</a>]
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
                                            <button type="reset" class="btn btn-danger">重置</button>
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