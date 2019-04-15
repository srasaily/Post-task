@extends('layouts.main')

@section('content')
  {!! Form::open(['route' => 'posts.store', 'method' => 'post']) !!}
    @csrf

    <div class="row">
      <div class="form-group">
        {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title...', 'required']) !!}
        @if ($errors->has('title'))
            <span style="color: red;">{{ $errors->first('title') }}</span>
        @endif
      </div>
    </div>

    <div class="row">
      <div class="form-group">
        {!! Form::label('body', 'Body', ['class' => 'control-label']) !!}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Post...', 'rows' => 5, 'required']) !!}
        @if ($errors->has('body'))
          <span style="color: red;">{{ $errors->first('body') }}</span>
        @endif
      </div>
    </div>

    <button class="btn btn-primary">Post</button>

  {!! Form::close() !!}
@endsection