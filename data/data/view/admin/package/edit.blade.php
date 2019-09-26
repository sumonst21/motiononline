@extends('layouts.admin')
@section('title','Edit Package')
@section('content')
  <div class="admin-form-main-block mrg-t-40">
    <h4 class="admin-form-text"><a href="{{url('admin/packages')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit Package</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">
          {!! Form::model($package, ['method' => 'PATCH', 'action' => ['PackageController@update', $package->id]]) !!}
            <div class="form-group{{ $errors->has('plan_id') ? ' has-error' : '' }}">
                {!! Form::label('plan_id', 'Your Unique Plan Id') !!}
                <p class="inline info"> - Please enter your unique plan id for package</p>
                {!! Form::text('plan_id', null, ['class' => 'form-control', 'required' => 'required', 'data-toggle' => 'popover','data-content' => 'Create Your Unique Plan ID ex. basic10', 'data-placement' => 'bottom']) !!}
                <small class="text-danger">{{ $errors->first('plan_id') }}</small>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Plan Name') !!}
                <p class="inline info"> - Please enter your plan name</p>
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>
            {!! Form::hidden('currency', $currency_code) !!}
    
            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                {!! Form::label('amount', ' Your Plan Amount') !!}
                <p class="inline info"> - Please enter your plan amount (Min. Amount should be 1)</p>
                <div class="input-group">
                  <span class="input-group-addon simple-input"><i class="{{$currency_symbol}}"></i></span>
                  {!! Form::number('amount', null, ['min' => 1, 'class' => 'form-control', 'required' => 'required']) !!}  
                </div>
                <small class="text-danger">{{ $errors->first('amount') }}</small>
            </div>
             <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
                    {!! Form::label('image', 'QR Code Image') !!} - <p class="info">Help block text</p>
                    {!! Form::file('image', ['class' => 'input-file', 'id'=>'image']) !!}
                    <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="image">
                      <i class="icon fa fa-check"></i>
                      <span class="js-fileName">Choose a File</span>
                    </label>
                    <p class="info">Choose QR Code Image</p>
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                  </div>

                    <div class="form-group{{ $errors->has('mycolor') ? ' has-error' : '' }}">
                        {!! Form::label('mycolor', 'Plan Colors') !!}
                        <p class="inline info"> - Please select Color for This Plan</p>
                        {!! Form::select('mycolor', ['27ae60'=>'Green','f6b93b'=>'Gold', 'c0c0c0' => 'Silver', 'ee5253' => 'Red', 'e5e4e2' => 'Platinum', '222f3e' => 'Black'],
                         ['f6b93b'=>'Gold'], ['class' => 'form-control select2', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('mycolor') }}</small>
                     </div>
                
   <div class="menu-block">
              <h6 class="menu-block-heading">Please Select Menu</h6>
              @if (isset($menus) && count($menus) > 0)
                <ul>
                     <li>
                      <div class="inline">
                        <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="100" id="checkbox{{100}}">
                        <label for="checkbox{{100}}" class="material-checkbox"></label>
                      </div>
                      All Menus
                    </li>
                  @foreach ($menus as $menu)
                    <li>
                      <div class="inline">
                        <input type="checkbox" class="filled-in material-checkbox-input" name="menu[]" value="{{$menu->id}}" id="checkbox{{$menu->id}}">
                        <label for="checkbox{{$menu->id}}" class="material-checkbox"></label>
                      </div>
                      {{$menu->name}}
                    </li>
                  @endforeach
                </ul>
              @endif
            </div>
           
            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                {!! Form::label('status', 'Status') !!}
                <p class="inline info"> - Please select status</p>
                {!! Form::select('status', array('0' => 'Inactive', '1' => 'Active'), null, ['class' => 'form-control select2', 'placeholde' => '']) !!}
                <small class="text-danger">{{ $errors->first('status') }}</small>
            </div>
            <div class="btn-group pull-right">
              <button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Update</button>
            </div>
            <div class="clear-both"></div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
