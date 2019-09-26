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
        {!! Form::model($item, ['method' => 'PATCH', 'action' => ['MyProgressController@updateexercisechart', $item->id]]) !!}
                
         <div class="row"   style="color: white;">
         	<div class="col-md-2">
             <div id="exercise_id" class="form-group{{ $errors->has('exercise_id') ? ' has-error' : '' }}">
            {!! Form::label('exercise_id', 'Select Exercise') !!}
            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Select Exercise"></i><br>
            <select class="form-control" id="exercise_id"  name="exercise_id" >
              @foreach($myexercise as $exer)
              @if($exer->id==$item->exercise_id)
              <option style="color: black;" value="{{$exer->id}}" selected="true">{{$exer->name}}</option>
              @else
                <option style="color: black;" value="{{$exer->id}}">{{$exer->name}}</option>
              @endif
              @endforeach
            </select>
            <small class="text-danger">{{ $errors->first('exercise_id') }}</small>
          </div>
        </div>
        <div class="col-md-2">
            <div id="value" class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
            {!! Form::label('value', 'Counts/Value') !!}
            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your Exercise Count or Weight lifted."></i>
            {!! Form::text('value', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Exercise Count or Weight lifted.']) !!}
            <small class="text-danger">{{ $errors->first('value') }}</small>
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
                      {!! Form::open(['method' => 'DELETE', 'action' => ['MyProgressController@destroyex', $item->id]]) !!}
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