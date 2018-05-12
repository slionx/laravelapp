@extends('auth.account')
@section('title')
    Register
@endsection
@section('panel-body')
    <div class="panel-body" style="padding: 40px;">
        <form name="login-form" class="nobottommargin" action="{{ route('register') }}" method="post">
            {{ csrf_field() }}
            <h3>Register your Account</h3>
            <div class="col_full {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="register-form-name">Name:</label>
                <input type="text" id="register-form-name" name="name" class="form-control not-dark" value="{{ old('name') }}" required
                       autofocus/>
                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="col_full {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="register-form-email">E-Mail Address:</label>
                <input type="text" id="register-form-email" name="email" class="form-control not-dark" value="{{ old('email') }}" required/>
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="col_full {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="register-form-password">Password:</label>
                <input type="password" id="register-form-password" name="password" class="form-control not-dark" value="{{ old('password') }}" required/>
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="col_full">
                <label for="register-form-password_confirmation">Confirm Password:</label>
                <input type="password" id="register-form-password_confirmation" name="password_confirmation"
                       class="form-control not-dark" required/>
            </div>

            <div class="col_full center nobottommargin">
                <button class="button button-3d nomargin  button-rounded" id="register-form-submit" name="login-form-submit" type="submit">
                    Register
                </button>
            </div>
        </form>

        <div class="line line-sm"></div>

        <div class="center">
            <h4 style="margin-bottom: 15px;">or login:</h4>
            <a href="{{ url('/login') }}" class="button button-3d button-xlarge button-rounded">Login Now</a>
            {{--            <a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
                        <span class="hidden-xs">or</span>
                        <a href="#" class="button button-rounded si-twitter si-colored">Twitter</a>--}}
        </div>
    </div>
@endsection