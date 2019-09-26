<?php $__env->startSection('title','Front Page Section Slider Limit'); ?>
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text">Front Page Section Slider Limit</h4>
    <div class="admin-form-block z-depth-1">
		
			<div class="row">

				

				<div class="col-md-4">
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

								<div class="form-group">
									<label>Movie To Show :</label>
									<input type="number" min="1" value="<?php echo e($update1->movies_show); ?>" name="movie_show">
								</div>
								

								<div class="form-group">
									<label>TvSeries To Show :</label>
									<input type="number" min="1" value="<?php echo e($update1->tv_series_show); ?>" name="tv_show">
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
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>