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

    <a href="/posts/create" class="btn btn-primary">Create New Post</a>
@endsection



