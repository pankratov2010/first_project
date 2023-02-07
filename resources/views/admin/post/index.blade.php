@extends('layouts.admin')

@section('content')
<div>
    <div>
        <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Добавить пост</a>
    </div>

    <div>
        @foreach($posts as $post)
        <div><a href="{{ route('post.show', $post->id) }}"> {{ $post->title }}</div></a>
        <div>{{$post->content}}</div>
        @endforeach
    </div>

    <div class="mt-3">
        {{ $posts->withQueryString()->links() }}
    </div>
</div>

@endsection