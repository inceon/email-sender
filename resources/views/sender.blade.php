@extends('layout.main')

@section('content')

    <div class="row">
        <form action="{{ route('sender.send') }}" method="POST" class="form-horizontal col m8 offset-m2">

            {{ csrf_field() }}

            <div class="input-field">
                <textarea id="template" name="template" class="materialize-textarea" ></textarea>
                <label for="template">Template</label>
            </div>

            @foreach ($emails as $email)
                <p>
                    <input type="checkbox"
                           id="email{{ $email->id }}"
                           name="emails[]"
                           value="{{ $email->email }}"
                           class="filled-in"
                    />
                    <label for="email{{ $email->id }}">{{ $email->email }}</label>
                </p>
            @endforeach

            <div class="input-field">
                <button type="submit" class="btn btn-primary col m8 offset-m2">
                    Отправить
                </button>
            </div>
        </form>
    </div>

@stop