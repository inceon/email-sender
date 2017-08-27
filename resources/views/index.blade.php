@extends('layout.main')

@section('content')

    <div class="row">

        @if (Auth::guest())

            @include('auth.login')

        @else
            <h5 class="center">Has role: {{ Auth::user()->hasRole('Admin') ? 'Admin' : 'User' }}</h5>
            <form action="{{ route('email.store') }}" method="POST">

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
                                    <button type="button"
                                            v-on:click="change({{ $email->id }})"
                                            class="btn-floating waves-effect waves-light green">
                                        <i class="material-icons">edit</i>
                                    </button>

                                    &nbsp;
                                    <button type="button"
                                            v-on:click="deleteEmail({{ $email->id }}, '{{ csrf_token() }}')"
                                            class="btn-floating waves-effect waves-light red">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        @endif
    </div>

@stop