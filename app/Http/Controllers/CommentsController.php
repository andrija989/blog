<?php

namespace App\Http\Controllers;

use App\Post;
use App\Mail\CommentsRecived;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store($postId) {
        $post = Post::find($postId);

        $post->comments()->create(request()->all());

        \Mail::to($post->user)->send(new CommentsRecived($post));

        return redirect()->route('single-post',['id'=>$postId]);
    }
    
    
}
