@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Профиль пользователя</h1>

        <div class="card">
            <div class="card-body">
                <img src="#" width="100px">
                <p class="card-text">Имя - {{ auth()->user()->firs_name }}</p>
                <p class="card-text">Фамилия - {{ auth()->user()->last_name }}</p>
            </div>
        </div>
    </div>

@endsection
