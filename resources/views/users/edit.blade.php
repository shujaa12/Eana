@extends('layouts.app')
@section('content')
<div class="page-content">
  <div class="page-bar">
      <ul class="page-breadcrumb">
        <li>
          <a href="/Dashboard">Dashboard</a>
          <i class="fa fa-circle"></i>
      </li>

          <li>
              <a href="/users">Users</a>
              <i class="fa fa-circle"></i>
          </li>
          <li>
            <a href="/users/{{$user->id}}/edit" class="font-blue">Edit User Information</a>
            <i class="fa fa-circle font-blue"></i>
        </li>
      </ul>
  </div>
  <h3 class="page-title">
    Edit User Information
</h3>
  @include('includes.messages')

  {!! Form::open(['action' => ['usersController@update',$user->id], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}

  <div class="row">
    <div class="col-sm-8">

      <div class="col-sm-6">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text"  value="{{ $user->name }}" class="form-control input-circle" id="name" name="name" placeholder="الاسم">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="email">User Name</label>
          <input type="text"  value="{{ $user->email }}" class="form-control input-circle" id="email" name="email" placeholder="الايميل">
        </div>
      </div>

    </div>


  </div>

  <div class="row">
    <div class="col-sm-8">

      <div class="col-sm-6">
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control input-circle" id="status" name="status">
            <option value="1"  @if($user->status == "1")selected="selected" @endif>Active</option>
            <option value="2"  @if($user->status == "2")selected="selected" @endif>Inactive</option>
           </select>


          </div>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-sm-8">

      <div class="col-sm-12">

        {{Form::hidden('_method' ,'PUT') }}
        <button type="submit" class="btn blue btn-circle" id="Modal0" data-toggle="modal" data-target="#myModal">
          <i class="fa fa-save"></i>
          Save</button>

        {!! Form::close() !!}
      </div>

    </div>
  </div>


</div>
@endsection




@section('css')


<link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
<link href="{{asset('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
<link href="{{asset('assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="favicon.ico" />
@endsection


@section('js')
<script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
@endsection















