@extends('layouts.main')

@section('content')
  <div class="row">
    <div class="col-sm-12">
      <h1 class="display-3">Posts</h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <td>S.N</td>
            <td>Title</td>
            <td>Post</td>
            <td>Actions</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>
            <td>
              <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
            </td>
            <td>
              {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
              	<button class="btn btn-danger">Delete</button>
              {!! Form::close() !!}
            </td>
            <td>
              <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection