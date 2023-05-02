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
                <a href="/users" class="font-blue">Users</a>
                <i class="fa fa-circle font-blue"></i>
            </li>
        </ul>
    </div>
    <h3 class="page-title">
        <i class="fa fa-users"></i>
     Users

     <button type="button" class="btn green-jungle btn-circle pull-right" id="Modal0" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-plus"></i>
        Add User</button>
    </h3>
    @include('includes.messages')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="fa fa-users"></i>
                        <span class="caption-subject bold uppercase">Users</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Stuats</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $i=1 ?>

                            @foreach ($users as $value)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>@if($value->status == 1)
                                    Active
                                    @elseif($value->status == 2)
                                    Inactive
                                    @endif

                                </td>
                                <td>
                                    {{ Form::open(['route' => ['users.password', $value->id], 'onsubmit' => 'return ConfirmPass()']) }}

                                    <a class="btn btn-outline yellow-gold btn-circle" style="margin-bottom: 5px;" href="/users/{{$value->id}}/edit">
                                        <i class="fa fa-edit"></i>
                                        Edit</a>

                                    <a class="btn btn-outline blue btn-circle" style="margin-bottom: 5px;" href="/usersPermissions/{{$value->id}}/edit">
                                        <i class="fa fa-edit"></i>
                                        Permissions</a>

                                        <button class="btn btn-outline red-thunderbird btn-circle" style="margin-bottom: 5px;">
                                            <i class="fa fa-edit"></i> Change Password</button>
                                        {{ Form::close() }}

                                </td>
                            </tr>
                            <?php $i++ ?>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content radius-15">
                {!! Form::open(['action' => 'usersController@store', 'method'=>'POST']) !!}

                <div class="modal-header">
                    <button type="button" class="close" style="margin-left: 5px;margin-top: 5px;" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اضافة مستخدم جديد</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" class="form-control input-circle" id="name" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">اسم المستخدم</label>
                                <input type="text" value="{{ old('email') }}" class="form-control input-circle" id="email" name="email" placeholder="الايميل">
                            </div>
                        </div>

                    </div>



                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-circle" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-success btn-circle" id="save">حفظ</button>
                </div>

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

<script>
function ConfirmPass() {
    return confirm('تأكيد تغيير كلمة المرور');
}
</script>

@endsection
