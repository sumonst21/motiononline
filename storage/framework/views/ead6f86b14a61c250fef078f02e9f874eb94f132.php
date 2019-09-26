<?php $__env->startSection('title',"Your Watchlist"); ?>
<?php $__env->startSection('main-wrapper'); ?>
  <!-- main wrapper -->
  <?php
  $auth=Auth::user();
  if(isset($auth) && $auth->is_admin){
  $nav=App\Menu::all();
}
  ?>
  <section class="main-wrapper">
    <div class="container-fluid">
      <div class="watchlist-section">
        <h5 class="watchlist-heading"><?php echo e($header_translations->where('key', 'watchlist')->first->value->value); ?></h5>
        <div class="watchlist-btn-block">
          <div class="btn-group">
              <?php if(isset($nav)): ?>
                 
                  <?php $__currentLoopData = $nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 
                    <a class="<?php echo e(isset($menu) ? 'active' : ''); ?>" href="<?php echo e(url('account/userwatchlist', $menu->slug)); ?>" title="<?php echo e($menu->name); ?>"><?php echo e($menu->name); ?></a>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
          </div>
        </div>
        <div class="row">
      <div class="col-md-12">

          <div class="watchlist-main-block">
           
          
            <?php if(isset($allvideos)  && count($allvideos)>0): ?>
              <h5>Day 1</h5><br>
  <div class="genre-prime-slider owl-carousel">
               <?php $__currentLoopData = $allvideos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($item->type=='T'): ?>
             
              <div class=" genre-prime-slide">
                <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-show-description-block<?php echo e($item->id); ?>">
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
                
               
              </div>
          
             
               <?php elseif($item->type=="M"): ?>
             
              <div class=" genre-prime-slide">
                <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-description-block<?php echo e($item->id); ?>">
                  <a href="<?php echo e(url('movie/detail',$item->id)); ?>">
                    <?php if($item->thumbnail != null || $item->thumbnail != ''): ?>
                      <img src="<?php echo e(asset('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                    <?php else: ?>
                      <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                    <?php endif; ?>
                  </a>
                </div>
              
               
              </div>
           
 
         <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
           
            <?php endif; ?>
           
        </div>
        <div class="col-md-12">
         
          
           
            <?php if(isset($allvideos2) && count($allvideos2)>0): ?>
             <h5>Day 2</h5><br>
 <div class="genre-prime-slider owl-carousel">
               <?php $__currentLoopData = $allvideos2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($item->type=='T'): ?>
               <div class=" genre-prime-slide">
                <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-show-description-block<?php echo e($item->id); ?>">
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
                
               
              </div>
           
               <?php elseif($item->type=="M"): ?>
              
                <div class=" genre-prime-slide">
                <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-description-block<?php echo e($item->id); ?>">
                  <a href="<?php echo e(url('movie/detail',$item->id)); ?>">
                    <?php if($item->thumbnail != null || $item->thumbnail != ''): ?>
                      <img src="<?php echo e(asset('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                    <?php else: ?>
                      <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                    <?php endif; ?>
                  </a>
                </div>
              
                
              </div>
        
         <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          
            <?php endif; ?>
 
          </div>
           <div class="col-md-12">
         
          
          
            <?php if(isset($allvideos3) && count($allvideos3)>0): ?>
              <h5>Day 3</h5><br>
 <div class="genre-prime-slider owl-carousel">
               <?php $__currentLoopData = $allvideos3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($item->type=='T'): ?>
               <div class=" genre-prime-slide">
                <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-show-description-block<?php echo e($item->id); ?>">
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
                
               
              </div>
             
               <?php elseif($item->type=="M"): ?>
              
              <div class=" genre-prime-slide">
                <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-description-block<?php echo e($item->id); ?>">
                  <a href="<?php echo e(url('movie/detail',$item->id)); ?>">
                    <?php if($item->thumbnail != null || $item->thumbnail != ''): ?>
                      <img src="<?php echo e(asset('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                    <?php else: ?>
                      <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                    <?php endif; ?>
                  </a>
                </div>
              
                
              </div>
      
         <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          
            <?php endif; ?>
 
          </div>


 <div class="col-md-12">
         
          
           
            <?php if(isset($allvideos4) && count($allvideos4)>0): ?>
             <h5>Day 4</h5><br>
 <div class="genre-prime-slider owl-carousel">
               <?php $__currentLoopData = $allvideos4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($item->type=='T'): ?>
                <div class=" genre-prime-slide">
                <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-show-description-block<?php echo e($item->id); ?>">
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
                
               
              </div>
            
               <?php elseif($item->type=="M"): ?>
              
               <div class=" genre-prime-slide">
                <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-description-block<?php echo e($item->id); ?>">
                  <a href="<?php echo e(url('movie/detail',$item->id)); ?>">
                    <?php if($item->thumbnail != null || $item->thumbnail != ''): ?>
                      <img src="<?php echo e(asset('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                    <?php else: ?>
                      <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                    <?php endif; ?>
                  </a>
                </div>
              
              
              </div>
        
         <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        
            <?php endif; ?>
 
          </div>
           <div class="col-md-12">
         
          
            
            <?php if(isset($allvideos5) && count($allvideos5)>0): ?>
            <h5>Day 5</h5><br>
 <div class="genre-prime-slider owl-carousel">
               <?php $__currentLoopData = $allvideos5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($item->type=='T'): ?>
               <div class=" genre-prime-slide">
                <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-show-description-block<?php echo e($item->id); ?>">
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
                
               
              </div>
           
               <?php elseif($item->type=="M"): ?>
              
               <div class=" genre-prime-slide">
                <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-description-block<?php echo e($item->id); ?>">
                  <a href="<?php echo e(url('movie/detail',$item->id)); ?>">
                    <?php if($item->thumbnail != null || $item->thumbnail != ''): ?>
                      <img src="<?php echo e(asset('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                    <?php else: ?>
                      <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                    <?php endif; ?>
                  </a>
                </div>
              
               
              </div>
        
         <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          
            <?php endif; ?>
 
          </div>
 <div class="col-md-12">
         
          
          
            <?php if(isset($allvideos6) && count($allvideos6)>0): ?>
              <h5>Day 6</h5><br>
 <div class="genre-prime-slider owl-carousel">
               <?php $__currentLoopData = $allvideos6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($item->type=='T'): ?>
              <div class=" genre-prime-slide">
                <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-show-description-block<?php echo e($item->id); ?>">
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
                
               
            
             </div>
               <?php elseif($item->type=="M"): ?>
              
              <div class=" genre-prime-slide">
                <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-description-block<?php echo e($item->id); ?>">
                  <a href="<?php echo e(url('movie/detail',$item->id)); ?>">
                    <?php if($item->thumbnail != null || $item->thumbnail != ''): ?>
                      <img src="<?php echo e(asset('images/movies/thumbnails/'.$item->thumbnail)); ?>" class="img-responsive" alt="genre-image">
                    <?php else: ?>
                      <img src="<?php echo e(asset('images/default-thumbnail.jpg')); ?>" class="img-responsive" alt="genre-image">
                    <?php endif; ?>
                  </a>
                </div>
              
               
              </div>
         
         <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
            
            <?php endif; ?>
 
          </div>

        </div>
        </div>
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