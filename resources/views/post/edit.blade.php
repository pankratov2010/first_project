@extends('layouts.app')

@section('content')
<form action="{{ route('post.update', $post->id)}}" method="post">
    @csrf
    @method('patch')
    <div>
        <a href="{{ route('post.index') }}" class="btn btn-primary mb-3">Назад</a>
    </div>

    <button type="submit" class="btn btn-primary mb-3">Обновить</button>

    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
        @error('title')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">Контент</label>
        <textarea type="text" name="content" class="form-control" id="content" placeholder="Content">{{ $post->content }}</textarea>
        @error('content')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Описание</label>
        <textarea type="text" name="description" class="form-control" id="description" placeholder="Description">{{ $post->description }}</textarea>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="image">Изображение</label>
        <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{ $post->image }}">
    </div>

    <div class="form-group">
        <label for="category">Категория</label>
        <select class="form-control" id="category" name="category_id">
            @foreach($categories as $category)
            <option {{ $category->id === $post->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="tags">Теги</label>
        <select multiple class="form-control" id="tags" name="tags[]">
            @foreach($tags as $tag)
            <option @foreach($post->tags as $postTag)
                {{ $tag->id === $postTag->id ? 'selected' : '' }}
                @endforeach
                value="{{ $tag->id }}">{{ $tag->title }}
            </option>
            @endforeach
        </select>
    </div>


</form>
@endsection