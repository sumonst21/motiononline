@extends('layouts.admin')
@section('title','Edit Group')
@section('content')
  <div class="admin-form-main-block">
    <h4 class="admin-form-text"><a href="{{url('admin/wishlist/usergroup')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit User Group</h4>
    <div class="row">
      <div class="col-md-9">
        <div class="admin-form-block z-depth-1">
         {!! Form::model($group, ['method' => 'PATCH', 'action' => ['WishListUserGroupController@update', $group->id]]) !!}
            <div id="title" class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', 'Group Title') !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter Froup title Eg:Crime Movies"></i>
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Please enter group title']) !!}
                <small class="text-danger">{{ $errors->first('title') }}</small>
            </div>
           
            <select class="js-example-basic-multiple" name="user_id[]" multiple="multiple">
               @if(isset($old_user) && count($old_user) > 0)
                      @foreach($old_user as $old)
                        <option value="{{$old->id}}" selected="selected">{{$old->name}}</option> 
                      @endforeach
                    @endif
                    @if(isset($user))
                      @foreach($user as $users)
                        <option value="{{$users->id}}">{{$users->name}}</option> 
                      @endforeach
                    @endif
               
</select>

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
