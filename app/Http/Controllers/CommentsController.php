<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store($postId) {
        $post = Post::find($postId);

        $post->comments()->create(request()->all());

        return redirect()->route('single-post',['id'=>$postId]);
    }
    
    
}
