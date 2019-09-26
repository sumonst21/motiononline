<?php $__env->startSection('title','Manage Episodes'); ?>
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/tvseries', $season->tvseries->id)); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Manage Episodes <span>Of <?php echo e($season->tvseries->title); ?> Season <?php echo e($season->season_no); ?>

      <?php if($season->tmdb == 'Y'): ?>
        <span class="min-info"><?php echo $season->tmdb == 'Y' ? '<i class="material-icons">check_circle</i> by tmdb' : ''; ?></span>
      <?php endif; ?>
    </span></h4>
    <div class="admin-create-btn-block">
      <a id="createButton" onclick="showCreateForm()" class="btn btn-danger btn-md"><i class="material-icons left">add</i> Create Episode</a>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">
          <div id="createForm" class="create-form">
            <?php echo Form::open(['method' => 'POST', 'action' => 'TvSeriesController@store_episodes', 'files' => true]); ?>



              <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                <?php echo Form::label('title', 'Episode Title'); ?>

                <p class="inline info"> - Enter your episode title</p>
                <?php echo Form::text('title', null, ['class' => 'form-control', 'min' => '1']); ?>

                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
              </div>
              <div class="form-group<?php echo e($errors->has('episode_no') ? ' has-error' : ''); ?>">
                <?php echo Form::label('episode_no', 'Episode No.'); ?>

                <p class="inline info"> - (must fill by tmdb)</p>
                <?php echo Form::number('episode_no', null, ['class' => 'form-control', 'min' => '1']); ?>

                <small class="text-danger"><?php echo e($errors->first('episode_no')); ?></small>
              </div>
              <div class="form-group<?php echo e($errors->has('duration') ? ' has-error' : ''); ?>">
                <?php echo Form::label('duration', 'Duration'); ?> <p class="inline info">- in minutes (exa. 60)</p>
                <?php echo Form::text('duration', null, ['class' => 'form-control']); ?>

                <small class="text-danger"><?php echo e($errors->first('duration')); ?></small>
              </div>
              <div class="form-group<?php echo e($errors->has('a_language') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('a_language', 'Audio Languages'); ?>

                  <p class="inline info"> - Please select audio language</p>
                  <div class="input-group">
                    <?php echo Form::select('a_language[]', $a_lans, null, ['class' => 'form-control select2', 'multiple']); ?>

                    <a href="#" data-toggle="modal" data-target="#AddLangModal" class="input-group-addon"><i class="material-icons left">add</i></a>
                  </div>
                  <small class="text-danger"><?php echo e($errors->first('a_language')); ?></small>
              </div>
              <div class="pad_plus_border">
                <div class="form-group<?php echo e($errors->has('subtitle') ? ' has-error' : ''); ?>">
                  <div class="row">
                    <div class="col-xs-6">
                      <?php echo Form::label('subtitle', 'Subtitle'); ?>

                    </div>
                    <div class="col-xs-5 pad-0">
                      <label class="switch">
                        <?php echo Form::checkbox('subtitle', 1, 0, ['class' => 'checkbox-switch']); ?>

                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <small class="text-danger"><?php echo e($errors->first('subtitle')); ?></small>
                  </div>
                </div>
                <div class="form-group<?php echo e($errors->has('subtitle_list') ? ' has-error' : ''); ?> subtitle_list">
                    <?php echo Form::label('subtitle_list', 'Subtitles List'); ?>

                    <div class="input-group">
                      <?php echo Form::select('subtitle_list[]', $a_lans, null, ['class' => 'form-control select2', 'multiple']); ?>

                      <a href="#" data-toggle="modal" data-target="#AddLangModal" class="input-group-addon"><i class="material-icons left">add</i></a>
                    </div>
                    <small class="text-danger"><?php echo e($errors->first('subtitle_list')); ?></small>
                </div>
             
              </div>
              
            <div class="form-group">
              <label class="bootstrap-switch-label">
                <input checked="" id="iframecheck" type="checkbox" name="iframecheck" data-on-text="IFRAME URL" data-off-text="URLs" data-size="small" class='bootswitch'>
              </label>
            </div>

            <div id="ifbox" class="form-group">
              <label for="iframeurl">IFRAME URL: </label> <a data-toggle="modal" data-target="#embdedexamp"><i class="fa fa-question-circle-o"> </i></a>
              <input  type="text" class="form-control" name="iframeurl">
            </div>

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
                        <?php echo Form::checkbox('ready_url_check', 1, 1, ['class' => 'bootswitch TheCheckBox', "data-on-text"=>"Ready Urls", "data-off-text"=>"Custom Url", "data-size"=>"small"]); ?>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger"><?php echo e($errors->first('select_urls')); ?></small>
                  </div>
                </div>
                <div class="form-group<?php echo e($errors->has('ready_url') ? ' has-error' : ''); ?> ready_url">
                    <?php echo Form::label('ready_url', 'Youtube or Viemo Video Url'); ?>

                    <p class="inline info"> - Please enter your video url</p>
                    <?php echo Form::text('ready_url', null, ['class' => 'form-control']); ?>

                    <small class="text-danger"><?php echo e($errors->first('ready_url')); ?></small>
                </div>
                <div id="custom_url" class="custom_url">
                  <p class="inline info">Openload, Google drive and other url add here!</p>
                  <div class="form-group<?php echo e($errors->has('url_360') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('url_360', 'Video Url for 360 Quality'); ?>

                      <p class="inline info"> - Please enter your video url</p>
                      <?php echo Form::text('url_360', null, ['class' => 'form-control']); ?>

                      <small class="text-danger"><?php echo e($errors->first('url_360')); ?></small>
                  </div>
                  <div class="form-group<?php echo e($errors->has('url_480') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('url_480', 'Video Url for 480 Quality'); ?>

                      <p class="inline info"> - Please enter your video url</p>
                      <?php echo Form::text('url_480', null, ['class' => 'form-control']); ?>

                      <small class="text-danger"><?php echo e($errors->first('url_480')); ?></small>
                  </div>
                  <div class="form-group<?php echo e($errors->has('url_720') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('url_720', 'Video Url for 720 Quality'); ?>

                      <p class="inline info"> - Please enter your video url</p>
                      <?php echo Form::text('url_720', null, ['class' => 'form-control']); ?>

                      <small class="text-danger"><?php echo e($errors->first('url_720')); ?></small>
                  </div>
                  <div class="form-group<?php echo e($errors->has('url_1080') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('url_1080', 'Video Url for 1080 Quality'); ?>

                      <p class="inline info"> - Please enter your video url</p>
                      <?php echo Form::text('url_1080', null, ['class' => 'form-control']); ?>

                      <small class="text-danger"><?php echo e($errors->first('url_1080')); ?></small>
                  </div>
                </div>
              </div>

               <div style="display: none;" id="subtitle_section">
               <label>Subtitle:</label>
             <table class="table table-bordered" id="dynamic_field">  
                    <tr> 
                        <td>
                           <div class="form-group<?php echo e($errors->has('sub_t') ? ' has-error' : ''); ?> input-file-block">
                            <input type="file" name="sub_t[]"/>
                            <p class="info">Choose subtitle file ex. subtitle.srt, or. txt</p>
                            <small class="text-danger"><?php echo e($errors->first('sub_t')); ?></small>
                          </div>
                        </td>

                        <td>
                          <input type="text" name="sub_lang[]" placeholder="Subtitle Language" class="form-control name_list" />
                        </td>  
                        <td><button type="button" name="add" id="add" class="btn btn-xs btn-success">
                          <i class="fa fa-plus"></i>
                        </button></td>  
                    </tr>  
            </table>
            </div>


              <div class="switch-field">
                <div class="switch-title">Want TMDB Data And More Or Custom?</div>
                <input type="radio" id="switch_left" class="imdb_btn" name="tmdb" value="Y" checked/>
                <label for="switch_left">TMDB</label>
                <input type="radio" id="switch_right" class="custom_btn" name="tmdb" value="N" />
                <label for="switch_right">Custom</label>
              </div>
              <div id="custom_dtl" class="custom-dtl">
                <div class="form-group<?php echo e($errors->has('released') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('released', 'Released'); ?> <p class="inline info">- release date</p>
                  <?php echo Form::date('released', null, ['class' => 'form-control']); ?>

                  <small class="text-danger"><?php echo e($errors->first('released')); ?></small>
                </div>
                <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('detail', 'Description'); ?>

                  <?php echo Form::textarea('detail', null, ['class' => 'form-control materialize-textarea', 'rows' => '5']); ?>

                  <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                </div>
              </div>


              <?php echo Form::hidden('seasons_id', $season->id); ?>

              <?php echo Form::hidden('tv_series_id', $season->tvseries->id); ?>

              <div class="btn-group pull-right">
                <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> Reset</button>
                <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Create</button>
              </div>
              <div class="clear-both"></div>
            <?php echo Form::close(); ?>

          </div>
          <?php if(isset($episodes)): ?>
            <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div id="editForm<?php echo e($episode->id); ?>" class="edit-form">
                <?php echo Form::model($episode, ['method' => 'PATCH', 'action' => ['TvSeriesController@update_episodes', $episode->id], 'files' => true]); ?>

                  <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('title', 'Episode Title'); ?>

                    <?php echo Form::text('title', null, ['class' => 'form-control', 'min' => '1']); ?>

                    <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                  </div>
                  <div class="form-group<?php echo e($errors->has('episode_no') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('episode_no', 'Episode No.'); ?>

                    <p class="inline info"> - (must fill by tmdb)</p>
                    <?php echo Form::number('episode_no', null, ['class' => 'form-control', 'min' => '1']); ?>

                    <small class="text-danger"><?php echo e($errors->first('episode_no')); ?></small>
                  </div>
                  <div class="form-group<?php echo e($errors->has('duration') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('duration', 'Duration'); ?> <p class="inline info">- in minutes (exa. 60)</p>
                    <?php echo Form::text('duration', null, ['class' => 'form-control']); ?>

                    <small class="text-danger"><?php echo e($errors->first('duration')); ?></small>
                  </div>
                  <div class="form-group<?php echo e($errors->has('a_language') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('a_language', 'Audio Languages'); ?>

                    <p class="inline info"> - Please select audio language</p>
                    <div class="input-group">
                      <?php

                      $all_languages = App\AudioLanguage::all();
                      // get old audio language values
                      $old_lans = collect();
                      $a_lans = collect();
                      if ($episode->a_language != null){
                        $old_list = explode(',', $episode->a_language);
                        for ($i = 0; $i < count($old_list); $i++) {
                          $old1 = App\AudioLanguage::find($old_list[$i]);
                          if ( isset($old1) ) {
                            $old_lans->push($old1);
                          }
                        }
                      }
                      $a_lans = $all_languages->diff($old_lans);
                      $a_lans = $a_lans->filter(function($value, $key) {
                        return  $value !=null;
                      });
                        // get old audio language values
                        // $old_lans = collect();
                        // $a_lans = collect();
                        // $all_languages = App\AudioLanguage::all();
                        // if ($episode->a_language != null){
                        //   $old_list = explode(',', $episode->a_language);
                        //   for ($i = 0; $i < count($old_list); $i++) {
                        //     $old = App\AudioLanguage::find(trim($old_list[$i]));
                        //     $old_lans->push($old);
                        //   }
                        // }
                        // $a_lans = $a_lans->filter(function($value, $key) {
                        //   return  $value !=null;
                        // });
                        //$a_lans = $all_languages->diff($old_lans);
                      ?>
                      <select name="a_language[]" id="a_language" class="form-control select2" multiple="multiple">
                        <?php if(isset($old_lans) && count($old_lans) > 0): ?>
                          <?php $__currentLoopData = $old_lans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $old): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($old->id); ?>" selected="selected"><?php echo e($old->language); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php if(isset($a_lans)): ?>
                          <?php $__currentLoopData = $a_lans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($rest->id); ?>"><?php echo e($rest->language); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </select>
                      
                      <a href="#" data-toggle="modal" data-target="#AddLangModal" class="input-group-addon"><i class="material-icons left">add</i></a>
                    </div>
                    <small class="text-danger"><?php echo e($errors->first('a_language')); ?></small>
                  </div>
                  <div class="pad_plus_border">
                    <div class="form-group<?php echo e($errors->has('subtitle') ? ' has-error' : ''); ?>">
                      <div class="row">
                        <div class="col-xs-6">
                          <?php echo Form::label('subtitle', 'Subtitle'); ?>

                        </div>
                        <div class="col-xs-5 pad-0">
                          <label class="switch">
                            <?php echo Form::checkbox('subtitle', 1, $episode->subtitle, ['class' => 'checkbox-switch']); ?>

                            <span class="slider round"></span>
                          </label>
                        </div>
                      </div>
                      <div class="col-xs-12">
                        <small class="text-danger"><?php echo e($errors->first('subtitle')); ?></small>
                      </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('subtitle_list') ? ' has-error' : ''); ?> subtitle_list">
                        <?php echo Form::label('subtitle_list', 'Subtitles List'); ?>

                        <div class="input-group">
                          <select name="subtitle_list[]" id="subtitle_list" class="form-control select2" multiple="multiple">
                            <?php
                              // get old subtitle language values
                              $old_subtitles = collect();
                              $a_subs = collect();
                              $all_languages = App\AudioLanguage::all();
                              if ($episode->subtitle == 1) {
                                if ($episode->subtitle_list != null){
                                  $old_list = explode(',', $episode->subtitle_list);
                                  for ($i = 0; $i < count($old_list); $i++) {
                                    $old = App\AudioLanguage::find(trim($old_list[$i]));
                                    $old_subtitles->push($old);
                                  }
                                }
                              }
                              $a_subs = $a_subs->filter(function($value, $key) {
                                return  $value != null;
                              });
                              $a_subs = $all_languages->diff($old_subtitles);
                            ?>
                            <?php if(isset($old_subtitles) && count($old_subtitles) > 0): ?>
                              <?php $__currentLoopData = $old_subtitles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $old): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($old->id); ?>" selected="selected"><?php echo e($old->language); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <?php if(isset($a_subs)): ?>
                              <?php $__currentLoopData = $a_subs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($rest->id); ?>"><?php echo e($rest->language); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          </select>
                          <a href="#" data-toggle="modal" data-target="#AddLangModal" class="input-group-addon"><i class="material-icons left">add</i></a>
                        </div>
                        <small class="text-danger"><?php echo e($errors->first('subtitle_list')); ?></small>
                    </div>
                   
                  </div>
                  
            <div class="form-group">
              <label class="bootstrap-switch-label">
                <input <?php echo e($episode->video_link->iframeurl != null ? "checked" : ""); ?> id="iframecheck2<?php echo e($episode->id); ?>" type="checkbox" name="iframecheck" data-on-text="IFRAME URL" data-off-text="URLs" data-size="small" class='bootswitch' onchange="epilink('<?php echo e($episode->id); ?>')">
              </label>
            </div>

            <div style="<?php echo e($episode->video_link->iframeurl ==null ? "display: none" : ""); ?>" id="ifbox2<?php echo e($episode->id); ?>" class="form-group">
              <label for="iframeurl">IFRAME URL: </label> <a data-toggle="modal" data-target="#embdedexamp"><i class="fa fa-question-circle-o"> </i></a>
              <input value="<?php echo e($episode->video_link->iframeurl); ?>" type="text" class="form-control" name="iframeurl">
            </div>

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
                </div>
                
              </div>
            </div>
          </div>
                  

                  <div id="urlbox2<?php echo e($episode->id); ?>" style="<?php echo e($episode->video_link->iframeurl ==null ? "" : "display:none"); ?>" class="pad_plus_border">
                    <div class="bootstrap-checkbox slide-option-switch form-group<?php echo e($errors->has('select_urls') ? ' has-error' : ''); ?>">
                      <div class="row">
                        <div class="col-md-7">
                          <h5 class="bootstrap-switch-label">Select and Enter Urls</h5>
                        </div>
                        <div class="col-md-5 pad-0">
                          <div class="make-switch">
                            

                            <input <?php echo e($episode->video_link->ready_url != null ? "checked" : ""); ?> type="checkbox" id ='TheCheckBox<?php echo e($episode->id); ?>' data-on-text="Ready Urls" data-off-text="Custom Url" value="<?php echo e($episode->video_link->ready_url != null ? "1" : "0"); ?>" class="bootswitch TheCheckBox" data-size="small" onchange="changes('<?php echo e($episode->id); ?>')" />

                            <input name="ready_url_check" type="hidden" id="ready_url_check<?php echo e($episode->id); ?>" value="<?php echo e($episode->video_link->ready_url != null ? "1" : "0"); ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <small class="text-danger"><?php echo e($errors->first('select_urls')); ?></small>
                      </div>
                    </div>

                    <div id="ready_url<?php echo e($episode->id); ?>" class="form-group<?php echo e($errors->has('ready_url') ? ' has-error' : ''); ?> ready_url">
                        <?php echo Form::label('ready_url', 'Youtube or Viemo Video Url'); ?>

                        <p class="inline info"> - Please enter your video url</p>
                        <?php echo Form::text('ready_url', $episode->video_link->ready_url, ['class' => 'form-control']); ?>

                        <small class="text-danger"><?php echo e($errors->first('ready_url')); ?></small>
                    </div>

                    <div id="custom_url<?php echo e($episode->id); ?>" class="custom_url">
                      <p class="inline info">Openload, Google drive and other url add here!</p>
                      <div class="form-group<?php echo e($errors->has('url_360') ? ' has-error' : ''); ?> custom_url">
                          <?php echo Form::label('url_360', 'Video Url for 360 Quality'); ?>

                          <p class="inline info"> - Please enter your video url</p>
                          <?php echo Form::text('url_360', $episode->video_link->url_360, ['class' => 'form-control']); ?>

                          <small class="text-danger"><?php echo e($errors->first('url_360')); ?></small>
                      </div>
                      <div class="form-group<?php echo e($errors->has('url_480') ? ' has-error' : ''); ?>">
                          <?php echo Form::label('url_480', 'Video Url for 480 Quality'); ?>

                          <p class="inline info"> - Please enter your video url</p>
                          <?php echo Form::text('url_480', $episode->video_link->url_480, ['class' => 'form-control']); ?>

                          <small class="text-danger"><?php echo e($errors->first('url_480')); ?></small>
                      </div>
                      <div class="form-group<?php echo e($errors->has('url_720') ? ' has-error' : ''); ?>">
                          <?php echo Form::label('url_720', 'Video Url for 720 Quality'); ?>

                          <p class="inline info"> - Please enter your video url</p>
                          <?php echo Form::text('url_720', $episode->video_link->url_720, ['class' => 'form-control']); ?>

                          <small class="text-danger"><?php echo e($errors->first('url_720')); ?></small>
                      </div>
                      <div class="form-group<?php echo e($errors->has('url_1080') ? ' has-error' : ''); ?>">
                          <?php echo Form::label('url_1080', 'Video Url for 1080 Quality'); ?>

                          <p class="inline info"> - Please enter your video url</p>
                          <?php echo Form::text('url_1080', $episode->video_link->url_1080, ['class' => 'form-control']); ?>

                          <small class="text-danger"><?php echo e($errors->first('url_1080')); ?></small>
                      </div>
                    </div>
                  </div>
                  <div class="switch-field">
                    <div class="switch-title">Want TMDB Data And More Or Custom?</div>
                    <input type="radio" id="switch_left<?php echo e($episode->id); ?>" name="tmdb" value="Y" <?php echo e($episode->tmdb == 'Y' ? 'checked' : ''); ?>/>
                    <label for="switch_left<?php echo e($episode->id); ?>" onclick="hide_custom(<?php echo e($episode->id); ?>)">TMDB</label>
                    <input type="radio" id="switch_right<?php echo e($episode->id); ?>" name="tmdb" value="N" <?php echo e($episode->tmdb !== 'Y' ? 'checked' : ''); ?>/>
                    <label for="switch_right<?php echo e($episode->id); ?>" onclick="show_custom(<?php echo e($episode->id); ?>)">Custom</label>
                  </div>
                  <div id="custom_dtl<?php echo e($episode->id); ?>" class="custom-dtl">
                    <div class="form-group<?php echo e($errors->has('released') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('released', 'Released'); ?>

                      <?php echo Form::date('released', null, ['class' => 'form-control']); ?>

                      <small class="text-danger"><?php echo e($errors->first('released')); ?></small>
                    </div>
                    <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                      <?php echo Form::label('detail', 'Description  '); ?>

                      <?php echo Form::textarea('detail', null, ['class' => 'form-control materialize-textarea', 'rows' => '5']); ?>

                      <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                    </div>
                  </div>
                  <?php echo Form::hidden('seasons_id', $season->id); ?>

                  <?php echo Form::hidden('tv_series_id', $season->tvseries->id); ?>

                  <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Update</button>
                  </div>
                  <div class="clear-both"></div>
                <?php echo Form::close(); ?>

              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="admin-form-block content-block z-depth-1">
          <table class="table table-hover">
            <thead>
              <tr class="table-heading-row side-table">
                <th>#</th>
                <th>Title</th>
                <th>By TMDB</th>
                <th>Duration</th>
                <th>Actions</th>
              </tr>
            </thead>
            <?php if($episodes): ?>
              <tbody>
                <?php $i=0;?>
              <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++; ?>
                <tr>
                  <td>
                      <?php echo e($i); ?>

                  </td>
                  <td>
                    <?php echo e($episode->title); ?>

                  </td>
                  <td>
                    <?php if($episode->tmdb == 'Y'): ?>
                      <i class="material-icons done">done</i>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </td>
                  <td><?php echo e($episode->duration); ?> mins</td>
                  <td>
                    <div class="admin-table-action-block side-table-action">
                      <a id="editButton<?php echo e($episode->id); ?>" onclick="showForms(<?php echo e($episode->id); ?>)" data-toggle="tooltip" data-original-title="Edit" class="btn-info btn-floating"><i class="material-icons">mode_edit</i></a>
                      <button type="button" class="btn-danger btn-floating" data-toggle="modal" data-target="#<?php echo e($episode->id); ?>deleteModal"><i class="material-icons">delete</i> </button>
                    </div>
                  </td>
                </tr>
                <!-- Modal -->
                <div id="<?php echo e($episode->id); ?>deleteModal" class="delete-modal modal fade" role="dialog">
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
                        <?php echo Form::open(['method' => 'DELETE', 'action' => ['TvSeriesController@destroy_episodes', $episode->id]]); ?>

                        <?php echo Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']); ?>

                        <?php echo Form::submit("Yes", ['class' => 'btn btn-danger']); ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
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

      $('#createForm').siblings().hide();
      // $('.custom-dtl').hide();
      // $('.custom_url').hide();
      var get = $('.TheCheckBox').val();
      if(get == 1){

            $('.ready_url').show();
            $('.custom_url').hide();
      }
      else{

             $('.ready_url').hide();
             $('.custom_url').show();
      }
      $('.TheCheckBox').on('switchChange.bootstrapSwitch', function (event, state) {

          if (state == true) {

             $('.ready_url').show();
            $('.custom_url').hide();

          } else if (state == false) {

            $('.ready_url').hide();
            $('.custom_url').show();

          };

      });

      $('.subtitle_list').hide();
      $('.subtitle-file').hide();
      $('input[name="subtitle"]').click(function(){
          if($(this).prop("checked") == true){
              $('.subtitle_list').fadeIn();
              $('.subtitle-file').fadeIn();
          }
          else if($(this).prop("checked") == false){
            $('.subtitle_list').fadeOut();
              $('.subtitle-file').fadeOut();
          }
      });
    });
    let showCreateForm = () => {
      $('#createForm').show().siblings().hide();
    };
    let showForms = (id) => {
      let editForm = '#editForm' + id;
      $(editForm).show().siblings().hide();
      var custom_dtl = '#custom_dtl'+id;
      var custom_check = '#switch_right'+id;
      if ($(custom_check).is(':checked')) {
        $(custom_dtl).show();
      }

      var ifbtn = '#iframecheck2'+id;
      var rcbtn = '#TheCheckBox'+id;

      if($(ifbtn).is(':checked')){
        $('#urlbox2'+id).hide();
        $('#ifbox2'+id).show();
      }else{
        $('#urlbox2'+id).show();
        $('#ifbox2'+id).hide();
      }

      if ($(rcbtn).is(':checked')) {

        $('#ready_url'+id).show();
        $('#custom_url'+id).hide();

      }else{
         $('#ready_url'+id).hide();
         $('#custom_url'+id).show();
      }

    };
    let hide_custom = (id) => {
      var custom_dtl = '#custom_dtl'+id;
      $(custom_dtl).hide();
    };
    let show_custom = (id) => {
      var custom_dtl = '#custom_dtl'+id;
      $(custom_dtl).show();
    };

    

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
    function epilink(id){
      if ($('#iframecheck2'+id).is(':checked')){
             $('#urlbox2'+id).hide();
             $('#ifbox2'+id).show();
      }else{
            $('#urlbox2'+id).show();
            $('#ifbox2'+id).hide();
      }
    }

    function changes(id)
    {
      if ($('#TheCheckBox'+id).is(':checked')){

          $('#ready_url_check'+id).val(1);

  
      }else{
     
          $('#ready_url_check'+id).val(0);

      }
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>