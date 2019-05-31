<!DOCTYPE html>
<html lang="en">
    <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
             @yield('title','Blog')
         </title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/blog.css">
         
    </head>
    <body>
        @include('partials.header')

        @if($flash = session('message'))
            <div class="alert alert-success" role="alert">
                {{ $flash }}
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-sm-8 blog-main">
                    @yield('content')
                </div>
                <div class="col-sm-3 offset-sm-1 blog-sidebar">
                        @include('partials.sidebar')
                </div>       
            </div>
        </div>
        @include('partials.footer')
    </body>
</html>