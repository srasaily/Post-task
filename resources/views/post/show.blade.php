@extends('layouts.main')

@section('content')
  <h1>Posts</h1>
  <div class="well well-lg">
    <div class="well well-sm">
      <h2>{{ $post->title }}</h2>
      {{ $post->body }}
    </div>

   <div class="well">
     {!! Form::open(['route' => ['comments.store', $post->id], 'method' => 'post', 'id' => 'commentForm']) !!}

     <div class="row">
       <div class="form-group">
         {!! Form::textarea('comment', null , ['class' => 'form-control', 'id' => 'comment', 'cols' => 60, 'rows' => 5]) !!}
       </div>

     </div>
     <button class="btn btn-primary" id="comment-btn" >Add Comment</button>

     {!! Form::close() !!}

   </div>

    <div>
      <ul  id="comment-section" class="list-group">

          @foreach($post->comments as $comment)
            <li class="list-group-item justify-content-between">{{ $comment->comment }}
{{--              {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}--}}
              	<button type="button" class="btn btn-sm btn-danger delete" id="{{ $comment->id }}">Delete</button>
{{--              {!! Form::close() !!}--}}
            </li>
          @endforeach

      </ul>
    </div>

  </div>

@endsection

@section('script')

  <script>
    $(document).ready(function() {

      function listComments(res) {
        var ul = $('#comment-section');

        ul.append(`
                <li class="list-group-item justify-content-between">${res.res.comment}
                    <button type="button" id="${res.res.id}" class="btn btn-sm btn-danger delete">Delete</button>
                </li>
            `);

        $('#comment').val('');
      }

      $('#commentForm').submit(function(e) {
        e.preventDefault();
        $form = $(this);
        let comment = $('#comment').val();

        $.ajax({
          url: $form.attr('action'),
          type: "POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {'comment': comment},

          success: function(res) {
            // $('.hidden').show().removeClass('hidden');
            listComments(res);
          },
          error: function(e) {
            console.log(e);
          }
        });
      });

      $(document).on('click', '.delete', function() {
        var id = $(this).attr("id");
        console.log(id);
        if (confirm("Are you sure you want to delete?"))
        {
          $.ajax({
            url: "{{ route('comments.destroy') }}",
            type: "POST",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {'id': id },
            success: function() {
              
            }
          });
        }

      })

    });
  </script>

@endsection
