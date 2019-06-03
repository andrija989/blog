<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show($id)
    {
        $tag = Tag::with('posts')->findOrfail($id);

        return view('tags.show',compact('tag'));
    }

}
