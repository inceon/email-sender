@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <h5 class="panel-heading center">Редактирование пользователя {{ $user->name }} (ID: {{ $user->id }})</h5>
                <div class="panel-body col m6 offset-m3">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.user.update', ['user' => $user->id]) }}">

                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="input-field">
                            <label for="name" class="active">Имя</label>
                            <input id="name"
                                   type="text"
                                   class="{{ $errors->has('name') ? 'invalid' : '' }}"
                                   name="name"
                                   value="{{ old('name') ? old('name') : $user->name}}"
                                   required
                                   autofocus>
                            @if ( $errors->has('name') )
                                <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="input-field">
                            <label for="email" class="active">E-Mail адресс</label>
                            <input id="email"
                                   type="email"
                                   class="{{ $errors->has('email') ? 'invalid' : '' }}"
                                   name="email"
                                   value="{{ old('email') ? old('email') : $user->email }}"
                                   required>
                            @if ( $errors->has('email') )
                                <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div>
                            @foreach($roles as $key => $role)
                                <p>
                                    <input type="checkbox"
                                           id="role{{ $key }}"
                                           name="roles[]"
                                           value="{{ $role->name }}"
                                           {{ $user->hasRole($role->name) ? 'checked' : ''}}
                                           class="filled-in"
                                    />
                                    <label for="role{{ $key }}">{{ $role->name }}</label>
                                </p>
                            @endforeach
                            @if ( $errors->has('roles') )
                                <p>
                                    <div class="error">{{ $errors->first('roles') }}</div>
                                </p>
                            @endif
                        </div>

                        <div class="input-field col m6 offset-m3">
                            <button type="submit" class="btn btn-primary">
                                Обновить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
