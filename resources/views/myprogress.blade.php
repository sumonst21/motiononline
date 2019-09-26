@extends('layouts.theme')
@section('title',"My Progress")
@section('main-wrapper')
<!-- main wrapper -->

<section id="main-wrapper" class="main-wrapper">
  <div class="container-fluid">
   <div class="watchlist-main-block"><br><br>
    <h4>{{$header_translations->where('key', 'report')->first->value->value}}</h4><br><br>
    <div class="row">
      <div class="col-sm-2">
        <h5>{{$header_translations->where('key', 'weight')->first->value->value}}</h5></div>
        <div class="col-sm-1">
         <button class="btn btn-sm btn-primary"><a style="color: #fff;" type ="button" href="{{route('editchart')}}">Edit {{$header_translations->where('key', 'weight')->first->value->value}}</a></button> 
       </div>
     </div>
     <div class="row">
      <div class="col-md-9 col-sm-12">
        <div class="panel-body">  

          {!! $chart->html() !!}
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div style="color: white;">

          {!! Form::open(['method' => 'POST', 'action' => 'MyProgressController@store']) !!}

          <div id="weight" class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
            {!! Form::label('weight', 'Your Weight') !!}
            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your current weight"></i>
            {!! Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Weight']) !!}
            <small class="text-danger">{{ $errors->first('weight') }}</small>
          </div>
          <div id="fat" class="form-group{{ $errors->has('fat') ? ' has-error' : '' }}">
            {!! Form::label('fat', 'Your Fat %') !!}
            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your current Fat%"></i>
            {!! Form::text('fat', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Fat %']) !!}
            <small class="text-danger">{{ $errors->first('fat') }}</small>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Submit</button>
          
          {!! Form::close()!!}
        </div>

      </div>
    </div><br><br>
    <div class="row">
      <div class="col-md-9 col-sm-12">
        <div class="panel-body">    
          {!! $caloriechart->html() !!}
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div style="color: white;">
          {!! Form::open(['method' => 'POST', 'action' => 'MyProgressController@store']) !!}

          <div id="fat" class="form-group{{ $errors->has('calorie') ? ' has-error' : '' }}">
            {!! Form::label('calorie', 'Your Calories') !!}
            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your Calories"></i>
            {!! Form::text('calorie', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Calories']) !!}
            <small class="text-danger">{{ $errors->first('calorie') }}</small>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Submit</button>
          
          {!! Form::close()!!}
        </div>

      </div>
    </div><br><br>
     <div class="row">
      <div class="col-sm-2">
        <h5>{{$header_translations->where('key', 'excercise')->first->value->value}}</h5></div>
        <div class="col-sm-1">
         <button class="btn btn-sm btn-primary"><a style="color: #fff;" type ="button" href="{{route('editexercisechart')}}">Edit {{$header_translations->where('key', 'excercise')->first->value->value}}</a></button> 
       </div>
     </div>
   
    <div class="row">
      <div class="col-md-9 col-sm-12">
        <div class="panel-body">
          @if(isset($exchart))    
          {!! $exchart->html() !!}
          @endif
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div style="color: #bdc3c7;">
          {!! Form::open(['method' => 'POST', 'action' => 'MyProgressController@storeexcercise']) !!}

          <div id="exercise_id" class="form-group{{ $errors->has('exercise_id') ? ' has-error' : '' }}">
            {!! Form::label('exercise_id', 'Select Exercise') !!}
            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Select Exercise"></i><br>
            <select class="form-control" id="exercise_id"  name="exercise_id" >
              @foreach($myexercise as $exer)
              <option style="color: black;" value="{{$exer->id}}">{{$exer->name}}</option>
              @endforeach
            </select>
            <small class="text-danger">{{ $errors->first('exercise_id') }}</small>
          </div>


          <div id="value" class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
            {!! Form::label('value', 'Counts/Value') !!}
            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your Exercise Count or Weight lifted."></i>
            {!! Form::text('value', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Exercise Count or Weight lifted.']) !!}
            <small class="text-danger">{{ $errors->first('value') }}</small>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Submit</button>
          
          {!! Form::close()!!}
        </div>

      </div>
    </div>

    {{-- new excercises --}}
    @if(isset($myexercise2) && count($myexercise2)>0)
    <div class="row">
      <div class="col-md-9 col-sm-12">
        <div class="panel-body">
          @if(isset($exchart2))    
          {!! $exchart2->html() !!}
          @endif
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div style="color: #bdc3c7;">
          {!! Form::open(['method' => 'POST', 'action' => 'MyProgressController@storeexcercise']) !!}

          <div id="exercise_id" class="form-group{{ $errors->has('exercise_id') ? ' has-error' : '' }}">
            {!! Form::label('exercise_id', 'Select Exercise') !!}
            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Select Exercise"></i><br>
            <select class="form-control" id="exercise_id"  name="exercise_id" >
              @foreach($myexercise2 as $exer)
              <option style="color: black;" value="{{$exer->id}}">{{$exer->name}}</option>
              @endforeach
            </select>
            <small class="text-danger">{{ $errors->first('exercise_id') }}</small>
          </div>


          <div id="value" class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
            {!! Form::label('value', 'Counts/Value') !!}
            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your Exercise Count or Weight lifted."></i>
            {!! Form::text('value', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Exercise Count or Weight lifted.']) !!}
            <small class="text-danger">{{ $errors->first('value') }}</small>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Submit</button>
          
          {!! Form::close()!!}
        </div>

      </div>
    </div>
    @endif
  </div>
</div>
</section>
<!-- end main wrapper -->
@endsection

@section('script')
{!! Charts::scripts() !!}
{!! $chart->script() !!}

{!! $exchart->script() !!} 
{!! $exchart2->script() !!} 
{!! $caloriechart->script() !!} 

@endsection