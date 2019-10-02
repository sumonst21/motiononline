<?php $__env->startSection('title','Welcome'); ?>
<?php $__env->startSection('main-wrapper'); ?>
<!-- main wrapper -->

  

  <section id="main-wrapper" class="main-wrapper home-page">
    <?php if(isset($blocks) && count($blocks) > 0): ?>
      <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- home out section -->
        <div id="home-out-section-1" class="home-out-section" style="background-image: url('<?php echo e(asset('images/main-home/'.$block->image)); ?>')">
          <div class="overlay-bg <?php echo e($block->left == 1 ? 'gredient-overlay-left' : 'gredient-overlay-right'); ?> "></div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 <?php echo e($block->left == 1 ? 'col-md-offset-6 col-md-6 text-right' : ''); ?>">
                <h2 class="section-heading"><?php echo e($block->heading); ?></h2>
                <p class="section-dtl <?php echo e($block->left == 1 ? 'pad-lt-100' : ''); ?>"><?php echo e($block->detail); ?></p>
                <?php if($block->button == 1): ?>
                  <?php if($block->button_link == 'login'): ?>
                    <?php if(auth()->guard()->guest()): ?>
                      <a href="<?php echo e(url('login')); ?>" class="btn btn-prime"><?php echo e($block->button_text); ?></a>
                    <?php endif; ?>
                  <?php else: ?>
                    <?php if(auth()->guard()->guest()): ?>
                      <a href="<?php echo e(url('register')); ?>" class="btn btn-prime"><?php echo e($block->button_text); ?></a>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <!-- end out section -->
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  

 <?php if(isset(Auth::user()->multiplescreen)): ?>

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
                  <form action="<?php echo e(route('mus.update',Auth::user()->id)); ?>" method="POST">
                      <?php echo e(csrf_field()); ?>

                    <?php if(Auth::user()->multiplescreen->screen1 != null): ?>
                      <div class="col-lg-3 col-sm-6 col-6">
                          <img title="<?php echo e(Auth::user()->multiplescreen->screen1); ?>" width="200px" height="200px" src="<?php echo e(url('images/avtar/03.jpg')); ?>" alt="">
                          <label class="user-name"><input value="<?php echo e(Auth::user()->multiplescreen->screen1); ?>" type="radio" name="defscreen"> <?php echo e(Auth::user()->multiplescreen->screen1); ?></label>
                      </div>
                    <?php endif; ?>

                    <?php if(Auth::user()->multiplescreen->screen2 != null): ?>
                      <div class="col-lg-3 col-sm-6 col-6">
                          <img title="<?php echo e(Auth::user()->multiplescreen->screen2); ?>" width="200px" height="200px" src="<?php echo e(url('images/avtar/02.png')); ?>" alt="">
                          <label class="user-name"><input type="radio" value="<?php echo e(Auth::user()->multiplescreen->screen2); ?>" name="defscreen"> <?php echo e(Auth::user()->multiplescreen->screen2); ?></label> 
                      </div>
                    <?php endif; ?>
                    
                    <?php if(Auth::user()->multiplescreen->screen3 != null): ?>
                      <div class="col-lg-3 col-sm-6 col-6">
                          <img title="<?php echo e(Auth::user()->multiplescreen->screen3); ?>" width="200px" height="200px" src="<?php echo e(url('images/avtar/03.jpg')); ?>" alt="">
                          <label class="user-name"><input type="radio" name="defscreen"> <?php echo e(Auth::user()->multiplescreen->screen3); ?> </label>
                      </div>
                     <?php endif; ?>

                   <?php if(Auth::user()->multiplescreen->screen4 != null): ?>
                      <div class="col-lg-4 col-sm-6 col-6">
                          <img title="<?php echo e(Auth::user()->multiplescreen->screen4); ?>" width="200px" height="200px" src="<?php echo e(url('images/avtar/02.png')); ?>" alt="">
                          <label class="user-name"><input type="radio" value="<?php echo e(Auth::user()->multiplescreen->screen4); ?>" name="defscreen"> <?php echo e(Auth::user()->multiplescreen->screen4); ?></label>  
                      </div>
                    <?php endif; ?>
                    
                    <?php if(Auth::user()->multiplescreen->screen5 != null): ?>
                      <div class="col-lg-4 col-sm-6 col-6">
                          <img title="<?php echo e(Auth::user()->multiplescreen->screen5); ?>" width="200px" height="200px" src="<?php echo e(url('images/avtar/08.png')); ?>" alt="">
                          <label class="user-name"><input value="<?php echo e(Auth::user()->multiplescreen->screen5); ?>" type="radio" name="defscreen"> <?php echo e(Auth::user()->multiplescreen->screen5); ?></label>
                      </div>
                    <?php endif; ?>
                    
                     <?php if(Auth::user()->multiplescreen->screen6 != null): ?>
                       <div class="col-lg-4 col-sm-6 col-6">
                          <img title="<?php echo e(Auth::user()->multiplescreen->screen6); ?>" width="200px" height="200px" src="<?php echo e(url('images/avtar/02.png')); ?>" alt="">
                          <label class="user-name"><input type="radio" value="<?php echo e(Auth::user()->multiplescreen->screen6); ?>" name="defscreen"> <?php echo e(Auth::user()->multiplescreen->screen6); ?></label>
                      </div>
                    <?php endif; ?>
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
 <?php else: ?>
 <?php if(auth()->guard()->check()): ?>
  <?php
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

    
  ?>
  <?php endif; ?>
 <?php endif; ?>
    
    <!-- end featured main block -->
    <!-- end out section -->
  </section>
<!-- end main wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
        
        <?php if(isset(Auth::user()->multiplescreen)): ?>
        <?php if((Auth::user()->multiplescreen->activescreen!= NULL)): ?>
         $(document).ready(function(){

           $('#showM').hide();

           });
          <?php else: ?>
           $(document).ready(function(){

            $('#showM').modal();

           });
          <?php endif; ?>
          <?php endif; ?>



</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>