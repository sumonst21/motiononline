<?php $__env->startSection('title','Front Page Section Slider Limit'); ?>
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text">Front Page Section Slider Limit</h4>
    <div class="admin-form-block z-depth-1">
		
			<div class="row">


				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<?php
							  $get1 = App\HomeTranslation::where('id',1)->first();
							?>

							<?php echo e($get1->value); ?>

						</div>

						<div class="panel-body">
							<?php
								$update1 = App\FrontSliderUpdate::where('id',1)->first();
							?>
							<form action="<?php echo e(route('front.slider.update',$update1->id)); ?>" method="POST">
								<?php echo e(csrf_field()); ?>


								<div class="row">

									<div class="col-md-12">
											<div class="form-group">
													<label>Total Items To Show :</label>
													<input type="number" min="1" value="<?php echo e($update1->item_show); ?>" name="item_show">
											</div>
									</div>

									

								</div>
								
								<div class="form-group">
									<label>View In</label>
									<br>
									<label class="switch">
											<input value="1" name="order" type="checkbox" <?php echo e($update1->orderby == 1 ? "checked" : ""); ?> class="checkbox-switch" id="orderBy">
										    <span class="slider round"></span>
									</label>
									<?php if($update1->orderby == 1): ?>
									<small id="textorder">ASC Order</small>
									<?php else: ?>
									<small id="textorder">DESC Order</small>
									<?php endif; ?>
								</div>

								<input value="Update" type="submit" class="btn btn-md btn-primary">
							</form>
						</div>
				</div>
				</div>

				<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?php
								  $get2 = App\HomeTranslation::where('id',2)->first();
								?>
	
								<?php echo e($get2->value); ?>

							</div>
	
							<div class="panel-body">
								<?php
									$update2 = App\FrontSliderUpdate::where('id',2)->first();
								?>
								<form action="<?php echo e(route('front.slider.update',$update2->id)); ?>" method="POST">
									<?php echo e(csrf_field()); ?>

	
									<div class="row">
	
										<div class="col-md-12">
												<div class="form-group">
														<label>Total Items To Show :</label>
														<input type="number" min="1" value="<?php echo e($update2->item_show); ?>" name="item_show">
												</div>
										</div>
	
										
	
									</div>
									
									<div class="form-group">
										<label>View In</label>
										<br>
										<label class="switch">
												<input value="1" name="order" type="checkbox" <?php echo e($update2->orderby == 1 ? "checked" : ""); ?> class="checkbox-switch" id="orderBymovies">
												<span class="slider round"></span>
										</label>
										<?php if($update2->orderby == 1): ?>
										<small id="textorder2">ASC Order</small>
										<?php else: ?>
										<small id="textorder2">DESC Order</small>
										<?php endif; ?>
									</div>
	
									<input value="Update" type="submit" class="btn btn-md btn-primary">
								</form>
							</div>
					</div>
				</div>

				<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?php
								  $get3 = App\HomeTranslation::where('id',3)->first();
								?>
	
								<?php echo e($get3->value); ?>

							</div>
	
							<div class="panel-body">
								<?php
									$update3 = App\FrontSliderUpdate::where('id',3)->first();
								?>
								<form action="<?php echo e(route('front.slider.update',$update3->id)); ?>" method="POST">
									<?php echo e(csrf_field()); ?>

	
									<div class="row">
	
										<div class="col-md-12">
												<div class="form-group">
														<label>Total Items To Show :</label>
														<input type="number" min="1" value="<?php echo e($update3->item_show); ?>" name="item_show">
												</div>
										</div>
	
										
	
									</div>
									
									<div class="form-group">
										<label>View In</label>
										<br>
										<label class="switch">
												<input value="1" name="order" type="checkbox" <?php echo e($update3->orderby == 1 ? "checked" : ""); ?> class="checkbox-switch" id="orderByTvs">
												<span class="slider round"></span>
										</label>
										<?php if($update3->orderby == 1): ?>
										<small id="textorder3">ASC Order</small>
										<?php else: ?>
										<small id="textorder3">DESC Order</small>
										<?php endif; ?>
									</div>
	
									<input value="Update" type="submit" class="btn btn-md btn-primary">
								</form>
							</div>
					</div>
				</div>

				

				
			</div>
			
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
	<script>
		$('#orderBy').on('change',function(){
			if ($('#orderBy').is(':checked')){
				$('#textorder').text('ASC Order');
			}else{
				$('#textorder').text('DESC Order');
			}
		});
	</script>

<script>
		$('#orderBymovies').on('change',function(){
			if ($('#orderBymovies').is(':checked')){
				$('#textorder2').text('ASC Order');
			}else{
				$('#textorder2').text('DESC Order');
			}
		});
	</script>

<script>
		$('#orderByTvs').on('change',function(){
			if ($('#orderByTvs').is(':checked')){
				$('#textorder3').text('ASC Order');
			}else{
				$('#textorder3').text('DESC Order');
			}
		});
	</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>