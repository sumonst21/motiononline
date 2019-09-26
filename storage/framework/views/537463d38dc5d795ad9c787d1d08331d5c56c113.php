<?php $__env->startSection('main-wrapper'); ?>
  <!-- main wrapper -->
  <section class="main-wrapper main-wrapper-single-movie-prime">
    <?php if(isset($filter_video)): ?>
      <?php if(count($filter_video) > 0): ?>
        <div class="container-fluid movie-series-section search-section">
          <h5 class="movie-series-heading"><?php echo e(count($filter_video)); ?> <?php echo e($home_translations->where('key', 'found for')->first->value->value); ?> "<?php echo e($searchKey); ?>"</h5>
          <div>
            <?php $__currentLoopData = $filter_video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                if ($item->type == 'M')
                {
                  $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['movie_id', '=', $item->id],
                                                                           ])->first();
                } else {
                  $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['season_id', '=', $item->id],
                                                                           ])->first();
                }
              ?>
              <div class="movie-series-block">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="movie-series-img">
                      <?php if($item->type == 'M' && $item->thumbnail != null): ?>
                        <img src="<?php echo e(asset('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                      <?php elseif($item->type == 'M' && $item->thumbnail == null): ?>  
                        <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                      <?php elseif($item->type == 'S'): ?>
                        <?php if($item->thumbnail != null): ?>
                          <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                        <?php elseif($item->tvseries->thumbnail != null): ?>
                          <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                        <?php else: ?>
                          <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">  
                        <?php endif; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-sm-7 pad-0">
                    <h5 class="movie-series-heading movie-series-name">
                      <?php if($item->type == 'M'): ?>
                        <a href="<?php echo e(url('movie/detail', $item->id)); ?>"><?php echo e($item->title); ?></a>
                      <?php elseif($item->type == 'S'): ?>
                        <a href="<?php echo e(url('show/detail', $item->id)); ?>"><?php echo e($item->tvseries->title); ?></a>
                      <?php endif; ?>
                    </h5>
                    <ul class="movie-series-des-list">
                      <?php if($item->type == 'M'): ?>
                        <li>IMDB <?php echo e($item->rating); ?></li>                        
                      <?php endif; ?>
                      <?php if($item->type == 'S'): ?>
                        <li>IMDB <?php echo e($item->tvseries->rating); ?></li>                        
                      <?php endif; ?>
                      <li>
                        <?php if($item->type == 'M'): ?>
                          <?php echo e($item->duration); ?> <?php echo e($popover_translations->where('key', 'mins')->first->value->value); ?>

                        <?php else: ?>
                         <?php echo e($popover_translations->where('key', 'season')->first->value->value); ?> <?php echo e($item->season_no); ?>

                        <?php endif; ?>
                      </li>
                      <?php if($item->type == 'M'): ?>
                        <li><?php echo e($item->released); ?></li>
                      <?php else: ?>
                        <li><?php echo e($item->publish_year); ?></li>  
                      <?php endif; ?>
                      <li>
                        <?php if($item->type == 'M'): ?>
                          <?php echo e($item->maturity_rating); ?>

                        <?php else: ?>
                          <?php echo e($item->tvseries->maturity_rating); ?> 
                        <?php endif; ?>
                      </li>
                      <?php if($item->subtitle == 1): ?>
                        <li>
                          <?php echo e($popover_translations->where('key', 'subtitles')->first->value->value); ?>

                        </li>
                      <?php endif; ?>
                    </ul>
                    <p>
                      <?php if($item->type == 'M'): ?>
                        <?php echo e(str_limit($item->detail, 360)); ?>

                      <?php else: ?>
                        <?php if($item->detail != null || $item->detail != ''): ?>
                          <?php echo e($item->detail); ?>

                        <?php else: ?>  
                          <?php echo e(str_limit($item->tvseries->detail, 360)); ?>                        
                        <?php endif; ?>
                      <?php endif; ?>
                    </p>
                    <div class="des-btn-block des-in-list">
                      <?php if($item->type == 'M'): ?>
                        <a onclick="playVideo(<?php echo e($item->id); ?>,'<?php echo e($item->video_url); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                        <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                          <a onclick="playTrailer('<?php echo e($item->trailer_url); ?>')" class="btn-default"><?php echo e($popover_translations->where('key', 'watch trailer')->first->value->value); ?></a>
                        <?php endif; ?>
                        <?php if(isset($wishlist_check->added)): ?>
                          <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                        <?php else: ?>
                          <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                        <?php endif; ?>
                      <?php else: ?>
                        <a onclick="playVideo(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                        <?php if(isset($wishlist_check->added)): ?>
                          <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? ($popover_translations->where('key', 'remove from watchlist')->first->value->value) : ($popover_translations->where('key', 'add to watchlist')->first->value->value)); ?></a>
                        <?php else: ?>
                          <a onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($popover_translations->where('key', 'add to watchlist')->first->value->value); ?></a>
                        <?php endif; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      <?php else: ?>
        <div class="container-fluid movie-series-section search-section">
          <h5 class="movie-series-heading">0 <?php echo e($home_translations->where('key', 'found for')->first->value->value); ?> "<?php echo e($searchKey); ?>"</h5>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </section>
  <!-- end main wrapper -->
  <div class="video-player">
    <div class="close-btn-block text-right">
      <a class="close-btn" onclick="closeVideo()"></a>
    </div>
    <video id="my_video" class="video-js movies-js vjs-big-play-centered"
           controls
           preload="auto"
    >
    </video>
    <div class="preview-player-block my-episodes">
      <video id="my_episodes" class="video-js episodes-js vjs-big-play-centered"
             controls
             preload="auto"
      >
      </video>
      <div class="playlist-container  preview-player-dimensions vjs-fluid">
        <ol class="vjs-playlist"></ol>
      </div>
    </div>
  </div>
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
          this.$http.post('addtowishlist', this.result).then((response) => {
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
            default: '480',
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