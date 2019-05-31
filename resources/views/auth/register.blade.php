@extends('layouts.master')

    @section('content')
        <h2 class="blog-post-title">Register</h2>
    
    <form method="POST" action="/register">
        {{ csrf_field()}}
    
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
    
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
    
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" class="form-control" id="age" name="age" required/>
        </div>
    
        <div class="form-group">
            <button type="submit" class="btn btn-primary"> Submit</button>
        </div>
    
    </form>
    
    @if (count($errors->all()) > 0)
    
        @foreach($errors->all() as $error)
        <div class="form-group">
            <div class="alert alert-danger">
                <li>{{$error}}</li>
            </div>
        </div>
        @endforeach
    
    @endif
    
    @endsection