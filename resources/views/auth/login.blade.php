@extends('layout.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m6 offset-m3">
            <div class="panel panel-default">
                <h4 class="panel-title center">Login</h4>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="input-field">
                            <label for="email" class="{{ old('email') ? ' active' : '' }}">E-Mail Address</label>
                            <input id="email" type="email" class="{{ $errors->has('email') ? 'invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="input-field">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="validate" name="password" required>
                            @if ($errors->has('password'))
                                <div class="error">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <div class="col">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Remember Me</label>
                        </div>

                        <div class="col offset-m1">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
