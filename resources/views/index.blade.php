@extends('layout.main')

@section('content')

    <div class="row">

        @if (Auth::guest())

            @include('auth.login')

        @else
            <h5 class="center">Has role: {{ $user->hasRole('Admin') ? 'Admin' : 'User' }}</h5>
            <form action="email" method="POST">

                {{ csrf_field() }}

                <table class="responsive-table centered striped col s12" id="emails">
                    <thead>
                    <tr>
                        <th>E-mail</th>
                        <th>Действия</th>
                    </tr>
                    </thead>

                    <tbody v-cloak>
                        <tr>
                            <td>
                                <input class="col m4 offset-m4 validate" placeholder="Email" type="email" name="email">
                            </td>
                            <td>
                                <button class="btn-floating waves-effect waves-light blue"><i class="material-icons">add</i></button>
                            </td>
                        </tr>

                        @foreach ($emails as $email)
                            <tr v-if="forms[{{ $email->id }}]">
                                <td>
                                    {{ method_field('PUT') }}

                                    <input name="id" type="hidden" value="{{ $email->id }}">
                                    <input class="col m4 offset-m4 validate"
                                           placeholder="Email"
                                           name="email"
                                           type="email"
                                           value="{{ $email->email }}">

                                </td>
                                <td>
                                    <button type="submit" class="btn-floating waves-effect waves-light blue"><i class="material-icons">save</i></button>
                                </td>
                            </tr>

                            <tr v-else>
                                <td>{{ $email->email }}</td>
                                <td>
                                    <button v-on:click="change({{ $email->id }})"
                                            class="btn-floating waves-effect waves-light green">
                                        <i class="material-icons">edit</i>
                                    </button>

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
            </form>
        @endif
    </div>

@stop