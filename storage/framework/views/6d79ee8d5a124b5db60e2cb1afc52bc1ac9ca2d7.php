<?php $__env->startSection('main-wrapper'); ?>
<!-- main wrapper -->
  <section class="main-wrapper main-wrapper-single-movie-prime">
    <div class="background-main-poster-overlay">
      <?php if(isset($movie)): ?>
        <?php if($movie->poster != null): ?>
          <div class="background-main-poster col-md-offset-4 col-md-6" style="background-image: url('<?php echo e(asset('images/movies/posters/'.$movie->poster)); ?>');">
        <?php else: ?>
          <div class="background-main-poster col-md-offset-4 col-md-6" style="background-image: url('<?php echo e(asset('images/default-poster.jpg')); ?>');">
        <?php endif; ?>  
      <?php endif; ?>
      <?php if(isset($season)): ?>
        <?php if($season->poster != null): ?>
          <div class="background-main-poster col-md-offset-4 col-md-6" style="background-image: url('<?php echo e(asset('images/tvseries/posters/'.$season->poster)); ?>');">
        <?php elseif($season->tvseries->poster != null): ?>
          <div class="background-main-poster col-md-offset-4 col-md-6" style="background-image: url('<?php echo e(asset('images/tvseries/posters/'.$season->tvseries->poster)); ?>');">
        <?php else: ?>
          <div class="background-main-poster col-md-offset-4 col-md-6" style="background-image: url('<?php echo e(asset('images/default-poster.jpg')); ?>');">
        <?php endif; ?>
      <?php endif; ?>
      </div>
      <div class="overlay-bg gredient-overlay-right"></div>
      <div class="overlay-bg"></div>
    </div>
    <div id="full-movie-dtl-main-block" class="full-movie-dtl-main-block">
      <div class="container-fluid">
        <?php if(isset($movie)): ?>
          <?php
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

          ?>
          <div class="row">
            <div class="col-md-8">
              <div class="full-movie-dtl-block">
                <h2 class="section-heading"><?php echo e($movie->title); ?></h2>
                <div class="imdb-ratings-block">
                  <ul>
                    <li><?php echo e($movie->publish_year); ?></li>
                    <li><?php echo e($movie->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                    <li><?php echo e($movie->maturity_rating); ?></li>
                    <li>IMDB <?php echo e($movie->rating); ?></li>
                    <?php if($movie->subtitle == 1 && isset($subtitles)): ?>
                      <li>CC</li>
                      <li>
                        <?php for($i = 0; $i < count($subtitles); $i++): ?>
                          <?php if($i == count($subtitles)-1): ?>
                            <?php echo e($subtitles[$i]); ?>

                          <?php else: ?>
                            <?php echo e($subtitles[$i]); ?>,
                          <?php endif; ?>
                        <?php endfor; ?>
                      </li>
                    <?php endif; ?>
                  </ul>
                </div>
                <p>
                  <?php echo e($movie->detail); ?>

                </p>
              </div>
              <div class="screen-casting-dtl">
                <ul class="casting-headers">
                  <li><?php echo e($home_translations->where('key', 'directors')->first->value->value); ?></li>
                  <li><?php echo e($home_translations->where('key', 'starring')->first->value->value); ?></li>
                  <li><?php echo e($home_translations->where('key', 'genres')->first->value->value); ?></li>
                  <li><?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?></li>
                  <li><?php echo e($home_translations->where('key', 'audio languages')->first->value->value); ?></li>
                </ul>
                <ul class="casting-dtl">
                  <li>
                    <?php if(count($directors) > 0): ?>
                      <?php for($i = 0; $i < count($directors); $i++): ?>
                        <?php if($i == count($directors)-1): ?>
                          <a href="<?php echo e(url('video/detail/director_search', trim($directors[$i]))); ?>"><?php echo e($directors[$i]); ?></a>
                        <?php else: ?>
                          <a href="<?php echo e(url('video/detail/director_search', trim($directors[$i]))); ?>"><?php echo e($directors[$i]); ?></a>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -  
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if(count($actors) > 0): ?>
                      <?php for($i = 0; $i < count($actors); $i++): ?>
                        <?php if($i == count($actors)-1): ?>
                          <a href="<?php echo e(url('video/detail/actor_search', trim($actors[$i]))); ?>"><?php echo e($actors[$i]); ?></a>
                        <?php else: ?>
                          <a href="<?php echo e(url('video/detail/actor_search', trim($actors[$i]))); ?>"><?php echo e($actors[$i]); ?></a>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -  
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if(count($genres) > 0): ?>
                      <?php for($i = 0; $i < count($genres); $i++): ?>
                        <?php if($i == count($genres)-1): ?>
                          <a href="<?php echo e(url('video/detail/genre_search', trim($genres[$i]))); ?>"><?php echo e($genres[$i]); ?></a>
                        <?php else: ?>
                          <a href="<?php echo e(url('video/detail/genre_search', trim($genres[$i]))); ?>"><?php echo e($genres[$i]); ?></a>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if(count($subtitles) > 0): ?>
                      <?php if($movie->subtitle == 1 && isset($subtitles)): ?>
                        <?php for($i = 0; $i < count($subtitles); $i++): ?>
                          <?php if($i == count($subtitles)-1): ?>
                            <?php echo e($subtitles[$i]); ?>

                          <?php else: ?>
                            <?php echo e($subtitles[$i]); ?>,
                          <?php endif; ?>
                        <?php endfor; ?>
                      <?php else: ?>
                        -
                      <?php endif; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if(count($a_languages) > 0): ?>
                      <?php if($movie->a_language != null && isset($a_languages)): ?>
                        <?php for($i = 0; $i < count($a_languages); $i++): ?>
                          <?php if($i == count($a_languages)-1): ?>
                            <?php echo e($a_languages[$i]); ?>

                          <?php else: ?>
                            <?php echo e($a_languages[$i]); ?>,
                          <?php endif; ?>
                        <?php endfor; ?>
                      <?php else: ?>
                        -
                      <?php endif; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </li>
                </ul>
              </div>
              <div id="wishlistelement" class="screen-play-btn-block">
                <a onclick="playVideo(<?php echo e($movie->id); ?>,'<?php echo e($movie->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                <div class="btn-group btn-block">
                  <?php if($movie->trailer_url != null || $movie->trailer_url != ''): ?>
                    <a onclick="playTrailer('<?php echo e($movie->trailer_url); ?>')" class="btn btn-default"><?php echo e($popover_translations->where('key', 'watch trailer')->first->value->value); ?></a>
                  <?php endif; ?>
                  <?php if(isset($wishlist_check->added)): ?>
                    <a onclick="addWish(<?php echo e($movie->id); ?>,'<?php echo e($movie->type); ?>')" class="addwishlistbtn<?php echo e($movie->id); ?><?php echo e($movie->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                  <?php else: ?>
                    <a onclick="addWish(<?php echo e($movie->id); ?>,'<?php echo e($movie->type); ?>')" class="addwishlistbtn<?php echo e($movie->id); ?><?php echo e($movie->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="poster-thumbnail-block">
                <?php if($movie->thumbnail != null || $movie->thumbnail != ''): ?>
                  <img src="<?php echo e(asset('images/movies/thumbnails/'.$movie->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                <?php else: ?>
                  <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php elseif(isset($season)): ?>
          <?php
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
            // Actors list of movie from model
            $actors = collect();
            if ($season->actor_id != null) {
              $p_actors_list = explode(',', $season->actor_id);
              for($i = 0; $i < count($p_actors_list); $i++) {
                try {
                  $p_actor = \App\Actor::find(trim($p_actors_list[$i]))->name;
                  $actors->push($p_actor);
                } catch (Exception $e) {
                }
              }
            }

            // Genre list of movie from model
            $genres = collect();
            if ($season->tvseries->genre_id != null){
              $genre_list = explode(',', $season->tvseries->genre_id);
              for ($i = 0; $i < count($genre_list); $i++) {
                try {
                  $genre = \App\Genre::find($genre_list[$i])->name;
                  $genres->push($genre);
                } catch (Exception $e) {
                }
              }
            }
          ?>
          <div class="row">
            <div class="col-md-8">
              <div class="full-movie-dtl-block">
                <h2 class="section-heading"><?php echo e($season->tvseries->title); ?></h2>
                <div class="imdb-ratings-block">
                  <ul>
                    <li><?php echo e($season->publish_year); ?></li>
                    <li><?php echo e($season->season_no); ?> <?php echo e($popover_translations->where('key', 'season')->first->value->value); ?></li>
                    <li><?php echo e($season->tvseries->age_req); ?></li>
                    <li>IMDB <?php echo e($season->tvseries->rating); ?></li>
                    <?php if(isset($subtitles)): ?>
                      <li>CC</li>
                      <li>
                        <?php for($i = 0; $i < count($subtitles); $i++): ?>
                          <?php if($i == count($subtitles)-1): ?>
                            <?php echo e($subtitles[$i]); ?>

                          <?php else: ?>
                            <?php echo e($subtitles[$i]); ?>,
                          <?php endif; ?>
                        <?php endfor; ?>
                      </li>
                    <?php endif; ?>
                  </ul>
                </div>
                <p>
                  <?php if($season->detail != null || $season->detail != ''): ?>
                    <?php echo e($season->detail); ?>

                  <?php else: ?>
                    <?php echo e($season->tvseries->detail); ?>  
                  <?php endif; ?>
                </p>
              </div>
              <div class="screen-casting-dtl">
                <ul class="casting-headers">
                  <li><?php echo e($home_translations->where('key', 'starring')->first->value->value); ?></li>
                  <li><?php echo e($home_translations->where('key', 'genres')->first->value->value); ?></li>
                  <li><?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?></li>
                  <li><?php echo e($home_translations->where('key', 'audio languages')->first->value->value); ?></li>
                </ul>
                <ul class="casting-dtl">
                  <li>
                    <?php if(count($actors) > 0): ?>
                      <?php for($i = 0; $i < count($actors); $i++): ?>
                        <?php if($i == count($actors)-1): ?>
                          <a href="<?php echo e(url('video/detail/actor_search', trim($actors[$i]))); ?>"><?php echo e($actors[$i]); ?></a>
                        <?php else: ?>
                          <a href="<?php echo e(url('video/detail/actor_search', trim($actors[$i]))); ?>"><?php echo e($actors[$i]); ?></a>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -  
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if(count($genres) > 0): ?>
                      <?php for($i = 0; $i < count($genres); $i++): ?>
                        <?php if($i == count($genres)-1): ?>
                          <a href="<?php echo e(url('video/detail/genre_search', trim($genres[$i]))); ?>"><?php echo e($genres[$i]); ?></a>
                        <?php else: ?>
                          <a href="<?php echo e(url('video/detail/genre_search', trim($genres[$i]))); ?>"><?php echo e($genres[$i]); ?></a>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -  
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if(count($subtitles) > 0): ?>
                      <?php for($i = 0; $i < count($subtitles); $i++): ?>
                        <?php if($i == count($subtitles)-1): ?>
                          <?php echo e($subtitles[$i]); ?>

                        <?php else: ?>
                          <?php echo e($subtitles[$i]); ?>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -  
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if($season->a_language != null && isset($a_languages)): ?>
                      <?php for($i = 0; $i < count($a_languages); $i++): ?>
                        <?php if($i == count($a_languages)-1): ?>
                          <?php echo e($a_languages[$i]); ?>

                        <?php else: ?>
                          <?php echo e($a_languages[$i]); ?>,
                        <?php endif; ?>
                      <?php endfor; ?>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </li>
                </ul>
              </div>
              <div class="screen-play-btn-block">
                <a onclick="playEpisodes()" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                <div id="wishlistelement" class="btn-group btn-block">
                  <div>
                    <?php if(isset($wishlist_check->added)): ?>
                      <a onclick="addWish(<?php echo e($season->id); ?>,'<?php echo e($season->type); ?>')" class="addwishlistbtn<?php echo e($season->id); ?><?php echo e($season->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                    <?php else: ?>
                      <a onclick="addWish(<?php echo e($season->id); ?>,'<?php echo e($season->type); ?>')" class="addwishlistbtn<?php echo e($season->id); ?><?php echo e($season->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="poster-thumbnail-block">
                <?php if($season->thumbnail != null): ?>
                  <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$season->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                <?php elseif($season->tvseries->thumbnail != null): ?>
                  <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$season->tvseries->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                <?php else: ?>
                  <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <!-- movie series -->
    <?php if(isset($movie->movie_series) && $movie->series != 1): ?>
      <?php if(count($movie->movie_series) > 0): ?>
        <div class="container-fluid movie-series-section search-section">
          <h5 class="movie-series-heading">Series <?php echo e(count($movie->movie_series)); ?></h5>
          <div>
            <?php $__currentLoopData = $movie->movie_series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $series): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $single_series = \App\Movie::where('id', $series->series_movie_id)->first();
                $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['movie_id', '=', $single_series->id],
                                                                           ])->first();
              ?>
              <div class="movie-series-block">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="movie-series-img">
                      <?php if($single_series->thumbnail != null || $single_series->thumbnail != ''): ?>
                        <img src="<?php echo e(asset('images/movies/thumbnails/'.$single_series->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-sm-7 pad-0">
                    <h5 class="movie-series-heading movie-series-name"><a href="<?php echo e(url('movie/detail', $single_series->id)); ?>"><?php echo e($single_series->title); ?></h5>
                    <ul class="movie-series-des-list">
                      <li>IMDB <?php echo e($single_series->rating); ?></li>
                      <li><?php echo e($single_series->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                      <li><?php echo e($single_series->publish_year); ?></li>
                      <li><?php echo e($single_series->maturity_rating); ?></li>
                      <?php if($single_series->subtitle == 1): ?>
                        <li><?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?></li>
                      <?php endif; ?>
                    </ul>
                    <p>
                      <?php echo e($single_series->detail); ?>

                    </p>
                    <div class="des-btn-block des-in-list">
                      <a onclick="playVideo(<?php echo e($single_series->id); ?>, '<?php echo e($single_series->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                      <?php if($single_series->trailer_url != null || $single_series->trailer_url != ''): ?>
                        <a onclick="playTrailer('<?php echo e($single_series->trailer_url); ?>')" class="btn-default"><?php echo e($popover_translations->where('key', 'watch trailer')->first->value->value); ?></a>
                      <?php endif; ?>
                      <?php if(isset($wishlist_check->added)): ?>
                        <a onclick="addWish(<?php echo e($single_series->id); ?>,'<?php echo e($single_series->type); ?>')" class="addwishlistbtn<?php echo e($single_series->id); ?><?php echo e($single_series->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                      <?php else: ?>
                        <a onclick="addWish(<?php echo e($single_series->id); ?>,'<?php echo e($single_series->type); ?>')" class="addwishlistbtn<?php echo e($single_series->id); ?><?php echo e($single_series->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <?php if(isset($filter_series) && $movie->series == 1): ?>
      <?php if(count($filter_series) > 0): ?>
        <div class="container-fluid movie-series-section search-section">
          <h5 class="movie-series-heading"><?php echo e($home_translations->where('key', 'series')->first->value->value); ?> <?php echo e(count($filter_series)); ?></h5>
          <div>
            <?php $__currentLoopData = $filter_series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $series): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['movie_id', '=', $series->id],
                                                                           ])->first();
              ?>
              <div class="movie-series-block">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="movie-series-img">
                      <?php if($series->thumbnail != null): ?>
                        <img src="<?php echo e(asset('images/movies/thumbnails/'.$series->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-sm-7 pad-0">
                    <h5 class="movie-series-heading movie-series-name"><a href="<?php echo e(url('movie/detail', $series->id)); ?>"><?php echo e($series->title); ?></a></h5>
                    <ul class="movie-series-des-list">
                      <li>IMDB <?php echo e($series->rating); ?></li>
                      <li><?php echo e($series->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                      <li><?php echo e($series->publish_year); ?></li>
                      <li><?php echo e($series->maturity_rating); ?></li>
                      <?php if($series->subtitle == 1): ?>
                        <li><?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?></li>
                      <?php endif; ?>
                    </ul>
                    <p>
                      <?php echo e($series->detail); ?>

                    </p>
                    <div class="des-btn-block des-in-list">
                      <a onclick="playVideo(<?php echo e($series->id); ?>, '<?php echo e($series->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                      <?php if($series->trailer_url != null || $series->trailer_url != ''): ?>
                        <a onclick="playTrailer('<?php echo e($series->trailer_url); ?>')" class="btn-default"><?php echo e($popover_translations->where('key', 'watch trailer')->first->value->value); ?></a>
                      <?php endif; ?>
                      <?php if(isset($wishlist_check->added)): ?>
                        <a onclick="addWish(<?php echo e($series->id); ?>,'<?php echo e($series->type); ?>')" class="addwishlistbtn<?php echo e($series->id); ?><?php echo e($series->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                      <?php else: ?>
                        <a onclick="addWish(<?php echo e($series->id); ?>,'<?php echo e($series->type); ?>')" class="addwishlistbtn<?php echo e($series->id); ?><?php echo e($series->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <!-- end movie series -->
    <!-- episodes -->
    <?php if(isset($season->episodes)): ?>
      <?php if(count($season->episodes) > 0): ?>
        <div class="container-fluid movie-series-section search-section">
          <h5 class="movie-series-heading"><?php echo e($home_translations->where('key', 'episodes')->first->value->value); ?> <?php echo e(count($season->episodes)); ?></h5>
          <div>
            <?php $__currentLoopData = $season->episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="movie-series-block">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="movie-series-img">
                      <?php if($episode->seasons->thumbnail != null): ?>
                        <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$episode->seasons->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                      <?php elseif($episode->seasons->tvseries->thumbnail != null): ?>
                        <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$episode->seasons->tvseries->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                      <?php else: ?>
                        <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-sm-7 pad-0">
                    <a onclick="playEpisode(<?php echo e($key); ?>)" class="btn btn-play btn-sm-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><h5 class="movie-series-heading movie-series-name"><?php echo e($key+1); ?>. <?php echo e($episode->title); ?></h5></span></a>
                    <ul class="movie-series-des-list">
                      <li><?php echo e($episode->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                      <li><?php echo e($episode->released); ?></li>
                      <li><?php echo e($episode->seasons->tvseries->maturity_rating); ?></li>
                      <li>
                        <?php if($episode->seasons->subtitle == 1): ?>
                         <?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?>

                        <?php endif; ?>
                      </li>
                    </ul>
                    <p>
                      <?php echo e($episode->detail); ?>

                    </p>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <!-- end episodes -->
    <?php if($prime_genre_slider == 1): ?>
      <?php
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
      ?>
      <?php if(isset($all) && count($all) > 0): ?>
        <div class="genre-prime-block">
          <div class="container-fluid">
            <h5 class="section-heading"><?php echo e($home_translations->where('key', 'customers also watched')->first->value->value); ?></h5>
            <div class="genre-prime-slider owl-carousel">
              <?php if(isset($all)): ?>
                <?php $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
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
                  ?>
                  <?php if($item->type == 'S'): ?>
                    <div class="genre-prime-slide">
                      <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                        <a href="<?php echo e(url('show/detail',$item->id)); ?>">
                          <?php if($item->thumbnail != null): ?>
                            <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                          <?php elseif($item->tvseries->thumbnail != null): ?>
                            <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                          <?php else: ?>
                            <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
                          <?php endif; ?>
                        </a>
                      </div>
                      <div id="prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                        <h5 class="description-heading"><?php echo e($item->tvseries->title); ?></h5>
                        <div class="movie-rating">IMDB <?php echo e($item->tvseries->rating); ?></div>
                        <ul class="description-list">
                          <li>Season <?php echo e($item->season_no); ?></li>
                          <li><?php echo e($item->publish_year); ?></li>
                          <li><?php echo e($item->tvseries->age_req); ?></li>
                          <?php if($item->subtitle == 1): ?>
                            <li>CC</li>
                            <li>
                             <?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?>

                            </li>
                          <?php endif; ?>
                        </ul>
                        <div class="main-des">
                          <?php if($item->detail != null || $item->detail != ''): ?>
                            <p><?php echo e($item->detail); ?></p>
                          <?php else: ?>  
                            <p><?php echo e($item->tvseries->detail); ?></p>
                          <?php endif; ?>
                          <a href="#"></a>
                        </div>
                        <div class="des-btn-block">
                          <a href="#" onclick="playVideo(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                          <?php if(isset($wishlist_check->added)): ?>
                            <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                          <?php else: ?>
                            <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  <?php elseif($item->type == 'M'): ?>
                    <div class="genre-prime-slide">
                      <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?>">
                        <a href="<?php echo e(url('movie/detail',$item->id)); ?>">
                          <?php if($item->thumbnail != null): ?>
                            <img src="<?php echo e(asset('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                          <?php endif; ?>
                        </a>
                      </div>
                      <div id="prime-mix-description-block<?php echo e($item->id); ?>" class="prime-description-block">
                        <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                        <div class="movie-rating">IMDB <?php echo e($item->rating); ?></div>
                        <ul class="description-list">
                          <li><?php echo e($item->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                          <li><?php echo e($item->publish_year); ?></li>
                          <li><?php echo e($item->maturity_rating); ?></li>
                          <?php if($item->subtitle == 1): ?>
                            <li>CC</li>
                            <li>
                             <?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?>

                            </li>
                          <?php endif; ?>
                        </ul>
                        <div class="main-des">
                          <p><?php echo e($item->detail); ?></p>
                          <a href="#"></a>
                        </div>
                        <div class="des-btn-block">
                          <a href="#" onclick="playVideo(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                          <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                            <a href="#" onclick="playTrailer('<?php echo e($item->trailer_url); ?>')" class="btn-default"><?php echo e($popover_translations->where('key', 'watch trailer')->first->value->value); ?></a>
                          <?php endif; ?>
                          <?php if(isset($wishlist_check->added)): ?>
                            <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                          <?php else: ?>
                            <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php else: ?>
      <?php
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
      ?>
      <?php if(isset($all) && count($all) > 0): ?>
        <div class="genre-main-block">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <div class="genre-dtl-block">
                  <h3 class="section-heading"><?php echo e($home_translations->where('key', 'customers also watched')->first->value->value); ?></h3>
                  <p class="section-dtl"><?php echo e($home_translations->where('key', 'at the big screen at home')->first->value->value); ?></p>
                </div>
              </div>
              <div class="col-md-9">
                <div class="genre-main-slider owl-carousel">
                  <?php if(isset($all)): ?>
                    <?php $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($item->type == 'S'): ?>
                        <div class="genre-slide">
                          <div class="genre-slide-image">
                            <a href="<?php echo e(url('show/detail/'.$item->id)); ?>">
                              <?php if($item->thumbnail != null): ?>
                                <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                              <?php elseif($item->tvseries->thumbnail != null): ?>
                                <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                              <?php else: ?>
                                <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
                              <?php endif; ?>
                            </a>
                          </div>
                          <div class="genre-slide-dtl">
                            <h5 class="genre-dtl-heading"><a href="<?php echo e(url('show/detail/'.$item->id)); ?>"><?php echo e($item->tvseries->title); ?></a></h5>
                            <div class="genre-small-info"><?php echo e($item->detail != null ? $item->detail : $item->tvseries->detail); ?></div>
                          </div>
                        </div>
                      <?php elseif($item->type == 'M'): ?>
                        <div class="genre-slide">
                          <div class="genre-slide-image">
                            <a href="<?php echo e(url('movie/detail/'.$item->id)); ?>">
                              <?php if($item->thumbnail != null): ?>
                                <img src="<?php echo e(asset('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                              <?php endif; ?>
                            </a>
                          </div>
                          <div class="genre-slide-dtl">
                            <h5 class="genre-dtl-heading"><a href="<?php echo e(url('movie/detail/'.$item->id)); ?>"><?php echo e($item->title); ?></a></h5>
                          </div>
                        </div>
                      <?php endif; ?>    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </section>
<!-- end main wrapper -->
<!-- Player -->
  <div class="video-player">
    <div class="close-btn-block text-right">
      <a class="close-btn" onclick="closeVideo()"></a>
    </div>
    <video id="my_video_only" class="video-js movies-js vjs-big-play-centered"
           controls
           preload="auto"
    >
    </video>
    <div class="preview-player-block my-episodes">
      <video id="my_episodes" class="video-js episodes-js vjs-big-play-centered"
             controls
             preload="auto">
      </video>
      <div class="playlist-container  preview-player-dimensions vjs-fluid">
        <ol class="vjs-playlist"></ol>
      </div>
    </div>
  </div>
<!-- End Player -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
  <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
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
          this.$http.post('<?php echo e(route('addtowishlist')); ?>', this.result).then((response) => {
          }).catch((e) => {
            console.log(e);
          });
          this.result.item_id = '';
          this.result.item_type = '';
        }
      }
    });
    var player;
    var myEpisodes;
    var episodesPlayer;
    var List;
    var ConstList;
    var ConstPoster;
    var shareOptions = {
        socials: [''],
          url: window.location.href,
          title: 'videojs-share',
          description: 'video.js share plugin',
          isVkParse: true,
      };

    $(document).ready(function(){
      $('.main-des').curtail({
        limit: 120,
        toggle: true,
        text: ['<?php echo e($popover_translations->where('key', 'less')->first->value->value); ?>', '<?php echo e($popover_translations->where('key', 'read more')->first->value->value); ?>']
      });

      player = videojs('my_video_only', {
        playbackRates: [.5, 1, 1.5, 2],
        techOrder: ["html5", "youtube", "vimeo"],
        youtube: {ytControls: 2},
        html5: {
          nativeTextTracks: false
        },
        plugins: {
          hotkeys: {
            volumeStep: 0.1,
            seekStep: 5,
            enableModifiersForNumbers: false,
            enableNumbers: false
          },
          videoJsResolutionSwitcher: {
            ui: true,
            default: '480',
            dynamicLabel: true
          },
        }
      });

      $( ".vjs-audio-button" ).append('<span class="vjs-audio-button-label"><i class="fa fa-file-audio-o"></i></span>');
      $( ".vjs-subtitles-button" ).append('<span class="vjs-subtitles-button-label"><i class="fa fa-cc"></i></span>');

      myEpisodes = videojs('my_episodes', {
        playbackRates: [.5, 1, 1.5, 2],
        techOrder: ["html5", "youtube", "vimeo"],
        youtube: {ytControls: 2},
        plugins: {
          hotkeys: {
            volumeStep: 0.1,
            seekStep: 5,
            enableModifiersForNumbers: false,
            enableNumbers: false
          },
          videoJsResolutionSwitcher: {
            ui: true,
            default: '360',
            dynamicLabel: true
          }
        }
      });
      // episodesPlayer.share(shareOptions);
      // moviePlayer.share(shareOptions);
      <?php if(isset($season)): ?>
        app.$http.get(`<?php echo e(url('get-video-data')); ?>/<?php echo e($season->id); ?>/<?php echo e($season->type); ?>`).then((response) => {
          if ( response.status == 200 ) {
            ConstList = response.data.episode_data;
            ConstPoster = response.data.poster;
            setTimeout(function(){
              if (response.data.poster != null) {
                myEpisodes.poster('<?php echo e(url('images/tvseries/posters/')); ?>/'+ConstPoster);
              }
              $('.vjs-control-bar').removeClass('hide-visible');
              if (myEpisodes.currentType() == 'video/youtube' || myEpisodes.currentType() == 'video/vimeo') {
                $('.vjs-control-bar').addClass('hide-visible');
              }
              myEpisodes.playlist(ConstList);
              myEpisodes.playlistUi(); 
              myEpisodes.updateSrc(ConstList[myEpisodes.playlist.currentItem()].sources); 
              $('.vjs-playlist-item').on('click', function(){
                $('.vjs-control-bar').removeClass('hide-visible');
                setTimeout(function() {
                  myEpisodes.updateSrc(ConstList[myEpisodes.playlist.currentItem()].sources); 
                  if (myEpisodes.currentType() == 'video/youtube' || myEpisodes.currentType() == 'video/vimeo') {
                    $('.vjs-control-bar').addClass('hide-visible');
                  }
                  myEpisodes.play();
                }.bind(this), 300);
              });
            }.bind(this), 300);
          }
        }).catch((e) => {
          console.log(e);
        });
      <?php endif; ?>
    });

    function playEpisodes()
    {
      if (ConstPoster != null) {
        myEpisodes.poster('<?php echo e(url('images/tvseries/posters/')); ?>/'+ConstPoster);
      }
      $('#my_video_only').hide();
      $('.my-episodes').show();
      $('.video-player').css({
        "visibility" : "visible",
        "z-index" : "99999",
      });
      $('body').css({
        "overflow": "hidden"
      });
      myEpisodes.play();
    }

    function playEpisode(index)
    {
      if (ConstPoster != null) {
        myEpisodes.poster('<?php echo e(url('images/tvseries/posters/')); ?>/'+ConstPoster);
      }
      $('#my_video_only').hide();
      $('.my-episodes').show();
      $('.video-player').css({
        "visibility" : "visible",
        "z-index" : "99999",
      });
      $('body').css({
        "overflow": "hidden"
      });
      $('.vjs-control-bar').removeClass('hide-visible');
      myEpisodes.playlist(ConstList);
      myEpisodes.playlist.currentItem(index);
      if (myEpisodes.currentType() == 'video/youtube' || myEpisodes.currentType() == 'video/vimeo') {
        $('.vjs-control-bar').addClass('hide-visible');
      }
      myEpisodes.updateSrc(ConstList[myEpisodes.playlist.currentItem()].sources); 
      myEpisodes.play();
      myEpisodes.playlist.autoadvance(0);
    }

    function playVideo(id, type) {
      var links;
      var List;
      app.$http.get(`<?php echo e(url('get-video-data')); ?>/${id}/${type}`).then((response) => {
        if ( response.status == 200 ) {
          links = response.data.links;
          List = response.data.episode_data;
          setTimeout(function () {
            if (type == 'M') {
              $('#my_video').show();
              $('.my-episodes').hide();
              $('.vjs-control-bar').removeClass('hide-visible');
              if (response.data.poster != null) {
                player.poster('<?php echo e(url('images/movies/posters/')); ?>/'+response.data.poster);
              }
              if (links[0].type == 'video/youtube' || links[0].type == 'video/vimeo') {
                $('.vjs-control-bar').addClass('hide-visible');
                player.src(links[0]); 
              } else {
                player.updateSrc(links); 
              }
              player.play();
            } else if (type == 'S') {
              $('#my_video').hide();
              $('.my-episodes').show();
              $('.vjs-control-bar').removeClass('hide-visible');
              if (response.data.poster != null) {
                myEpisodes.poster('<?php echo e(url('images/tvseries/posters/')); ?>/'+response.data.poster);
              }
              if (myEpisodes.currentType() == 'video/youtube' || myEpisodes.currentType() == 'video/vimeo') {
                $('.vjs-control-bar').addClass('hide-visible');
              }
              myEpisodes.playlist(List);
              myEpisodes.playlistUi(); 
              myEpisodes.updateSrc(List[myEpisodes.playlist.currentItem()].sources); 
              myEpisodes.play();
              $('.vjs-playlist-item').on('click', function(){
                $('.vjs-control-bar').addClass('hide-visible');
                setTimeout(function(){
                  console.log(List[myEpisodes.playlist.currentItem()]);
                  console.log(myEpisodes.playlist.currentItem());
                  console.log(myEpisodes.src());
                  myEpisodes.updateSrc(List[myEpisodes.playlist.currentItem()].sources); 
                  if (myEpisodes.currentType() == 'video/youtube' || myEpisodes.currentType() == 'video/vimeo') {
                    $$('.vjs-control-bar').addClass('hide-visible');
                  }
                  myEpisodes.play();
                }.bind(this), 300);
              });
            }
          }.bind(this), 300);
        }
      }).catch((e) => {
        console.log(e);
      });

      $('.video-player').css({
        "visibility" : "visible",
        "z-index" : "99999",
      });
      $('body').css({
        "overflow": "hidden"
      });
    }

    function playTrailer(url) {
      $('.video-player').css({
        "visibility" : "visible",
        "z-index" : "99999",
      });
      $('body').css({
        "overflow": "hidden"
      });
      $('#my_video').show();
      $('.vjs-control-bar').removeClass('hide-visible');
      let str = url;
      let youtube_slice_1 = str.slice(0, 14);
      let youtube_slice_2 = str.slice(0, 20);
      if (youtube_slice_1 == "https://youtu." || youtube_slice_2 == "https://www.youtube.") {
        $('.vjs-control-bar').addClass('hide-visible');
        player.src({ type: "video/youtube", src: url});
      } else {
        player.src({ type: "video/mp4", src: url});
      }

      setTimeout(function(){
        player.play();
      }, 300);
    }

    function closeVideo() {
      $('.vjs-control-bar').removeClass('hide-visible');
      $('#my_video').hide();
      $('.my-episodes').hide();
      $('.video-player').css({
        "visibility" : "hidden",
        "z-index" : "-99999"
      });
      $('body').css({
        "overflow": "auto"
      });
      player.src(null);
      player.updateSrc(null);
      myEpisodes.src(null);
      myEpisodes.updateSrc(null);
      myEpisodes.playlist(null);
      links = null;
      list = null;
      player.pause();
      myEpisodes.pause();
    }

    function addWish(id, type) {
      app.addToWishList(id, type);
      setTimeout(function() {
        $('.addwishlistbtn'+id+type).text(function(i, text){
          return text == "<?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?>" ? "<?php echo e($popover_translations->where('key', 'remove from watchlist')->first->value->value); ?>" : "<?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?>";
        });
      }, 100);
    }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>