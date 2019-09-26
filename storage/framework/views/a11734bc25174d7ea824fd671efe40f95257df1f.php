<?php $__env->startSection('title','Create Movie'); ?>
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/movies')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Create Movie</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">
          <?php echo Form::open(['method' => 'POST', 'action' => 'MovieController@store', 'files' => true]); ?>

        
          <label for="">Search Movie By Title :</label>
          <br>
          <label class="switch">
                     <input type="checkbox" name="movie_by_id" checked="" class="checkbox-switch" id="movi_id">
                    <span class="slider round"></span>

          </label>

            <div id="movie_title" class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                <?php echo Form::label('title', 'Movie Title'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Enter movie title Eg:Avatar"></i>
                <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Please enter movie title']); ?>

                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
            </div>

            <div id="movie_id" style="display: none;" class="form-group<?php echo e($errors->has('title2') ? ' has-error' : ''); ?>">
                <?php echo Form::label('title', 'Movie ID'); ?>

                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter movie ID (TMDB ID)"></i>
                <?php echo Form::text('title2', null, ['class' => 'form-control', 'placeholder' => 'Please enter movie ID (TMDB ID)']); ?>

                <small class="text-danger"><?php echo e($errors->first('title2')); ?></small>
            </div>

             

            <div class="form-group">
              <label class="bootstrap-switch-label">
                <input checked="" id="iframecheck" type="checkbox" name="iframecheck" data-on-text="IFRAME URL" data-off-text="URLs" data-size="small" class='bootswitch'>
              </label>
            </div>

            <div id="ifbox" class="form-group">
              <label for="iframeurl">IFRAME URL: </label> <a data-toggle="modal" data-target="#embdedexamp"><i class="fa fa-question-circle-o"> </i></a>
              <input  type="text" class="form-control" name="iframeurl" placeholder="">
            </div>

            <!-- Modal -->
          <div class="modal fade" id="embdedexamp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h6 class="modal-title" id="myModalLabel">Embded URL Examples: </h6>
                </div>
                <div class="modal-body">
                  <p style="font-size: 15px;"><b>Youtube:</b> https://www.youtube.com/embed/videoID </p>

                  <p style="font-size: 15px;"><b>Google Drive:</b> https://drive.google.com/file/d/videoID/preview </p>

                  <p style="font-size: 15px;"><b>Openload:</b> https://openload.co/embed/videoID </p>

                  <p style="font-size: 15px;"><b>Note:</b> Do not include &lt;iframe&gt; tag before URL</p>
                </div>
                
              </div>
            </div>
          </div>

            <div style="display: none;" id="urlbox" class="pad_plus_border">
              <div class="bootstrap-checkbox slide-option-switch form-group<?php echo e($errors->has('select_urls') ? ' has-error' : ''); ?>">
                <div class="row">
                  <div class="col-md-7">
                    <h5 class="bootstrap-switch-label">Select and Enter Urls</h5>
                  </div>
                  <div class="col-md-5 pad-0">
                    <div class="make-switch">
                      <?php echo Form::checkbox('ready_url_check', 1, 1, ['class' => 'bootswitch', 'id' => 'TheCheckBox', "data-on-text"=>"Ready Urls", "data-off-text"=>"Custom Url", "data-size"=>"small"]); ?>

                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <small class="text-danger"><?php echo e($errors->first('select_urls')); ?></small>
                </div>
              </div>

              <!--Test upload-->

              <!--end-->

              <div id="ready_url" class="form-group<?php echo e($errors->has('ready_url') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('ready_url', 'Youtube or Viemo Video Url'); ?>

                  <p class="inline info"> - Please enter your video url</p>
                  <?php echo Form::text('ready_url', null, ['class' => 'form-control']); ?>

                  <small class="text-danger"><?php echo e($errors->first('ready_url')); ?></small>
              </div>
              <div id="custom_url">
                

                
                <div class="form-group<?php echo e($errors->has('url_360') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('url_360', 'Video Url for 360 Quality'); ?>

                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your video url for 360 quality"></i>
                    <?php echo Form::text('url_360', null, ['class' => 'form-control', 'placeholder' => 'Please enter your video url']); ?>

                    <small class="text-danger"><?php echo e($errors->first('url_360')); ?></small>
                </div>
                <div class="form-group<?php echo e($errors->has('url_480') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('url_480', 'Video Url for 480 Quality'); ?>

                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your video url for 480 quality"></i>
                    <?php echo Form::text('url_480', null, ['class' => 'form-control', 'placeholder' => 'Please enter your video url']); ?>

                    <small class="text-danger"><?php echo e($errors->first('url_480')); ?></small>
                </div>
                <div class="form-group<?php echo e($errors->has('url_720') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('url_720', 'Video Url for 720 Quality'); ?>

                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your video url for 720 quality"></i>
                    <?php echo Form::text('url_720', null, ['class' => 'form-control', 'placeholder' => 'Please enter your video url']); ?>

                    <small class="text-danger"><?php echo e($errors->first('url_720')); ?></small>
                </div>
                <div class="form-group<?php echo e($errors->has('url_1080') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('url_1080', 'Video Url for 1080 Quality'); ?>

                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your video url for 1080 quality"></i>
                    <?php echo Form::text('url_1080', null, ['class' => 'form-control', 'placeholder' => 'Please enter your video url']); ?>

                    <small class="text-danger"><?php echo e($errors->first('url_1080')); ?></small>
                </div>
              </div>
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
                    <?php echo Form::label('thumbnail', 'Thumbnail'); ?> - <p class="info">Help block text</p>
                    <?php echo Form::file('thumbnail', ['class' => 'input-file', 'id'=>'thumbnail']); ?>

                    <label for="thumbnail" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Thumbnail">
                      <i class="icon fa fa-check"></i>
                      <span class="js-fileName">Choose a File</span>
                    </label>
                    <p class="info">Choose custom thumbnail</p>
                    <small class="text-danger"><?php echo e($errors->first('thumbnail')); ?></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group<?php echo e($errors->has('poster') ? ' has-error' : ''); ?> input-file-block">
                    <?php echo Form::label('poster', 'Poster'); ?> - <p class="info">Help block text</p>
                    <?php echo Form::file('poster', ['class' => 'input-file', 'id'=>'poster']); ?>

                    <label for="poster" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Poster">
                      <i class="icon fa fa-check"></i>
                      <span class="js-fileName">Choose a File</span>
                    </label>
                    <p class="info">Choose custom poster</p>
                    <small class="text-danger"><?php echo e($errors->first('poster')); ?></small>
                  </div>
                </div>
              </div>
            </div>
         
            <div class="form-group<?php echo e($errors->has('series') ? ' has-error' : ''); ?>">
              <div class="row">
                <div class="col-xs-6">
                  <?php echo Form::label('series', 'Series'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">
                    <?php echo Form::checkbox('series', 1, 0, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('series')); ?></small>
              </div>
            </div>
            <div class="form-group<?php echo e($errors->has('movie_id') ? ' has-error' : ''); ?> movie_id">
              <?php echo Form::label('movie_id', 'Select Movie Of Series'); ?>

              <?php echo Form::select('movie_id', $movie_list_exc_series, null, ['class' => 'form-control select2']); ?>

              <small class="text-danger"><?php echo e($errors->first('movie_id')); ?></small>
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
            
           

            <div class="menu-block">
              <h6 class="menu-block-heading">Please Select Menu</h6>
              <?php if(isset($menus) && count($menus) > 0): ?>
                <ul>
                  <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                      <div class="inline">
                        <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="<?php echo e($menu->id); ?>" id="checkbox<?php echo e($menu->id); ?>">
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

                  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please select genres"></i>
                  <div class="input-group">
                    <?php echo Form::select('genre_id[]', $genre_ls, null, ['class' => 'form-control select2', 'multiple']); ?>

                    <a href="#" data-toggle="modal" data-target="#AddGenreModal" class="input-group-addon"><i class="material-icons left">add</i></a>
                  </div>
                  <small class="text-danger"><?php echo e($errors->first('genre_id')); ?></small>
              </div>
              <div class="form-group<?php echo e($errors->has('duration') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('duration', 'Duration'); ?>

                  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter movie duration in (mins) Eg:160"></i>
                  <?php echo Form::text('duration', null, ['class' => 'form-control', 'placeholder'=>'Please enter trailer url']); ?>

                  <small class="text-danger"><?php echo e($errors->first('duration')); ?></small>
              </div>
             
              
              <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('detail', 'Description'); ?>

                  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter movie description"></i>
                  <?php echo Form::textarea('detail', null, ['class' => 'form-control materialize-textarea', 'rows' => '5','id'=>'detail']); ?>

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
  <!-- Add Language Modal -->
  <div id="AddLangModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Add Language</h5>
        </div>
        <?php echo Form::open(['method' => 'POST', 'action' => 'AudioLanguageController@store']); ?>

        <div class="modal-body">
          <div class="form-group<?php echo e($errors->has('language') ? ' has-error' : ''); ?>">
            <?php echo Form::label('language', 'Language'); ?>

            <?php echo Form::text('language', null, ['class' => 'form-control', 'required' => 'required']); ?>

            <small class="text-danger"><?php echo e($errors->first('language')); ?></small>
          </div>
        </div>
        <div class="modal-footer">
          <div class="btn-group pull-right">
            <button type="reset" class="btn btn-info">Reset</button>
            <button type="submit" class="btn btn-success">Create</button>
          </div>
        </div>
        <?php echo Form::close(); ?>

      </div>
    </div>
  </div>
  <!-- Add Director Modal -->
  <div id="AddDirectorModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Add Director</h5>
        </div>
        <?php echo Form::open(['method' => 'POST', 'action' => 'DirectorController@store', 'files' => true]); ?>

          <div class="modal-body admin-form-block">
            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                <?php echo Form::label('name', 'Name'); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

                <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
              <?php echo Form::label('image', 'Director Image'); ?> - <p class="inline info">Help block text</p>
              <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

              <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Director pic">
                <i class="icon fa fa-check"></i>
                <span class="js-fileName">Choose a File</span>
              </label>
              <p class="info">Choose custom image</p>
              <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> Reset</button>
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Create</button>
            </div>
            <div class="clear-both"></div>
          </div>
        <?php echo Form::close(); ?>

      </div>
    </div>
  </div>
  <!-- Add Actor Modal -->
  <div id="AddActorModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Add Actor</h5>
        </div>
        <?php echo Form::open(['method' => 'POST', 'action' => 'ActorController@store', 'files' => true]); ?>

          <div class="modal-body admin-form-block">
            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                <?php echo Form::label('name', 'Name'); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

                <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
              <?php echo Form::label('image', 'Director Image'); ?> - <p class="inline info">Help block text</p>
              <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

              <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Director pic">
                <i class="icon fa fa-check"></i>
                <span class="js-fileName">Choose a File</span>
              </label>
              <p class="info">Choose custom image</p>
              <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> Reset</button>
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Create</button>
            </div>
          </div>
          <div class="clear-both"></div>
        <?php echo Form::close(); ?>

      </div>
    </div>
  </div>
  <!-- Add Genre Modal -->
  <div id="AddGenreModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Add Genre</h5>
        </div>
        <?php echo Form::open(['method' => 'POST', 'action' => 'GenreController@store']); ?>

          <div class="modal-body admin-form-block">
            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                <?php echo Form::label('name', 'Name'); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

                <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> Reset</button>
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Create</button>
            </div>
          </div>
          <div class="clear-both"></div>
        <?php echo Form::close(); ?>

      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>

<script>
    
</script>
	<script>
		$(document).ready(function(){
      var i= 1;
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="file" name="sub_t[]"/></td><td><input type="text" name="sub_lang[]" placeholder="Subtitle Language" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');  
      });

      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $('form').on('submit', function(event){
        $('.loading-block').addClass('active');
      });
      $('#custom_url').hide();

      $('#TheCheckBox').on('switchChange.bootstrapSwitch', function (event, state) {

          if (state == true) {

             $('#ready_url').show();
            $('#custom_url').hide();

          } else if (state == false) {

            $('#ready_url').hide();
            $('#custom_url').show();

          };

      });

			$('.upload-image-main-block').hide();
			$('.subtitle_list').hide();
      $('#subtitle-file').hide();
			$('.movie_id').hide();
			$('input[name="subtitle"]').click(function(){
					if($(this).prop("checked") == true){
              $('.subtitle_list').fadeIn();
							$('#subtitle-file').fadeIn();
					}
					else if($(this).prop("checked") == false){
						$('.subtitle_list').fadeOut();
              $('#subtitle-file').fadeOut();
					}
			});
      $('.for-custom-image input').click(function(){
        if($(this).prop("checked") == true){
          $('.upload-image-main-block').fadeIn();
        }
        else if($(this).prop("checked") == false){
          $('.upload-image-main-block').fadeOut();
        }
      });
			$('input[name="series"]').click(function(){
					if($(this).prop("checked") == true){
							$('.movie_id').fadeIn();
					}
					else if($(this).prop("checked") == false){
						$('.movie_id').fadeOut();
					}
			});
    });
	</script>

  <script>
    $('#movi_id').on('change',function(){
      if ($('#movi_id').is(':checked')){
        $('#movie_title').show('fast');
        $('#movie_id').hide('fast');
      }else{
         $('#movie_id').show('fast');
        $('#movie_title').hide('fast');
      }
    });

    $('#iframecheck').on('switchChange.bootstrapSwitch', function (event, state) {

          if (state == true) {

             $('#urlbox').hide();
             $('#ifbox').show();
             $('#subtitle_section').hide();

          } else if (state == false) {

            $('#urlbox').show();
            $('#ifbox').hide();
            $('#subtitle_section').show();
          };

      });
  </script>
  <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'detail' );
            </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>