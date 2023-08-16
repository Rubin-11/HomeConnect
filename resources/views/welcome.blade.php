@extends('layouts.app')
@section('content')
    <h1>HomeConnect</h1>
    <p>Добро пожаловать на сервис взаимодействия с управляющей компанией</p>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('Вы вошли в систему!') }}
    </div>
@endsection

