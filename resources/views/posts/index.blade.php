@extends('layouts.master')

@section('title','List of posts')

@section('content')

    <ul>
        @foreach ($posts as $post)
        <li>
           <a href="{{'/posts/'. $post->id}}">
            {{$post->title}}
            </a>
        @if($post->user_id)
            <a href="/users/{{$post->user_id}}"> {{"Post creator:".$post->user['name']}}</a>
        @endif
        </li>
        @endforeach
    </ul>

    <nav class="blog-pagination">
        <a class="btn btn-outline-{{ $posts->currentPage() === 1 ? 'disabled' : 'primary' }}" 
            href="{{ $posts->previousPageUrl() }}">
            Previous
        </a>

        <a class="btn btn-outline-{{ $posts->hasMorePages() ? 'primary' : 'disabled' }}" 
            href="{{ $posts->nextPageUrl() }}">
            Next
        </a>
    </nav>

    Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}

    <a href="/posts/create" class="btn btn-primary">Create New Post</a>
@endsection



