@extends('layouts.master')

@section('content')

<h2>Tag: {{$tag->name}}</h2>

@if($tag || $tag->posts)

    @foreach($tag->posts as $post)
    <div class="blog-post">
        <h2 class="blog-post-title">
            <a href="/posts/{{$post->id}}">{{ $post->title}}</a>
        </h2>
        <p>{{ $post->created_at->toFormattedDateString() }}</p>
        <div class="blog-post">
            {{ $post->body }}
        </div>

    </div>

    @endforeach
@endif

@endsection