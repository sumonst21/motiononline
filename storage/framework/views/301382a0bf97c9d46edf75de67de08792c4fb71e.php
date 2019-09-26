
<?php $__env->startSection('content'); ?>
  <div class="content-main-block mrg-t-40">
    <div class="admin-create-btn-block">
    </div>
    <div class="content-block box-body">
      <table id="full_detail_table" class="table table-hover">
        <thead>
          <tr class="table-heading-row">
            <th>
              #
            </th>
            <th>Name</th>
            <th>Email</th>
            <th>Plan</th>
            <th>Actions</th>
          </tr>
        </thead>
        <?php if($user_all): ?>
          <?php
            $no = 1;
          ?>
          <tbody>
            <?php $__currentLoopData = $user_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $user_stripe_plan = null;
                $paypal_plan = null;
                if ($user->stripe_id != null) {
                    foreach ($plans as $plan) {
                        if ($user->subscriptions($plan->plan_id)) {
                            $user_stripe_plan = $plan;
                        }
                    }    
                }
                if (isset($user->paypal_subscriptions) && count($user->paypal_subscriptions) > 0) {
                    $paypal_plan = $user->paypal_subscriptions->last();
                }
              ?>
              <?php if($user_stripe_plan!=null || $paypal_plan!=null): ?>
                <tr>
                  <td>
                    <?php echo e($no); ?>

                    <?php 
                      $no++
                    ?>
                  </td>
                  <td><?php echo e($user->name); ?></td>
                  <td><?php echo e($user->email); ?></td>
                  <td><?php echo e($user_stripe_plan != null ? $user_stripe_plan->name : ($paypal_plan != null ? $paypal_plan->plan->name : 'No Plans')); ?></td>
                  <td>
                    <div class="admin-table-action-block">
                      <a href="<?php echo e(route('change_subscription_show', $user->id)); ?>" data-toggle="tooltip" data-original-title="Change Subscription" class="btn-default btn-floating"><i class="material-icons">compare_arrows</i></a>
                    </div>
                  </td>
                </tr>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        <?php endif; ?>  
      </table>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
  <script>
    $(function(){
      $('#checkboxAll').on('change', function(){
        if($(this).prop("checked") == true){
          $('.material-checkbox-input').attr('checked', true);
        }
        else if($(this).prop("checked") == false){
          $('.material-checkbox-input').attr('checked', false);
        }
      });
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>