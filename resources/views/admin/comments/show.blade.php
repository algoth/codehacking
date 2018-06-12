@extends('layouts.admin')

@section('content')
  @if(Session::has('comment_delete'))
    <p class="bg-info">{{session('comment_delete')}}</p>
  @endif
@if($comments)
  <h1>Comments</h1>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Email</th>
        <th>Body</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($comments as $comment)
      <tr>
        <td>{{$comment->id}}</td>
        <td>{{$comment->author}}</td>
        <td>{{$comment->email}}</td>
        <td>{{$comment->body}}</td>
        <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
        <td>
          @if($comment->is_active == 1)
              {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
              <input type="hidden" name="is_active" value="0">
              {!! Form::submit('Un-approve', ['class'=>'btn btn-primary']) !!}
              {!! Form:: close() !!}
              @else
              {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
              <input type="hidden" name="is_active" value="1">
              {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
              {!! Form:: close() !!}
          @endif
        </td>
        <td>
          {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
          {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
          {!! Form:: close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@else
  <h1 class="text-center">No Comments</h1>
@endif
@stop
