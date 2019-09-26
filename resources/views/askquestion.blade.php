@extends('layouts.theme')
@section('title',"Ask Question")
@section('main-wrapper')
  <!-- main wrapper -->
  
  <section id="main-wrapper" class="main-wrapper">
    <div class="container-fluid">
       <div class="watchlist-main-block"><br><br>
     
      <div class="row">
        @php
          $auth=Auth::user();
         $question=App\Question::where('user_id',$auth->id)->whereDate('created_at', '=', $date)->get();
        @endphp
      
         <div class="col-md-7 col-md-12">
          <div class="row">
        <div class="col-md-9">
          <h5>Tu ultima pregunta fue el {{str_limit($date, 10,' ')}}</h5>
        </div>
         <div class="col-md-3">
         <a href="{{url('askquestion/viewall')}}" class="btn btn-danger">Antiguas consultas</a>
        </div>
      </div> <hr>
        @if(isset($question) && count($question)>0)
         @foreach($question as $ques)
       
        <p style="font-size: 16px; color: #286090">Ques: {{$ques->question}}?</p>
        @if(isset($ques->answer) && !is_null($ques->answer))
        <p style="font-size: 16px;">Reply: {{$ques->answer}}</p>
        @else
         <p style="font-size: 16px;">Reply: No Reply Yet.</p>
        @endif
         @endforeach
         @else
           <p style="font-size: 18px; color: #d63031">No hay preguntas!</p>
        @endif
         </div>
          <div class="col-md-5 col-sm-9" >
                <div style="color: white;"style="position: sticky; top: 0;">
{!! Form::open(['method' => 'POST', 'action' => 'AskQuestionController@store', 'files' => true]) !!}
          <div id="question" class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                {!! Form::label('question', 'Preguntame!') !!}
                {!! Form::textarea('question', null, ['class' => 'form-control', 'placeholder' => 'Porfavor escribenos tus dudas']) !!}
                <small class="text-danger">{{ $errors->first('question') }}</small>
            </div>

              <button type="submit" class="btn btn-primary btn-block">Consultar</button>
          
            {!! Form::close()!!}
                </div>
            
              </div>
          </div>
    </div>
    </div>
  </section>
  <!-- end main wrapper -->
@endsection

@section('script')

@endsection