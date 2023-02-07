@extends('layouts.app')

@section('content')

<div>
    <a href="{{ route('post.index') }}" class="btn btn-primary mb-3">Назад</a>
</div>

<div>
    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary mb-3">Редактировать</a>
</div>

<div>
    <form action="{{ route('post.delete', $post->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" class="btn btn-primary mb-3" value="Удалить">
    </form>
</div>

<div>
    Номер поста
    <div>{{$post->id}}</div>
    Заголовок
    <div>{{$post->title}}</div>
    Контент
    <div>{{$post->content}}</div>
    Описание
    <div>{{$post->description}}</div>
    Изображение
    <div>{{$post->image}}</div>
    Лайки
    <div>{{$post->likes}}</div>
    Категория
    <div>{{$category->title}}</div>
    Теги
    @foreach($tags as $tag)
    <div>{{ $tag->title }}</div>
    @endforeach
</div>
@endsection