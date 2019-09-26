
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text">SEO</h4>
    <div class="row admin-form-block z-depth-1">
      <?php if($seo): ?>
         <?php echo Form::model($seo, ['method' => 'PATCH', 'action' => ['SeoController@update', $seo->id], 'files' => true]); ?>

        
          <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
              <?php echo Form::label('description', 'Metadata Description '); ?>

              <?php echo Form::textarea('description', null, ['id' => 'textbox', 'class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
           </div>
          <div class="form-group<?php echo e($errors->has('keyword') ? ' has-error' : ''); ?>">
              <?php echo Form::label('keyword', 'Metadata keyword '); ?>

              <?php echo Form::textarea('keyword', null, ['id' => 'textbox', 'class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('keyword')); ?></small>
          </div>
    
          <div class="form-group<?php echo e($errors->has('google') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('google', 'Google Analytics (only id)'); ?>

                  <?php echo Form::text('google', null, ['class' => 'form-control']); ?>

                  <small class="text-danger"><?php echo e($errors->first('google')); ?></small>
              </div>
          <div class="form-group<?php echo e($errors->has('fb') ? ' has-error' : ''); ?>">
              <?php echo Form::label('fb', 'Facebook Pixcal(only id)'); ?>

              <?php echo Form::text('fb', null, ['id' => 'textbox1', 'class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('fb')); ?></small>
          </div>
          <div class="btn-group pull-right">
            <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Save</button>
          </div>
          <div class="clear-both"></div>
        <?php echo Form::close(); ?>

      <?php endif; ?>
  </div>
 </div> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
  <script>
    $(function () {
      CKEDITOR.replace('editor1');
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>