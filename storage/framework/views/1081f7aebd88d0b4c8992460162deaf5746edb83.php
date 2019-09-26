<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text">Home Translation Keys</h4>
    <div class="admin-form-block z-depth-1">
      <div class="row">
        <?php echo Form::model($translations, ['method' => 'POST', 'action' => 'HomeTranslationController@update']); ?>

            <?php if(isset($translations) && count($translations) > 0): ?>
              <?php
                $collectionHalves = array_chunk($translations->all(), ceil($translations->count() / 2));
              ?>
              <?php $__currentLoopData = $collectionHalves[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                <div class="col-md-4">
                  <?php echo Form::hidden('id[]', $element->id); ?>

                  <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('name', ucfirst($element->key)); ?>

                      
                      <?php echo Form::text('name[]', $element->value, ['class' => 'form-control']); ?>

                      <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php $__currentLoopData = $collectionHalves[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                <div class="col-md-4">
                  <?php echo Form::hidden('id[]', $element->id); ?>

                  <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('name', ucfirst($element->key)); ?>

                      
                      <?php echo Form::text('name[]', $element->value, ['class' => 'form-control']); ?>

                      <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          <div class="">
            <button type="submit" class="btn btn-block btn-success">Update</button>
          </div>
          <div class="clear-both"></div>
        <?php echo Form::close(); ?>

      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>