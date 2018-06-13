@extends('layouts.blog-post')


@section('content')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted created {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : $post->photoPlaceholder()}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{!! $post->body !!}</p>

    <hr>


    <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://gamexs-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<script id="dsq-count-scr" src="//gamexs-1.disqus.com/count.js" async></script>


    {{--

    @if(Session::has('comment_msg'))
      <p class="bg-info">{{session('comment_msg')}}</p>
    @endif --}}

    {{-- <!-- Blog Comments -->
  @if(Auth::check())
    <!-- Comments Form -->
    <div class="well">

        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
        <div class="form-group">
          <input type="hidden" name="post_id" value="{{$post->id}}">

          {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
        </div>
        <div class="form-group">
          {!! Form::submit('Submit comment', null, ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

    </div>
  @endif
    <hr> --}}

    {{-- <!-- Posted Comments -->
@if($comments)
  @foreach ($comments as $comment)
    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img height="64"class="media-object" src="{{Auth::user()->gravatar}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            <p>{{$comment->body}}</p>


            <!-- Nested Comment -->
                @foreach ($comment->replies as $reply)
                  @if($reply->is_active == 1)

                      <div id="nested-comment" class="media">
                          <a class="pull-left" href="#">
                              <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                          </a>
                          <div class="media-body">
                              <h4 class="media-heading">{{$reply->author}}
                                  <small>{{$reply->created_at->diffForHumans()}}</small>
                              </h4>
                            <p>{{$reply->body}}</p>
                          </div>
                      </div>
                  @endif
                @endforeach
                <div id="nested-comment" class="comment-reply-container">
                  <button type="button" name="button" class="toggle-reply btn btn-primary pull-right">Reply</button>

                    <div class="comment-reply col-sm-9">
                        {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                          <div class="form-group">
                          {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>2]) !!}
                          </div>
                          <div class="form-group">
                          {!! Form::submit('Submit reply', ['class'=>'btn btn-primary']) !!}
                          </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            <!-- End Nested Comment -->

        </div>
    </div>
  @endforeach
@endif --}}

@stop

@section('sidebar')

  <!-- Blog Sidebar Widgets Column -->
  <div class="col-md-4">

      <!-- Blog Search Well -->
      <div class="well">
          <h4>Blog Search</h4>
          <div class="input-group">
              <input type="text" class="form-control">
              <span class="input-group-btn">
                  <button class="btn btn-default" type="button">
                      <span class="glyphicon glyphicon-search"></span>
              </button>
              </span>
          </div>
          <!-- /.input-group -->
      </div>

      <!-- Blog Categories Well -->
      <div class="well">
          <h4>Blog Categories</h4>
          <div class="row">
              <div class="col-lg-6">
                  <ul class="list-unstyled">
                    @foreach ($categories as $category)
                      <li><a href="#">{{$category->name}}</a>
                      </li>
                    @endforeach

                  </ul>
              </div>

          </div>
          <!-- /.row -->
      </div>

      <!-- Side Widget Well -->
      <div class="well">
          <h4>Side Widget Well</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
      </div>

  </div>

@stop

@section('scripts')

    <script type="text/javascript">
        $(".comment-reply-container .toggle-reply").click(function(){

          $(this).next().slideToggle("fast");
        });

    </script>



@stop
