<?php $__env->startSection('title',"My Progress"); ?>
<?php $__env->startSection('main-wrapper'); ?>
  <!-- main wrapper -->
  
  <section id="main-wrapper" class="main-wrapper">
    <div class="container-fluid">
       <div class="watchlist-main-block"><br><br>
      <h4><?php echo e($header_translations->where('key', 'report')->first->value->value); ?></h4>
      <div class="row">
            <div class="col-md-9 col-sm-12">
                <div class="panel-body">    
                    <?php echo $chart->html(); ?>

                </div>
          </div>
          <div class="col-md-3 col-sm-6">
                <div style="color: white;">
                    <?php echo Form::open(['method' => 'POST', 'action' => 'MyProgressController@store', 'files' => true]); ?>

        
            <div id="weight" class="form-group<?php echo e($errors->has('weight') ? ' has-error' : ''); ?>">
                <?php echo Form::label('weight', 'Your Weight'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your current weight"></i>
                <?php echo Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Weight']); ?>

                <small class="text-danger"><?php echo e($errors->first('weight')); ?></small>
            </div>
             <div id="fat" class="form-group<?php echo e($errors->has('fat') ? ' has-error' : ''); ?>">
                <?php echo Form::label('fat', 'Your Fat %'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your current Fat%"></i>
                <?php echo Form::text('fat', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Fat %']); ?>

                <small class="text-danger"><?php echo e($errors->first('fat')); ?></small>
            </div>
            
              <button type="submit" class="btn btn-primary btn-block">Submit</button>
          
            <?php echo Form::close(); ?>

                </div>
            
              </div>
          </div>
    </div>
    </div>
  </section>
  <!-- end main wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php echo Charts::scripts(); ?>

<?php echo $chart->script(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>