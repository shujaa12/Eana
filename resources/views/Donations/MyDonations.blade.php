@extends('layouts.app')
@section('content')
<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-head">
            <div class="container">
                <div class="page-title">
                    <h1>المنتجات التي حصلت عليها </h1>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">

                @include('includes.messages')

                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    المنتجات التي حصلت عليها
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">المنتج</th>
                                            <th scope="col">المواصفات</th>
                                            <th scope="col">ملاحظات</th>
                                            <th scope="col">الحالة</th>
                                            <th scope="col">الإجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i = 1 ;?>

                                        @foreach ($products_es as $value)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$value->nameProduct}}</td>
                                            <td style="max-width: 400px;">{{$value->details}}</td>
                                            <td>{{$value->note}}</td>
                                            <td>

                                                <span class="badge badge-light">{{$value->userName}}</span><br>
                                                <span class="badge badge-light">{{ $value->date0}}</span>
                                            </td>
                                            <td>
                                                <a href="/Donations/{{$value->id}}" class="btn blue btn-outline"><i class="fa fa-edit"></i>
                                                    عرض </a>
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


            </div>
        </div>
    </div>
</div>

@endsection

@section('css')

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
type="text/css" />
<link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
type="text/css" />
<link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css') }}" rel="stylesheet"
type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css') }}" rel="stylesheet"
type="text/css" />
<link href="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />



<link href="{{ asset('assets/global/css/components-rtl.min.css') }}" rel="stylesheet" id="style_components"
type="text/css" />
<link href="{{ asset('assets/global/css/plugins-rtl.min.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css') }}"
rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"
rel="stylesheet" type="text/css" />

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

<script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"
    type="text/javascript"></script>

<script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript">
</script>

<script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/pages/scripts/table-datatables-buttons.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>

@endsection
