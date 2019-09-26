<?php $__env->startSection('title','Create FAQ'); ?>
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/faqs')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Create Faq</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">
          <?php echo Form::open(['method' => 'POST', 'action' => 'FaqController@store']); ?>

            <div class="form-group<?php echo e($errors->has('question') ? ' has-error' : ''); ?>">
                <?php echo Form::label('question', 'Faq Question'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your faq question"></i>
                <?php echo Form::text('question', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Please enter your faq question']); ?>

                <small class="text-danger"><?php echo e($errors->first('question')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('answer') ? ' has-error' : ''); ?>">
                <?php echo Form::label('answer', 'Faq Answer'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your faq answer"></i>
                <?php echo Form::textarea('answer', null, ['class' => 'form-control materialize-textarea', 'rows' => '5', 'placeholder' => 'Please enter your faq answer']); ?>

                <small class="text-danger"><?php echo e($errors->first('answer')); ?></small>
            </div>
            <div class="btn-group pull-right">
              <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> Reset</button>
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Create</button>
            </div>
            <div class="clear-both"></div>
          <?php echo Form::close(); ?>

        </div>  
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>