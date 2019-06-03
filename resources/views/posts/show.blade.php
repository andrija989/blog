@extends('layouts.master')

@section('title',$post->title)

@section('content')
    <h1>
        {{$post->title}}
    </h1>
    <p>
        {{$post->body}}
    </p>

    @if(count($post->tags))
            <ul>
                @foreach($post->tags as $tag)
                    <li>
                        <a href="/tag/{{$tag->id}}">{{ $tag->name }}</a>
                    </li>
                @endforeach
            </ul>
    @endif

    <p><b>{{"Post creator: ".$post->user['name']}}</b></p>
    @if(count($post->comments))
        <h4>Comments:</h4>
        <ul>
            @foreach ($post->comments as $comment)
                <li>
                    <p class="comment">
                        Author: {{$post->author}}
                    </p>
                    <p>
                        {{$comment->description}}
                    </p class="comment">
                </li>
            @endforeach
        </ul>
    @endif

    <h4>Post a comment</h4>

    <form method="POST" action="{{route('comments-post', ['post_id' => $post->id])}}">
        @csrf

        
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" id="author" name="author"/>
            
        </div>

        <div class="form-group">
            <label for="description">Text</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <div class="form-control">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

