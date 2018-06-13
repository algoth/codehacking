@extends('layouts.admin')

@section('content')

  @if(Session::has('deleted_photo'))
    <p class="bg-danger">{{session('deleted_photo')}}</p>
  @elseif(Session::has('no_checkbox'))
    <p class="bg-info">{{session('no_checkbox')}}</p>
  @endif
  <h1>Media</h1>
  @if($photos)
    <form class="form-inline" action="delete/media" method="post">
      {{ csrf_field() }}
      {{-- {{method_field('delete')}} --}}
      <div class="form-group">
        <select class="form-control" name="checkBoxArray">
          <option value="">Delete</option>

        </select>
      </div>
      <div class="form-group">
        <input type="submit" name="delete_all" class="btn-primary">
      </div>

    <table class="table">
      <thead>
        <tr>
          <th><input type="checkbox" id="options"> </th>
          <th>ID</th>
          <th>Name</th>
          <th>Created Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($photos as $photo)
        <tr>
          <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"> </td>
          <td>{{$photo->id}}</td>
          <td><img height="100 "src="{{$photo->file ? $photo->file : 'No image'}}" alt="" class="img-rounded"></td>
          <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
          {{-- <td>
                  <div class="form-group">
                    <input type="submit" name="delete_single[{{$photo->id}}]" value="Delete" class="btn btn-danger">
                </div>
          </td> --}}
        </tr>
        @endforeach
      </tbody>
    </table>
    </form>
  @endif

@stop

@section('scripts')

  <script>

    $(document).ready(function(){

      $('#options').click(function(){
        if(this.checked){
          $('.checkBoxes').each(function(){
            this.checked = true;
          });
        }
        else{
          $('.checkBoxes').each(function(){
            this.checked = false;

          });
        }
      });
    });

  </script>


@stop
