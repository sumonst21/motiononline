<?php $__env->startSection('title','User Dashboard'); ?>
<?php $__env->startSection('main-wrapper'); ?>
  <!-- main wrapper -->
  <section id="main-wrapper" class="main-wrapper home-page user-account-section">
    <div class="container-fluid">
      <h4 class="heading">Dashboard</h4>
      
      <div class="panel-setting-main-block">
        <div class="panel-setting">
          <div class="row">
            <div class="col-md-6">
              <h4 class="panel-setting-heading">Your Details</h4>
              <p>Change your Name, Email, Mobile Number, Password, and more.</p>
            </div>
            <div class="col-md-3">
              <p class="info">Your Email: <?php echo e($auth->email); ?></p>
            </div>
            <div class="col-md-3">
              <div class="panel-setting-btn-block text-right">
                <a href="<?php echo e(url('account/profile')); ?>" class="btn btn-setting">Edit Details</a>
              </div>
            </div>
          </div>
        </div>
      
       
        
      </div>
    </div>
  </section>
  <!-- end main wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>