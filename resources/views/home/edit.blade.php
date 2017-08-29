@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    {{--<div class="panel-heading">Dashboard仪表盘</div>--}}



                    <div class="panel-body">
                        <div class="col-md-8">
                            <div class="panel">
                                <div class="panel-heading">编辑信息</div>
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="panel-body">

                                    <form method="post" action="{{ url('user/upload/avatar') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label class="control-label">修改头像：</label>
                                            <input type="file" class="form-control" name="avatar" required="">
                                        </div>
                                        <button class="btn btn-primary" id="upload-button" type="submit">上传头像</button>
                                    </form>


                                        <form class="form-horizontal" action="{{ url('home/run_edit') }}" method="POST">
                                        {{ csrf_field() }}
                                            <label>昵称</label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" value="{{ $user->name }}" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label>真实姓名：</label>
                                                <input class="form-control" name="real_name" type="text" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>个人网站：</label>
                                                <input class="form-control" name="website" type="text" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>描述：</label>
                                                <input class="form-control" name="description" type="text" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Github：</label>
                                                <input  class="form-control" name="github" type="text"
                                                        value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Facebook：</label>
                                                <input class="form-control" name="facebook" type="text"
                                                       value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Weibo：</label>
                                                <input class="form-control" name="weibo" type="text" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Twitter：</label>
                                                <input class="form-control" name="twitter" type="text" value="">
                                            </div>


                                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label text-right">新密码</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                <strong>{{ trans($errors->first('password')) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label text-right">确认新密码</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password_confirmation" required>

                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                                <strong>{{ trans($errors->first('password_confirmation')) }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>--}}
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button style="submit" class="btn btn-primary">修改</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
