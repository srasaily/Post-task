<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Posts</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="{{ route('home') }}">Home</a>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('posts.index') }}">Posts <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('posts.create') }}">Create</a>
      </li>
    </ul>
{{--    <form class="form-inline mt-2 mt-md-0">--}}
{{--      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">--}}
{{--      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--    </form>--}}
  </div>
</nav>

  <div class="container">
      @yield('content')
  </div>

<script src="https://code.jquery.com/jquery-3.4.0.js"></script>
@yield('script')
{{--<script src="{{ asset('assets/js/jquery-1.11.2.min.js') }}"></script>--}}

</body>
</html>

