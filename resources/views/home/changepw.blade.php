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
                            <div class="panel-heading">重置密码</div>
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <div class="panel-body">
                                <form class="form-horizontal" action="{{ url('home/changepw') }}" method="POST">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label text-right">旧密码</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="old_password" required>

                                            @if ($errors->has('old_password'))
                                                <span class="help-block">
                                            <strong>{{ trans($errors->first('old_password')) }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
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
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button style="submit" class="btn btn-primary">更改密码</button>
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
