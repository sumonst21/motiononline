<?php $__env->startSection('stylesheet'); ?>
<style>
	.adl::first-letter {text-transform:uppercase}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<br>
<a href="<?php echo e(route('ads')); ?>" class="btn btn-md btn-danger"><< Back</a>
	<?php if($ad->ad_location == "onpause" || $ad->ad_location=="popup"): ?>
	
	<h5 >Edit AD: <?php echo e($ad->id); ?> | Location: <span class="adl"><?php echo e($ad->ad_location); ?></span></h5>
	
	<form enctype="multipart/form-data" action="<?php echo e(route('ad.update.solo',$ad->id)); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

		<?php echo e(method_field('PUT')); ?>


		<div class="form-group<?php echo e($errors->has('ad_image') ? ' has-error' : ''); ?>">
		<label for="ad_image"><?php if($ad->ad_location == 'popup'): ?>Edit Popup Image <?php else: ?>
		Edit Image <?php endif; ?>
		</label>
		<input name="ad_image" type="file" class="form-control">
		 <span class="help-block">
                  <strong><?php echo e($errors->first('ad_image')); ?></strong>
          </span>
		</div>

		<br>
		<label for="">Current Image:</label>
		<img src="<?php echo e(asset('adv_upload/image/'.$ad->ad_image)); ?>" alt="" width="100px" class="img-responsive">
		<br>
		<label for="ad_target">Edit Ad Target: (Click on ad where to redirect user)</label>
		<input type="text" name="ad_target" placeholder="http://" value="<?php echo e($ad->ad_target); ?> ">
		<br>
		<input type="submit"  value="Save" class="btn btn-md btn-success">
	</form>
	<?php elseif($ad->ad_location == "skip"): ?>
			
		<form action="<?php echo e(route('ad.update.video',$ad->id)); ?>" enctype="multipart/form-data" method="POST">
			<?php echo e(csrf_field()); ?>

			<?php echo e(method_field('PUT')); ?>

			
			<br>	
			<?php if($ad->ad_video !="no"): ?>
			<div class="form-group<?php echo e($errors->has('ad_video') ? ' has-error' : ''); ?>">
			<label for="ad_video">Change AD Video:</label>
			<input type="file" class="form-control" name="ad_video">
			 <span class="help-block">
                  <strong><?php echo e($errors->first('ad_video')); ?></strong>
             </span>
			</div>

			<br>
			<label for="">Current Video</label>
			<br>
			<video width="320" height="240" controls>

			  <source src="<?php echo e(asset('adv_upload/video/'.$ad->ad_video)); ?>" type="video/mp4">
			  
			</video>
			<?php else: ?>

			<div id="urlbox">
				<label for="url">AD URL:</label>
				<input type="text" name="ad_url" value="<?php echo e($ad->ad_url); ?>">
			</div>
			
			<?php endif; ?>
			<br><br>
			<label for="ad_target">Edit Ad Target: (Click on ad where to redirect user)</label>
			<input type="text" value="<?php echo e($ad->ad_target); ?>" name="ad_target" placeholder="http://">
			<input type="submit" class="btn btn-md btn-success">
		</form>

	<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>