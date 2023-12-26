@extends('layout.guest', ['title' => 'Вход в личный кабинет'])

@section('content')
    <h1>Вход</h1>
    <form method="post" action="{{ route('auth.auth') }}">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Адрес почты"
                   required maxlength="255" value="{{ old('email') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Ваш пароль"
                   required maxlength="255" value="">
        </div>
        <div class="form-group">
            <button type="submit">Войти</button>
        </div>
        <a href="./register">регистрация</a>
    </form>
@endsection