<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest',['except'=>'destroy']);
    }

    public function log()
    {
        return view('/auth.login');
    }

    public function store()
    {
        if(!auth()->attempt(request(['email','password']))) 
        {
            return back()->withErrors([
                'message' => 'Bad credentials. Please try again'
            ]);
        }
        
        return redirect('/posts');
    }

    public function destroy() 
    {
        auth()->logout();

        return redirect('/posts');
    }
}
