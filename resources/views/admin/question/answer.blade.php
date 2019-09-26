@extends('layouts.admin')
@section('title','Answer')
@section('content')
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text">
      <a href="{{url('admin/question')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Answer</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">
          {!! Form::model($question, ['method' => 'PATCH', 'action' => ['AskQuestionController@update', $question->id]]) !!}
            <p class="inline info">Question:</p>
             <p style="color: #d63031">{{$question->question}}?</p>
            <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                {!! Form::label('answer', 'Your Answer') !!}
               
                {!! Form::textarea('answer', null, ['class' => 'form-control materialize-textarea', 'rows' => '5']) !!}
                <small class="text-danger">{{ $errors->first('answer') }}</small>
            </div>
            <div class="btn-group pull-right">
              <button type="submit" class="btn btn-success"><i class="material-icons left">reply</i> Reply</button>
            </div>
            <div class="clear-both"></div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
