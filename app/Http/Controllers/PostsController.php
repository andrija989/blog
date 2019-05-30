<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::published();
        if(Auth::check()) {
            return view('posts.index',compact('posts'));
        }
        return view('auth.login');
    }

    public function show($id)
    {
        $post = Post::with('comments')->find($id);
        \Log::info($post);
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
