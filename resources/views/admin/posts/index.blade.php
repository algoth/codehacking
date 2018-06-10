@extends('layouts.admin')

@section('content')
  @if(Session::has('updated_post'))
    <p class="bg-info">{{session('updated_post')}}</p>
  @endif
  <h1>Posts</h1>
  <table class="table table-hover">
      <thead>
          <tr>
              <th>ID</th>
              <th>Photo</th>
              <th>Owner</th>
              <th>Category</th>
              <th>Title</th>
              <th>Content</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
      </thead>
      <tbody>
          @if($posts)
          @foreach ($posts as $post)
          <tr>
              <td>{{$post->id}}</td>
              <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/50x50'}}" alt="" class="img-rounded"></td>
              <td>{{$post->user->name}}</td>
              <td>{{$post->category_id}}</td>
              <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
              <td>{{$post->body}}</td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
          @endforeach
          @endif

      </tbody>
  </table>

@stop
