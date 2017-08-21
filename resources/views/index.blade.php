@extends('layout.main')

@section('content')

    <div class="row center">
        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
        @if (Auth::check())
            <h5>Has role: {{ $user->hasRole('Admin') ? 'Admin' : 'User' }}</h5>
        @endif
    </div>

@stop