@extends('layouts.theme')
@section('title','Welcome')
@section('main-wrapper')
<!-- main wrapper -->

  

  <section id="main-wrapper" class="main-wrapper home-page">
    @if (isset($blocks) && count($blocks) > 0)
      @foreach ($blocks as $block)
        <!-- home out section -->
        <div id="home-out-section-1" class="home-out-section" style="background-image: url('{{ asset('images/main-home/'.$block->image) }}')">
          <div class="overlay-bg {{$block->left == 1 ? 'gredient-overlay-left' : 'gredient-overlay-right'}} "></div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 {{$block->left == 1 ? 'col-md-offset-6 col-md-6 text-right' : ''}}">
                <h2 class="section-heading">{{$block->heading}}</h2>
                <p class="section-dtl {{$block->left == 1 ? 'pad-lt-100' : ''}}">{{$block->detail}}</p>
                @if ($block->button == 1)
                  @if ($block->button_link == 'login')
                    @guest
                      <a href="{{url('login')}}" class="btn btn-prime">{{$block->button_text}}</a>
                    @endguest
                  @else
                    @guest
                      <a href="{{url('register')}}" class="btn btn-prime">{{$block->button_text}}</a>
                    @endguest
                  @endif
                @endif
              </div>
            </div>
          </div>
        </div>
        <!-- end out section -->
      @endforeach
    @endif
  

 @if(isset(Auth::user()->multiplescreen))

 <div style="margin-top:50px;" id="showM" class="modal fade" tabindex="1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 style="color:#000" class="modal-title">
          Select Profile :
        </h4>
      </div>
      <div class="modal-body">
       <div class="container">
                <div class="row">
                  <form action="{{ route('mus.update',Auth::user()->id) }}" method="POST">
                      {{ csrf_field() }}
                    @if(Auth::user()->multiplescreen->screen1 != null)
                      <div class="col-lg-3 col-sm-6 col-6">
                          <img title="{{ Auth::user()->multiplescreen->screen1 }}" width="200px" height="200px" src="{{ url('images/avtar/03.jpg') }}" alt="">
                          <label class="user-name"><input value="{{ Auth::user()->multiplescreen->screen1 }}" type="radio" name="defscreen"> {{ Auth::user()->multiplescreen->screen1 }}</label>
                      </div>
                    @endif

                    @if(Auth::user()->multiplescreen->screen2 != null)
                      <div class="col-lg-3 col-sm-6 col-6">
                          <img title="{{ Auth::user()->multiplescreen->screen2 }}" width="200px" height="200px" src="{{ url('images/avtar/02.png') }}" alt="">
                          <label class="user-name"><input type="radio" value="{{ Auth::user()->multiplescreen->screen2 }}" name="defscreen"> {{ Auth::user()->multiplescreen->screen2 }}</label> 
                      </div>
                    @endif
                    
                    @if(Auth::user()->multiplescreen->screen3 != null)
                      <div class="col-lg-3 col-sm-6 col-6">
                          <img title="{{ Auth::user()->multiplescreen->screen3 }}" width="200px" height="200px" src="{{ url('images/avtar/03.jpg') }}" alt="">
                          <label class="user-name"><input type="radio" name="defscreen"> {{ Auth::user()->multiplescreen->screen3 }} </label>
                      </div>
                     @endif

                   @if(Auth::user()->multiplescreen->screen4 != null)
                      <div class="col-lg-4 col-sm-6 col-6">
                          <img title="{{ Auth::user()->multiplescreen->screen4 }}" width="200px" height="200px" src="{{ url('images/avtar/02.png') }}" alt="">
                          <label class="user-name"><input type="radio" value="{{Auth::user()->multiplescreen->screen4}}" name="defscreen"> {{ Auth::user()->multiplescreen->screen4 }}</label>  
                      </div>
                    @endif
                    
                    @if(Auth::user()->multiplescreen->screen5 != null)
                      <div class="col-lg-4 col-sm-6 col-6">
                          <img title="{{ Auth::user()->multiplescreen->screen5 }}" width="200px" height="200px" src="{{ url('images/avtar/08.png') }}" alt="">
                          <label class="user-name"><input value="{{ Auth::user()->multiplescreen->screen5 }}" type="radio" name="defscreen"> {{ Auth::user()->multiplescreen->screen5 }}</label>
                      </div>
                    @endif
                    
                     @if(Auth::user()->multiplescreen->screen6 != null)
                       <div class="col-lg-4 col-sm-6 col-6">
                          <img title="{{ Auth::user()->multiplescreen->screen6 }}" width="200px" height="200px" src="{{ url('images/avtar/02.png') }}" alt="">
                          <label class="user-name"><input type="radio" value="{{ Auth::user()->multiplescreen->screen6 }}" name="defscreen"> {{ Auth::user()->multiplescreen->screen6 }}</label>
                      </div>
                    @endif
                    <div align="left" class="col-md-offset-7 col-md-3">
                      <input type="submit" value="Save Profile !" class="btn btn-lg btn-primary">
                    </div>

                    
                    </form>
                </div>
            </div>
            
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
 @else
 @auth
  @php
    $muser = new App\Multiplescreen;
    $getpkgid;
    $screen;
    foreach (Auth::user()->paypal_subscriptions as $value) {
     
        if($value->status == 1){

          $getpkgid = $value->package_id;

          $pkg = App\Package::where('id',$value->package_id)->first();

          if(isset($pkg))
          {
             $screen = $pkg->screens;
             $muser->pkg_id = $pkg->id;
          
         
          $muser->user_id = Auth::user()->id;

          if($screen ==1){
            $muser->screen1 = Auth::user()->name;
           
          }elseif($screen == 2){
            $muser->screen1= Auth::user()->name;
            $muser->screen2 = "NH2-User";
          }elseif($screen == 3)
          {
            $muser->screen1= Auth::user()->name;
            $muser->screen2 = "NH2-User";
            $muser->screen3 = "NH3-User";
          }elseif($screen == 4)
          {
            $muser->screen1= Auth::user()->name;
            $muser->screen2 = "NH2-User";
            $muser->screen3 = "NH3-User";
            $muser->screen4 = "NH4-User";
          }
          elseif($screen == 5)
          {
            $muser->screen1= Auth::user()->name;
            $muser->screen2 = "NH2-User";
            $muser->screen3 = "NH3-User";
            $muser->screen4 = "NH4-User";
            $muser->screen5 = "NH5-User";
          }
          elseif($screen == 6)
          {
            $muser->screen1= Auth::user()->name;
            $muser->screen2 = "NH2-User";
            $muser->screen3 = "NH3-User";
            $muser->screen4 = "NH4-User";
            $muser->screen5 = "NH5-User";
            $muser->screen6 = "NH6-User";
          }

          $muser->save(); 
          header("Location:",'/');

        }
        }
    }

    
  @endphp
  @endauth
 @endif
    
    <!-- end featured main block -->
    <!-- end out section -->
  </section>
<!-- end main wrapper -->
@endsection
@section('script')
<script>
        
        @if(isset(Auth::user()->multiplescreen))
        @if((Auth::user()->multiplescreen->activescreen!= NULL))
         $(document).ready(function(){

           $('#showM').hide();

           });
          @else
           $(document).ready(function(){

            $('#showM').modal();

           });
          @endif
          @endif



</script>
@endsection