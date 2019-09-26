<?php $__env->startSection('title','Create a Package'); ?>
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">  
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/packages')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Create Package</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">
          <?php echo Form::open(['method' => 'POST', 'action' => 'PackageController@store']); ?>

            <div class="form-group<?php echo e($errors->has('plan_id') ? ' has-error' : ''); ?>">
                <?php echo Form::label('plan_id', 'Your Unique Plan ID'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Create your unique plan ID eg:basic10"></i>
                <?php echo Form::text('plan_id', null, ['class' => 'form-control', 'required' => 'required', 'data-toggle' => 'popover','data-content' => 'Create Your Unique Plan ID ex. basic10', 'data-placement' => 'bottom', 'placeholder' => 'Please enter your unique plan id for package']); ?>

                <small class="text-danger"><?php echo e($errors->first('plan_id')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                <?php echo Form::label('name', 'Plan Name'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your plan name eg:Basic"></i>
                <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Please enter your plan name']); ?>

                <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
            </div>
  			    <?php echo Form::hidden('currency', $currency_code); ?>

    
            <div class="form-group<?php echo e($errors->has('amount') ? ' has-error' : ''); ?>">
                <?php echo Form::label('amount', ' Your Plan Amount'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your plan amount (Min. Amount should be 1)"></i>
                <div class="input-group">
                  <span class="input-group-addon simple-input"><i class="<?php echo e($currency_symbol); ?>"></i></span>
                  <?php echo Form::number('amount', null, ['min' => 1, 'class' => 'form-control', 'required' => 'required']); ?>  
                </div>
                <small class="text-danger"><?php echo e($errors->first('amount')); ?></small>
            </div>
           <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="form-group<?php echo e($errors->has('interval_count') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('interval_count', ' Your Plan Duration'); ?>

                        <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter plan duration (Min. amount value 1)"></i>
                        <?php echo Form::number('interval_count', null, ['min' => 1, 'class' => 'form-control', 'required' => 'required']); ?>

                        <small class="text-danger"><?php echo e($errors->first('interval_count')); ?></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group<?php echo e($errors->has('interval') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('interval', 'Plan duration unit'); ?>

                        <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please select plan duration unit / time interval"></i>
                        <?php echo Form::select('interval', ['day'=>'Daily', 'week' => 'Weekly', 'month' => 'Monthly', 'year' => 'yearly'], ['month' => 'Monthly'], ['class' => 'form-control select2', 'required' => 'required']); ?>

                        <small class="text-danger"><?php echo e($errors->first('interval')); ?></small>
                     </div>
                </div> 
             </div>   
          </div>
            <div class="form-group<?php echo e($errors->has('trial_period_days') ? ' has-error' : ''); ?>">
                <?php echo Form::label('trial_period_days', ' Your Plan Trail Period Days'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your plan free trial period days eg:30"></i>
                <?php echo Form::number('trial_period_days', null, ['class' => 'form-control']); ?>

                <small class="text-danger"><?php echo e($errors->first('trial_period_days')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                <?php echo Form::label('status', 'Status'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please select status"></i>
                <?php echo Form::select('status', array('0' => 'Inactive', '1' => 'Active'), null, ['class' => 'form-control select2', 'placeholde' => '']); ?>

                <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
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