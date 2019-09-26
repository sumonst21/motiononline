@extends('layouts.theme')
@section('title',"View All")
@section('main-wrapper')
<br>
  @if (isset($pusheditems) && count($pusheditems) > 0 )
          <div class="genre-prime-block">
           
            
            <div class="container-fluid">
              <h5 class="section-heading">View All</h5>
              <div class="">
                @if(isset($pusheditems))

            

                  @foreach($pusheditems as $item)
                  
                  
                  
                    @php
                     if ($item->type == 'M') {
                      $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                          ['user_id', '=', $auth->id],
                                                                          ['movie_id', '=', $item->id],
                                                                         ])->first();
                     }

                    if ($item->type == 'S') {
                       $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                        ['user_id', '=', $auth->id],
                                                                        ['season_id', '=', $item->id],
                                                                      ])->first();
                    }
                    @endphp

                    
                  
                  @if($item->type == "M")
                   
                  <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                        <div class="cus_img">
                          
                        
                      <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block{{$item->id}}">
                        <a href="{{url('movie/detail',$item->id)}}">
                          @if($item->thumbnail != null || $item->thumbnail != '')
                            <img src="{{asset('images/movies/thumbnails/'.$item->thumbnail)}}" class="img-responsive" alt="genre-image">
                          @else

                            <img src="{{asset('images/default-thumbnail.jpg')}}" class="img-responsive" alt="genre-image">
                          @endif
                        </a>
                      </div>
                      <div id="prime-next-item-description-block{{$item->id}}" class="prime-description-block">
                        <div class="prime-description-under-block">
                          <h5 class="description-heading">{{$item->title}}</h5>
                          <div class="item-rating">Rating {{$item->rating}}</div>
                          <ul class="description-list">
                            <li>{{$item->duration}} {{$popover_translations->where('key', 'mins')->first->value->value}}</li>
                            <li>{{$item->publish_year}}</li>
                            <li>{{$item->maturity_rating}}</li>
                            @if($item->subtitle == 1)
                              <li>
                               {{$popover_translations->where('key', 'subtitles')->first->value->value}}
                              </li>
                            @endif
                          </ul>
                          <div class="main-des">
                            <p>{{$item->detail}}</p>
                            <a href="#">Read more</a>
                          </div>
                          <div class="des-btn-block">
                            @if($item->video_link->iframeurl != null)
                          
                            <a onclick="playoniframe('{{ $item->video_link->iframeurl }}')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{$popover_translations->where('key', 'play')->first->value->value}}</span>
                            </a>

                            @else 
                              <a href="{{route('watchmovie',$item->id)}}" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{$popover_translations->where('key', 'play')->first->value->value}}</span></a>
                            @endif
                           
                            @if($item->trailer_url != null || $item->trailer_url != '')
                
                            <a class="iframe btn btn-default" href="{{ route('watchTrailer',$item->id) }}">Watch Trailer</a>

                            @endif
                          
                          </div>
                        </div>
                      </div>
                      </div>
                       
                    </div>
                    @elseif($item->type == "S")

                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                      <div class="cus_img">
                        
                      
                  <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block{{$item->id}}{{ $item->type }}">
                      <a href="{{url('show/detail',$item->id)}}">
                        @if($item->tvseries->thumbnail != null || $item->tvseries->thumbnail != '')
                          <img src="{{asset('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)}}" class="img-responsive" alt="genre-image">
                        @else

                          <img src="{{asset('images/default-thumbnail.jpg')}}" class="img-responsive" alt="genre-image">
                        @endif
                      </a>

                    </div>

                    
                    <div id="prime-next-item-description-block{{$item->id}}{{$item->type}}" class="prime-description-block">
                        <h5 class="description-heading">{{$item->tvseries->title}}</h5>
                        <div class="movie-rating">IMDB {{$item->tvseries->rating}}</div>
                        <ul class="description-list">
                          <li>{{$popover_translations->where('key', 'season')->first->value->value}} {{$item->season_no}}</li>
                          <li>{{$item->publish_year}}</li>
                          <li>{{$item->tvseries->age_req}}</li>
                          @if($item->subtitle == 1)
                            <li>
                              {{$popover_translations->where('key', 'subtitles')->first->value->value}}
                            </li>
                          @endif
                        </ul>
                        <div class="main-des">
                          @if ($item->detail != null || $item->detail != '')
                            <p>{{$item->detail}}</p>
                          @else
                            <p>{{$item->tvseries->detail}}</p>
                          @endif
                          <a href="#"></a>
                        </div>
                        <div class="des-btn-block">
                          @if (isset($item->episodes[0]))
                            
                            @if($item->episodes[0]->video_link->iframeurl !="")

                            <a href="#" onclick="playoniframe('{{ $item->episodes[0]->video_link->iframeurl }}')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{$popover_translations->where('key', 'play')->first->value->value}}</span>
                             </a>

                            @else
                            <a href="{{ route('watchTvShow',$item->id) }}" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{$popover_translations->where('key', 'play')->first->value->value}}</span></a>
                            @endif
                           
                          @endif
                     
                        </div>
                      </div>
                    </div>
                   
                     
                  </div>

                    @endif
                  @endforeach

                @endif
                
              </div>
             <div class="col-md-12">
                <div align="center">
                   {!! $pusheditems->links() !!}
                </div>
             </div>


            </div>
            
          </div>
          
        @endif
@endsection
@section('custom-script')

<script>
      $(document).ready(function(){
        
        $(".group1").colorbox({rel:'group1'});
        $(".group2").colorbox({rel:'group2', transition:"fade"});
        $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
        $(".group4").colorbox({rel:'group4', slideshow:true});
        $(".ajax").colorbox();
        $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
        $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
        $(".iframe").colorbox({iframe:true, width:"100%", height:"100%"});
        $(".inline").colorbox({inline:true, width:"50%"});
        $(".callbacks").colorbox({
          onOpen:function(){ alert('onOpen: colorbox is about to open'); },
          onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
          onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
          onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
          onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
        });

        $('.non-retina').colorbox({rel:'group5', transition:'none'})
        $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
        
        
        $("#click").click(function(){ 
          $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
          return false;
        });
      });
    </script>
<script>

  function playoniframe(url){
    $.colorbox({ href: url, width: '100%', height: '100%', iframe: true });
  }
  
</script>
@endsection