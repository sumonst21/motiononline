<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text">Mail Settings</h4>
      <?php echo Form::model($env_files, ['method' => 'POST', 'action' => 'ConfigController@changeMailEnvKeys']); ?>

        <div class="row admin-form-block z-depth-1">
          <div class="api-main-block">
            <h5 class="form-block-heading">Mail Settings</h5>

            <div class="payment-gateway-block">

              <div class="form-group<?php echo e($errors->has('MAIL FROM NAME') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('MAIL_FROM_NAME', 'Sender Name'); ?>

                  <p class="inline info"> - Please enter sender name</p>
                  <input class="form-control" type="text" name="MAIL_FROM_NAME" value="<?php echo e($env_files['MAIL_FROM_NAME']); ?>">
                  <small class="text-danger"><?php echo e($errors->first('MAIL_FROM_NAME')); ?></small>
              </div>

              <div class="form-group<?php echo e($errors->has('MAIL HOST') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('MAIL_DRIVER', 'MAIL DRIVER'); ?>

                  <p class="inline info"> - Please enter mail driver (ex. : sendmail, smtp, mail)</p>
                  <?php echo Form::text('MAIL_DRIVER', null, ['class' => 'form-control']); ?>

                  <small class="text-danger"><?php echo e($errors->first('MAIL_DRIVER')); ?></small>
              </div>

              <div class="form-group<?php echo e($errors->has('MAIL HOST') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('MAIL_HOST', 'MAIL HOST'); ?>

                  <p class="inline info"> - Please enter mail host (ex. : smtp.gmail.com)</p>
                  <?php echo Form::text('MAIL_HOST', null, ['class' => 'form-control']); ?>

                  <small class="text-danger"><?php echo e($errors->first('MAIL_HOST')); ?></small>
              </div>

               <div class="form-group<?php echo e($errors->has('MAIL_PORT') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('MAIL_PORT', 'MAIL PORT'); ?>

                  <p class="inline info"> - Please enter mail port (ex. : 587, 487)</p>
                  <?php echo Form::text('MAIL_PORT', null, ['class' => 'form-control']); ?>

                  <small class="text-danger"><?php echo e($errors->first('MAIL_PORT')); ?></small>
              </div>

               <div class="form-group<?php echo e($errors->has('MAIL_USERNAME') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('MAIL_USERNAME', 'MAIL_USERNAME'); ?>

                  <p class="inline info"> - Please enter mail username (ex. : yourmail@gmail.com)</p>
                  <?php echo Form::text('MAIL_USERNAME', null, ['class' => 'form-control']); ?>

                  <small class="text-danger"><?php echo e($errors->first('MAIL_USERNAME')); ?></small>
              </div>

               <div class="search form-group<?php echo e($errors->has('MAIL_PASSWORD') ? ' has-error' : ''); ?>">
                

                
                    
                         <?php echo Form::label('MAIL_PASSWORD', 'MAIL PASSWORD'); ?>

                         <p class="inline info"> - Please enter mail password</p>

                         <input type="password" name="MAIL_PASSWORD" id="mailpass" value="<?php echo e($env_files['MAIL_PASSWORD']); ?>" class="form-control">
                      
                         <span toggle="#mailpass" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                       
                  


                  <small class="text-danger"><?php echo e($errors->first('MAIL_PASSWORD')); ?></small>

              </div>

               <div class="form-group<?php echo e($errors->has('MAIL_ENCRYPTION') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('MAIL_ENCRYPTION', 'MAIL_ENCRYPTION'); ?>

                  <p class="inline info"> - Please enter mail encryption (ex. : SSL, TLS)</p>
                  <?php echo Form::text('MAIL_ENCRYPTION', null, ['class' => 'form-control']); ?>

                  <small class="text-danger"><?php echo e($errors->first('MAIL_ENCRYPTION')); ?></small>
              </div>

            </div>

          </div>

          <div class="btn-group col-xs-12">
            <button type="submit" class="btn btn-block btn-success">Save Settings</button>
          </div>
          <div class="clear-both"></div>
        </div>
      <?php echo Form::close(); ?>

  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
  <script>

  $(".toggle-password2").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
  });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>