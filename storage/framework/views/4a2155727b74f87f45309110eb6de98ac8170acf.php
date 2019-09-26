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
  <option id="movies" value="<?php echo e($users->id); ?>"><?php echo e($users->name); ?></option>
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
     
          <?php echo Form::open(['method' => 'POST', 'action' => 'WishListUserVideoController@store' , 'id'=>'myform']); ?>

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
  <option id="movies" value="<?php echo e($movies->id); ?>"><?php echo e($movies->title); ?></option>
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
  <option id="movies" value="<?php echo e($tv->id); ?>"><?php echo e($tv->title); ?></option>
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
    <table id="wish_table" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr class="table-heading-row"> 
           
           
            <th>UserGroups</th>
            <th>Day 1</th>
            <th>Day 2</th>
            <th>Day 3</th>
            <th>Day 4</th>
            <th>Day 5</th>
            <th>Day 6</th>
          
           
          </tr>
        </thead>
        <?php if($usergroup): ?>
          <tbody>
        
            <?php $__currentLoopData = $usergroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             
              <tr>
               
                <td><?php echo e($group->title); ?></td>
                <td >
                    <?php
                     $videogroup=App\WishlistVideoGroup::all();
                      $wish=App\WishlistAdmin::where('user_group_id',$group->id)->where('day',1)->get();
 // to get oldvideo group data for user groups
        if(isset($wish)){
            $day1 = collect();
             foreach ($wish as $key1 => $value1) {
         
         foreach ($value1->video_group_id as $key => $value) {
         
            $old3 = App\WishlistVideoGroup::find(trim($value));
            if (isset($old3)) {
              $day1->push($old3);
            }
        }
      }
        $videogroup = $videogroup->filter(function($value, $key) {
          return  $value != null;
        });
        $videogroup=  $videogroup->diff($day1);
        }
                    ?>
                    <input type="text" id="user_group_id<?php echo e($group->id); ?>" name="user_group_id" value="<?php echo e($group->id); ?>" hidden="true">
                    <input type="text" name="day" id="day<?php echo e($group->id); ?>" value="1" hidden="true">
                     <select onchange="sendtoform('<?php echo e($group->id); ?>')" id="movie1<?php echo e($group->id); ?>" class="js-example-basic-multiple groupsubmit" name="video_group_id[]" multiple="multiple" onchange="">
               <?php if(isset($day1) && count($day1) > 0): ?>
                      <?php $__currentLoopData = $day1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $old): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($old->id); ?>" selected="selected"><?php echo e($old->title); ?></option> 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>
                    <?php if(isset($videogroup)): ?>
                      <?php $__currentLoopData = $videogroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($view->id); ?>"><?php echo e($view->title); ?></option> 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                   
               
