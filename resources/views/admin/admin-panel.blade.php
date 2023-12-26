@extends('layout.app', ['title' => 'Админ панель'])

@section('content')

<h1>Админ панель</h1>

@foreach($posts as $post)

<div class="block">
    <div class="block-item">
        <p>#{{ $post->id }}</p>
        @if($post->status_name === 'accept')
        <p style="color:green;">Подтверждено</p>
        @elseif($post->status_name === 'deny')
        <p style="color:red;">Отклонено</p>
        @else
        <p>На рассмотрении</p>
        @endif
    </div>
    <div class="block-item">
        <p>Имя отправителя:</p>
        <p>{{ $post->user->name }}</p>
    </div>
    <div class="block-item">
        <p>Гос. номер авто нарушителя</p>
        <p style="text-transform: uppercase;">{{ $post->gos_num }}</p>
    </div>
    <div class="">
        <details class="">
            <summary class="" style="cursor: pointer;">Описание правонарушения</summary>
            <p style="word-wrap: break-word;">{{ $post->desc }}</p>
        </details>
    </div>


    <div class="block-item">
        <div class="" style="margin-top: 1rem">
            <form action="{{route('admin-panel.destroy', ['id'=>$post->id])}}" method="POST">
                @method('DELETE')
                @csrf
                <input type="hidden" name="post_id" value="$post->id" />
                <button class="">
                    {{ __('Удалить') }}
                </button>
            </form>
        </div>

        <div class="block-item" style="margin-top: 1rem">
            @if($post->status_name === 'none')
            <form action="{{route('admin-panel.accept', ['id'=>$post->id])}}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="$post->id" />
                <button class="ml-4">
                    {{ __('Подтвердить') }}
                </button>
            </form>
            <form action="{{route('admin-panel.deny', ['id'=>$post->id])}}" method="post">
                @csrf
                <button class="ml-4">
                    {{ __('Отклонить') }}
                </button>
            </form>
            @else
            <form action="{{route('admin-panel.cancel', ['id'=>$post->id])}}" method="post">
                @csrf
                <button class="ml-4">
                    {{ __('Отменить') }}
                </button>
            </form>
            @endif
        </div>
    </div>

</div>
@endforeach
@endsection