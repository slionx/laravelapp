@extends('auth.account')
@section('title')
    Reset Password
@endsection
@section('panel-body')

    <div class="panel-body" style="padding: 40px;">
        <form name="login-form" class="nobottommargin" action="{{ route('password.email') }}" method="post">
            {{ csrf_field() }}
            <h3>Reset Password</h3>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col_full {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="reset-form-email">E-Mail Address:</label>
                <input type="text"  name="email" id="reset-form-email" class="form-control not-dark"  value="{{ old('email') }}" required autofocus />
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="col_full center nobottommargin">
                <button type="submit" class="button button-3d button-rounded">Send Password Reset Link</button>
            </div>
        </form>
    </div>
@endsection
