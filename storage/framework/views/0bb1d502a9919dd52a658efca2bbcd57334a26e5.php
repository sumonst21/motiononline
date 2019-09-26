<?php $__env->startSection('title','Create Group'); ?>
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/wishlist/videogroup')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Create Video Group</h4>
    <div class="row">
      <div class="col-md-9">
        <div class="admin-form-block z-depth-1">
          <?php echo Form::open(['method' => 'POST', 'action' => 'WishListUserVideoController@store']); ?>

            <div id="title" class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                <?php echo Form::label('title', 'Group Title'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter Froup title Eg:Crime Movies"></i>
                <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Please enter group title']); ?>

                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
            </div>
            <div class="form-group">
<?php if(isset($movie)): ?>
 <?php echo Form::label('title', 'Movies'); ?>

 <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="select multiple Movies"></i>
   <select id="movie" class="js-example-basic-multiple" name="movie_id[]" multiple="multiple">
     <?php $__currentLoopData = $movie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($movies->id); ?>"><?php echo e($movies->title); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php endif; ?>

</div>
<div class="form-group">
 <?php if(isset($tvseries)): ?>
  <?php echo Form::label('title', 'Tv Series'); ?>

  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="select multiple Tv Series"></i>
    <select id="tvseries" class="js-example-basic-multiple" name="tv_id[]" multiple="multiple">
     <?php $__currentLoopData = $tvseries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($tv->id); ?>"><?php echo e($tv->title); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

<?php endif; ?>
</div>
<br><br>
            <div class="btn-group pull-right">
              <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> Reset</button>
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Create</button>
            </div>

            <div class="clear-both"></div>
          <?php echo Form::close(); ?>

        </div>
      </div>
    </div>
  </div>
 
 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
<script type="text/javascript">
  $("#movie").select2({
    placeholder: "Select Movies."
   
});</script>

<script type="text/javascript">
  $("#tvseries").select2({
    placeholder: "Select Tv Series."
   
});</script>
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>