<?php $__env->startSection('title','Player Setting'); ?>
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/languages')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Player Settings</h4>
    <div class="row">
      <div class="col-md-8">
        <div class="admin-form-block z-depth-1">
        	<form enctype="multipart/form-data" action="<?php echo e(route('player.update')); ?>" method="POST">
        		<?php echo e(csrf_field()); ?>

        		
        		

             <div class="form-group<?php echo e($errors->has('logo_enable') ? ' has-error' : ''); ?>">
              <div class="row">
                <div class="col-xs-3">
                  <?php echo Form::label('logo_enable', 'Enable Logo:'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">
                     <input type="checkbox" <?php echo e($ps->logo_enable==1 ? "checked" : ""); ?> class="checkbox-switch" id="logo_chk">
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('series')); ?></small>
              </div>
            </div>
            <input type="hidden" id="status" name="logo_enable" value="<?php echo e($ps->logo_enable); ?>">
            <div class="row">
              <div class="col-md-6">
                 <div <?php echo e($ps->logo_enable!=1 ? "style=display:none;" : ""); ?> id="logo_upl" class="form-group<?php echo e($errors->has('logo') ? ' has-error' : ''); ?> input-file-block">
              <?php echo Form::label('logo', 'Logo'); ?> - <p class="inline info">Choose a Player logo</p>
              <?php echo Form::file('logo', ['class' => 'input-file', 'id'=>'logo']); ?>

              <label for="logo" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Choose a Player logo">
                <i class="icon fa fa-check"></i>
                <span class="js-fileName">Choose a File</span>
              </label>
              <p class="info">Choose image</p>
              <small class="text-danger"><?php echo e($errors->first('logo')); ?></small>
            </div>
              </div>

              <div <?php echo e($ps->logo_enable!=1 ? "style=display:none;" : ""); ?> id="logo_pre" class="col-md-6">
                <div class="well">
                  <?php if($ps->logo !=""): ?>
                   <img src="<?php echo e(asset('content/minimal_skin_dark/'.$ps->logo)); ?>" alt="<?php echo e($ps->logo); ?>">
                   <?php else: ?>
                   <div class="alert-danger">
                     No Image Found
                   </div>
                   <?php endif; ?>
                </div>
               
              </div>

            </div>
           

            

              <div class="form-group<?php echo e($errors->has('cpy_text') ? ' has-error' : ''); ?>">
                <?php echo Form::label('cpy_text', 'Copyright Text:'); ?>

                <p class="inline info"> - Please enter copyright text:</p>
                <?php echo Form::text('cpy_text', $ps->cpy_text, ['placeholder' => '&copy; 2019','class' => 'form-control']); ?>

                <small class="text-danger"><?php echo e($errors->first('cpy_text')); ?></small>
              </div>

              <div class="form-group<?php echo e($errors->has('logo_enable') ? ' has-error' : ''); ?>">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('logo_enable', 'Share Option:'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">

                    <input type="checkbox" <?php echo e($ps->share_opt==1 ? "checked" : ""); ?> class="checkbox-switch" id="share_chk">
                    <span class="slider round"></span>
                    
                  </label>

                  <input type="hidden" id="share_opt" name="share_opt" value="<?php echo e($ps->share_opt); ?>">
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('series')); ?></small>
              </div>
            </div>
	
	<input type="submit" class="btn btn-md btn-primary" value="Save">

        	</form>
        </div>
    </div>
	</div>
	</div>
<?php $__env->stopSection(); ?>	

<?php $__env->startSection('custom-script'); ?>
	<script>
		$(function() {
	      $('#logo_chk').change(function() {
	        $('#status').val(+ $(this).prop('checked'))
	        var st = $('#status').val();
	        if(st==1)
	        {
	        	$('#logo_upl').show();
            $('#logo_pre').show();
	        }
	        else
	        {
	        	$('#logo_upl').hide();
            $('#logo_pre').hide();
	        }
	      })
	    })

	    $(function() {
	      $('#share_chk').change(function() {
	        $('#share_opt').val(+ $(this).prop('checked'))
	      })
	    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>