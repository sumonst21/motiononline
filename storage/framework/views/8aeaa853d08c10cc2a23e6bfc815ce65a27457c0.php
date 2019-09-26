<?php $__env->startSection('title',"Edit Report"); ?>
<?php $__env->startSection('main-wrapper'); ?>
  <!-- main wrapper -->
  
  <section id="main-wrapper" class="main-wrapper">
    <div class="container-fluid">
       <div class="watchlist-main-block" style="margin-top: 40px;">
       	<?php if(isset($data)): ?>
       	<?php if(!is_null($data)): ?>
       	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo Form::model($item, ['method' => 'PATCH', 'action' => ['MyProgressController@update', $item->id]]); ?>

                
         <div class="row"   style="color: white;">
         	<div class="col-md-2">
            <div id="weight" class="form-group<?php echo e($errors->has('weight') ? ' has-error' : ''); ?>">
                <?php echo Form::label('weight', 'Your Weight'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your current weight"></i>
                <?php echo Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Weight']); ?>

                <small class="text-danger"><?php echo e($errors->first('weight')); ?></small>
            </div>
        </div>
        <div class="col-md-2">
             <div id="fat" class="form-group<?php echo e($errors->has('fat') ? ' has-error' : ''); ?>">
                <?php echo Form::label('fat', 'Your Fat %'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your current Fat%"></i>
                <?php echo Form::text('fat', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Fat %']); ?>

                <small class="text-danger"><?php echo e($errors->first('fat')); ?></small>
            </div>
        </div>
          <div class="col-md-2">
         <div id="fat" class="form-group<?php echo e($errors->has('calorie') ? ' has-error' : ''); ?>">
                <?php echo Form::label('calorie', 'Your Calories'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your Calories"></i>
                <?php echo Form::text('calorie', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Calories']); ?>

                <small class="text-danger"><?php echo e($errors->first('calorie')); ?></small>
            </div>
        </div>
            <br>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary btn-block">Update</button>
          </div>
           <div class="col-md-2">
                <button type="button" class="btn-danger btn btn-block" data-toggle="modal" data-target="#<?php echo e($item->id); ?>deleteModal">Delete</button>
           </div>
            <?php echo Form::close(); ?>

      
       </div>
        <!-- Delete Modal -->
              <div id="<?php echo e($item->id); ?>deleteModal" class="delete-modal modal fade" role="dialog" style="margin-top: 40px;">
                <div class="modal-dialog modal-sm">
                  <!-- Modal content-->
                  <div class="modal-content">
                    
                    <div class="modal-body text-center">
                      <h4 class="modal-heading" style="color: black;">Are You Sure ?</h4>
                      <p style="color: black;">Do you really want to delete these records? This process cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                      <?php echo Form::open(['method' => 'DELETE', 'action' => ['MyProgressController@destroy', $item->id]]); ?>

                          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-danger">Yes</button>
                      <?php echo Form::close(); ?>

                    </div>
                  </div>
                </div>
              </div>
       	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       	<?php endif; ?>
       		<?php endif; ?>
       </div>
   </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>