<?php $__env->startSection('title','Create Coupon'); ?>
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/coupons')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Create Coupon</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">
          <?php echo Form::open(['method' => 'POST', 'action' => 'CouponController@store']); ?>

            <div class="form-group<?php echo e($errors->has('coupon_code') ? ' has-error' : ''); ?>">
                <?php echo Form::label('coupon_code', 'Coupon Code (Stripe Coupon Id)'); ?>

                <p class="inline info"> - Please enter unique coupon code</p>
                <?php echo Form::text('coupon_code', null, ['class' => 'form-control', 'required' => 'required']); ?>

                <small class="text-danger"><?php echo e($errors->first('coupon_code')); ?></small>
            </div>
            <div class="bootstrap-checkbox <?php echo e($errors->has('percent_check') ? ' has-error' : ''); ?>">
              <div class="row">
                <div class="col-md-7">
                  <h6>Amount Off Or Percent (%) Off</h6>
                </div>
                <div class="col-md-5 pad-0">
                  <div class="make-switch">
                    <?php echo Form::checkbox('percent_check', 1, 1, ['class' => 'bootswitch', "data-on-text"=>"Percent Off", "data-off-text"=>"Amount Off", "data-size"=>"small"]); ?>

                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <small class="text-danger"><?php echo e($errors->first('percent_check')); ?></small>
              </div>
            </div>
            <div class="form-group<?php echo e($errors->has('amount') ? ' has-error' : ''); ?>">
  						<?php echo Form::number('amount', null, ['class' => 'form-control selection-input', 'min' => 0]); ?>

  						<small class="text-danger"><?php echo e($errors->first('amount')); ?></small>
            </div>
            <?php echo Form::hidden('currency', $currency_code); ?>

  					<div class="form-group<?php echo e($errors->has('duration') ? ' has-error' : ''); ?>">
  							<?php echo Form::label('duration', 'Duration'); ?>

                <p class="inline info"> - Please select coupon duration</p>
  							<?php echo Form::select('duration', ['once'=>'Once', 'repeating' => 'Repeating', 'forever' => 'Forever'], null, ['class' => 'form-control select2', 'required' => 'required']); ?>

  							<small class="text-danger"><?php echo e($errors->first('duration')); ?></small>
  					</div>
            <div id="coupon_month_duration" class="form-group<?php echo e($errors->has('duration_in_months') ? ' has-error' : ''); ?>">
                <?php echo Form::label('duration_in_months', 'Duration In Months'); ?>

                <p class="inline info"> - Please enter coupon duration for months</p>
                <?php echo Form::number('duration_in_months', null, ['class' => 'form-control', 'min' => 0]); ?>

                <small class="text-danger"><?php echo e($errors->first('duration_in_months')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('max_redemptions') ? ' has-error' : ''); ?>">
                <?php echo Form::label('max_redemptions', 'Max Redemptions'); ?>

                <p class="inline info"> - Please enter total coupon use count</p>
                <?php echo Form::number('max_redemptions', null, ['class' => 'form-control', 'min' => 0, 'required' => 'required']); ?>

                <small class="text-danger"><?php echo e($errors->first('max_redemptions')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('redeem_by') ? ' has-error' : ''); ?>">
                <?php echo Form::label('redeem_by', 'Redeem By'); ?>

                <p class="inline info"> - Please enter coupon validate upto</p>
                <?php echo Form::date('redeem_by', null, ['class' => 'form-control', 'placeholder' => '']); ?>

                <small class="text-danger"><?php echo e($errors->first('redeem_by')); ?></small>
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

<?php $__env->startSection('custom-script'); ?>
  <script>
    // Duration In Repeating (Show Duration In Months)  
    $("input[name='duration_in_months']").parent().hide();
    $("select[name='duration']").on('change',function(){
      if(this.value === 'repeating'){
        $("input[name='duration_in_months']").parent().fadeIn();
      }
      else {
        $("input[name='duration_in_months']").parent().fadeOut();
      }
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>