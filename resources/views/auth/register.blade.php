@extends('layout.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="input-field">
                            <label for="name" class="{{ old('name') ? ' active' : '' }}">Имя</label>
                            <input id="name" type="text" class="{{ $errors->has('name') ? 'invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            @if ( $errors->has('name') )
                                <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="input-field">
                            <label for="email" class="{{ old('email') ? ' active' : '' }}">E-Mail адресс</label>
                            <input id="email" type="email" class="{{ $errors->has('email') ? 'invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            @if ( $errors->has('email') )
                                <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="input-field">
                            <label for="password">Пароль</label>
                            <input id="password" type="password" class="{{ $errors->has('password') ? 'invalid' : '' }}" name="password" required>
                            @if ( $errors->has('password') )
                                <div class="error">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Подтвердите пароль</label>
                            <input id="password-confirm" type="password" class="validate" name="password_confirmation" required>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
