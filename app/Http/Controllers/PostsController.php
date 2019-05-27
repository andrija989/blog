<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::published();

        return view('posts.index',compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('/posts.show',compact('post'));
    }

    public function create()
    {
        return view('/posts.create');
    }

    public function store()
    {
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required|min:15'
        ]);
        $post = Post::create(request()->all());

        return redirect()->route('all-posts');
    }
}
