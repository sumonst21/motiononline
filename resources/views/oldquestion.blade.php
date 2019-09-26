@extends('layouts.theme')
@section('title',"Old Question")
@section('main-wrapper')
  <!-- main wrapper -->
  
  <section id="main-wrapper" class="main-wrapper">
    <div class="container-fluid">
       <div class="watchlist-main-block"><br><br>
     
      <div class="card" style="padding: 40px;">
         <div class="card-body">
        @if(isset($question) && count($question)>0)
         @foreach($question as $ques)
          <h5 class="card-title">Fecha : {{str_limit($ques->created_at, 10,' ')}}</h5>
       
        <p class="card-subtitle mb-2 text-muted" style="font-size: 18px; color: #286090">Pregunta: {{$ques->question}}?</p>
        @if(isset($ques->answer) && !is_null($ques->answer))
        <p style="font-size: 16px;">Respuesta: {{$ques->answer}}</p><hr>
        @else
         <p style="font-size: 16px;">Respuesta: Aun sin respuesta.</p><hr>
        @endif
         @endforeach
         @else
           <p style="font-size: 18px; color: #d63031">No Questions Asked!</p>
        @endif
      </div>
      {{ $question->links() }}
        </div>
    </div>
    </div>
  </section>
  <!-- end main wrapper -->
@endsection

@section('script')

@endsection