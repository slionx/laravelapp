@extends('auth.account')
@section('title')
    Login
@endsection
@section('panel-body')
    <div class="panel-body" style="padding: 40px;">
        <form name="login-form" class="nobottommargin" action="{{ route('login') }}" method="post">
            {{ csrf_field() }}
            <h3>Login to your Account</h3>
            <div class="col_full {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="login-form-email">email:</label>
                <input type="text"  name="email" class="form-control not-dark"  value="{{ old('email') }}" required autofocus />
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="col_full">
                <label for="login-form-password">Password:</label>
                <input type="password" id="login-form-password" name="password" class="form-control not-dark" required />
            </div>

            <div class="col_full nobottommargin">
                <button class="button button-3d nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                <div class="pull-right">
                    <div>
                        <input id="checkbox-10" class="checkbox-style" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                        <label for="checkbox-10" class="checkbox-style-3-label">Remember Me</label>
                    </div>
                    <div class="clearFloat"></div>
                    <a href="{{ route('password.request') }}" class="fright link">Forgot Password?</a>

                </div>


            </div>
        </form>

        <div class="line line-sm"></div>

        <div class="center">
            <h4 style="margin-bottom: 15px;">or register:</h4>
            <a href="{{ url('/register') }}" class="button button-3d button-xlarge button-rounded">Register Now</a>
{{--            <a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
            <span class="hidden-xs">or</span>
            <a href="#" class="button button-rounded si-twitter si-colored">Twitter</a>--}}
        </div>
    </div>
@endsection