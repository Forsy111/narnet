@extends('layout.app', ['title' => 'Личный кабинет'])

@section('content')

<h1>Мои заявления</h1>

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
        <p>Гос. номер авто нарушителя</p>
        <p style="text-transform: uppercase;">{{ $post->gos_num }}</p>
    </div>
    <div class="">
        <details class="">
            <summary class="" style="cursor: pointer;">Описание правонарушения</summary>
            <p style="word-wrap: break-word;">{{ $post->desc }}</p>
        </details>
    </div>
    <div class="block-item" style="margin-top: 1rem">
        <form action="{{route('user.statment.destroy', ['id'=>$post->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <input type="hidden" name="post_id" value="$post->id" />
            <button class="ml-4">
                {{ __('Удалить') }}
            </button>
        </form>
    </div>
</div>
@endforeach
@endsection