@extends('layouts.admin')

@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

@stop
@section('content')
  <h1>Upload Media</h1>

  {!! Form::open(['method'=>'POST', 'action'=>'AdminMediaController@store', 'class'=>'dropzone', 'files'=>true]) !!}
    {{-- <div class="form-group">
      {!! Form::file('file', null, ['class'=>'dropzone']) !!}
    </div> --}}


  {!! Form::close() !!}
@stop

@section('scripts')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
@stop
