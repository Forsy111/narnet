@extends('layout.guest', ['title' => 'Вход в личный кабинет'])

@section('content')
    <div class="auth-form">
    <h1>Вход</h1>
    <form method="post" action="{{ route('auth.auth') }}">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Адрес почты"
                   required maxlength="255" value="{{ old('email') ?? '' }}">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Ваш пароль"
                   required maxlength="255" value="">
        </div>
        <div class="form-group">
            <button type="submit" class="form-button">Войти</button>
        </div>
    </form>
    <form method="GET" action="{{ route('auth.register') }}">
                @csrf

                <button>
                регистрация
                </button>
            </form>
    </div>
@endsection