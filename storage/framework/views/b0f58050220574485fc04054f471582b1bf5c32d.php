<?php $__env->startSection('stylesheet'); ?>
<style>
  .fl::first-letter {text-transform:uppercase}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<br>
<div class="box-header">
  <h5>Advertise</h5>
</div>
		<?php
         $ads = App\Ads::all();
        ?>

        <a href="<?php echo e(route('ad.create')); ?>" class="btn btn-md btn-danger">+ Create AD</a>

          <!-- Delete Modal -->
      <a type="button" class="btn btn-danger btn-md z-depth-0" data-toggle="modal" data-target="#bulk_delete"><i class="material-icons left">delete</i> Delete Selected</a> 


      <!-- Modal -->
      <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <div class="delete-icon"></div>
            </div>
            <div class="modal-body text-center">
              <h4 class="modal-heading">Are You Sure ?</h4>
              <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer">
              <?php echo Form::open(['method' => 'POST', 'action' => 'AdsController@bulk_delete', 'id' => 'bulk_delete_form']); ?>

                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
              <?php echo Form::close(); ?>

            </div>
          </div>
        </div>
      </div>

		<br>
        <table id="full_detail_table" class="table table-hover">
            <thead>
            	<th><div class="inline">
                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                <label for="checkboxAll" class="material-checkbox"></label>
              </div></th>
                <th>#</th>
                <th>Ad Type</th>
                <th>Ad Location</th>
                <th>Edit</th>
                <th>Action</th>
            </thead>

            <tbody>
                <tr>
                <?php $i=0; ?>
                <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++ ?>

                <td>
                	<div class="inline">
                    <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($ad->id); ?>" id="checkbox<?php echo e($ad->id); ?>">
                    <label for="checkbox<?php echo e($ad->id); ?>" class="material-checkbox"></label>
                  </div>
                </td>

                 <td><?php echo e($i); ?></td>
                 <td class="fl"><?php echo e($ad->ad_type); ?></td>
                 <td class="fl"><?php echo e($ad->ad_location); ?></td>
                 <td><a href="<?php echo e(route('ad.edit',$ad->id)); ?>" class="btn btn-sm btn-success">Edit</a></td>
                 <td>
                     <form action="<?php echo e(route('ad.delete',$ad->id)); ?>" method="POST">
                        <?php echo e(csrf_field()); ?> 
                        <?php echo e(method_field('DELETE')); ?>

                        <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"/>
                        
                     </form>
                 </td>
                 </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
  <script>
    $(function(){
      $('#checkboxAll').on('change', function(){
        if($(this).prop("checked") == true){
          $('.material-checkbox-input').attr('checked', true);
        }
        else if($(this).prop("checked") == false){
          $('.material-checkbox-input').attr('checked', false);
        }
      });
    });
  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>