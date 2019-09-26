@extends('layouts.theme')
@section('title',"Edit Report")
@section('main-wrapper')
  <!-- main wrapper -->
  
  <section id="main-wrapper" class="main-wrapper">
    <div class="container-fluid">
       <div class="watchlist-main-block" style="margin-top: 40px;">
       	@if(isset($data))
       	@if(!is_null($data))
       	@foreach($data as $key => $item)
        {!! Form::model($item, ['method' => 'PATCH', 'action' => ['MyProgressController@update', $item->id]]) !!}
                
         <div class="row"   style="color: white;">
         	<div class="col-md-2">
            <div id="weight" class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                {!! Form::label('weight', 'Your Weight') !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your current weight"></i>
                {!! Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Weight']) !!}
                <small class="text-danger">{{ $errors->first('weight') }}</small>
            </div>
        </div>
        <div class="col-md-2">
             <div id="fat" class="form-group{{ $errors->has('fat') ? ' has-error' : '' }}">
                {!! Form::label('fat', 'Your Fat %') !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your current Fat%"></i>
                {!! Form::text('fat', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Fat %']) !!}
                <small class="text-danger">{{ $errors->first('fat') }}</small>
            </div>
        </div>
          <div class="col-md-2">
         <div id="fat" class="form-group{{ $errors->has('calorie') ? ' has-error' : '' }}">
                {!! Form::label('calorie', 'Your Calories') !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your Calories"></i>
                {!! Form::text('calorie', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Calories']) !!}
                <small class="text-danger">{{ $errors->first('calorie') }}</small>
            </div>
        </div>
            <br>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary btn-block">Update</button>
          </div>
           <div class="col-md-2">
                <button type="button" class="btn-danger btn btn-block" data-toggle="modal" data-target="#{{$item->id}}deleteModal">Delete</button>
           </div>
            {!! Form::close()!!}
      
       </div>
        <!-- Delete Modal -->
              <div id="{{$item->id}}deleteModal" class="delete-modal modal fade" role="dialog" style="margin-top: 40px;">
                <div class="modal-dialog modal-sm">
                  <!-- Modal content-->
                  <div class="modal-content">
                    
                    <div class="modal-body text-center">
                      <h4 class="modal-heading" style="color: black;">Are You Sure ?</h4>
                      <p style="color: black;">Do you really want to delete these records? This process cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                      {!! Form::open(['method' => 'DELETE', 'action' => ['MyProgressController@destroy', $item->id]]) !!}
                          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-danger">Yes</button>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
              </div>
       	@endforeach
       	@endif
       		@endif
       </div>
   </div>
</section>

@endsection