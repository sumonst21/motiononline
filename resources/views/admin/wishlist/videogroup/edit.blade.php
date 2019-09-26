@extends('layouts.admin')
@section('title','Edit Group')
@section('content')
  <div class="admin-form-main-block">
    <h4 class="admin-form-text"><a href="{{url('admin/wishlist/videogroup')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit Video Group</h4>
    <div class="row">
      <div class="col-md-9">
        <div class="admin-form-block z-depth-1">
         {!! Form::model($group, ['method' => 'PATCH', 'action' => ['WishListUserVideoController@update', $group->id]]) !!}
            <div id="title" class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', 'Group Title') !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter Group title Eg:Crime Movies"></i>
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Please enter group title']) !!}
                <small class="text-danger">{{ $errors->first('title') }}</small>
            </div>
           <div class="form-group">
              {!! Form::label('movies', 'Select Movies') !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Select Multiple Movies"></i>
            <select class="js-example-basic-multiple" name="movie_id[]" multiple="multiple">
               @if(isset($old_movie) && count($old_movie) > 0)
                      @foreach($old_movie as $old)
                        <option value="{{$old->id}}" selected="selected">{{$old->title}}</option> 
                      @endforeach
                    @endif
                    @if(isset($movie))
                      @foreach($movie as $movies)
                        <option value="{{$movies->id}}">{{$movies->title}}</option> 
                      @endforeach
                    @endif
               
</select>
</div>
 <div class="form-group">
              {!! Form::label('tvseries', 'Select Tv Series') !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Select Multiple Tv Series"></i>
            <select class="js-example-basic-multiple" name="tv_id[]" multiple="multiple">
               @if(isset($old_tv) && count($old_tv) > 0)
                      @foreach($old_tv as $tv)
                        <option value="{{$tv->id}}" selected="selected">{{$tv->title}}</option> 
                      @endforeach
                    @endif
                    @if(isset($tvseries))
                      @foreach($tvseries as $tvseriess)
                        <option value="{{$tvseriess->id}}">{{$tvseriess->title}}</option> 
                      @endforeach
                    @endif
               
</select>
</div>
<br><br>
            <div class="btn-group pull-right">
              <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> Reset</button>
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Update</button>
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
  
@endsection
