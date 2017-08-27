@extends('layout.main')

@section('content')

    <div class="row">
        <table class="responsive-table centered striped col s12" id="emails">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>E-mail</th>
                <th>Роль</th>
                <th>Действия</th>
            </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->getRoles() }}
                        </td>
                        <td>
                            <a class="btn-floating waves-effect waves-light green"
                               href="{{ route('admin.user.edit', ['user' => $user->id]) }}">
                                <i class="material-icons">edit</i>
                            </a>

                            &nbsp;

                            <form method="POST" action="{{ route('admin.user.delete', ['user' => $user->id]) }}" class="btn-floating red">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop