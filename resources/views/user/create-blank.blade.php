@extends('layout.app', ['title' => 'Личный кабинет'])

@section('content')
<h1>Создать заявление</h1>
<form method="POST" action="{{ route('user.send') }}">
    @csrf

    <div class="form">
        <div>
            <p>Гос. номер авто</p>
            <input id="gos_num" class="block mt-1 w-full" style="text-transform: uppercase;" type="text" name="gos_num" placeholder="A000AA" maxlength="6" required autocomplete="gos_num" />
        </div>

        <div>
            <p>Описание</p>
            <textarea id="desc" class="block mt-1 w-full" type="text" name="desc" required autocomplete="desc">
            </textarea>
        </div>

        <div style="margin-top: 1rem">
            <button type="submit">
                Отправить
            </button>
        </div>
    </div>
</form>
@endsection