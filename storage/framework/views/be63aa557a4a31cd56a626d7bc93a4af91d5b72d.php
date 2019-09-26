<?php $__env->startSection('title',"Your Watchlist"); ?>
<?php $__env->startSection('main-wrapper'); ?>
  <!-- main wrapper -->
  <section class="main-wrapper">
    <div class="container-fluid">
      <div class="watchlist-section">
        <h5 class="watchlist-heading"><?php echo e($header_translations->where('key', 'watchlist')->first->value->value); ?></h5>
        <div class="watchlist-btn-block">
          <div class="btn-group">
              <?php if(isset($nav)): ?>
                 
                  <?php $__currentLoopData = $nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 
                    <a class="<?php echo e(isset($menu) ? 'active' : ''); ?>" href="<?php echo e(url('account/watchlist', $menu->slug)); ?>"  title="<?php echo e($menu->name); ?>"><?php echo e($menu->name); ?></a>
                    
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              <?php endif; ?>
            
          </div>
        </div>
      
        <?php if(isset($movies)): ?>
          <div class="watchlist-main-block">
            <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($item->type=='S'): ?>
              <div class="watchlist-block">
                <div class="watchlist-img-block protip" data-pt-placement="outside" data-pt-title="#prime-show-description-block<?php echo e($item->id); ?>">
                  <a href="<?php echo e(url('show/detail',$item->id)); ?>">
                    <?php if($item->thumbnail != null): ?>
                      <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                    <?php elseif($item->tvseries['thumbnail'] != null): ?>
                      <img src="<?php echo e(asset('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                    <?php else: ?>
                      <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                    <?php endif; ?>
                  </a>
                </div>
                <?php echo Form::open(['method' => 'DELETE', 'action' => ['WishListController@showdestroy', $item->id]]); ?>

                  <?php echo Form::submit("Remove", ["class" => "remove-btn"]); ?>

                <?php echo Form::close(); ?>

                <div id="prime-show-description-block<?php echo e($item->id); ?>" class="prime-description-block">
                  <h5 class="description-heading"><?php echo e($item->tvseries['title']); ?></h5>
                  <div class="movie-rating">IMDB <?php echo e($item->tvseries['rating']); ?></div>
                  <ul class="description-list">
                    <li><?php echo e($popover_translations->where('key', 'season')->first->value->value); ?> <?php echo e($item->season_no); ?></li>
                    <li><?php echo e($item->publish_year); ?></li>
                    <li><?php echo e($item->tvseries['age_req']); ?></li>
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
                      <p><?php echo e($item->tvseries['detail']); ?></p>
                    <?php endif; ?>
                    <a href="#"></a>
                  </div>
                  <div class="des-btn-block">
                    
                          <?php if(isset($item->episodes[0])): ?>
                            <?php if($item->episodes[0]->video_link->iframeurl !=""): ?>

                            <a href="#" onclick="playoniframe('<?php echo e($item->episodes[0]->video_link->iframeurl); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                             </a>

                            <?php else: ?>
                    <a href="<?php echo e(route('watchTvShow',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                      <?php endif; ?>
                      <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php endif; ?>
      
        
        <?php if(isset($movies)): ?>
          <div class="watchlist-main-block">
            <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if($movie->type=="M"): ?>
              <div class="watchlist-block">
                <div class="watchlist-img-block protip" data-pt-placement="outside" data-pt-title="#prime-description-block<?php echo e($movie->id); ?>">
                  <a href="<?php echo e(url('movie/detail',$movie->id)); ?>">
                    <?php if($movie->thumbnail != null || $movie->thumbnail != ''): ?>
                      <img src="<?php echo e(asset('images/movies/thumbnails/'.$movie->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                    <?php else: ?>
                      <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                    <?php endif; ?>
                  </a>
                </div>
                <?php echo Form::open(['method' => 'DELETE', 'action' => ['WishListController@moviedestroy', $movie->id]]); ?>

                    <?php echo Form::submit("Remove", ["class" => "remove-btn"]); ?>

                <?php echo Form::close(); ?>

                <div id="prime-description-block<?php echo e($movie->id); ?>" class="prime-description-block">
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
                       <?php if($movie->video_link->iframeurl != null): ?>
                          
                              <a onclick="playoniframe('<?php echo e($movie->video_link->iframeurl); ?>')" class="btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span>
                              </a>

                             <?php else: ?> 
                      <a href="<?php echo e(route('watchmovie',$movie->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e($popover_translations->where('key', 'play')->first->value->value); ?></span></a>
                      <?php if($movie->trailer_url != null || $movie->trailer_url != ''): ?>
                       <a href="<?php echo e(route('watchTrailer',$movie->id)); ?>" class="iframe btn btn-default">Watch Trailer</a>

                       <?php endif; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
               <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php endif; ?>
        
      </div>
      
    </div>
  </section>


  <!--End-->
 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>


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
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>