@extends('layouts.admin')
@section('title','Create Group')
@section('content')
  <div class="admin-form-main-block">
    <h4 class="admin-form-text"><a href="{{url('admin/wishlist/usergroup')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Create User Group</h4>
    <div class="row">
      <div class="col-md-9">
        <div class="admin-form-block z-depth-1">
          {!! Form::open(['method' => 'POST', 'action' => 'WishListUserGroupController@store']) !!}
            <div id="title" class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', 'Group Title') !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter Froup title Eg:Crime Movies"></i>
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Please enter group title']) !!}
                <small class="text-danger">{{ $errors->first('title') }}</small>
            </div>
            <div class="form-group">
            @if(isset($user))
           {!! Form::label('title', 'Users') !!}
            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="select multiple users"></i>
            <select class="js-example-basic-multiple" name="user_id[]" multiple="multiple">
                @foreach($user as $users)
  <option value="{{$users->id}}">{{$users->name}}</option>
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
  $(".js-example-placeholder-single").select2({
    placeholder: "Select Users",
   
});
</script>
	
@endsection
