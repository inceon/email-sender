@extends('layout.main')

@section('content')

    <div class="row">
        <table class="responsive-table centered striped col s12" id="emails">
            <thead>
            <tr>
                <th>E-mail</th>
                <th>Действия</th>
            </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop