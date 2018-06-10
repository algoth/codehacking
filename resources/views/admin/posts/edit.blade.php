@extends('layouts.admin')

@section('content')
  <h1>Edit Post</h1>

  <div class="col-sm-3">
    <img src="{{$post->photo ? $post->photo->file : 'http://placehold.com/400x400'}}" alt="" class="img-responsive">
  </div>

  <div class="col-sm-9">


    <div class="row">


      {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

      <div class="form-group">
        {!! Form::label('title', 'Title :') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('body', 'Content :') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('category_id', 'Category :') !!}
        {!! Form::select('category_id', [''=> 'Choose category'] + $categories, null, ['class'=>'form-control']) !!}
      </div>

      {{-- <div class="form-group">
        {!! Form::label('is_active', 'Status :') !!}
        {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), 0, ['class'=>'form-control']) !!}
      </div> --}}

      <div class="form-group">
        {!! Form::label('photo_id', 'File :') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
      </div>

      {{-- <div class="form-group">
        {!! Form::label('password', 'Password :') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
      </div> --}}

      <div class="form-group">
        {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-6']) !!}
      </div>

      {!! Form::close() !!}

      {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
      <div class="form-group">
        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}
      </div>
      {!! Form::close() !!}

    </div>



    <div class="row">
      @include('includes.errors')
    </div>

  </div>

@stop
