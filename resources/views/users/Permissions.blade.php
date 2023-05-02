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
                    <a href="/usersPermissions/{{ $user->id }}/edit" class="font-blue">User Permissions</a>
                    <i class="fa fa-circle font-blue"></i>
                </li>
            </ul>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <h3 class="page-title">
                    <i class="fa fa-user"></i>
                    Edit User Permissions: {{ $user->name }}
                </h3>
            </div>
            {!! Form::open([
                'action' => ['user_permissions_esController@update', $user->id],
                'method' => 'POST',
                'enctype' => 'multipart/form-data',
            ]) !!}

            <div class="col-sm-6">
                {{ Form::hidden('_method', 'PUT') }}
                <button type="submit" class="btn blue btn-circle  pull-right" style="width:120px;margin-top:25px;"
                    id="Modal0" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-save"></i>
                    Save</button>
            </div>

        </div>

        @include('includes.messages')


        <div class="row">
            <div class="col-sm-12">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs " id="myTab">

                        <li class="active">
                            <a href="#tab1" data-toggle="tab"> Reservations</a>
                        </li>

                        <li>
                            <a href="#tab2" data-toggle="tab"> Follow Up Program</a>
                        </li>

                        <li>
                            <a href="#tab3" data-toggle="tab"> Control Panel</a>
                        </li>

                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="tab1">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Reservations</th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                    <td colspan="3">
                                                        <div class="md-checkbox ">
                                                            <input type="checkbox"
                                                                @if ($reservations1->app == 1) checked @endif
                                                                id="reservations1" name="reservations1" class="md-check">
                                                            <label for="reservations1">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>Company</label>
                                                        </div>
                                                    </td>

                                                </tr>


                                                <tr>
                                                    <td colspan="3">
                                                        <div class="md-checkbox ">
                                                            <input type="checkbox"
                                                                @if ($reservations2->app == 1) checked @endif
                                                                id="reservations2" name="reservations2" class="md-check">
                                                            <label for="reservations2">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>Type Room</label>
                                                        </div>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td colspan="3">
                                                        <div class="md-checkbox ">
                                                            <input type="checkbox"
                                                                @if ($reservations3->app == 1) checked @endif
                                                                id="reservations3" name="reservations3" class="md-check">
                                                            <label for="reservations3">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>Rooms</label>
                                                        </div>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td colspan="3">
                                                        <div class="md-checkbox ">
                                                            <input type="checkbox"
                                                                @if ($reservations4->app == 1) checked @endif
                                                                id="reservations4" name="reservations4" class="md-check">
                                                            <label for="reservations4">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>Search</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <div class="md-checkbox ">
                                                            <input type="checkbox"
                                                                @if ($reservations5->app == 1) checked @endif
                                                                id="reservations5" name="reservations5" class="md-check">
                                                            <label for="reservations5">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>Reservations</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>





                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
 <!--
                        <div class="tab-pane" id="tab2">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                  <div class="row">
                                        <div class="col-sm-12">

                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Follow Up Program</th>
                                                    </tr>
                                                </thead>

                                                <tr>
                                                    <td colspan="3">
                                                        <div class="md-checkbox ">
                                                            <input type="checkbox"
                                                                @if ($reservations9->app == 1) checked @endif
                                                                id="reservations9" name="reservations9" class="md-check">
                                                            <label for="reservations9">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>الرسائل</label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <div class="md-checkbox ">
                                                            <input type="checkbox"
                                                                @if ($reservations14->app == 1) checked @endif
                                                                id="reservations14" name="reservations14" class="md-check">
                                                            <label for="reservations14">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>الصناديق المالية</label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <div class="md-checkbox ">
                                                            <input type="checkbox"
                                                                @if ($reservations2->app == 1) checked @endif
                                                                id="reservations2" name="reservations2" class="md-check">
                                                            <label for="reservations2">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>الأصناف</label>
                                                        </div>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td colspan="3">
                                                        <div class="md-checkbox ">
                                                            <input type="checkbox"
                                                                @if ($reservations3->app == 1) checked @endif
                                                                id="reservations3" name="reservations3" class="md-check">
                                                            <label for="reservations3">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>الموردين</label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3">
                                                        <div class="md-checkbox ">
                                                            <input type="checkbox"
                                                                @if ($reservations1->app == 1) checked @endif
                                                                id="reservations1" name="reservations1" class="md-check">
                                                            <label for="reservations1">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>الزبائن</label>
                                                        </div>
                                                    </td>
                                                </tr>





                                                <tr>
                                                    <td colspan="3">
                                                        <div class="md-checkbox ">
                                                            <input type="checkbox"
                                                                @if ($reservations5->app == 1) checked @endif
                                                                id="reservations5" name="reservations5" class="md-check">
                                                            <label for="reservations5">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>الشركات</label>
                                                        </div>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td colspan="3">
                                                        <div class="md-checkbox ">
                                                            <input type="checkbox"
                                                                @if ($reservations6->app == 1) checked @endif
                                                                id="reservations6" name="reservations6" class="md-check">
                                                            <label for="reservations6">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>أنواع الملفات</label>
                                                        </div>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td colspan="2">
                                                        <div class="md-checkbox ">
                                                            <input type="checkbox"
                                                                @if ($reservations6->app == 1) checked @endif
                                                                id="p1" name="p1" class="md-check"
                                                                value='{{ $p1->id }}'>
                                                            <label for="p1">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>المستخدمين</label>
                                                        </div>
                                                    </td>
                                                </tr>


                                                </tbody>
                                            </table>





                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    -->

                        <div class="tab-pane" id="tab3">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Control Panel</th>
                                                    </tr>
                                                </thead>

                                                <tr>
                                                    <td colspan="2">
                                                        <div class="md-checkbox ">
                                                            <input type="checkbox"
                                                                @if ($p1->app == 1) checked @endif
                                                                id="p1" name="p1" class="md-check"
                                                                value='{{ $p1->id }}'>
                                                            <label for="p1">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span>Users</label>
                                                        </div>
                                                    </td>
                                                </tr>


                                                </tbody>
                                            </table>





                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {!! Form::close() !!}

    </div>
@endsection




@section('css')
    <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components"
        type="text/css" />
    <link href="{{ asset('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css"
        id="style_color" />
    <link href="{{ asset('assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="favicon.ico" />
@endsection


@section('js')
    <script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript">
    </script>

    <script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>

@endsection
