@extends('layouts.theme')
@if(isset($movie))
@section('custom-meta')
<meta name="Description" content="{{$movie->description}}" />
<meta name="keyword" content="{{$movie->title}}, {{$movie->keyword}}">
@endsection
@section('title',"$movie->title")
@elseif($season)
 @php
  $title = $season->tvseries->title;
 @endphp
  
@section('custom-meta')
<meta name="Description" content="{{$season->tvseries->description}}" />
<meta name="keyword" content="{{$season->tvseries->title}}, {{$season->tvseries->keyword}}">
@endsection

@section('title',"$title")

@endif
@section('main-wrapper')
<!-- main wrapper -->
  <section class="main-wrapper">
    @if(isset($movie))
      @if($movie->poster != null)
        <div id="big-main-poster-block" class="big-main-poster-block" style="background-image: url('{{asset('images/movies/posters/'.$movie->poster)}}');">
          <div class="overlay-bg"></div>
        </div>
      @else
        <div id="big-main-poster-block" class="big-main-poster-block" style="background-image: url('{{asset('images/default-poster.jpg')}}');">
          <div class="overlay-bg"></div>
        </div>
      @endif
    @endif
    @if(isset($season))
      @if($season->poster != null)
        <div id="big-main-poster-block" class="big-main-poster-block" style="background-image: url('{{asset('images/tvseries/posters/'.$season->poster)}}');">
          <div class="overlay-bg"></div>
        </div>
      @elseif($season->tvseries->poster != null)
        <div id="big-main-poster-block" class="big-main-poster-block" style="background-image: url('{{asset('images/tvseries/posters/'.$season->tvseries->poster)}}');">
          <div class="overlay-bg"></div>
        </div>
      @else
        <div id="big-main-poster-block" class="big-main-poster-block" style="background-image: url('{{asset('images/default-poster.jpg')}}');">
          <div class="overlay-bg"></div>
        </div>
      @endif
    @endif
    <div id="full-movie-dtl-main-block" class="full-movie-dtl-main-block full-movie-dtl-block-custom">
      <div class="container-fluid">
        @if(isset($movie))
          @php
            $subtitles = collect();
            if ($movie->subtitle == 1) {
              $subtitle_list = explode(',', $movie->subtitle_list);
              for($i = 0; $i < count($subtitle_list); $i++) {
                try {
                  $subtitle = \App\AudioLanguage::find($subtitle_list[$i])->language;
                  $subtitles->push($subtitle);
                } catch (Exception $e) {
                }
              }
            }
            $a_languages = collect();
            if ($movie->a_language != null) {
              $a_lan_list = explode(',', $movie->a_language);
              for($i = 0; $i < count($a_lan_list); $i++) {
                try {
                  $a_language = \App\AudioLanguage::find($a_lan_list[$i])->language;
                  $a_languages->push($a_language);
                } catch (Exception $e) {
                }
              }
            }

            $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                        ['user_id', '=', $auth->id],
                                                                        ['movie_id', '=', $movie->id],
                                                                       ])->first();
            // Directors list of movie from model
            $directors = collect();
            if ($movie->director_id != null) {
              $p_directors_list = explode(',', $movie->director_id);
              for($i = 0; $i < count($p_directors_list); $i++) {
                try {
                  $p_director = \App\Director::find($p_directors_list[$i])->name;
                  $directors->push($p_director);
                } catch (Exception $e) {

                }
              }
            }

            // Actors list of movie from model
            $actors = collect();
            if ($movie->actor_id != null) {
              $p_actors_list = explode(',', $movie->actor_id);
              for($i = 0; $i < count($p_actors_list); $i++) {
                try {
                  $p_actor = \App\Actor::find($p_actors_list[$i])->name;
                  $actors->push($p_actor);
                } catch (Exception $e) {

                }
              }
            }

            // Genre list of movie from model
            $genres = collect();
            if (isset($movie->genre_id)){
              $genre_list = explode(',', $movie->genre_id);
              for ($i = 0; $i < count($genre_list); $i++) {
                try {
                  $genre = \App\Genre::find($genre_list[$i])->name;
                  $genres->push($genre);
                } catch (Exception $e) {

                }
              }
            }

          @endphp
          <div class="row">
            <div class="col-md-8">
              <div class="full-movie-dtl-block">
                <h2 id="full-movie-name" class="section-heading">{{$movie->title}}</h2>
                <div class="imdb-ratings-block">
                  <ul>
                    <li>{{$movie->publish_year}}</li>
                    <li>{{$movie->duration}} {{$popover_translations->where('key', 'mins')->first->value->value}}</li>
                 
                 
                   
                  </ul>
                </div>
                <p>
                  {{$movie->detail}}
                </p>
              </div>
             
              <div id="wishlistelement" class="screen-play-btn-block">

               @if($movie->video_link->iframeurl != null)
                  
                 <a href="#" onclick="playoniframe('{{ $movie->video_link->iframeurl }}')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{$popover_translations->where('key', 'play')->first->value->value}}</span>
                 </a>

                @else

                  <a href="{{route('watchmovie',$movie->id)}}" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{$popover_translations->where('key', 'play')->first->value->value}}</span>
                  </a>
                  
                @endif
                
                <div class="btn-group btn-block">
                  @if($movie->trailer_url != null || $movie->trailer_url != '')
                    <a href="{{ route('watchTrailer',$movie->id)  }}" class="iframe btn btn-default">{{$popover_translations->where('key', 'watch trailer')->first->value->value}}</a>
                  @endif
                 
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div id="poster-thumbnail" class="poster-thumbnail-block">
                @if($movie->thumbnail != null || $movie->thumbnail != '')
                  <img src="{{asset('images/movies/thumbnails/'.$movie->thumbnail)}}" class="img-responsive" alt="genre-image">
                @else
                  <img src="{{asset('images/default-thumbnail.jpg')}}" class="img-responsive" alt="genre-image">
                @endif
              </div>
            </div>
          </div>
        @elseif(isset($season))
          @php
            $subtitles = collect();
            if ($season->subtitle == 1) {
              $subtitle_list = explode(',', $season->subtitle_list);
              for($i = 0; $i < count($subtitle_list); $i++) {
                try {
                  $subtitle = \App\AudioLanguage::find($subtitle_list[$i])->language;
                  $subtitles->push($subtitle);
                } catch (Exception $e) {
                }
              }
            }
            $a_languages = collect();
            if ($season->a_language != null) {
              $a_lan_list = explode(',', $season->a_language);
              for($i = 0; $i < count($a_lan_list); $i++) {
                try {
                  $a_language = \App\AudioLanguage::find($a_lan_list[$i])->language;
                  $a_languages->push($a_language);
                } catch (Exception $e) {
                }
              }
            }
            $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                          ['user_id', '=', $auth->id],
                                                                          ['season_id', '=', $season->id],
                                                                         ])->first();
          @endphp
          <div class="row">
            <div class="col-md-8">
              <div class="full-movie-dtl-block">
                <h2 id="full-movie-name" class="section-heading">{{$season->tvseries->title}}</h2>
                 <br/>
                <select style="width:20%;-webkit-box-shadow: none;box-shadow: none;color: #FFF;background: #000;display: block;clear: both;border: 1px solid #666;border-radius: 0;" name="" id="selectseason" class="form-control">
                  @foreach($season->tvseries->seasons as $allseason)

                    <option {{ $season->id == $allseason->id ? "selected" : "" }} value="{{ $allseason->id }}">Season {{ $allseason->season_no }}</option>
                  
                  @endforeach
                </select>
                <br>
                <div class="imdb-ratings-block">
                  <ul>
                    <li>{{$season->publish_year}}</li>
                    <li>{{$season->season_no}} {{$popover_translations->where('key', 'season')->first->value->value}}</li>
                   
                  
                  
                    @endif
                  </ul>
                </div>
                <p>
                  @if ($season->detail != null || $season->detail != '')
                    {{$season->detail}}
                  @else
                    {{$season->tvseries->detail}}
                  @endif
                </p>
              </div>
            
              <div class="screen-play-btn-block">
                @if(isset($season->episodes[0]))
                @if($season->episodes[0]->video_link->iframeurl !="")

                            <a href="#" onclick="playoniframe('{{ $season->episodes[0]->video_link->iframeurl }}')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{$popover_translations->where('key', 'play')->first->value->value}}</span>
                             </a>
                            @else
                <a href="{{ route('watchTvShow',$season->id)  }}" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{$popover_translations->where('key', 'play')->first->value->value}}</span></a>
                @endif
                @endif
                <div id="wishlistelement" class="btn-group btn-block">
                  <div>
                  
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div id="poster-thumbnail" class="poster-thumbnail-block">
                @if($season->thumbnail != null)
                  <img src="{{asset('images/tvseries/thumbnails/'.$season->thumbnail)}}" class="img-responsive" alt="genre-image">
                @elseif($season->tvseries->thumbnail != null)
                  <img src="{{asset('images/tvseries/thumbnails/'.$season->tvseries->thumbnail)}}" class="img-responsive" alt="genre-image">
                @else
                  <img src="{{asset('images/default-thumbnail.jpg')}}" class="img-responsive" alt="genre-image">
                @endif
              </div>
            </div>
          </div>
       
      </div>
    </div>
    <!-- movie series -->
    @if(isset($movie->movie_series) && $movie->series != 1)
      @if(count($movie->movie_series) > 0)
        <div class="container-fluid movie-series-section search-section">
          <h5 class="movie-series-heading">Series {{count($movie->movie_series)}}</h5>
          <div>
            @foreach($movie->movie_series as $series)
              @php
                $single_series = \App\Movie::where('id', $series->series_movie_id)->first();
                $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['movie_id', '=', $single_series->id],
                                                                           ])->first();
              @endphp
              <div class="movie-series-block">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="movie-series-img">
                      @if($single_series->thumbnail != null || $single_series->thumbnail != '')
                        <img src="{{asset('images/movies/thumbnails/'.$single_series->thumbnail)}}" class="img-responsive" alt="genre-image">
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-7 pad-0">
                    <h5 class="movie-series-heading movie-series-name"><a href="{{url('movie/detail', $single_series->id)}}">{{$single_series->title}}</h5>
                    <ul class="movie-series-des-list">
                    
                      <li>{{$single_series->duration}} {{$popover_translations->where('key', 'mins')->first->value->value}}</li>
                      <li>{{$single_series->publish_year}}</li>
                    
                      @if($single_series->subtitle == 1)
                        <li>{{$popover_translations->where('key', 'subtitles')->first->value->value}}</li>
                      @endif
                    </ul>
                    <p>
                      {{$single_series->detail}}
                    </p>
                    <div class="des-btn-block des-in-list">
                      <a href="{{ route('watchmovie',$single_series->id)  }}" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{$popover_translations->where('key', 'play')->first->value->value}}</span></a>
                      @if($single_series->trailer_url != null || $single_series->trailer_url != '')
                        <a href="{{ route('watchTrailer',$movie->id)  }}" class="iframe btn-default">{{$popover_translations->where('key', 'watch trailer')->first->value->value}}</a>
                      @endif
                     
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endif
    @endif
    @if(isset($filter_series) && $movie->series == 1)
      @if(count($filter_series) > 0)
        <div class="container-fluid movie-series-section search-section">
          <h5 class="movie-series-heading">{{$home_translations->where('key', 'series')->first->value->value}} {{count($filter_series)}}</h5>
          <div>
            @foreach($filter_series as $key => $series)
              @php
                $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['movie_id', '=', $series->id],
                                                                           ])->first();
              @endphp
              <div class="movie-series-block">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="movie-series-img">
                      @if($series->thumbnail != null)
                        <img src="{{asset('images/movies/thumbnails/'.$series->thumbnail)}}" class="img-responsive" alt="genre-image">
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-7 pad-0">
                    <h5 class="movie-series-heading movie-series-name"><a href="{{url('movie/detail', $series->id)}}">{{$series->title}}</a></h5>
                    <ul class="movie-series-des-list">
                    
                      <li>{{$series->duration}} {{$popover_translations->where('key', 'mins')->first->value->value}}</li>
                      <li>{{$series->publish_year}}</li>
                    
                      @if($series->subtitle == 1)
                        <li>{{$popover_translations->where('key', 'subtitles')->first->value->value}}</li>
                      @endif
                    </ul>
                    <p>
                      {{$series->detail}}
                    </p>
                    <div class="des-btn-block des-in-list">
                      <a href="{{ route('watchmovie',$series->id)  }}" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{$popover_translations->where('key', 'play')->first->value->value}}</span></a>
                      @if($series->trailer_url != null || $series->trailer_url != '')
                        <a href="{{ route('watchTrailer',$series->id)  }}" class="iframe btn-default">{{$popover_translations->where('key', 'watch trailer')->first->value->value}}</a>
                      @endif
                     
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endif
    @endif
    <!-- end movie series -->
    <!-- episodes -->
    @if(isset($season->episodes))
      @if(count($season->episodes) > 0)
        <div class="container-fluid movie-series-section search-section">
          <h5 class="movie-series-heading">{{$home_translations->where('key', 'episodes')->first->value->value}} {{count($season->episodes)}}</h5>
          <div>
            @foreach($season->episodes as $key => $episode)
              <div class="movie-series-block">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="movie-series-img">
                      @if($episode->seasons->thumbnail != null)
                        <img src="{{asset('images/tvseries/thumbnails/'.$episode->seasons->thumbnail)}}" class="img-responsive" alt="genre-image">
                      @elseif($episode->seasons->tvseries->thumbnail != null)
                        <img src="{{asset('images/tvseries/thumbnails/'.$episode->seasons->tvseries->thumbnail)}}" class="img-responsive" alt="genre-image">
                      @else
                        <img src="{{asset('images/default-thumbnail.jpg')}}" class="img-responsive" alt="genre-image">
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-7 pad-0">
                    @if($episode->video_link->iframeurl !="")
                       <a onclick="playoniframe('{{ $episode->video_link->iframeurl }}')" class="btn btn-play btn-sm-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><h5 class="movie-series-heading movie-series-name">{{$key+1}}. {{$episode->title}}</h5></span></a>
                    @else
                       <a href="{{ route('watch.Episode', $episode->id) }}" class="iframe btn btn-play btn-sm-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><h5 class="movie-series-heading movie-series-name">{{$key+1}}. {{$episode->title}}</h5></span></a>
                    @endif
                   
                    <ul class="movie-series-des-list">
                      <li>{{$episode->duration}} {{$popover_translations->where('key', 'mins')->first->value->value}}</li>
                      <li>{{$episode->released}}</li>
                      <li>{{$episode->seasons->tvseries->maturity_rating}}</li>
                      <li>
                        @if($episode->seasons->subtitle == 1)
                         {{$popover_translations->where('key', 'subtitles')->first->value->value}}
                        @endif
                      </li>
                    </ul>
                    <p>
                      {{$episode->detail}}
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endif
    @endif
    <!-- end episodes -->
    @if($prime_genre_slider == 1)
      @php
        $all = collect();
        $all_fil_movies = App\Movie::all();
        $all_fil_tv = App\TvSeries::all();
        if (isset($movie)) {
          $genres = explode(',', $movie->genre_id);
        } elseif (isset($season)) {
          $genres = explode(',', $season->tvseries->genre_id);
        }
        for($i = 0; $i < count($genres); $i++) {
          foreach ($all_fil_movies as $fil_movie) {
            $fil_genre_item = explode(',', trim($fil_movie->genre_id));
            for ($k=0; $k < count($fil_genre_item); $k++) {
              if (trim($fil_genre_item[$k]) == trim($genres[$i])) {
                if (isset($movie)) {
                  if ($fil_movie->id != $movie->id) {
                    $all->push($fil_movie);
                  }
                } else {
                  $all->push($fil_movie);
                }
              }
            }
          }
        }
        if (isset($movie)) {
          $all = $all->except($movie->id);
        }

        for($i = 0; $i < count($genres); $i++) {
          foreach ($all_fil_tv as $fil_tv) {
            $fil_genre_item = explode(',', trim($fil_tv->genre_id));
            for ($k=0; $k < count($fil_genre_item); $k++) {
              if (trim($fil_genre_item[$k]) == trim($genres[$i])) {
                $fil_tv = $fil_tv->seasons;
                if (isset($season)) {
                  $all->push($fil_tv->except($season->id));
                } else {
                  $all->push($fil_tv);
                }
              }
            }
          }
        }
        $all = $all->unique();
        $all = $all->flatten();
      @endphp
      @if (isset($all) && count($all) > 0)
        <div class="genre-prime-block">
          <div class="container-fluid">
            <h5 class="section-heading">{{$home_translations->where('key', 'customers also watched')->first->value->value}}</h5>
            <div class="genre-prime-slider owl-carousel">
              @if(isset($all))
                @foreach($all as $key => $item)

                  @php
                  
                    if ($item->type == 'S') {
                       $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                        ['user_id', '=', $auth->id],
                                                                        ['season_id', '=', $item->id],
                                                                       ])->first();
                    } elseif ($item->type == 'M') {
                      $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                        ['user_id', '=', $auth->id],
                                                                        ['movie_id', '=', $item->id],
                                                                       ])->first();
                    }
                  @endphp
                  
                  
                  @if($item->type == 'M')
                    @if(isset($movie))
                    <div class="genre-prime-slide">
                      <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block{{$item->id}}">
                        <a href="{{url('movie/detail',$item->id)}}">
                          @if($item->thumbnail != null)
                            <img src="{{asset('images/movies/thumbnails/'.$item->thumbnail)}}" class="img-responsive" alt="genre-image">
                          @endif
                        </a>
                      </div>
                      <div id="prime-mix-description-block{{$item->id}}" class="prime-description-block">
                        <h5 class="description-heading">{{$item->title}}</h5>
                      
                        <ul class="description-list">
                          <li>{{$item->duration}} {{$popover_translations->where('key', 'mins')->first->value->value}}</li>
                          <li>{{$item->publish_year}}</li>
                         
                          @if($item->subtitle == 1)
                            <li>CC</li>
                            <li>
                             {{$popover_translations->where('key', 'subtitles')->first->value->value}}
                            </li>
                          @endif
                        </ul>
                        <div class="main-des">
                          <p>{{$item->detail}}</p>
                          <a href="#"></a>
                        </div>
                        <div class="des-btn-block">
                          
                          @if($item->video_link->iframeurl != null)
                          
                              <a onclick="playoniframe('{{ $item->video_link->iframeurl }}')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{$popover_translations->where('key', 'play')->first->value->value}}</span>
                              </a>

                             @else 
                            <a href="{{ route('watchmovie',$item->id) }}" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{$popover_translations->where('key', 'play')->first->value->value}}</span></a>
                          @endif

                        
                          @if($item->trailer_url != null || $item->trailer_url != '')
                            <a href="{{ route('watchTrailer',$item->id) }}" class="iframe btn-default">{{$popover_translations->where('key', 'watch trailer')->first->value->value}}</a>
                          @endif
                         
                        </div>
                      </div>
                    </div>
                  @endif
                  @endif

                  @if($item->type == "S")
                    @if(!isset($movie))
                    <div class="genre-prime-slide">
                      <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block{{$item->id}}{{$item->type}}">
                        <a href="{{url('show/detail',$item->id)}}">
                          @if($item->thumbnail != null)
                            <img src="{{asset('images/tvseries/thumbnails/'.$item->thumbnail)}}" class="img-responsive" alt="genre-image">
                          @elseif($item->tvseries->thumbnail != null)
                            <img src="{{asset('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)}}" class="img-responsive" alt="genre-image">
                          @else
                            <img src="{{asset('images/default-thumbnail.jpg')}}" class="img-responsive" alt="genre-image">
                          @endif
                        </a>
                      </div>
                      <div id="prime-mix-description-block{{$item->id}}{{$item->type}}" class="prime-description-block">
                        <h5 class="description-heading">{{$item->tvseries->title}}</h5>
                      
                        <ul class="description-list">
                          <li>Season {{$item->season_no}}</li>
                          <li>{{$item->publish_year}}</li>
                        
                          @if($item->subtitle == 1)
                            <li>CC</li>
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
                          @if(isset($item->episodes[0]))
                          @if($item->episodes[0]->video_link->iframeurl !="")

                            <a href="#" onclick="playoniframe('{{ $item->episodes[0]->video_link->iframeurl }}')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{$popover_translations->where('key', 'play')->first->value->value}}</span>
                             </a>
                            @else
                          <a href="{{route('watchTvShow',$item->id)}}" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{$popover_translations->where('key', 'play')->first->value->value}}</span></a>
                          @endif
                          @endif
                          
                        </div>
                      </div>
                    </div>
                    @endif
                  @endif
                @endforeach
              @endif
            </div>
          </div>
        </div>
      @endif
    @else
      @php
        $all = collect();
        $all_fil_movies = App\Movie::all();
        $all_fil_tv = App\TvSeries::all();
        if (isset($movie)) {
          $genres = explode(',', $movie->genre_id);
        } elseif (isset($season)) {
          $genres = explode(',', $season->tvseries->genre_id);
        }
        for($i = 0; $i < count($genres); $i++) {
          foreach ($all_fil_movies as $fil_movie) {
            $fil_genre_item = explode(',', trim($fil_movie->genre_id));
            for ($k=0; $k < count($fil_genre_item); $k++) {
              if (trim($fil_genre_item[$k]) == trim($genres[$i])) {
                if (isset($movie)) {
                  if ($fil_movie->id != $movie->id) {
                    $all->push($fil_movie);
                  }
                } else {
                  $all->push($fil_movie);
                }
              }
            }
          }
        }
        if (isset($movie)) {
          $all = $all->except($movie->id);
        }

        for($i = 0; $i < count($genres); $i++) {
          foreach ($all_fil_tv as $fil_tv) {
            $fil_genre_item = explode(',', trim($fil_tv->genre_id));
            for ($k=0; $k < count($fil_genre_item); $k++) {
              if (trim($fil_genre_item[$k]) == trim($genres[$i])) {
                $fil_tv = $fil_tv->seasons;
                if (isset($season)) {
                  $all->push($fil_tv->except($season->id));
                } else {
                  $all->push($fil_tv);
                }
              }
            }
          }
        }
        $all = $all->unique();
        $all = $all->flatten();
      @endphp
    
    @endif
  </section>

@endsection

@section('custom-script')
  
  
  <script>
    // Wishlist Js ( using Vuejs 2 )
    var app = new Vue({
      el: '#wishlistelement',
      data: {
        result: {
          id: '',
          type: '',
        },
      },
      methods: {
        addToWishList(id, type) {
          this.result.id = id;
          this.result.type = type;
          this.$http.post('{{route('addtowishlist')}}', this.result).then((response) => {
          }).catch((e) => {
            console.log(e);
          });
          this.result.item_id = '';
          this.result.item_type = '';
        }
      }
    });


   

</script>

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

     <script>
      $('#selectseason').on('change',function(){
        var get = $('#selectseason').val();
        window.location.href = '{{ url('show/detail/') }}/'+get;
      });
    </script>

    
@endsection
