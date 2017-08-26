@extends('layout.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m6 offset-m3">
            <div class="panel panel-default">
                <h4 class="panel-heading center">Reset Password</h4>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="input-field">
                            <label for="email" class="{{ old('email') ? ' active' : '' }}">E-Mail Address</label>
                            <input id="email" type="email" class="{{ $errors->has('email') ? 'invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="input-field">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="{{ $errors->has('password') ? 'invalid' : '' }}" name="password" required>
                                @if ( $errors->has('password') )
                                    <div class="error">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="input-field">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="{{ $errors->has('password_confirmation') ? 'invalid' : '' }}" name="password_confirmation" required>

                            @if ($errors->has('password_confirmation'))
                                <div class="error">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </div>

                        <div class="col m6 offset-m3">
                            <button type="submit" class="btn btn-primary">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
