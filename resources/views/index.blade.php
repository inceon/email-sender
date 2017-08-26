@extends('layout.main')

@section('content')

    <div class="row">

        @if (Auth::guest())

            @include('auth.login')

        @else
            <h5 class="center">Has role: {{ $user->hasRole('Admin') ? 'Admin' : 'User' }}</h5>

            <table class="responsive-table centered striped col s12">
                <thead>
                <tr>
                    <th>E-mail</th>
                    <th>Действия</th>
                </tr>
                </thead>

                <tbody>
                    <form action="email" method="POST">
                        <tr>
                            <td>
                                {{ csrf_field() }}

                                <input class="col m4 offset-m4 validate" placeholder="Email" type="email" name="email">
                            </td>
                            <td>
                                <button class="btn-floating waves-effect waves-light blue"><i class="material-icons">add</i></button>
                            </td>
                        </tr>
                    </form>

                    @foreach ($emails as $email)
                        <tr>
                            <td>{{ $email->email }}</td>
                            <td>
                                <button class="btn-floating waves-effect waves-light green"><i class="material-icons">edit</i></button>
                                &nbsp;
                                <form method="POST" action="email/{{ $email->id }}" class="btn-floating">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <input name="id" type="hidden" value="{{ $email->id }}">
                                    <button type="submit" class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@stop