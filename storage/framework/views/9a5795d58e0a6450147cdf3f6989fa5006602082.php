<?php $__env->startSection('title','Answer'); ?>
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text">
      <a href="<?php echo e(url('admin/question')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Answer</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">
          <?php echo Form::model($question, ['method' => 'PATCH', 'action' => ['AskQuestionController@update', $question->id]]); ?>

            <p class="inline info">Question:</p>
             <p style="color: #d63031"><?php echo e($question->question); ?>?</p>
            <div class="form-group<?php echo e($errors->has('answer') ? ' has-error' : ''); ?>">
                <?php echo Form::label('answer', 'Your Answer'); ?>

               
                <?php echo Form::textarea('answer', null, ['class' => 'form-control materialize-textarea', 'rows' => '5']); ?>

                <small class="text-danger"><?php echo e($errors->first('answer')); ?></small>
            </div>
            <div class="btn-group pull-right">
              <button type="submit" class="btn btn-success"><i class="material-icons left">reply</i> Reply</button>
            </div>
            <div class="clear-both"></div>
          <?php echo Form::close(); ?>

        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>