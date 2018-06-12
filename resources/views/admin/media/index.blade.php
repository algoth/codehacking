@extends('layouts.admin')

@section('content')

  @if(Session::has('deleted_photo'))
    <p class="bg-danger">{{session('deleted_photo')}}</p>
  @endif
  <h1>Media</h1>
  @if($photos)
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Created Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($photos as $photo)
        <tr>
          <td>{{$photo->id}}</td>
          <td><img height="100 "src="{{$photo->file ? $photo->file : 'No image'}}" alt="" class="img-rounded"></td>
          <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
          <td>
              {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}
                <div class="form-group">
                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                </div>
              {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @endif
@stop
