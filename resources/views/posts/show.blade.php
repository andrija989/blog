@extends('layouts.master')

@section('title',$post->title)

@section('content')
    <h1>
        {{$post->title}}
    </h1>
    <p>
        {{$post->body}}
    </p>
    @if(count($post->comments))
        <h4>Comments</h4>
        <ul>
            @foreach ($post->comments as $comment)
                <li>
                    <p>
                        {{$comment->author}}
                    </p>
                    <p>
                        {{$comment->description}}
                    </p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

