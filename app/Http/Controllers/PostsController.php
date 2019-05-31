<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PostsController extends Controller
{
    public function __consturct()
    {
        $this->middleware('auth',['only' => ['create', 'store']]);
    }

    public function index()
    {
        $posts = Post::published();
        
        return view('posts.index',compact('posts'));
        
    }

    public function show($id)
    {
        $post = Post::with('comments')->find($id);
        \Log::info($post);
        return view('/posts.show',compact('post'));
    }

    public function create()
    {
        if(Auth::check()) {
            return view('/posts.create');
        }
        return view('auth.login');
        
    }

    public function store()
    {
        
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required|min:15'
        ]);
        $post = new Post();
        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->user()->id;
        $post->published = request('published');
        $post->save();


        return redirect()->route('all-posts');
    }
}
