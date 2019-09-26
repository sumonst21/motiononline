<?php $__env->startSection('title','Group Tv Series'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-main-block mrg-t-40">
      <h4 class="admin-form-text"><a href="<?php echo e(url('admin/wishlist/videogroup')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Tv Series</h4>
  
    <div class="content-block box-body">
      <table id="movies_table" class="table table-hover">
        <thead>
          <tr class="table-heading-row">
            <th>
              <div class="inline">
                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                <label for="checkboxAll" class="material-checkbox"></label>
              </div>
              #
            </th>
            <th>Thumbnail</th>
            <th>Tv Series Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <?php if($tvseries): ?>
          <tbody>
            <?php ($no = 1); ?>
            <?php $__currentLoopData = $tvseries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>
                  <div class="inline">
                    <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($group->id); ?>" id="checkbox<?php echo e($group->id); ?>">
                    <label for="checkbox<?php echo e($group->id); ?>" class="material-checkbox"></label>
                  </div>
                  <?php echo e($no); ?>

                  <?php ($no++); ?>
                </td>
               <td><img
                  <?php if($group->thumbnail != null): ?>
                    src="<?php echo e(asset('/images/tvseries/thumbnails/' . $group->thumbnail)); ?>"
                  <?php elseif(isset($group->seasons[0]) && $group->seasons[0]->thumbnail != null): ?>
                    src="<?php echo e(asset('/images/tvseries/thumbnails/' . $group->seasons[0]->thumbnail)); ?>"  
                  <?php elseif($group->poster != null): ?>
                    src="<?php echo e(asset('/images/tvseries/posters/' . $group->poster)); ?>"
                  <?php else: ?>
                    src="http://via.placeholder.com/70x70"
                  <?php endif; ?>
                    alt="Pic" width="70px" class="img-responsive">
                </td>
                <td><?php echo e($group->title); ?></td>
               
                <td>
                  <div class="admin-table-action-block"> 
                    
                    <!-- Delete Modal -->
                    <button type="button" class="btn-danger btn-floating" data-toggle="modal" data-target="#<?php echo e($group->id); ?>deleteModal"><i class="material-icons">delete</i> </button>
                  </div>
                </td>
              </tr>
              <!-- Modal -->
                <div id="<?php echo e($group->id); ?>deleteModal" class="delete-modal modal fade" role="dialog">
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
                        <?php echo Form::open(['method' => 'DELETE', 'action' => ['WishListUserVideoController@tvdestroy',$id, $group->id]]); ?>

                          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-danger">Yes</button>
                        <?php echo Form::close(); ?>

                      </div>
                    </div>
                  </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        <?php endif; ?>
      </table>
    </div>
  </div>
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