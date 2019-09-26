<?php $__env->startSection('main-wrapper'); ?>
  <!-- main wrapper  slider -->
  <section id="wishlistelement" class="main-wrapper">
    <div>
      <div id="home-main-block" class="home-main-block">
        <div id="home-slider-one" class="home-slider-one owl-carousel">
          <?php if(isset($home_slides)): ?>
            <?php $__currentLoopData = $home_slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($slide->active == 1): ?>
                <div class="slider-block">
                  <div class="slider-image">
                    <?php if($slide->movie_id != null): ?>
                      <a href="<?php echo e(url('movie/detail', $slide->movie->id)); ?>">
                        <?php if($slide->slide_image != null): ?>
                          <img src="<?php echo e(asset('images/home_slider/'. $slide->slide_image)); ?>" class="img-responsive" alt="slider-image">
                        <?php elseif($slide->movie->poster != null): ?>
                          <img src="<?php echo e(asset('images/movies/posters/'. $slide->movie->poster)); ?>" class="img-responsive" alt="slider-image">
                        <?php endif; ?>
                      </a>
                    <?php elseif($slide->tv_series_id != null && isset($slide->tvseries->seasons[0])): ?>
                      <a href="<?php echo e(url('show/detail', $slide->tvseries->seasons[0]->id)); ?>">
                        <?php if($slide->slide_image != null): ?>
                          <img src="<?php echo e(asset('images/home_slider/'. $slide->slide_image)); ?>" class="img-responsive" alt="slider-image">
                        <?php elseif($slide->tvseries->poster != null): ?>
                          <img src="<?php echo e(asset('images/tvseries/posters/'. $slide->tvseries->poster)); ?>" class="img-responsive" alt="slider-image">
                        <?php endif; ?>
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
      </div>
      <?php if($prime_genre_slider == 1): ?>
        <?php if( isset($all_mix) && count($all_mix) > 0): ?>
          <div class="genre-prime-block">
            <div class="container-fluid">
              <h5 class="section-heading"><?php echo e($home_translations->where('key', 'watch next tv series and movies')->first->value->value); ?></h5>
              <div class="genre-prime-slider owl-carousel">
                <?php $__currentLoopData = $all_mix; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                          <li><?php echo e($popover_translations->where('key', 'season')->first->value->value); ?> <?php echo e($item->season_no); ?></li>
                          <li><?php echo e($item->publish_year); ?></li>
                          <li><?php echo e($item->tvseries->age_req); ?></li>
                          <?php if($item->subtitle == 1): ?>
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
                          <?php if(isset($item->episodes[0])): ?>
                            <a href="#" onclick="playVideo(<?php echo e($item->id); ?>, '<?php echo e($item->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                          <?php endif; ?>
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
                          <?php else: ?>
                            <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
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
                          <a href="#" onclick="playVideo(<?php echo e($item->id); ?>, '<?php echo e($item->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
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
              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php if( isset($movies) && count($movies) > 0 ): ?>
          <div class="genre-prime-block">
            <div class="container-fluid">
              <h5 class="section-heading"><?php echo e($home_translations->where('key', 'watch next movies') ? $home_translations->where('key', 'watch next movies')->first->value->value : ''); ?></h5>
              <div class="genre-prime-slider owl-carousel">
                <?php if(isset($movies)): ?>
                  <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                          ['user_id', '=', $auth->id],
                                                                          ['movie_id', '=', $movie->id],
                                                                         ])->first();
                    ?>
                    <div class="genre-prime-slide">
                      <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-movie-description-block<?php echo e($movie->id); ?>">
                        <a href="<?php echo e(url('movie/detail',$movie->id)); ?>">
                          <?php if($movie->thumbnail != null || $movie->thumbnail != ''): ?>
                            <img src="<?php echo e(asset('images/movies/thumbnails/'.$movie->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                          <?php else: ?>
                            <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
                          <?php endif; ?>
                        </a>
                      </div>
                      <div id="prime-next-movie-description-block<?php echo e($movie->id); ?>" class="prime-description-block">
                        <div class="prime-description-under-block">                          
                          <h5 class="description-heading"><?php echo e($movie->title); ?></h5>
                          <div class="movie-rating">IMDB <?php echo e($movie->rating); ?></div>
                          <ul class="description-list">
                            <li><?php echo e($movie->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                            <li><?php echo e($movie->publish_year); ?></li>
                            <li><?php echo e($movie->maturity_rating); ?></li>
                            <?php if($movie->subtitle == 1): ?>
                              <li>
                               <?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?>

                              </li>
                            <?php endif; ?>
                          </ul>
                          <div class="main-des">
                            <p><?php echo e($movie->detail); ?></p>
                            <a href="#">Read more</a>
                          </div>
                          <div class="des-btn-block">
                            <a href="#" onclick="playVideo(<?php echo e($movie->id); ?>, '<?php echo e($movie->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                            <?php if($movie->trailer_url != null || $movie->trailer_url != ''): ?>
                              <a href="#" onclick="playTrailer('<?php echo e($movie->trailer_url); ?>')" class="btn-default"><?php echo e($popover_translations->where('key', 'watch trailer')->first->value->value); ?></a>
                            <?php endif; ?>
                            <?php if(isset($wishlist_check->added)): ?>
                              <a onclick="addWish(<?php echo e($movie->id); ?>,'<?php echo e($movie->type); ?>')" class="addwishlistbtn<?php echo e($movie->id); ?><?php echo e($movie->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                            <?php else: ?>
                              <a onclick="addWish(<?php echo e($movie->id); ?>,'<?php echo e($movie->type); ?>')" class="addwishlistbtn<?php echo e($movie->id); ?><?php echo e($movie->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                            <?php endif; ?>
                          </div>
                        </div>  
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php if( isset($tvserieses) && count($tvserieses) > 0 ): ?>
          <div class="genre-prime-block">
            <div class="container-fluid">
              <h5 class="section-heading"><?php echo e($home_translations->where('key', 'watch next tv series')->first->value->value); ?></h5>
              <div class="genre-prime-slider owl-carousel">
                <?php if(isset($tvserieses)): ?>
                  <?php $__currentLoopData = $tvserieses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $series): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $series->seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                          ['user_id', '=', $auth->id],
                                                                          ['season_id', '=', $item->id],
                                                                        ])->first();
                      ?>
                      <div class="genre-prime-slide">
                        <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-next-show-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
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
                        <div id="prime-next-show-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                          <h5 class="description-heading"><?php echo e($item->tvseries->title); ?></h5>
                          <div class="movie-rating">IMDB <?php echo e($item->tvseries->rating); ?></div>
                          <ul class="description-list">
                            <li><?php echo e($popover_translations->where('key', 'season')->first->value->value); ?> <?php echo e($item->season_no); ?></li>
                            <li><?php echo e($item->publish_year); ?></li>
                            <li><?php echo e($item->tvseries->age_req); ?></li>
                            <?php if($item->subtitle == 1): ?>
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
                            <a href="#" onclick="playVideo(<?php echo e($item->id); ?>, '<?php echo e($item->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                            <?php if(isset($wishlist_check->added)): ?>
                              <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                            <?php else: ?>
                              <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php if(isset($genres)): ?>
          <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $all_movies = collect();
              $fil_movies = $menu->menu_data;
              foreach ($fil_movies as $key => $value) {
                if ( isset($value->movie) ) {
                  $all_movies->push($value->movie);
                }
              }

              $all_movies = $all_movies->flatten();
              $all_movies =  $all_movies->filter(function($value, $key) {
                return  $value != null;
              });

              $movies = null;
              $movies = collect();
              foreach ($all_movies as $item) {
                if ($item->genre_id != null && $item->genre_id != '') {
                  $movie_genre_list = explode(',', $item->genre_id);
                  for($i = 0; $i < count($movie_genre_list); $i++) {
                    $check = Illuminate\Support\Facades\DB::table('genres')->where('id', '=', trim($movie_genre_list[$i]))->get();
                    if (isset($check[0]) && $check[0]->id == $genre->id) {
                      $movies->push($item);
                    }
                  }
                }
              }

            ?>
            <?php if(count($movies) > 0): ?>
              <div class="genre-prime-block">
                <div class="container-fluid">
                  <h5 class="section-heading inline"><?php echo e($genre->name); ?> <?php echo e($home_translations->where('key', 'movies')->first->value->value); ?></h5>
                  <a href="<?php echo e(url('movies/genre', $genre->id)); ?>" class="inline see-more"> <?php echo e($home_translations->where('key', 'view all')->first->value->value); ?></a>
                  <div class="genre-prime-slider owl-carousel">
                    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['movie_id', '=', $movie->id],
                                                                           ])->first();
                      ?>
                      <div class="genre-prime-slide">
                        <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-genre-movie-description-block<?php echo e($movie->id); ?>">
                          <a href="<?php echo e(url('movie/detail',$movie->id)); ?>">
                            <?php if($movie->thumbnail != null || $movie->thumbnail != ''): ?>
                              <img src="<?php echo e(asset('images/movies/thumbnails/'.$movie->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                            <?php else: ?>
                              <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
                            <?php endif; ?>
                          </a>
                        </div>
                        <div id="prime-genre-movie-description-block<?php echo e($movie->id); ?>" class="prime-description-block">
                          <div class="prime-description-under-block">                          
                            <h5 class="description-heading"><?php echo e($movie->title); ?></h5>
                            <div class="movie-rating">IMDB <?php echo e($movie->rating); ?></div>
                            <ul class="description-list">
                              <li><?php echo e($movie->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                              <li><?php echo e($movie->publish_year); ?></li>
                              <li><?php echo e($movie->maturity_rating); ?></li>
                              <?php if($movie->subtitle == 1): ?>
                                <li>
                                  <?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?>

                                </li>
                              <?php endif; ?>
                            </ul>
                            <div class="main-des">
                              <p><?php echo e($movie->detail); ?></p>
                              <a href="#"></a>
                            </div>
                            <div class="des-btn-block">
                              <a href="#" onclick="playVideo(<?php echo e($item->id); ?>, '<?php echo e($item->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                              <?php if($movie->trailer_url != null || $movie->trailer_url != ''): ?>
                                <a href="#" onclick="playTrailer('<?php echo e($item->trailer_url); ?>')" class="btn-default"><?php echo e($popover_translations->where('key', 'watch trailer')->first->value->value); ?></a>
                              <?php endif; ?>
                              <?php if(isset($wishlist_check->added)): ?>
                                <a onclick="addWish(<?php echo e($movie->id); ?>,'<?php echo e($movie->type); ?>')" class="addwishlistbtn<?php echo e($movie->id); ?><?php echo e($movie->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                              <?php else: ?>
                                <a onclick="addWish(<?php echo e($movie->id); ?>,'<?php echo e($movie->type); ?>')" class="addwishlistbtn<?php echo e($movie->id); ?><?php echo e($movie->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                              <?php endif; ?>
                            </div>
                          </div>  
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(isset($genres)): ?>
          <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $all_tvseries = collect();
              $fil_tvserieses = $menu->menu_data;
              foreach ($fil_tvserieses as $key => $value) {
                if (isset($value->tvseries)) {
                  $all_tvseries->push($value->tvseries);
                }
              }

              $all_tvseries = $all_tvseries->flatten();
              $all_tvseries =  $all_tvseries->filter(function($value, $key) {
                return  $value != null;
              });

              $seasons = collect();
              foreach ($all_tvseries as $item) {
                if ($item->genre_id != null && $item->genre_id != '') {
                  $tvseries_genre_list = explode(',', $item->genre_id);
                  for($i = 0; $i < count($tvseries_genre_list); $i++) {
                    $check = Illuminate\Support\Facades\DB::table('genres')->where('id', '=', trim($tvseries_genre_list[$i]))->get();
                    if (isset($check[0]) && $check[0]->id == $genre->id) {
                      $seasons->push($item->seasons);
                    }
                  }
                }  
              }
              $seasons = $seasons->shuffle()->flatten();
            ?>
            <?php if(count($seasons) > 0): ?>
              <div class="genre-prime-block">
                <div class="container-fluid">
                  <h5 class="section-heading inline"><?php echo e($genre->name); ?> <?php echo e($home_translations->where('key', 'tv shows')->first->value->value); ?></h5>
                  <a href="<?php echo e(url('tvseries/genre', $genre->id)); ?>" class="inline see-more"> <?php echo e($home_translations->where('key', 'view all')->first->value->value); ?></a>
                  <div class="genre-prime-slider owl-carousel">
                    <?php $__currentLoopData = $seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                           $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['season_id', '=', $item->id],
                                                                           ])->first();
                      ?>
                      <div class="genre-prime-slide">
                        <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-genre-tvseries-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
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
                        <div id="prime-genre-tvseries-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                          <h5 class="description-heading"><?php echo e($item->tvseries->title); ?></h5>
                          <div class="movie-rating">IMDB <?php echo e($item->tvseries->rating); ?></div>
                          <ul class="description-list">
                            <li><?php echo e($popover_translations->where('key', 'season')->first->value->value); ?> <?php echo e($item->season_no); ?></li>
                            <li><?php echo e($item->publish_year); ?></li>
                            <li><?php echo e($item->tvseries->age_req); ?></li>
                            <?php if($item->subtitle == 1): ?>
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
                            <a href="#" onclick="playVideo(<?php echo e($item->id); ?>, '<?php echo e($item->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                            <?php if(isset($wishlist_check->added)): ?>
                              <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                            <?php else: ?>
                              <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(isset($a_languages)): ?>
          <?php $__currentLoopData = $a_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $all_movies = collect();
              $fil_movies = $menu->menu_data;
              foreach ($fil_movies as $key => $value) {
                if (isset($value->movie)) {
                  $all_movies->push($value->movie);
                }
              }

              $all_movies = $all_movies->flatten();
              $all_movies =  $all_movies->filter(function($value, $key) {
                return  $value != null;
              });

              $movies = null;
              $movies = collect();
              foreach ($all_movies as $item) {
                if ($item->a_language != null && $item->a_language != '') {
                  $movie_lang_list = explode(',', $item->a_language);
                  for($i = 0; $i < count($movie_lang_list); $i++) {
                    $check = \App\AudioLanguage::find(trim($movie_lang_list[$i]));
                    if (isset($check) && $check->id == $lang->id) {
                      $movies->push($item);
                    }
                  }
                }
              }
            ?>
            <?php if(count($movies) > 0): ?>
              <div class="genre-prime-block">
                <div class="container-fluid">
                  <h5 class="section-heading inline"><?php echo e($home_translations->where('key', 'movies in')->first->value->value); ?> <?php echo e($lang->language); ?></h5>
                  <a href="<?php echo e(url('movies/language', $lang->id)); ?>" class="inline see-more"> <?php echo e($home_translations->where('key', 'view all')->first->value->value); ?></a>
                  <div class="genre-prime-slider owl-carousel">
                    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['movie_id', '=', $movie->id],
                                                                           ])->first();
                      ?>
                      <div class="genre-prime-slide">
                        <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-lang-movie-description-block<?php echo e($movie->id); ?>">
                          <a href="<?php echo e(url('movie/detail',$movie->id)); ?>">
                            <?php if($movie->thumbnail != null || $movie->thumbnail != ''): ?>
                              <img src="<?php echo e(asset('images/movies/thumbnails/'.$movie->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                            <?php else: ?>
                              <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
                            <?php endif; ?>
                          </a>
                        </div>
                        <div id="prime-lang-movie-description-block<?php echo e($movie->id); ?>" class="prime-description-block">
                          <div class="prime-description-under-block">                          
                            <h5 class="description-heading"><?php echo e($movie->title); ?></h5>
                            <div class="movie-rating">IMDB <?php echo e($movie->rating); ?></div>
                            <ul class="description-list">
                              <li><?php echo e($movie->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                              <li><?php echo e($movie->publish_year); ?></li>
                              <li><?php echo e($movie->maturity_rating); ?></li>
                              <?php if($movie->subtitle == 1): ?>
                                <li>
                                  <?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?>

                                </li>
                              <?php endif; ?>
                            </ul>
                            <div class="main-des">
                              <p><?php echo e($movie->detail); ?></p>
                              <a href="#"></a>
                            </div>
                            <div class="des-btn-block">
                              <a href="#" onclick="playVideo(<?php echo e($movie->id); ?>, '<?php echo e($movie->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                              <?php if($movie->trailer_url != null || $movie->trailer_url != ''): ?>
                                <a href="#" onclick="playTrailer('<?php echo e($item->trailer_url); ?>')" class="btn-default"><?php echo e($popover_translations->where('key', 'watch trailer')->first->value->value); ?></a>
                              <?php endif; ?>
                              <?php if(isset($wishlist_check->added)): ?>
                                <a onclick="addWish(<?php echo e($movie->id); ?>,'<?php echo e($movie->type); ?>')" class="addwishlistbtn<?php echo e($movie->id); ?><?php echo e($movie->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                              <?php else: ?>
                                <a onclick="addWish(<?php echo e($movie->id); ?>,'<?php echo e($movie->type); ?>')" class="addwishlistbtn<?php echo e($movie->id); ?><?php echo e($movie->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                              <?php endif; ?>
                            </div>
                          </div>  
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(isset($a_languages)): ?>
          <?php $__currentLoopData = $a_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $all_tvseries = collect();
              $fil_tvserieses = $menu->menu_data;
              foreach ($fil_tvserieses as $key => $value) {
                if (isset($value->tvseries)) {
                  $all_tvseries->push($value->tvseries);
                }
              }

              $all_tvseries = $all_tvseries->flatten();
              $all_tvseries =  $all_tvseries->filter(function($value, $key) {
                return  $value != null;
              });

              $all_seasons = null;
              $all_seasons = collect();

              foreach ($all_tvseries as $tv) {
                if ( isset($tv->seasons) && count($tv->seasons) > 0 ) {
                  $all_seasons->push($tv->seasons);
                } 
              }
              $all_seasons = $all_seasons->flatten();
              $all_seasons =  $all_seasons->filter(function($value, $key) {
                return  $value != null;
              });

              $seasons = null;
              $seasons = collect();
              foreach ($all_seasons as $item) {
                if ($item->a_language != null && $item->a_language != '') {
                  $season_lang_list = explode(',', $item->a_language);
                  for($i = 0; $i < count($season_lang_list); $i++) {
                    $check = \App\AudioLanguage::find(trim($season_lang_list[$i]));
                    if (isset($check) && $check->id == $lang->id) {
                      $seasons->push($item);
                    }
                  }
                }
              }
              $seasons = $seasons->flatten();
            ?>
            <?php if(count($seasons) > 0): ?>
              <div class="genre-prime-block">
                <div class="container-fluid">
                  <h5 class="section-heading inline"><?php echo e($home_translations->where('key', 'tv shows in')->first->value->value); ?> <?php echo e($lang->language); ?></h5>
                  <a href="<?php echo e(url('tvseries/language', $lang->id)); ?>" class="inline see-more"> <?php echo e($home_translations->where('key', 'view all')->first->value->value); ?></a>
                  <div class="genre-prime-slider owl-carousel">
                    <?php $__currentLoopData = $seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                           $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['season_id', '=', $item->id],
                                                                           ])->first();
                      ?>
                      <div class="genre-prime-slide">
                        <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-genre-tvseries-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
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
                        <div id="prime-genre-tvseries-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                          <h5 class="description-heading"><?php echo e($item->tvseries->title); ?></h5>
                          <div class="movie-rating">IMDB <?php echo e($item->tvseries->rating); ?></div>
                          <ul class="description-list">
                            <li><?php echo e($popover_translations->where('key', 'season')->first->value->value); ?> <?php echo e($item->season_no); ?></li>
                            <li><?php echo e($item->publish_year); ?></li>
                            <li><?php echo e($item->tvseries->age_req); ?></li>
                            <?php if($item->subtitle == 1): ?>
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
                            <a href="#" onclick="playVideo(<?php echo e($item->id); ?>, '<?php echo e($item->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                            <?php if(isset($wishlist_check->added)): ?>
                              <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                            <?php else: ?>
                              <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(isset($featured_movies) && count($featured_movies) > 0): ?>
          <div class="genre-prime-block">
            <div class="container-fluid">
              <h5 class="section-heading"><?php echo e($home_translations->where('key', 'featured')->first->value->value); ?> <?php echo e($home_translations->where('key', 'movies')->first->value->value); ?></h5>
              <div class="genre-prime-slider owl-carousel">
                <?php $__currentLoopData = $featured_movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                        ['user_id', '=', $auth->id],
                                                                        ['movie_id', '=', $movie->id],
                                                                       ])->first();
                  ?>
                  <div class="genre-prime-slide">
                    <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-genre-movie-description-block<?php echo e($movie->id); ?>">
                      <a href="<?php echo e(url('movie/detail',$movie->id)); ?>">
                        <?php if($movie->thumbnail != null || $movie->thumbnail != ''): ?>
                          <img src="<?php echo e(asset('images/movies/thumbnails/'.$movie->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                        <?php else: ?>
                          <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
                        <?php endif; ?>
                      </a>
                    </div>
                    <div id="prime-genre-movie-description-block<?php echo e($movie->id); ?>" class="prime-description-block">
                      <div class="prime-description-under-block">                          
                        <h5 class="description-heading"><?php echo e($movie->title); ?></h5>
                        <div class="movie-rating">IMDB <?php echo e($movie->rating); ?></div>
                        <ul class="description-list">
                          <li><?php echo e($movie->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?></li>
                          <li><?php echo e($movie->publish_year); ?></li>
                          <li><?php echo e($movie->maturity_rating); ?></li>
                          <?php if($movie->subtitle == 1): ?>
                            <li>
                              <?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?>

                            </li>
                          <?php endif; ?>
                        </ul>
                        <div class="main-des">
                          <p><?php echo e($movie->detail); ?></p>
                          <a href="#"></a>
                        </div>
                        <div class="des-btn-block">
                          <a href="#" onclick="playVideo(<?php echo e($movie->id); ?>, '<?php echo e($movie->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                          <?php if($movie->trailer_url != null || $movie->trailer_url != ''): ?>
                            <a href="#" onclick="playTrailer('<?php echo e($item->trailer_url); ?>')" class="btn-default"><?php echo e($popover_translations->where('key', 'watch trailer')->first->value->value); ?></a>
                          <?php endif; ?>
                          <?php if(isset($wishlist_check->added)): ?>
                            <a onclick="addWish(<?php echo e($movie->id); ?>,'<?php echo e($movie->type); ?>')" class="addwishlistbtn<?php echo e($movie->id); ?><?php echo e($movie->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                          <?php else: ?>
                            <a onclick="addWish(<?php echo e($movie->id); ?>,'<?php echo e($movie->type); ?>')" class="addwishlistbtn<?php echo e($movie->id); ?><?php echo e($movie->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                          <?php endif; ?>
                        </div>
                      </div>  
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php if(isset($featured_seasons) && count($featured_seasons) > 0): ?>
          <div class="genre-prime-block">
            <div class="container-fluid">
              <h5 class="section-heading"><?php echo e($home_translations->where('key', 'featured')->first->value->value); ?> <?php echo e($home_translations->where('key', 'tv shows')->first->value->value); ?></h5>
              <div class="genre-prime-slider owl-carousel">
                <?php $__currentLoopData = $featured_seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                       $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                        ['user_id', '=', $auth->id],
                                                                        ['season_id', '=', $item->id],
                                                                       ])->first();
                  ?>
                  <div class="genre-prime-slide">
                    <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-genre-tvseries-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
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
                    <div id="prime-genre-tvseries-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                      <h5 class="description-heading"><?php echo e($item->tvseries->title); ?></h5>
                      <div class="movie-rating">IMDB <?php echo e($item->tvseries->rating); ?></div>
                      <ul class="description-list">
                        <li><?php echo e($popover_translations->where('key', 'season')->first->value->value); ?> <?php echo e($item->season_no); ?></li>
                        <li><?php echo e($item->publish_year); ?></li>
                        <li><?php echo e($item->tvseries->age_req); ?></li>
                        <?php if($item->subtitle == 1): ?>
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
                        <a href="#" onclick="playVideo(<?php echo e($item->id); ?>, '<?php echo e($item->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                        <?php if(isset($wishlist_check->added)): ?>
                          <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                        <?php else: ?>
                          <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php else: ?>
        <div class="genre-main-block">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <div class="genre-dtl-block">
                  <h3 class="section-heading"><?php echo e($home_translations->where('key', 'watch next tv series and movies')->first->value->value); ?></h3>
                  <p class="section-dtl"><?php echo e($home_translations->where('key', 'at the big screen at home')->first->value->value); ?></p>
                </div>
              </div>
              <div class="col-md-9">
                <div class="genre-main-slider owl-carousel">
                  <?php if(isset($all_mix)): ?>
                    <?php $__currentLoopData = $all_mix; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                          </div>
                        </div>
                      <?php elseif($item->type == 'M'): ?>
                        <div class="genre-slide">
                          <div class="genre-slide-image">
                            <a href="<?php echo e(url('movie/detail/'.$item->id)); ?>">
                              <?php if($item->thumbnail != null): ?>
                                <img src="<?php echo e(asset('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                              <?php else: ?>
                                <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
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
        <div class="genre-main-block">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <div class="genre-dtl-block">
                  <h3 class="section-heading"><?php echo e($home_translations->where('key', 'watch next movies')->first->value->value); ?></h3>
                  <p class="section-dtl"><?php echo e($home_translations->where('key', 'at the big screen at home')->first->value->value); ?></p>
                </div>
              </div>
              <div class="col-md-9">
                <div class="genre-main-slider owl-carousel">
                  <?php if(isset($movies)): ?>
                    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                          $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['movie_id', '=', $movie->id],
                                                                           ])->first();
                      ?>
                      <div class="genre-slide">
                        <div class="genre-slide-image">
                          <a href="<?php echo e(url('movie/detail/'.$movie->id)); ?>">
                            <?php if($movie->thumbnail != null): ?>
                              <img src="<?php echo e(asset('images/movies/thumbnails/'.$movie->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                            <?php else: ?>
                              <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
                            <?php endif; ?>
                          </a>
                        </div>
                        <div class="genre-slide-dtl">
                          <h5 class="genre-dtl-heading"><a href="<?php echo e(url('movie/detail/'.$movie->id)); ?>"><?php echo e($movie->title); ?></a></h5>
                        </div>
                      </div>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="genre-main-block">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <div class="genre-dtl-block">
                  <h3 class="section-heading"><?php echo e($home_translations->where('key', 'watch next tv series')->first->value->value); ?></h3>
                  <p class="section-dtl"><?php echo e($home_translations->where('key', 'at the big screen at home')->first->value->value); ?></p>
                </div>
              </div>
              <div class="col-md-9">
                <div class="genre-main-slider owl-carousel">
                  <?php if(isset($tvserieses)): ?>
                    <?php $__currentLoopData = $tvserieses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tvseries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php $__currentLoopData = $tvseries->seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                         $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                          ['user_id', '=', $auth->id],
                                                                          ['season_id', '=', $item->id],
                                                                         ])->first();
                        ?>
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
                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if(isset($genres)): ?>
          <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $all_movies = collect();
              $fil_movies = $menu->menu_data;
              foreach ($fil_movies as $key => $value) {
                if ( isset($value->movie) ) {
                  $all_movies->push($value->movie);
                }
              }

              $all_movies = $all_movies->flatten();
              $all_movies =  $all_movies->filter(function($value, $key) {
                return  $value != null;
              });

              $movies = null;
              $movies = collect();
              foreach ($all_movies as $item) {
                if ($item->genre_id != null && $item->genre_id != '') {
                  $movie_genre_list = explode(',', $item->genre_id);
                  for($i = 0; $i < count($movie_genre_list); $i++) {
                    $check = Illuminate\Support\Facades\DB::table('genres')->where('id', '=', trim($movie_genre_list[$i]))->get();
                    if (isset($check[0]) && $check[0]->id == $genre->id) {
                      $movies->push($item);
                    }
                  }
                }
              }
            ?>
            <?php if(count($movies) > 0): ?>
              <div class="genre-main-block">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="genre-dtl-block">
                        <h3 class="section-heading"><?php echo e($genre->name); ?> <?php echo e($home_translations->where('key', 'movies')->first->value->value); ?></h3>
                        <p class="section-dtl"><?php echo e($home_translations->where('key', 'at the big screen at home')->first->value->value); ?></p>
                        <a href="<?php echo e(url('movies/genre', $genre->id)); ?>" class="btn-more"><?php echo e($home_translations->where('key', 'view all')->first->value->value); ?></a>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="genre-main-slider owl-carousel">
                        <?php if(isset($movies)): ?>
                          <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                                  ['user_id', '=', $auth->id],
                                                                                  ['movie_id', '=', $item->id],
                                                                                 ])->first();
                            ?>
                            <div class="genre-slide">
                              <div class="genre-slide-image">
                                <a href="<?php echo e(url('movie/detail/'.$movie->id)); ?>">
                                  <?php if($movie->thumbnail != null): ?>
                                    <img src="<?php echo e(asset('images/movies/thumbnails/'.$movie->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                                  <?php else: ?>
                                    <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
                                  <?php endif; ?>
                                </a>
                              </div>
                              <div class="genre-slide-dtl">
                                <h5 class="genre-dtl-heading"><a href="<?php echo e(url('movie/detail/'.$movie->id)); ?>"><?php echo e($movie->title); ?></a></h5>
                              </div>
                            </div>  
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(isset($genres)): ?>
          <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $all_tvseries = collect();
              $fil_tvserieses = $menu->menu_data;
              foreach ($fil_tvserieses as $key => $value) {
                if (isset($value->tvseries)) {
                  $all_tvseries->push($value->tvseries);
                }
              }

              $all_tvseries = $all_tvseries->flatten();
              $all_tvseries =  $all_tvseries->filter(function($value, $key) {
                return  $value != null;
              });

              $seasons = collect();
              foreach ($all_tvseries as $item) {
                if ($item->genre_id != null && $item->genre_id != '') {
                  $tvseries_genre_list = explode(',', $item->genre_id);
                  for($i = 0; $i < count($tvseries_genre_list); $i++) {
                    $check = Illuminate\Support\Facades\DB::table('genres')->where('id', '=', trim($tvseries_genre_list[$i]))->get();
                    if (isset($check[0]) && $check[0]->id == $genre->id) {
                      $seasons->push($item->seasons);
                    }
                  }
                }  
              }
              $seasons = $seasons->shuffle()->flatten();
            ?>
            <?php if(count($seasons) > 0): ?>
              <div class="genre-main-block">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="genre-dtl-block">
                        <h3 class="section-heading"><?php echo e($genre->name); ?> <?php echo e($home_translations->where('key', 'tv shows')->first->value->value); ?></h3>
                        <p class="section-dtl"><?php echo e($home_translations->where('key', 'at the big screen at home')->first->value->value); ?></p>
                        <a href="<?php echo e(url('tvseries/genre', $genre->id)); ?>" class="btn-more"><?php echo e($home_translations->where('key', 'view all')->first->value->value); ?></a>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="genre-main-slider owl-carousel">
                        <?php if(isset($seasons)): ?>
                          <?php $__currentLoopData = $seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                             $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                              ['user_id', '=', $auth->id],
                                                                              ['season_id', '=', $item->id],
                                                                             ])->first();
                            ?>
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
                              </div>
                            </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(isset($a_languages)): ?>
          <?php $__currentLoopData = $a_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $all_movies = collect();
              $fil_movies = $menu->menu_data;
              foreach ($fil_movies as $key => $value) {
                if (isset($value->movie)) {
                  $all_movies->push($value->movie);
                }
              }

              $all_movies = $all_movies->flatten();
              $all_movies =  $all_movies->filter(function($value, $key) {
                return  $value != null;
              });

              $movies = null;
              $movies = collect();
              foreach ($all_movies as $item) {
                if ($item->a_language != null && $item->a_language != '') {
                  $movie_lang_list = explode(',', $item->a_language);
                  for($i = 0; $i < count($movie_lang_list); $i++) {
                    $check = \App\AudioLanguage::find(trim($movie_lang_list[$i]));
                    if (isset($check) && $check->id == $lang->id) {
                      $movies->push($item);
                    }
                  }
                }
              }
            ?>
            <?php if(count($movies) > 0): ?>
              <div class="genre-main-block">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="genre-dtl-block">
                        <h3 class="section-heading"><?php echo e($home_translations->where('key', 'movies in')->first->value->value); ?> <?php echo e($lang->language); ?></h3>
                        <p class="section-dtl"><?php echo e($home_translations->where('key', 'at the big screen at home')->first->value->value); ?></p>
                        <a href="<?php echo e(url('movies/language', $lang->id)); ?>" class="btn-more"><?php echo e($home_translations->where('key', 'view all')->first->value->value); ?></a>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="genre-main-slider owl-carousel">
                        <?php if(isset($movies)): ?>
                          <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                                  ['user_id', '=', $auth->id],
                                                                                  ['movie_id', '=', $item->id],
                                                                                 ])->first();
                            ?>
                            <div class="genre-slide">
                              <div class="genre-slide-image">
                                <a href="<?php echo e(url('movie/detail/'.$movie->id)); ?>">
                                  <?php if($movie->thumbnail != null): ?>
                                    <img src="<?php echo e(asset('images/movies/thumbnails/'.$movie->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                                  <?php else: ?>
                                    <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
                                  <?php endif; ?>
                                </a>
                              </div>
                              <div class="genre-slide-dtl">
                                <h5 class="genre-dtl-heading"><a href="<?php echo e(url('movie/detail/'.$movie->id)); ?>"><?php echo e($movie->title); ?></a></h5>
                              </div>
                            </div>  
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(isset($a_languages)): ?>
          <?php $__currentLoopData = $a_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $all_tvseries = collect();
              $fil_tvserieses = $menu->menu_data;
              foreach ($fil_tvserieses as $key => $value) {
                if (isset($value->tvseries)) {
                  $all_tvseries->push($value->tvseries);
                }
              }

              $all_tvseries = $all_tvseries->flatten();
              $all_tvseries =  $all_tvseries->filter(function($value, $key) {
                return  $value != null;
              });

              $all_seasons = null;
              $all_seasons = collect();

              foreach ($all_tvseries as $tv) {
                if ( isset($tv->seasons) && count($tv->seasons) > 0 ) {
                  $all_seasons->push($tv->seasons);
                } 
              }
              $all_seasons = $all_seasons->flatten();
              $all_seasons =  $all_seasons->filter(function($value, $key) {
                return  $value != null;
              });

              $seasons = null;
              $seasons = collect();
              foreach ($all_seasons as $item) {
                if ($item->a_language != null && $item->a_language != '') {
                  $season_lang_list = explode(',', $item->a_language);
                  for($i = 0; $i < count($season_lang_list); $i++) {
                    $check = \App\AudioLanguage::find(trim($season_lang_list[$i]));
                    if (isset($check) && $check->id == $lang->id) {
                      $seasons->push($item);
                    }
                  }
                }
              }
              $seasons = $seasons->flatten();
            ?>
            <?php if(count($seasons) > 0): ?>
              <div class="genre-main-block">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="genre-dtl-block">
                        <h3 class="section-heading"><?php echo e($home_translations->where('key', 'tv shows in')->first->value->value); ?> <?php echo e($lang->language); ?></h3>
                        <p class="section-dtl"><?php echo e($home_translations->where('key', 'at the big screen at home')->first->value->value); ?></p>
                        <a href="<?php echo e(url('tvseries/language', $lang->id)); ?>" class="btn-more"><?php echo e($home_translations->where('key', 'view all')->first->value->value); ?></a>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="genre-main-slider owl-carousel">
                        <?php if(isset($seasons)): ?>
                          <?php $__currentLoopData = $seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                             $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                              ['user_id', '=', $auth->id],
                                                                              ['season_id', '=', $item->id],
                                                                             ])->first();
                            ?>
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
                              </div>
                            </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(isset($featured_movies) && count($featured_movies) > 0): ?>
          <div class="genre-main-block">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
                  <div class="genre-dtl-block">
                    <h3 class="section-heading"><?php echo e($home_translations->where('key', 'featured')->first->value->value); ?> <?php echo e($home_translations->where('key', 'movies')->first->value->value); ?></h3>
                    <p class="section-dtl"><?php echo e($home_translations->where('key', 'at the big screen at home')->first->value->value); ?></p>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="genre-main-slider owl-carousel">
                    <?php $__currentLoopData = $featured_movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                          $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['movie_id', '=', $item->id],
                                                                           ])->first();
                      ?>
                      <div class="genre-slide">
                        <div class="genre-slide-image">
                          <a href="<?php echo e(url('movie/detail/'.$movie->id)); ?>">
                            <?php if($movie->thumbnail != null): ?>
                              <img src="<?php echo e(asset('images/movies/thumbnails/'.$movie->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                            <?php else: ?>
                              <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
                            <?php endif; ?>
                          </a>
                        </div>
                        <div class="genre-slide-dtl">
                          <h5 class="genre-dtl-heading"><a href="<?php echo e(url('movie/detail/'.$movie->id)); ?>"><?php echo e($movie->title); ?></a></h5>
                        </div>
                      </div>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php if(isset($featured_seasons) && count($featured_seasons) > 0): ?>
          <div class="genre-main-block">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
                  <div class="genre-dtl-block">
                    <h3 class="section-heading"><?php echo e($home_translations->where('key', 'featured')->first->value->value); ?> <?php echo e($home_translations->where('key', 'tv shows')->first->value->value); ?></h3>
                    <p class="section-dtl"><?php echo e($home_translations->where('key', 'at the big screen at home')->first->value->value); ?></p>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="genre-main-slider owl-carousel">
                    <?php $__currentLoopData = $featured_seasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                       $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                        ['user_id', '=', $auth->id],
                                                                        ['season_id', '=', $item->id],
                                                                       ])->first();
                      ?>
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
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </section>
  <div class="video-player">
    <div class="close-btn-block text-right">
      <a class="close-btn" onclick="closeVideo()"></a>
    </div>
    <video id="my_video" class="video-js movies-js vjs-default-skin vjs-big-play-centered"
           controls
           preload="auto"
    >
    </video>
    <div class="preview-player-block my-episodes">
      <video id="my_episodes" class="video-js episodes-js vjs-default-skin vjs-big-play-centered"
             controls
             preload="auto"
      >
      </video>
      <div class="playlist-container  preview-player-dimensions vjs-fluid">
        <ol class="vjs-playlist"></ol>
      </div>
    </div>
  </div>

  <!-- end main wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
  <script>
    var app = new Vue({
      el: '.des-btn-block',
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
    $(document).ready(function(){
      $.protip();
      $('.main-des').curtail({
        limit: 120,
        toggle: true,
        text: ['<?php echo e($popover_translations->where('key', 'less')->first->value->value); ?>', '<?php echo e($popover_translations->where('key', 'read more')->first->value->value); ?>']
      });
      player = videojs('my_video', {
        playackRates: [.5, 1, 1.5, 2],
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
    });

    function playVideo(id, type) {
      var links;
      var List;
      app.$http.get(`<?php echo e(url('get-video-data')); ?>/${id}/${type}`).then((response) => {
        if ( response.status == 200 ) {
          links = response.data.links;
          List = response.data.episode_data;
          console.log(links);
          setTimeout(function(){
            console.log(response.data.poster);
            console.log(response);
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
                $('.vjs-control-bar').removeClass('hide-visible');
                setTimeout(function(){
                  console.log(List[myEpisodes.playlist.currentItem()]);
                  console.log(myEpisodes.playlist.currentItem());
                  console.log(myEpisodes.src());
                  myEpisodes.updateSrc(List[myEpisodes.playlist.currentItem()].sources); 
                  if (myEpisodes.currentType() == 'video/youtube' || myEpisodes.currentType() == 'video/vimeo') {
                    $('.vjs-control-bar').addClass('hide-visible');
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
      if (youtube_slice_1 == "https://youtu." || youtube_slice_2 == "https://www.youtube.")
      {
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
      $('#my_video').hide();
      $('.my-episodes').hide();
      $('.video-player').css({
        "visibility" : "hidden",
        "z-index" : "-99999"
      });
      $('body').css({
        "overflow": "auto"
      });
      $('.vjs-control-bar').removeClass('hide-visible');
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