<div class="blog-header">
  <div class="container">
    <p class="lead blog-title" style="text-align: center">Blog-app.</p>
  </div>

  <div style="text-align: center">
    <a href="/posts" class="btn btn-primary">Posts</a>
    <a href="/register" class="btn btn-primary">Register</a>
    <a href="/login" class="btn btn-primary">Login</a>

    @if(Auth::check())
      <p>
        User: {{Auth()->user()->name}}
      </p>
      <a class="nav-link ml-auto" href="/logout">
        Logout
      </a>
    @endif
  </div>
</div>