</select>
                  
                  
                   
               
                </td>
 
 
           
                <td>
                  <?php
                     $videogroup=App\WishlistVideoGroup::all();
                      $wish=App\WishlistAdmin::where('user_group_id',$group->id)->where('day',2)->get();
 // to get oldvideo group data for user groups
        if(isset($wish)){
            $day2 = collect();
             foreach ($wish as $key1 => $value1) {
         
         foreach ($value1->video_group_id as $key => $value) {
         
            $old3 = App\WishlistVideoGroup::find(trim($value));
            if (isset($old3)) {
              $day2->push($old3);
            }
        }
      }
        $videogroup = $videogroup->filter(function($value, $key) {
          return  $value != null;
        });
        $videogroup=  $videogroup->diff($day2);
        }
                    ?>
                    <input type="text" id="user_group_id2<?php echo e($group->id); ?>" name="user_group_id" value="<?php echo e($group->id); ?>" hidden="true">
                    <input type="text" name="day" id="day2<?php echo e($group->id); ?>" value="2" hidden="true">
                    <select onchange="sendtoformtwo('<?php echo e($group->id); ?>')" id="movie2<?php echo e($group->id); ?>" class="js-example-basic-multiple groupsubmit" name="video_group_id[]" multiple="multiple" onchange="">
                      <?php if(isset($day2) && count($day2) > 0): ?>
                      <?php $__currentLoopData = $day2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $old): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($old->id); ?>" selected="selected"><?php echo e($old->title); ?></option> 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>
                    <?php if(isset($videogroup)): ?>
                      <?php $__currentLoopData = $videogroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($view->id); ?>"><?php echo e($view->title); ?></option> 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </select>
                  
                </td>
              
     
           
                <td >
                  <?php
                     $videogroup=App\WishlistVideoGroup::all();
                      $wish=App\WishlistAdmin::where('user_group_id',$group->id)->where('day',3)->get();
 // to get oldvideo group data for user groups
        if(isset($wish)){
            $day3 = collect();
             foreach ($wish as $key1 => $value1) {
         
         foreach ($value1->video_group_id as $key => $value) {
         
            $old3 = App\WishlistVideoGroup::find(trim($value));
            if (isset($old3)) {
              $day3->push($old3);
            }
        }
      }
        $videogroup = $videogroup->filter(function($value, $key) {
          return  $value != null;
        });
        $videogroup=  $videogroup->diff($day3);
        }
                    ?>
            <input type="text" id="user_group_id3<?php echo e($group->id); ?>" name="user_group_id" value="<?php echo e($group->id); ?>" hidden="true">
                    <input type="text" name="day" id="day3<?php echo e($group->id); ?>" value="3" hidden="true">
                    <select onchange="sendtoformtthree('<?php echo e($group->id); ?>')" id="movie3<?php echo e($group->id); ?>" class="js-example-basic-multiple groupsubmit" name="video_group_id[]" multiple="multiple" onchange="">
                        <?php if(isset($day3) && count($day3) > 0): ?>
                      <?php $__currentLoopData = $day3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $old): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($old->id); ?>" selected="selected"><?php echo e($old->title); ?></option> 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>
                    <?php if(isset($videogroup)): ?>
                      <?php $__currentLoopData = $videogroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($view->id); ?>"><?php echo e($view->title); ?></option> 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </select>
               
                </td>
               
                  
           
                <td>
                  <?php
                     $videogroup=App\WishlistVideoGroup::all();
                      $wish=App\WishlistAdmin::where('user_group_id',$group->id)->where('day',4)->get();
 // to get oldvideo group data for user groups
        if(isset($wish)){
            $day4 = collect();
             foreach ($wish as $key1 => $value1) {
         
         foreach ($value1->video_group_id as $key => $value) {
         
            $old3 = App\WishlistVideoGroup::find(trim($value));
            if (isset($old3)) {
              $day4->push($old3);
            }
        }
      }
        $videogroup = $videogroup->filter(function($value, $key) {
          return  $value != null;
        });
        $videogroup=  $videogroup->diff($day4);
        }
                    ?>
           <input type="text" id="user_group_id4<?php echo e($group->id); ?>" name="user_group_id" value="<?php echo e($group->id); ?>" hidden="true">
                    <input type="text" name="day" id="day4<?php echo e($group->id); ?>" value="4" hidden="true">
                    <select onchange="sendtoformfour('<?php echo e($group->id); ?>')" id="movie4<?php echo e($group->id); ?>" class="js-example-basic-multiple groupsubmit" name="video_group_id[]" multiple="multiple" onchange="">
                         <?php if(isset($day4) && count($day4) > 0): ?>
                      <?php $__currentLoopData = $day4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $old): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($old->id); ?>" selected="selected"><?php echo e($old->title); ?></option> 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>
                    <?php if(isset($videogroup)): ?>
                      <?php $__currentLoopData = $videogroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($view->id); ?>"><?php echo e($view->title); ?></option> 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </select>
                </td>
              
  
           
                <td >
                  <?php
                     $videogroup=App\WishlistVideoGroup::all();
                      $wish=App\WishlistAdmin::where('user_group_id',$group->id)->where('day',5)->get();
 // to get oldvideo group data for user groups
        if(isset($wish)){
            $day5 = collect();
             foreach ($wish as $key1 => $value1) {
         
         foreach ($value1->video_group_id as $key => $value) {
         
            $old3 = App\WishlistVideoGroup::find(trim($value));
            if (isset($old3)) {
              $day5->push($old3);
            }
        }
      }
        $videogroup = $videogroup->filter(function($value, $key) {
          return  $value != null;
        });
        $videogroup=  $videogroup->diff($day5);
        }
                    ?>
            <input type="text" id="user_group_id5<?php echo e($group->id); ?>" name="user_group_id" value="<?php echo e($group->id); ?>" hidden="true">
                    <input type="text" name="day" id="day5<?php echo e($group->id); ?>" value="5" hidden="true">
                    <select onchange="sendtoformfive('<?php echo e($group->id); ?>')" id="movie5<?php echo e($group->id); ?>" class="js-example-basic-multiple groupsubmit" name="video_group_id[]" multiple="multiple" onchange="">
                         <?php if(isset($day5) && count($day5) > 0): ?>
                      <?php $__currentLoopData = $day5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $old): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($old->id); ?>" selected="selected"><?php echo e($old->title); ?></option> 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>
                    <?php if(isset($videogroup)): ?>
                      <?php $__currentLoopData = $videogroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($view->id); ?>"><?php echo e($view->title); ?></option> 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </select>
               
                </td>
               
  
           
                <td >
                  <?php
                     $videogroup=App\WishlistVideoGroup::all();
                      $wish=App\WishlistAdmin::where('user_group_id',$group->id)->where('day',6)->get();
 // to get oldvideo group data for user groups
        if(isset($wish)){
            $day6 = collect();
             foreach ($wish as $key1 => $value1) {
         
         foreach ($value1->video_group_id as $key => $value) {
         
            $old3 = App\WishlistVideoGroup::find(trim($value));
            if (isset($old3)) {
              $day6->push($old3);
            }
        }
      }
        $videogroup = $videogroup->filter(function($value, $key) {
          return  $value != null;
        });
        $videogroup=  $videogroup->diff($day6);
        }
                    ?>
            <input type="text" id="user_group_id6<?php echo e($group->id); ?>" name="user_group_id" value="<?php echo e($group->id); ?>" hidden="true">
                    <input type="text" name="day" id="day6<?php echo e($group->id); ?>" value="6" hidden="true">
                    <select onchange="sendtoformsix('<?php echo e($group->id); ?>')" id="movie6<?php echo e($group->id); ?>" class="js-example-basic-multiple groupsubmit" name="video_group_id[]" multiple="multiple" onchange="">
                        <?php if(isset($day6) && count($day6) > 0): ?>
                      <?php $__currentLoopData = $day6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $old): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($old->id); ?>" selected="selected"><?php echo e($old->title); ?></option> 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>
                    <?php if(isset($videogroup)): ?>
                      <?php $__currentLoopData = $videogroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($view->id); ?>"><?php echo e($view->title); ?></option> 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </select>
               
                </td>
              
  
         
               
             
              </tr>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
          </tbody>
        <?php endif; ?>
      </table>
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
    placeholder: "Select Video Groups."
   
});</script>
<script type="text/javascript">
$(document).on("click", ".btn-md", function () {
     var days = $(this).data('day');
      var userid = $(this).data('userid');
     
     $(".form-group #day").val( days );
       $(".form-group #user_group_id1").val( userid );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>
<script type="text/javascript">

  function sendtoform(id){
    var getval = $('#movie1'+id).val();
     var user_group_id = $('#user_group_id'+id).val();
     var day = $('#day'+id).val();
     
     $.ajax({

        type : 'GET',
        data : { video_group_id : getval, user_group_id: user_group_id, day : day },
        url  : '<?php echo e(url('/usergroup/wishlist/store')); ?>',
        success :function(data){
          console.log(data);
        }

     });
  }

</script>

<script type="text/javascript">

  function sendtoformtwo(id){
    var getval = $('#movie2'+id).val();
     var user_group_id = $('#user_group_id2'+id).val();
     var day = $('#day2'+id).val();
     
     $.ajax({

        type : 'GET',
        data : { video_group_id : getval, user_group_id: user_group_id, day : day },
        url  : '<?php echo e(url('/usergroup/wishlist/store')); ?>',
        success :function(data){
          console.log(data);
        }

     });
  }

</script>
<script type="text/javascript">

  function sendtoformtthree(id){
    var getval = $('#movie3'+id).val();
     var user_group_id = $('#user_group_id3'+id).val();
     var day = $('#day3'+id).val();
     
     $.ajax({

        type : 'GET',
        data : { video_group_id : getval, user_group_id: user_group_id, day : day },
        url  : '<?php echo e(url('/usergroup/wishlist/store')); ?>',
        success :function(data){
          console.log(data);
        }

     });
  }

</script>
<script type="text/javascript">

  function sendtoformfour(id){
    var getval = $('#movie4'+id).val();
     var user_group_id = $('#user_group_id4'+id).val();
     var day = $('#day4'+id).val();
     
     $.ajax({

        type : 'GET',
        data : { video_group_id : getval, user_group_id: user_group_id, day : day },
        url  : '<?php echo e(url('/usergroup/wishlist/store')); ?>',
        success :function(data){
          console.log(data);
        }

     });
  }

</script>
<script type="text/javascript">

  function sendtoformfive(id){
    var getval = $('#movie5'+id).val();
     var user_group_id = $('#user_group_id5'+id).val();
     var day = $('#day5'+id).val();
     
     $.ajax({

        type : 'GET',
        data : { video_group_id : getval, user_group_id: user_group_id, day : day },
        url  : '<?php echo e(url('/usergroup/wishlist/store')); ?>',
        success :function(data){
          console.log(data);
        }

     });
  }

</script>
<script type="text/javascript">

  function sendtoformsix(id){
    var getval = $('#movie6'+id).val();
     var user_group_id = $('#user_group_id6'+id).val();
     var day = $('#day6'+id).val();
     
     $.ajax({

        type : 'GET',
        data : { video_group_id : getval, user_group_id: user_group_id, day : day },
        url  : '<?php echo e(url('/usergroup/wishlist/store')); ?>',
        success :function(data){
          console.log(data);
        }

     });
  }

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>