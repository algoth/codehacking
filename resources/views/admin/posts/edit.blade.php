@extends('layouts.admin')

@section('content')
  <h1>Edit Post</h1>

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
      {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
  </div>
  <div class="row">
    @include('includes.errors')
  </div>

@stop
