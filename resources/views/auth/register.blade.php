@extends('layout.guest', ['title' => 'Регистрация'])

@section('content')
<div class="auth-form">
    <h1>Регистрация</h1>
    <form method="post" action="{{ route('auth.register') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="login" placeholder="Логин"
                   required maxlength="255" value="{{ old('login') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Имя, Фамилия"
                   required maxlength="255" value="{{ old('name') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="tel" placeholder="Телефон"
                   required maxlength="255" value="{{ old('tel') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Адрес почты"
                   required maxlength="255" value="{{ old('email') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Придумайте пароль"
                   required maxlength="255" value="">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password_confirmation"
                   placeholder="Пароль еще раз" required maxlength="255" value="">
        </div>
        <div class="form-group">
            <button type="submit" class="form-button">Регистрация</button>
        </div>
        
    </form>
    <form method="GET" action="{{ route('auth.login') }}">
                @csrf

                <button>
                авторизация
                </button>
            </form>
    </div>
@endsection