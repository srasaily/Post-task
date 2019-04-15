@extends('layouts.main')

@section('content')
  <h1>Posts</h1>
  <div class="well well-lg">
    <div class="well well-sm">
      <h2>{{ $post->title }}</h2>
      {{ $post->body }}
    </div>

   <div class="well">
     <div class="hidden" id="comment"></div>
     {!! Form::open(['route' => ['comments.store', $post->id], 'method' => 'post']) !!}

     <div class="row">
       <div class="form-group">
         @csrf
         {!! Form::textarea('comment', null , ['class' => 'form-control','cols' => 60, 'rows' => 5]) !!}
       </div>

     </div>
     <button class="btn btn-primary">Add Comment</button>

     {!! Form::close() !!}
   </div>

  </div>

@endsection