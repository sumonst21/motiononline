<?php $__env->startSection('title','Manage Profiles'); ?>
<?php $__env->startSection('main-wrapper'); ?>

	<div class="container">

		<div align="center">
				<h2>Manage Profiles:</h2>
		</div>
		<hr>
		<div class="row">
				
				<div align="center"><p id="msg"></p></div>

			<form action="<?php echo e(route('mus.pro.update',Auth::user()->id)); ?>" method="POST">
				<?php echo e(csrf_field()); ?>

			
			<?php if(isset($result->screen1)): ?>
			<div class="col-md-3">

				<img class="imageprofile <?php if(Session::has('nickname')): ?> <?php echo e(Session::get('nickname') == $result->screen1 ? "imgactive" : ""); ?> <?php endif; ?>" title="<?php echo e($result->screen1); ?>" src="<?php echo e(url('images/avtar/02.png')); ?>" alt="">
				<br>
				<input class="screen2 form-control" type="text" disabled="disabled" value="<?php echo e($result->screen1); ?>">


			</div>
			<?php endif; ?>

			<?php if(isset($result->screen2)): ?>
			<div class="col-md-3">

			<img class="imageprofile <?php if(Session::has('nickname')): ?> <?php echo e(Session::get('nickname') == $result->screen2 ? "imgactive" : ""); ?> <?php endif; ?>"  onclick="changescreen('<?php echo e($result->screen2); ?>')" title="<?php echo e($result->screen2); ?>" src="<?php echo e(url('images/avtar/02.png')); ?>" alt="<?php echo e($result->screen2); ?>" >
				<br>
				<input class="screen2 form-control" name="screen2" type="text" value="<?php echo e($result->screen2); ?>">
			</div>
			<?php endif; ?>


			<?php if(isset($result->screen3)): ?>
			<div class="col-md-3">
				<img class="imageprofile <?php if(Session::has('nickname')): ?> <?php echo e(Session::get('nickname') == $result->screen3 ? "imgactive" : ""); ?> <?php endif; ?>" onclick="changescreen('<?php echo e($result->screen3); ?>')" title="<?php echo e($result->screen3); ?>" src="<?php echo e(url('images/avtar/02.png')); ?>" alt="<?php echo e($result->screen3); ?>">
				<br>
				<input class="screen2 form-control" name="screen3" type="text" value="<?php echo e($result->screen3); ?>">
			</div>
			<?php endif; ?>

			<?php if(isset($result->screen4)): ?>
			<div class="col-md-3">
				<img class="imageprofile <?php if(Session::has('nickname')): ?> <?php echo e(Session::get('nickname') == $result->screen4 ? "imgactive" : ""); ?> <?php endif; ?>" onclick="changescreen('<?php echo e($result->screen4); ?>')" title="<?php echo e($result->screen4); ?>" src="<?php echo e(url('images/avtar/02.png')); ?>" alt="<?php echo e($result->screen4); ?>">
				<br>
				<input class="screen2 form-control" name="screen4" type="text" value="<?php echo e($result->screen4); ?>">
			</div>
			<?php endif; ?>

			<?php if(isset($result->screen5)): ?>
			<div style="margin-top: 15px;" class="col-md-3">
				<img class="imageprofile <?php if(Session::has('nickname')): ?> <?php echo e(Session::get('nickname') == $result->screen5 ? "imgactive" : ""); ?> <?php endif; ?>" onclick="changescreen('<?php echo e($result->screen5); ?>')" title="<?php echo e($result->screen5); ?>" src="<?php echo e(url('images/avtar/02.png')); ?>" alt="<?php echo e($result->screen4); ?>">
				<br>
				<input class="screen2 form-control" name="screen5" type="text" value="<?php echo e($result->screen5); ?>">
			</div>
			<?php endif; ?>

			<?php if(isset($result->screen6)): ?>
			<div class="col-md-4">
				<img class="imageprofile <?php if(Session::has('nickname')): ?> <?php echo e(Session::get('nickname') == $result->screen6 ? "imgactive" : ""); ?> <?php endif; ?>" onclick="changescreen('<?php echo e($result->screen6); ?>')" title="<?php echo e($result->screen6); ?>" src="<?php echo e(url('images/avtar/02.png')); ?>" alt="<?php echo e($result->screen6); ?>">
				<br>
				<input class="screen2 form-control" name="screen6" type="text" value="<?php echo e($result->screen6); ?>">
			</div>
			<?php endif; ?>
			
			<div class="mg15 col-md-6 col-md-offset-5">
				<button type="submit" class="btn btn-lg btn-primary" value="Done"><i class="fa fa-check"></i> Done</button>
			</div>
				
			</form>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
	<script>
		function changescreen(screen){
			$.ajax({
				type : 'GET',
				data : {screen : screen},
				url  : '<?php echo e(url('/changescreen/'.Auth::user()->id)); ?>',
				success : function(data){
					console.log(data);
					
					$('#msg').html(data);

					

					setTimeout(function(){ 
						location.reload();
					}, 700);


				}
			});
		}
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>