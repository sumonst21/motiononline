<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/users')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Change Or Add Subscription</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">          
          <?php echo Form::open(['method' => 'POST', 'action' => 'UsersController@change_subscription', 'files' => true]); ?>

            <div class="info form-group">
              <h5>User Name: <?php echo e($user->name); ?></h5>
              <h5>Last Subscription Plan: <?php echo e($user_stripe_plan != null ? $user_stripe_plan->name : ($last_payment != null ? $last_payment->plan->name : 'No Plans')); ?></h5>
            </div>
            <input type="hidden" name="user_stripe_plan_id" value="<?php echo e($user_stripe_plan != null ? $user_stripe_plan->id : null); ?>">
            <input type="hidden" name="last_payment_id" value="<?php echo e($last_payment != null ? $last_payment->id : null); ?>">
            <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
            <div class="form-group<?php echo e($errors->has('plan') ? ' has-error' : ''); ?>">
              <?php echo Form::label('plan', 'Select a plan'); ?> 
              <p class="inline info"> - Please select plan for user</p>
              <?php echo Form::select('plan_id', $plan_list, null, ['class' => 'form-control select2', 'required' => 'required', 'autofocus']); ?>

              <small class="text-danger"><?php echo e($errors->first('plan')); ?></small>
            </div>
            <div class="btn-group pull-right">
              <button type="submit" class="btn btn-success">Change Subscription</button>
            </div>
            <div class="clear-both"></div>
          <?php echo Form::close(); ?>

        </div>  
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>