@extends('auth.account')
@section('title')
    Reset Password
@endsection
@section('panel-body')
    <div class="panel-body" style="padding: 40px;">
        <form name="login-form" class="nobottommargin" method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <h3>Reset Password</h3>
            <div class="col_full {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">E-Mail Address:</label>
                <input type="text" id="email" name="email" class="form-control not-dark"  value="{{ $email or old('email') }}" required autofocus />
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col_full {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control not-dark" required />
                @if ($errors->has('password'))
                    <span class="help-block">
                         <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col_full {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm">Confirm Password:</label>
                <input type="password" id="password-confirm" name="password_confirmation" class="form-control not-dark" required />
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                         <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col_full center nobottommargin">
                    <button class="button button-3d button-xlarge button-rounded" type="submit">Reset Password</button>
            </div>
        </form>
    </div>
@endsection
