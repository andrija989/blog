@extends('layouts.master')

@section('title')
    @if($user)
        {{$user->name}}
    @endif
@endsection

@section('content')

@if($user || $user->posts)

    @foreach($user->posts as $post)
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