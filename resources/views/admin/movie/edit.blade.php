@extends('layouts.admin')
@section('title',"Edit Movie - $movie->title")
@section('content')
  <div class="admin-form-main-block">
  	 <h4 class="admin-form-text"><a href="{{url('admin/movies')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit Movie</h4>
    <div class="row">
      <div class="col-md-6">
      	<div class="admin-form-block z-depth-1">
	        {!! Form::model($movie, ['method' => 'PATCH', 'action' => ['MovieController@update',$movie->id], 'files' => true]) !!}
            
            @if($movie->fetch_by == "byID")
            <label id="txt1">Movie Created By ID :</label>
            @else
            <label id="txt2">Movie Created By Title :</label>
            @endif
            <br>
             <label class="switch">
                     <input type="checkbox" {{ $movie->fetch_by == "title" ? "checked" : "" }} name="movie_by_id" class="checkbox-switch" id="movi_id">
                    <span class="slider round"></span>

            </label>

						<div id="movie_title" class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
								{!! Form::label('title', 'Movie Title') !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter movie title"></i>
								<input {{ $movie->fetch_by == 'byID' ? "readonly=readonly" : "" }} id="mv_t" type="text" class="form-control" name="title" value="{{ $movie->title }}">
								<small class="text-danger">{{ $errors->first('title') }}</small>
						</div>

            <div id="movie_id" class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title2', 'Movie ID') !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter movie ID"></i>
                <input {{ $movie->fetch_by == 'title' ? "readonly=readonly" : "" }} type="text" class="form-control" name="title2" value="{{ $movie->tmdb_id }}" id="mv_i">
                <small class="text-danger">{{ $errors->first('title') }}</small>
            </div>

           

            <div class="form-group">
              <label for="">Meta Keyword: </label>
              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter meta keyword"></i>
              <input name="keyword" type="text" class="form-control" value="{{ $movie->keyword }}" data-role="tagsinput"/>

               
            </div>

            <div class="form-group">
              <label for="">Meta Description: </label>
              <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter meta description"></i>
              <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $movie->description }}</textarea>
            </div>

             <div class="form-group">
              <label class="bootstrap-switch-label">
                <input {{ $movie->video_link->iframeurl != null ? "checked" : "" }} id="iframecheck" type="checkbox" name="iframecheck" data-on-text="IFRAME URL" data-off-text="URLs" data-size="small" class='bootswitch'>
              </label>
            </div>

            <div style="display: {{ $movie->video_link->iframeurl != null ? "" : "none" }}" id="ifbox" class="form-group">
              <label for="iframeurl">IFRAME URL: </label> <a data-toggle="modal" data-target="#embdedexamp"><i class="fa fa-question-circle-o"> </i></a>
              <input value="{{ $movie->video_link->iframeurl }}" type="text" class="form-control" name="iframeurl">
            </div>

              <!-- Modal -->
          <div  class="modal fade" id="embdedexamp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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



						<div style="display: {{ $movie->video_link->iframeurl != null ? "none;" : "" }}" id="urlbox" class="pad_plus_border">
              <div class="bootstrap-checkbox slide-option-switch form-group{{ $errors->has('select_urls') ? ' has-error' : '' }}">
                <div class="row">
                  <div class="col-md-7">
                    <h5 class="bootstrap-switch-label">Select and Enter Urls</h5>
                  </div>
                  <div class="col-md-5 pad-0">
                    <div class="make-switch">
                      {!! Form::checkbox('ready_url_check', 1, ($movie->video_link->ready_url != null ? 1 : 0), ['class' => 'bootswitch', 'id' => 'TheCheckBox', "data-on-text"=>"Ready Urls", "data-off-text"=>"Custom Url", "data-size"=>"small"]) !!}
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <small class="text-danger">{{ $errors->first('select_urls') }}</small>
                </div>
              </div>
              <div id="ready_url" class="form-group{{ $errors->has('ready_url') ? ' has-error' : '' }}">
                  {!! Form::label('ready_url', 'Youtube or Viemo Video Url') !!}
                  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your video url"></i>
                  {!! Form::text('ready_url', $movie->video_link->ready_url, ['class' => 'form-control', 'placeholder' => 'Please enter your video url']) !!}
                  <small class="text-danger">{{ $errors->first('ready_url') }}</small>
              </div>
              <div id="custom_url">
                <div class="form-group{{ $errors->has('url_360') ? ' has-error' : '' }}">
                    {!! Form::label('url_360', 'Video Url for 360 Quality') !!}
                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your video url"></i>
                    {!! Form::text('url_360', $movie->video_link->url_360, ['class' => 'form-control', 'placeholder' => 'Please enter your video url']) !!}
                    <small class="text-danger">{{ $errors->first('url_360') }}</small>
                </div>
                <div class="form-group{{ $errors->has('url_480') ? ' has-error' : '' }}">
                    {!! Form::label('url_480', 'Video Url for 480 Quality') !!}
                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your video url"></i>
                    {!! Form::text('url_480', $movie->video_link->url_480, ['class' => 'form-control', 'placeholder' => 'Please enter your video url']) !!}
                    <small class="text-danger">{{ $errors->first('url_480') }}</small>
                </div>
                <div class="form-group{{ $errors->has('url_720') ? ' has-error' : '' }}">
                    {!! Form::label('url_720', 'Video Url for 720 Quality') !!}
                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your video url"></i>
                    {!! Form::text('url_720', $movie->video_link->url_720, ['class' => 'form-control', 'placeholder' => 'Please enter your video url']) !!}
                    <small class="text-danger">{{ $errors->first('url_720') }}</small>
                </div>
                <div class="form-group{{ $errors->has('url_1080') ? ' has-error' : '' }}">
                    {!! Form::label('url_1080', 'Video Url for 1080 Quality') !!}
                    <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your video url"></i>
                    {!! Form::text('url_1080', $movie->video_link->url_1080, ['class' => 'form-control', 'placeholder' => 'Please enter your video url']) !!}
                    <small class="text-danger">{{ $errors->first('url_1080') }}</small>
                </div>
              </div>
            </div>
						<div class="form-group{{ $errors->has('a_language') ? ' has-error' : '' }}">
                {!! Form::label('a_language', 'Audio Languages') !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please select audio language"></i>
                <div class="input-group">
                  <select name="a_language[]" id="a_language" class="form-control select2" multiple="multiple">
                    @if(isset($old_lans) && count($old_lans) > 0)
                      @foreach($old_lans as $old)
                        <option value="{{$old->id}}" selected="selected">{{$old->language}}</option> 
                      @endforeach
                    @endif
                    @if(isset($a_lans))
                      @foreach($a_lans as $rest)
                        <option value="{{$rest->id}}">{{$rest->language}}</option> 
                      @endforeach
                    @endif
                  </select>  
                  <a href="#" data-toggle="modal" data-target="#AddLangModal" class="input-group-addon"><i class="material-icons left">add</i></a>
                </div>
                <small class="text-danger">{{ $errors->first('a_language') }}</small>
            </div>
            <div class="form-group{{ $errors->has('maturity_rating') ? ' has-error' : '' }}">
                {!! Form::label('maturity_rating', 'Maturity Rating') !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please select maturity rating"></i>
                {!! Form::select('maturity_rating', array('all age' => 'All age', '13+' =>'13+', '16+' => '16+', '18+'=>'18+'), null, ['class' => 'form-control select2']) !!}
                <small class="text-danger">{{ $errors->first('maturity_rating') }}</small>
            </div>
						<div class="form-group">
              <div class="row">
                <div class="col-xs-6">
                  {!! Form::label('', 'Choose custom thumbnail & poster') !!}
                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch for-custom-image">
                    {!! Form::checkbox('', 1, 0, ['class' => 'checkbox-switch']) !!}
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
            </div>
						<div class="upload-image-main-block">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group{{ $errors->has('thumbnail') ? ' has-error' : '' }} input-file-block">
                    {!! Form::label('thumbnail', 'Thumbnail') !!} - <p class="info">Help block text</p>
                    {!! Form::file('thumbnail', ['class' => 'input-file', 'id'=>'thumbnail']) !!}
                    <label for="thumbnail" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Thumbnail">
                      <i class="icon fa fa-check"></i>
                      <span class="js-fileName">Choose a File</span>
                    </label>
                    <p class="info">Choose custom thumbnail</p>
                    <small class="text-danger">{{ $errors->first('thumbnail') }}</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group{{ $errors->has('poster') ? ' has-error' : '' }} input-file-block">
                    {!! Form::label('poster', 'Poster') !!} - <p class="info">Help block text</p>
                    {!! Form::file('poster', ['class' => 'input-file', 'id'=>'poster']) !!}
                    <label for="poster" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Poster">
                      <i class="icon fa fa-check"></i>
                      <span class="js-fileName">Choose a File</span>
                    </label>
                    <p class="info">Choose custom poster</p>
                    <small class="text-danger">{{ $errors->first('poster') }}</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="pad_plus_border">
              <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                <div class="row">
                  <div class="col-xs-6">
                    {!! Form::label('subtitle', 'Subtitle') !!}
                  </div>
                  <div class="col-xs-5 pad-0">
                    <label class="switch">
                      {!! Form::checkbox('subtitle', 1, $movie->subtitle, ['class' => 'checkbox-switch']) !!}
                      <span class="slider round"></span>
                    </label>
                  </div>
                </div>
                <div class="col-xs-12">
                  <small class="text-danger">{{ $errors->first('subtitle') }}</small>
                </div>
              </div>
              <div class="form-group{{ $errors->has('subtitle_list') ? ' has-error' : '' }} subtitle_list">
                  {!! Form::label('subtitle_list', 'Subtitles List') !!}
                  <div class="input-group">
                    <select name="subtitle_list[]" id="subtitle_list" class="form-control select2" multiple="multiple">
                      @if(isset($old_subtitles) && count($old_subtitles) > 0)
                        @foreach($old_subtitles as $old)
                          <option value="{{$old->id}}" selected="selected">{{$old->language}}</option> 
                        @endforeach
                      @endif
                      @if(isset($a_subs))
                        @foreach($a_subs as $rest)
                          <option value="{{$rest->id}}">{{$rest->language}}</option> 
                        @endforeach
                      @endif
                    </select>  
                    <a href="#" data-toggle="modal" data-target="#AddLangModal" class="input-group-addon"><i class="material-icons left">add</i></a>
                  </div>
                  <small class="text-danger">{{ $errors->first('subtitle_list') }}</small>
              </div>
              {{-- <div id="subtitle-file" class="form-group{{ $errors->has('subtitle_files') ? ' has-error' : '' }} input-file-block">
                {!! Form::label('subtitle_files', 'Subtitle File') !!} - <p class="info">Help block text</p>
                {!! Form::file('subtitle_files', ['class' => 'input-file', 'id'=>'subtitle_files']) !!}
                <label for="subtitle_files" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Subtitle File">
                  <i class="icon fa fa-check"></i>
                  <span class="js-fileName">Choose a File</span>
                </label>
                <p class="info">Choose custom Subtitle File</p>
                <small class="text-danger">{{ $errors->first('subtitle_files') }}</small>
              </div> --}}
            </div>
						<div class="form-group{{ $errors->has('series') ? ' has-error' : '' }}">
              <div class="row">
                <div class="col-xs-6">
                  {!! Form::label('series', 'Series') !!}
                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">
                    {!! Form::checkbox('series', 1, $movie->series, ['class' => 'checkbox-switch']) !!}
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger">{{ $errors->first('series') }}</small>
              </div>
            </div>
            <div class="form-group{{ $errors->has('movie_id') ? ' has-error' : '' }} movie_id">
              {!! Form::label('movie_id', 'Select Movie Of Series') !!}
							{!! Form::select('movie_id', [(isset($this_movie_series_detail) ? $this_movie_series_detail[0]->id : '')=>(isset($this_movie_series_detail) ? $this_movie_series_detail[0]->title : '')]+$movie_list_exc_series, null, ['class' => 'form-control select2']) !!}
              <small class="text-danger">{{ $errors->first('movie_id') }}</small>
            </div>
            <div class="form-group{{ $errors->has('featured') ? ' has-error' : '' }}">
              <div class="row">
                <div class="col-xs-6">
                  {!! Form::label('featured', 'Featured') !!}
                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">                
                    {!! Form::checkbox('featured', 1, $movie->featured, ['class' => 'checkbox-switch']) !!}
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger">{{ $errors->first('featured') }}</small>
              </div>
            </div>
            <div class="menu-block">
              <h6 class="menu-block-heading">Please Select Menu</h6>
              @if (isset($menus) && count($menus) > 0)
                <ul>
                  @foreach ($menus as $menu)
                    <li>
                      <div class="inline">
                        @php
                          $checked = null;
                          if (isset($menu->menu_data) && count($menu->menu_data) > 0) {
                            if ($menu->menu_data->where('movie_id', $movie->id)->where('menu_id', $menu->id)->first() != null) {
                              $checked = 1;
                            }
                          }
                        @endphp
                        @if ($checked == 1)
                          <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="{{$menu->id}}" id="checkbox{{$menu->id}}" checked>
                          <label for="checkbox{{$menu->id}}" class="material-checkbox"></label>
                        @else
                          <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="{{$menu->id}}" id="checkbox{{$menu->id}}">
                          <label for="checkbox{{$menu->id}}" class="material-checkbox"></label>
                        @endif
                      </div>
                      {{$menu->name}}
                    </li>
                  @endforeach
                </ul>
              @endif
            </div>
						<div class="switch-field">
							<div class="switch-title">TMDB Data Or Custom data?</div>
							<input type="radio" id="switch_left" class="imdb_btn" name="tmdb" value="Y" {{$movie->tmdb == 'Y' ? 'checked' : ''}}/>
							<label for="switch_left">TMDB</label>
							<input type="radio" id="switch_right" class="custom_btn" name="tmdb" value="N" {{$movie->tmdb != 'Y' ? 'checked' : ''}}/>
							<label for="switch_right">Custom</label>
						</div>
						<div id="custom_dtl" class="custom-dtl">
              <div class="form-group{{ $errors->has('trailer_url') ? ' has-error' : '' }}">
                  {!! Form::label('trailer_url', 'Trailer Url') !!}
                  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter your trailer url"></i>
                  {!! Form::text('trailer_url', null, ['class' => 'form-control']) !!}
                  <small class="text-danger">{{ $errors->first('trailer_url') }}</small>
              </div>
							<div class="form-group{{ $errors->has('director_id') ? ' has-error' : '' }}">
								{!! Form::label('director_id', 'Directors') !!}
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please select your directors"></i>
                <div class="input-group">
                  <select name="director_id[]" id="director_id" class="form-control select2" multiple="multiple">
                    @if(isset($old_director) && count($old_director) > 0)
                      @foreach($old_director as $old)
                        <option value="{{$old->id}}" selected="selected">{{$old->name}}</option> 
                      @endforeach
                    @endif
                    @if(isset($director_ls))
                      @foreach($director_ls as $rest)
                        <option value="{{$rest->id}}">{{$rest->name}}</option> 
                      @endforeach
                    @endif
                  </select>  
                  <a href="#" data-toggle="modal" data-target="#AddDirectorModal" class="input-group-addon"><i class="material-icons left">add</i></a>
                </div>
								<small class="text-danger">{{ $errors->first('director_id') }}</small>
							</div>
							<div class="form-group{{ $errors->has('actor_id') ? ' has-error' : '' }}">
									{!! Form::label('actor_id', 'Actors') !!}
                  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please select your actors"></i>
                  <div class="input-group">
                    <select name="actor_id[]" id="actor_id" class="form-control select2" multiple="multiple">
                      @if(isset($old_actor) && count($old_actor) > 0)
                        @foreach($old_actor as $old)
                          <option value="{{$old->id}}" selected="selected">{{$old->name}}</option> 
                        @endforeach
                      @endif
                      @if(isset($actor_ls))
                        @foreach($actor_ls as $rest)
                          <option value="{{$rest->id}}">{{$rest->name}}</option> 
                        @endforeach
                      @endif
                    </select>  
                    <a href="#" data-toggle="modal" data-target="#AddActorModal" class="input-group-addon"><i class="material-icons left">add</i></a>
                  </div>
									<small class="text-danger">{{ $errors->first('actor_id') }}</small>
							</div>
							<div class="form-group{{ $errors->has('genre_id') ? ' has-error' : '' }}">
									{!! Form::label('genre_id', 'Genre') !!}
                  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please select your genres"></i>
                  <div class="input-group">
                    <select name="genre_id[]" id="genre_id" class="form-control select2" multiple="multiple">
                      @if(isset($old_genre) && count($old_genre) > 0)
                        @foreach($old_genre as $old)
                          <option value="{{$old->id}}" selected="selected">{{$old->name}}</option> 
                        @endforeach
                      @endif
                      @if(isset($genre_ls))
                        @foreach($genre_ls as $rest)
                          <option value="{{$rest->id}}">{{$rest->name}}</option> 
                        @endforeach
                      @endif
                    </select>  
                    <a href="#" data-toggle="modal" data-target="#AddGenreModal" class="input-group-addon"><i class="material-icons left">add</i></a>
                  </div>
									<small class="text-danger">{{ $errors->first('genre_id') }}</small>
							</div>
							<div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
									{!! Form::label('duration', 'Duration') !!}
                  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter movie duration in (mins) eg:160"></i>
									{!! Form::text('duration', null, ['class' => 'form-control']) !!}
									<small class="text-danger">{{ $errors->first('duration') }}</small>
							</div>
							<div class="form-group{{ $errors->has('publish_year') ? ' has-error' : '' }}">
									{!! Form::label('publish_year', 'Publishing Year') !!}
                  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter movie publish year eg:2016"></i>
									{!! Form::number('publish_year', null, ['class' =>   'form-control']) !!}
									<small class="text-danger">{{ $errors->first('publish_year') }}</small>
							</div>
							<div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
									{!! Form::label('rating', 'Ratings') !!}
                  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter ratings eg:8"></i>
									{!! Form::text('rating', null, ['class' => 'form-control']) !!}
									<small class="text-danger">{{ $errors->first('rating') }}</small>
							</div>
							<div class="form-group{{ $errors->has('released') ? ' has-error' : '' }}">
									{!! Form::label('released', 'Released') !!}
                  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter movie released date eg:26-07-2019"></i>
									{!! Form::date('released', null, ['class' => 'form-control']) !!}
									<small class="text-danger">{{ $errors->first('released') }}</small>
							</div>
							<div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
									{!! Form::label('detail', 'Description') !!}
                  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Please enter movie description"></i>
									{!! Form::textarea('detail', null, ['class' => 'form-control materialize-textarea', 'rows' => '5']) !!}
									<small class="text-danger">{{ $errors->first('detail') }}</small>
							</div>
						</div>
						<div class="btn-group pull-right">
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Update</button>
						</div>
						<div class="clear-both"></div>
	        {!! Form::close() !!}
	      </div>  
      </div>

      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">
          <a data-target="#submodal" data-toggle="modal"  class="btn btn-success pull-right">Add Subtitle</a>
          <h5>Subtitles</h5>

          <hr>

          <table class="table table-borderd">
            <thead>
              <tr>
                <th>#</th>
                <th>Subtitle Language</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach($movie->subtitles as $key=> $subtitle)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $subtitle->sub_lang }}</td>
                  <td>
                     <button type="button" class="btn-danger btn-floating" data-toggle="modal" data-target="#{{$subtitle->id}}deleteModal"><i class="material-icons">delete</i> </button></td>
                </tr>

                  <div id="{{$subtitle->id}}deleteModal" class="delete-modal modal fade" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="delete-icon"></div>
                      </div>
                      <div class="modal-body text-center">
                        <h4 class="modal-heading">Are You Sure ?</h4>
                        <p>Do you really want to delete these subtitle? This process cannot be undone.</p>
                      </div>
                      <div class="modal-footer">
                        {!! Form::open(['method' => 'POST', 'action' => ['SubtitleController@delete', $subtitle->id]]) !!}
                          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                          <button type="submit" class="btn btn-danger">Yes</button>
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Subtitle Modal -->
  <div id="submodal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Add Subtitle</h5>
        </div>
        <form action="{{ route('add.subtitle',$movie->id) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="modal-body">
           <table class="table table-bordered" id="dynamic_field">  
                    <tr> 
                        <td>
                           <div class="form-group{{ $errors->has('sub_t') ? ' has-error' : '' }} input-file-block">
                            <input type="file" name="sub_t[]"/>
                            <p class="info">Choose subtitle file ex. subtitle.srt, or. txt</p>
                            <small class="text-danger">{{ $errors->first('sub_t') }}</small>
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
        <div class="modal-footer">
          <div class="btn-group pull-right">
            <button type="reset" class="btn btn-info">Reset</button>
            <button type="submit" class="btn btn-success">Create</button>
          </div>
        </div>
        </form>
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
        {!! Form::open(['method' => 'POST', 'action' => 'AudioLanguageController@store']) !!}
        <div class="modal-body">
          <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
            {!! Form::label('language', 'Language') !!}
            {!! Form::text('language', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('language') }}</small>
          </div>
        </div>
        <div class="modal-footer">
          <div class="btn-group pull-right">
            <button type="reset" class="btn btn-info">Reset</button>
            <button type="submit" class="btn btn-success">Create</button>
          </div>
        </div>
        {!! Form::close() !!}
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
        {!! Form::open(['method' => 'POST', 'action' => 'DirectorController@store', 'files' => true]) !!}
          <div class="modal-body admin-form-block">          
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>
            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
              {!! Form::label('image', 'Director Image') !!} - <p class="inline info">Help block text</p>
              {!! Form::file('image', ['class' => 'input-file', 'id'=>'image']) !!}
              <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Director pic">
                <i class="icon fa fa-check"></i>
                <span class="js-fileName">Choose a File</span>
              </label>
              <p class="info">Choose custom image</p>
              <small class="text-danger">{{ $errors->first('image') }}</small>
            </div>
          </div>  
          <div class="modal-footer">            
            <div class="btn-group pull-right">
              <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> Reset</button>
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Create</button>
            </div>
            <div class="clear-both"></div>
          </div>  
        {!! Form::close() !!}
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
        {!! Form::open(['method' => 'POST', 'action' => 'ActorController@store', 'files' => true]) !!}
          <div class="modal-body admin-form-block">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>
            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
              {!! Form::label('image', 'Director Image') !!} - <p class="inline info">Help block text</p>
              {!! Form::file('image', ['class' => 'input-file', 'id'=>'image']) !!}
              <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Director pic">
                <i class="icon fa fa-check"></i>
                <span class="js-fileName">Choose a File</span>
              </label>
              <p class="info">Choose custom image</p>
              <small class="text-danger">{{ $errors->first('image') }}</small>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> Reset</button>
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Create</button>
            </div>
          </div>  
          <div class="clear-both"></div>
        {!! Form::close() !!}
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
        {!! Form::open(['method' => 'POST', 'action' => 'GenreController@store']) !!}
          <div class="modal-body admin-form-block">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> Reset</button>
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Create</button>
            </div>
          </div>
          <div class="clear-both"></div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection

@section('custom-script')
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

      @if ($movie->video_link->ready_url != null)
        $('#ready_url').show();
        $('#custom_url').hide(); 
      @else
        $('#ready_url').hide();
        $('#custom_url').show();
      @endif
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
      @if($movie->tmdb == 'N')
        $('#custom_dtl').show();
      @endif
      @if ($movie->subtitle == 0)
        $('.subtitle_list').hide();
  			$('#subtitle-file').hide();
      @endif 
      @if($movie->series == 0)
  			$('.movie_id').hide();
      @endif
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
       
        $('#txt2').text("Movie Created By Title:");
        $('#mv_t').removeAttr('readonly','readonly');
        $('#mv_i').attr('readonly','readonly');

      }else{
         $('#mv_i').removeAttr('readonly','readonly');
         $('#mv_t').attr('readonly','readonly');
         $('#txt2').text("Movie Created By ID:");
      }
    });

    $('#iframecheck').on('switchChange.bootstrapSwitch', function (event, state) {

          if (state == true) {

             $('#urlbox').hide();
             $('#ifbox').show();

          } else if (state == false) {

            $('#urlbox').show();
            $('#ifbox').hide();

          };

      });
  </script>
@endsection