<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/tvseries')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Create Tv Series</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">
          <?php echo Form::open(['method' => 'POST', 'action' => 'TvSeriesController@store', 'files' => true]); ?>

            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                <?php echo Form::label('title', 'Series Title'); ?>

                <p class="inline info"> - Please enter your tvseries title</p>
                <?php echo Form::text('title', null, ['class' => 'form-control', 'autofocus']); ?>

                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-xs-6">
                  <?php echo Form::label('', 'Choose custom thumbnail & poster'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch for-custom-image">
                    <?php echo Form::checkbox('', 1, 0, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
            </div>
            <div class="upload-image-main-block">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group<?php echo e($errors->has('thumbnail') ? ' has-error' : ''); ?> input-file-block">
                    <?php echo Form::label('thumbnail', 'Thumbnail'); ?> - <p class="inline info">Help block text</p>
                    <?php echo Form::file('thumbnail', ['class' => 'input-file', 'id'=>'thumbnail']); ?>

                    <label for="thumbnail" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Profile pic">
                      <i class="icon fa fa-check"></i>
                      <span class="js-fileName">Choose a File</span>
                    </label>
                    <p class="info">Choose custom thumbnail</p>
                    <small class="text-danger"><?php echo e($errors->first('thumbnail')); ?></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group<?php echo e($errors->has('poster') ? ' has-error' : ''); ?> input-file-block">
                    <?php echo Form::label('poster', 'Poster'); ?> - <p class="inline info">Help block text</p>
                    <?php echo Form::file('poster', ['class' => 'input-file', 'id'=>'poster']); ?>

                    <label for="poster" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Profile pic">
                      <i class="icon fa fa-check"></i>
                      <span class="js-fileName">Choose a File</span>
                    </label>
                    <p class="info">Choose custom poster</p>
                    <small class="text-danger"><?php echo e($errors->first('poster')); ?></small>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group<?php echo e($errors->has('featured') ? ' has-error' : ''); ?>">
  						<div class="row">
  							<div class="col-xs-6">
  								<?php echo Form::label('featured', 'Featured'); ?>

  							</div>
  							<div class="col-xs-5 pad-0">
  								<label class="switch">
  									<?php echo Form::checkbox('featured', 1, 0, ['class' => 'checkbox-switch']); ?>

  									<span class="slider round"></span>
  								</label>
  							</div>
  						</div>
  						<div class="col-xs-12">
  							<small class="text-danger"><?php echo e($errors->first('featured')); ?></small>
  						</div>
            </div>
            <div class="form-group<?php echo e($errors->has('maturity_rating') ? ' has-error' : ''); ?>">
                <?php echo Form::label('maturity_rating', 'Maturity Rating'); ?>

                <p class="inline info"> - Please select tvseries maturity rating</p>
                <?php echo Form::select('maturity_rating', array('all age' => 'All age', '13+' =>'13+', '16+' => '16+', '18+'=>'18+'), null, ['class' => 'form-control select2']); ?>

                <small class="text-danger"><?php echo e($errors->first('maturity_rating')); ?></small>
            </div>
            <div class="menu-block">
              <h6 class="menu-block-heading">Please Select Menu</h6>
              <?php if(isset($menus) && count($menus) > 0): ?>
                <ul>
                  <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                      <div class="inline">
                        <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="<?php echo e($menu->id); ?>" id="checkbox<?php echo e($menu->id); ?>" <?php echo e($menu->name == 'Home' ?  'checked' : ($menu->name == 'TvSeries' ? 'checked' : '')); ?>>
                        <label for="checkbox<?php echo e($menu->id); ?>" class="material-checkbox"></label>
                      </div>
                      <?php echo e($menu->name); ?>

                    </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              <?php endif; ?>
            </div>
            <div class="switch-field">
              <div class="switch-title">Want IMDB Ratings And More Or Custom?</div>
              <input type="radio" id="switch_left" class="imdb_btn" name="tmdb" value="Y" checked/>
              <label for="switch_left">TMDB</label>
              <input type="radio" id="switch_right" class="custom_btn" name="tmdb" value="N" />
              <label for="switch_right">Custom</label>
            </div>
            <div id="custom_dtl" class="custom-dtl">
              <div class="form-group<?php echo e($errors->has('genre_id') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('genre_id', 'Genre'); ?>

                  <p class="inline info"> - Please select tvseries genres</p>
                  <?php echo Form::select('genre_id[]', $genre_ls, null, ['class' => 'form-control select2', 'multiple']); ?>

                  <small class="text-danger"><?php echo e($errors->first('genre_id')); ?></small>
              </div>
              <div class="form-group<?php echo e($errors->has('rating') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('rating', 'Ratings'); ?>

                  <p class="inline info"> - Please select tvseries rating</p>
                  <?php echo Form::text('rating', null, ['class' => 'form-control']); ?>

                  <small class="text-danger"><?php echo e($errors->first('rating')); ?></small>
              </div>
              <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('detail', 'Description'); ?>

                  <p class="inline info"> - Please enter tvseries description</p>
                  <?php echo Form::textarea('detail', null, ['class' => 'form-control materialize-textarea', 'rows' => '5']); ?>

                  <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
              </div>  
            </div>
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
	<script>
		$(document).ready(function(){
      $('.upload-image-main-block').hide();
      $('.for-custom-image input').click(function(){
        if($(this).prop("checked") == true){
          $('.upload-image-main-block').fadeIn();
        }
        else if($(this).prop("checked") == false){
          $('.upload-image-main-block').fadeOut();
        }
      });
    });
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>