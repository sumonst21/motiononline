<?php $__env->startSection('content'); ?>
<br>
<a href="<?php echo e(route('ads')); ?>" class="btn btn-md btn-danger"><< Back</a>
	<form style="margin-top:-15px;" enctype="multipart/form-data" method="POST" action="<?php echo e(route('ad.store')); ?> ">
		<br>
			<?php echo e(csrf_field()); ?>

		<label for="ad_location">Ad Location:</label>
		<select name="ad_location" id="test" class="form-control">
			<option value="popup">Popup</option>
			<option value="onpause">Onpause</option>
			<option id="skipad" value="skip">SkipAd</option>
		</select>

		
		<div id="s_img" class="form-group">
			<div class="form-group<?php echo e($errors->has('ad_image') ? ' has-error' : ''); ?>">
				<label for="ad_image">Ad Image</label>
				<input type="file" name="ad_image" class="form-control">
				<span class="help-block">
                  <strong><?php echo e($errors->first('ad_image')); ?></strong>
         		 </span>
			</div>
		</div>
		<br>
		<div style="display: none;"  id="type">
		<input  type="radio" value="upload" checked name="checkType" id="ch1"> Upload 
		<input  type="radio" value="url" name="checkType" id="ch2"> URL
		</div>
	
		<input style="display: none;" placeholder="http://" type="text" name="ad_url" id="ad_url">
		

		<div id="s_video" style="display: none;" class="form-group">
			<div class="form-group<?php echo e($errors->has('ad_video') ? ' has-error' : ''); ?>">
			<label for="ad_image">Ad Video</label>
			<input type="file" name="ad_video" class="form-control">
			<span class="help-block">
                  <strong><?php echo e($errors->first('ad_video')); ?></strong>
         		 </span>
		</div>
		</div>

		<label for="">Enter Ad Target :</label>
		<input type="text" class="form-control" placeholder="Enter Ad Target URL: http://" name="ad_target">
	
		<div id="forpopup1">
		<label for="">Enter Start Time :</label>
		<input type="text" class="form-control" name="time" placeholder="ex. 00:00:10" name="time">
		</div>

		<div id="forpopup">
		<label for="">Enter End Time :</label>
		<input type="text" class="form-control" name="endtime" placeholder="ex. 00:00:20" name="end_time">
		</div>
		

		<input type="submit" class="btn btn-primary">

	</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
	<script type="text/javascript">
		$('#test').change(function() {
    if($(this).val() == 'skip')
    {
    	$('#s_video').show();
    	$('#s_img').hide();
    	$('#type').show();
    	$('#forpopup1').show();
    	$('#forpopup').hide();
    }

    	else
    {
    	$('#s_video').hide();
    	$('#s_img').show();
    	$('#type').hide();

    }

    if($(this).val() == 'popup')
    {
    	$('#s_video').hide();
    	$('#s_img').show();
    	$('#forpopup1').show();
    	$('#forpopup').show();
    	$('#type').hide();
    }

     if($(this).val() == 'onpause')
    {
    	$('#s_video').hide();
    	$('#s_img').show();
    	$('#forpopup').hide();
    	$('#forpopup1').hide();
    	$('#type').hide();
    }
        
	});

		$('#ch2').click(function(){
			$('#s_video').hide();
			$('#ad_url').show();
		});

		$('#ch1').click(function(){
			$('#s_video').show();
			$('#ad_url').hide();
		});

		
  

	</script>

	<script>
  $(function() {
    $('#toggle-event').change(function() {
      $('#url').val(+ $(this).prop('checked'))
    })
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>