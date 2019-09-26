<?php $__env->startSection('title',"Old Question"); ?>
<?php $__env->startSection('main-wrapper'); ?>
  <!-- main wrapper -->
  
  <section id="main-wrapper" class="main-wrapper">
    <div class="container-fluid">
       <div class="watchlist-main-block"><br><br>
     
      <div class="card" style="padding: 40px;">
         <div class="card-body">
        <?php if(isset($question) && count($question)>0): ?>
         <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <h5 class="card-title">Date: <?php echo e(str_limit($ques->created_at, 10,' ')); ?></h5>
       
        <p class="card-subtitle mb-2 text-muted" style="font-size: 18px; color: #286090">Ques: <?php echo e($ques->question); ?>?</p>
        <?php if(isset($ques->answer) && !is_null($ques->answer)): ?>
        <p style="font-size: 16px;">Reply: <?php echo e($ques->answer); ?></p><hr>
        <?php else: ?>
         <p style="font-size: 16px;">Reply: No Reply Yet.</p><hr>
        <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php else: ?>
           <p style="font-size: 18px; color: #d63031">No Questions Asked!</p>
        <?php endif; ?>
      </div>
      <?php echo e($question->links()); ?>

        </div>
    </div>
    </div>
  </section>
  <!-- end main wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>