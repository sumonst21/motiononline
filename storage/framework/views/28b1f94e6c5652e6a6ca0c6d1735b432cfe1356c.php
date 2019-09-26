<?php $__env->startSection('title','Wishlist'); ?>
<?php $__env->startSection('content'); ?>
  <div class="content-main-block mrg-t-40">

   <h4 class="admin-form-text"><a href="<?php echo e(url('admin')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a>  Admin Wishlist</h4>
   <div class="admin-create-btn-block">
       <a type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#user_group"><i class="material-icons left">add</i> Add User Group</a>   
     
      <!-- Modal -->
      <div id="user_group" class="delete-modal modal fade" role="dialog">
        <div class="modal-dialog modal-md">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">

               <h4 class="modal-heading">Create User Group</h4>

            </div>
            
            <div class="modal-footer">
             <div class="row">
      <div class="col-md-12">
       
          <?php echo Form::open(['method' => 'POST', 'action' => 'WishListUserGroupController@store']); ?>

            <div id="title" class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                <?php echo Form::label('title', 'Group Title'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter Froup title Eg:Crime Movies"></i>
                <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Please enter group title']); ?>

                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
            </div>
            <div class="form-group">
            <?php if(isset($user)): ?>
           <?php echo Form::label('title', 'Users'); ?>

            <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="select multiple users"></i>
            <select class="js-example-basic-multiple" name="user_id[]" multiple="multiple">
                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($users->id); ?>"><?php echo e($users->name); ?></option>
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
        </div>
      </div>
       <a type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#video_group"><i class="material-icons left">add</i> Add Video Group</a>   
     
      <!-- Modal -->
      <div id="video_group" class="delete-modal modal fade" role="dialog">
        <div class="modal-dialog modal-md">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">

               <h4 class="modal-heading">Create Video Group</h4>

            </div>
            
            <div class="modal-footer">
              <div class="row">
      <div class="col-md-9">
     
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
        </div>
      </div>
    </div>
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
           
            <th>User Group Name</th>
            <th>Day 1</th>
            <th>Day 2</th>
            <th>Day 3</th>
            <th>Day 4</th>
            <th>Day 5</th>
            <th>Day 6</th>
            <th>Day 7</th>
          </tr>
        </thead>
        <?php if($usergroup): ?>
          <tbody>
            <?php ($no = 1); ?>

            <?php $__currentLoopData = $usergroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             
              <tr>
                <td>
                  <div class="inline">
                    <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($group->id); ?>" id="checkbox<?php echo e($group->id); ?>">
                    <label for="checkbox<?php echo e($group->id); ?>" class="material-checkbox"></label>
                  </div>
                  <?php echo e($no); ?>

                  <?php ($no++); ?>
                </td>
               
                <td><?php echo e($group->title); ?></td>

                 
             <?php for($i=1;$i<=7;$i++): ?>
                <td>
                <button type="button" class="btn-danger btn-md" data-toggle="modal" data-day="<?php echo e($i); ?>" data-userid="<?php echo e($group->id); ?>" data-target="#dayModal">Day <?php echo e($i); ?></button>
                </td>
                  <?php endfor; ?>
              </tr>

              <!-- Modal -->
                <div id="dayModal" class=" modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">
                  <?php echo Form::open(['method' => 'POST', 'action' =>['AdminWishlistController@store']]); ?>

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="delete-icon"></div>
                      </div>
                      <div class="modal-body text-center">
                        <h5 class="modal-heading">Add Video Groups</h5></div>
                        <!-- <p>Select Video Groups For Each Day.</p> -->
                        <div class="form-group">
            
                  <div class="form-group" style="margin-left:10%; margin-right: 10%; margin-top: 3%">
                    <input type="text" id="user_group_id" name="user_group_id" value="" hidden="true">
                    <input type="text" name="day" id="day" value="" hidden="true">

         <?php if(isset($videogroup)): ?>
         <?php echo Form::label('title', 'Video Groups'); ?>

 <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="select multiple Movies"></i>
   <select id="movie" class="js-example-basic-multiple" name="video_group_id[]" multiple="multiple">
     <?php $__currentLoopData = $videogroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($view->id); ?>"><?php echo e($view->title); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php endif; ?>

</div>
                      
                      <div class="modal-footer">
                 
                          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-danger">Done</button>
                        
                      </div>
                    </div>
                    <?php echo Form::close(); ?>

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
  <script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
<script type="text/javascript">
  $("#movie").select2({
    placeholder: "Select Video Groups."
   
});</script>
<script type="text/javascript">
$(document).on("click", ".btn-md", function () {
     var days = $(this).data('day');
      var userid = $(this).data('userid');
     
     $(".form-group #day").val( days );
       $(".form-group #user_group_id").val( userid );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>