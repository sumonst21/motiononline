@extends('layouts.admin')
@section('title','Create Group')
@section('content')
  <div class="admin-form-main-block">
    <h4 class="admin-form-text"><a href="{{url('admin/wishlist/videogroup')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Create Video Group</h4>
    <div class="row">
      <div class="col-md-9">
        <div class="admin-form-block z-depth-1">
          {!! Form::open(['method' => 'POST', 'action' => 'WishListUserVideoController@store']) !!}
            <div id="title" class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', 'Group Title') !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter Froup title Eg:Crime Movies"></i>
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Please enter group title']) !!}
                <small class="text-danger">{{ $errors->first('title') }}</small>
            </div>
            <div class="form-group">
@if(isset($movie))
 {!! Form::label('title', 'Movies') !!}
 <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="select multiple Movies"></i>
   <select id="movie" class="js-example-basic-multiple" name="movie_id[]" multiple="multiple">
     @foreach($movie as $movies)
  <option value="{{$movies->id}}">{{$movies->title}}</option>
  @endforeach
</select>
@endif

</div>
<div class="form-group">
 @if(isset($tvseries))
  {!! Form::label('title', 'Tv Series') !!}
  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="select multiple Tv Series"></i>
    <select id="tvseries" class="js-example-basic-multiple" name="tv_id[]" multiple="multiple">
     @foreach($tvseries as $tv)
  <option value="{{$tv->id}}">{{$tv->title}}</option>
  @endforeach
</select>

@endif
</div>
<br><br>
            <div class="btn-group pull-right">
              <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> Reset</button>
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Create</button>
            </div>

            <div class="clear-both"></div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
 
 
@endsection

@section('custom-script')
<script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
<script type="text/javascript">
  $("#movie").select2({
    placeholder: "Select Movies."
   
});</script>

<script type="text/javascript">
  $("#tvseries").select2({
    placeholder: "Select Tv Series."
   
});</script>
	
@endsection
