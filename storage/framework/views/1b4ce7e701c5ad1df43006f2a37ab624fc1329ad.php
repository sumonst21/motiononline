<?php $__env->startSection('title',"Edit Report"); ?>
<?php $__env->startSection('main-wrapper'); ?>
  <!-- main wrapper -->
  
  <section id="main-wrapper" class="main-wrapper">
    <div class="container-fluid">
       <div class="watchlist-main-block" style="margin-top: 40px;">
       	<?php if(isset($data)): ?>
       	<?php if(!is_null($data)): ?>
       	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo Form::model($item, ['method' => 'PATCH', 'action' => ['MyProgressController@updateexercisechart', $item->id]]); ?>

                
         <div class="row"   style="color: white;">
         	<div class="col-md-2">
             <div id="exercise_id" class="form-group<?php echo e($errors->has('exercise_id') ? ' has-error' : ''); ?>">
            <?php echo Form::label('exercise_id', 'Select Exercise'); ?>

            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Select Exercise"></i><br>
            <select class="form-control" id="exercise_id"  name="exercise_id" >
              <?php $__currentLoopData = $myexercise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($exer->id==$item->exercise_id): ?>
              <option style="color: black;" value="<?php echo e($exer->id); ?>" selected="true"><?php echo e($exer->name); ?></option>
              <?php else: ?>
                <option style="color: black;" value="<?php echo e($exer->id); ?>"><?php echo e($exer->name); ?></option>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <small class="text-danger"><?php echo e($errors->first('exercise_id')); ?></small>
          </div>
        </div>
        <div class="col-md-2">
            <div id="value" class="form-group<?php echo e($errors->has('value') ? ' has-error' : ''); ?>">
            <?php echo Form::label('value', 'Counts/Value'); ?>

            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter your Exercise Count or Weight lifted."></i>
            <?php echo Form::text('value', null, ['class' => 'form-control', 'placeholder' => 'Please enter your Exercise Count or Weight lifted.']); ?>

            <small class="text-danger"><?php echo e($errors->first('value')); ?></small>
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
                      <?php echo Form::open(['method' => 'DELETE', 'action' => ['MyProgressController@destroyex', $item->id]]); ?>

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