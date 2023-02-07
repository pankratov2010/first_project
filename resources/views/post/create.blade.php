@extends('layouts.app')

@section('content')
<form action="{{ route('post.store')}}" method="post">
    @csrf
    <div>
        <a href="{{ route('post.index') }}" class="btn btn-primary mb-3">Назад</a>
    </div>

    <button type="submit" class="btn btn-primary mb-3">Создать</button>

    <div class="form-group">
        <label for="title">Заголовок</label>
        <input value="{{ old('title') }}" type="text" name="title" class="form-control" id="title" placeholder="Добавьте сюда заголовок поста">
        @error('title')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">Контент</label>
        <textarea type="text" name="content" class="form-control" id="content" placeholder="Добавьте сюда контент поста">{{ old('content') }}</textarea>
        @error('content')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Описание</label>
        <textarea type="text" name="description" class="form-control" id="description" placeholder="Добавьте сюда описание поста">{{ old('description') }}</textarea>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="image">Изображение</label>
        <input type="text" name="image" class="form-control" id="image" placeholder="Добавьте сюда изображение поста">
    </div>

    <div class="form-group">
        <label for="category">Категория</label>
        <select class="form-control" id="category" name="category_id">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="tags">Теги</label>
        <select multiple class="form-control" id="tags" name="tags[]">
            @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>
    </div>

</form>
@endsection