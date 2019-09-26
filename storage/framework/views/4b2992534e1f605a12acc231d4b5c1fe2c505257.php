<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text">API Settings</h4>
      <?php echo Form::model($env_files, ['method' => 'POST', 'action' => 'ConfigController@changeEnvKeys']); ?>

        <div class="row admin-form-block z-depth-1">
          <div class="api-main-block">
            <h5 class="form-block-heading">Payment Gateways</h5>
            <div class="payment-gateway-block">
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-6">
                    <?php echo Form::label('stripe_payment', 'STRIPE PAYMENT'); ?>

                  </div>
                  <div class="col-xs-5 text-right">
                    <label class="switch">
                      <?php echo Form::checkbox('stripe_payment', 1, $config->stripe_payment, ['class' => 'checkbox-switch']); ?>

                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group<?php echo e($errors->has('STRIPE_KEY') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('STRIPE_KEY', 'STRIPE KEY'); ?>

                      <p class="inline info"> - Please enter stripe key</p>
                      <?php echo Form::text('STRIPE_KEY', null, ['class' => 'form-control']); ?>


                      <small class="text-danger"><?php echo e($errors->first('STRIPE_KEY')); ?></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group<?php echo e($errors->has('STRIPE_SECRET') ? ' has-error' : ''); ?>">
                      <div class="row">
                        <div class="col-md-10">
                          <?php echo Form::label('STRIPE_SECRET', 'STRIPE SECRET KEY'); ?>

                          <p class="inline info"> - Please enter stripe secret key</p>
                          

                          <input type="password" id="password-field" name="STRIPE_SECRET" value="<?php echo e($env_files['STRIPE_SECRET']); ?>">
                        </div>
                        <div style="margin-top:45px;margin-left:-15px;" class="col-md-2">
                          <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>

                      </div>

                      <small class="text-danger"><?php echo e($errors->first('STRIPE_SECRET')); ?></small>
                  </div>
                </div>
              </div>
            </div>
            <div class="payment-gateway-block">
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-6">
                    <?php echo Form::label('paypal_payment', 'PAYPAL PAYMENT'); ?>

                  </div>
                  <div class="col-xs-5 text-right">
                    <label class="switch">
                      <?php echo Form::checkbox('paypal_payment', 1, $config->paypal_payment, ['class' => 'checkbox-switch']); ?>

                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group<?php echo e($errors->has('PAYPAL_CLIENT_ID') ? ' has-error' : ''); ?>">
                <div class="row">
                  <div class="col-md-10">
                    <?php echo Form::label('PAYPAL_CLIENT_ID', 'PAYPAL CLIENT ID'); ?>

                    <p class="inline info"> - Please enter paypal client id</p>
                    <input type="password" name="PAYPAL_CLIENT_ID" id="pclientid" value="<?php echo e($env_files['PAYPAL_CLIENT_ID']); ?>" class="form-control">
                  </div>
                  <div style="margin-top:45px;margin-left:-15px;" class="col-md-2">
                    <span toggle="#pclientid" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                  </div>
                </div>

                  <small class="text-danger"><?php echo e($errors->first('PAYPAL_CLIENT_ID')); ?></small>
              </div>



              <div class="form-group<?php echo e($errors->has('PAYPAL_SECRET_ID') ? ' has-error' : ''); ?>">
                <div class="row">
                  <div class="col-md-10">
                    <?php echo Form::label('PAYPAL_SECRET_ID', 'PAYPAL SECRET ID'); ?>

                    <p class="inline info"> - Please enter paypal secret id</p>
                    <input type="password" name="PAYPAL_SECRET_ID" value="<?php echo e($env_files['PAYPAL_SECRET_ID']); ?>" id="paypal_secret" class="form-control">
                  </div>
                  <div style="margin-top:50px;margin-left:-30px;" class="col-md-2">
                    <div class="col-md-2">
                      <span toggle="#paypal_secret" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                    </div>
                  </div>
                </div>

                  <small class="text-danger"><?php echo e($errors->first('PAYPAL_SECRET_ID')); ?></small>
              </div>
              <div class="form-group<?php echo e($errors->has('PAYPAL_MODE') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('PAYPAL_MODE', 'PAYPAL MODE'); ?>

                  <p class="inline info"> - Please enter paypal mode (sandbox, live)</p>
                  <?php echo Form::text('PAYPAL_MODE', null, ['class' => 'form-control']); ?>

                  <small class="text-danger"><?php echo e($errors->first('PAYPAL_MODE')); ?></small>
              </div>
            </div>
            <div class="payment-gateway-block">
              <div class="form-group">
                <div class="row">
                  <div class="col-xs-6">
                    <?php echo Form::label('payu_payment', 'PAYU PAYMENT (Indian payment)'); ?>

                  </div>
                  <div class="col-xs-5 text-right">
                    <label class="switch">
                      <?php echo Form::checkbox('payu_payment', 1, $config->payu_payment, ['class' => 'checkbox-switch']); ?>

                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group<?php echo e($errors->has('PAYU_METHOD') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('PAYU_METHOD', 'PAYU METHOD'); ?>

                      <p class="inline info"> - Please enter payu method test (development) or secure (live)</p>
                      <?php echo Form::text('PAYU_METHOD', null, ['class' => 'form-control']); ?>

                      <small class="text-danger"><?php echo e($errors->first('PAYU_METHOD')); ?></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group<?php echo e($errors->has('PAYU_DEFAULT') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('PAYU_DEFAULT', 'PAYU DEFAULT OPTION'); ?>

                      <p class="inline info"> - Please enter payu default option (payubiz or )</p>
                      <?php echo Form::text('PAYU_DEFAULT', null, ['class' => 'form-control']); ?>

                      <small class="text-danger"><?php echo e($errors->first('PAYU_DEFAULT')); ?></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group<?php echo e($errors->has('PAYU_MERCHANT_KEY') ? ' has-error' : ''); ?>">
                    <div class="row">
                      <div class="col-md-10">
                        <?php echo Form::label('PAYU_MERCHANT_KEY', 'PAYU MERCHANT KEY'); ?>

                        <p class="inline info"> - Please enter payu merchant key</p>
                        <input id="payum" type="password" class="form-control" name="PAYU_MERCHANT_KEY" value="<?php echo e($env_files['PAYU_MERCHANT_KEY']); ?>">
                      </div>

                      <div style="margin-top:45px;margin-left:-20px;" class="col-md-2">
                        <span toggle="#payum" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                      </div>

                    </div>

                      <small class="text-danger"><?php echo e($errors->first('PAYU_MERCHANT_KEY')); ?></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group<?php echo e($errors->has('PAYU_MERCHANT_SALT') ? ' has-error' : ''); ?>">
                    <div class="row">
                      <div class="col-md-10">
                        <?php echo Form::label('PAYU_MERCHANT_SALT', 'PAYU MERCHANT SALT'); ?>

                        <p class="inline info"> - Please enter payu merchant salt</p>
                        <input type="password" value="<?php echo e($env_files['PAYU_MERCHANT_SALT']); ?>" name="PAYU_MERCHANT_SALT" id="payusalt" class="form-control">
                      </div>
                      <div style="margin-top:45px;margin-left:-20px;" class="col-md-2">
                        <span toggle="#payusalt" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                      </div>
                    </div>

                      <small class="text-danger"><?php echo e($errors->first('PAYU_MERCHANT_SALT')); ?></small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="api-main-block">
            <h5 class="form-block-heading">Other Apis</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group<?php echo e($errors->has('MAILCHIMP_APIKEY') ? ' has-error' : ''); ?>">
                    <div class="row">
                      <div class="col-md-10">
                        <?php echo Form::label('MAILCHIMP_APIKEY', 'MAILCHIMP API KEY'); ?>

                        <p class="inline info"> - Please enter mailchimp api key</p>
                        <input type="password" id="mailc" value="<?php echo e($env_files['MAILCHIMP_APIKEY']); ?>" name="MAILCHIMP_APIKEY" class="form-control">
                      </div>

                      <div style="margin-top:45px;margin-left:-20px;" class="col-md-2">
                        <span toggle="#mailc" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                      </div>
                    </div>

                      <small class="text-danger"><?php echo e($errors->first('MAILCHIMP_APIKEY')); ?></small>
                  </div>
                <div class="form-group<?php echo e($errors->has('MAILCHIMP_LIST_ID') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('MAILCHIMP_LIST_ID', 'MAILCHIMP LIST ID'); ?>

                    <p class="inline info"> - Please enter mailchimp list id</p>
                    <?php echo Form::text('MAILCHIMP_LIST_ID', null, ['class' => 'form-control']); ?>



                    <small class="text-danger"><?php echo e($errors->first('MAILCHIMP_LIST_ID')); ?></small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group<?php echo e($errors->has('TMDB_API_KEY') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-md-10">
                      <?php echo Form::label('TMDB_API_KEY', 'TMDB API KEY'); ?>

                      <p class="inline info"> - Please enter tmdb api key</p>

                      <input type="password" id="tmdb_secret" name="TMDB_API_KEY" value="<?php echo e($env_files['TMDB_API_KEY']); ?>" id="tmdb_secret" class="form-control">
                    </div>
                    <div style="margin-top:45px;margin-left:-20px;" class="col-md-2">
                      <span toggle="#tmdb_secret" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                    </div>
                  </div>

                    <small class="text-danger"><?php echo e($errors->first('TMDB_API_KEY')); ?></small>
                </div>
               </div>
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


  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

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