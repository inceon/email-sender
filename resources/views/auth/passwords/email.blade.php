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

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="input-field">
                            <label for="email" class="{{ old('email') ? ' active' : '' }}">E-Mail Address</label>
                            <input id="email" type="email" class="{{ $errors->has('email') ? 'invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="col m6 offset-m3">
                            <button type="submit" class="btn btn-primary">
                                Send Password Reset Link
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
