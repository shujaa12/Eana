@extends('layouts.app')
@section('content')
<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-head">
            <div class="container">
                <div class="page-title">
                    <h1>الدردشات </h1>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">

                <div class="row">
                    <div class="col-sm-4">
                        <div class="portlet box red-flamingo ">
                            <div class="portlet-title radius-15">
                                <div class="caption" style="height: 30px;">
                                    <i class="fa fa-wechat"></i> الدردشات </div>
                            </div>
                            <div class="portlet-body form radius-15" style="max-height: 430px;overflow: auto;">
                                <form role="form">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <div class="input-icon">
                                                <i class="fa fa-search"></i>
                                                <input type="text" id="myInput" class="form-control" placeholder="بحث في الدردشات">
                                            </div>
                                        </div>
                                        <table class="table table-hover">
                                            <tbody>

                                                @foreach ($users as $value)
                                                <tr class="col" data-id="{{$value->id}}" data-name="{{$value->name}}" data-id_emp="{{$value->id}}" id="idSender">
                                                    <td style="width: 60px;">
                                                        <img src="{{asset('uploads/users.jpg')}}" class="img-responsive img-circle" style="max-height: 50px;width: 50px;" />
                                                    </td>
                                                    <td style="text-align: right;font-size: 16px;padding-top: 20px;">{{$value->name}}</td>
                                                    <td style="text-align: right;font-size: 16px;padding-top: 20px;">
                                                        @foreach ($messages2 as $value2)
                                                        @if ($value2->sender == $value->id)
                                                        <span class="badge badge-danger pull-right">{{$value2->countMas}}</span>
                                                        @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="portlet box blue ">
                            <div class="portlet-title radius-15">
                                <div class="caption">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td style="max-width: 70px;">
                                                    <img src="{{asset('uploads/users.jpg')}}" id="img1" style="max-height: 40px;width: 40px;" class="img-responsive img-circle" />
                                                </td>
                                                <td style="text-align: right;font-size: 16px;padding-right: 10px;" id="nameUser"></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form role="form">
                                    <div class="form-body">
                                        <div class="row" style="height: 70px;">
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control " value="" id="receiverId">
                                                    <textarea class="form-control" id="textMessage" rows="1"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn green-jungle" id="SendMas">
                                                    <i class="fa fa-send"></i>
                                                    ارسال</button>
                                            </div>
                                        </div>
                                        <div class="row" style="height: 300px;overflow: auto;">

                                            <div class="col-sm-12" id="testMas">


                                            </div>
                                        </div>

                                    </div>
                                </form>
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

@endsection

@section('js')


<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".col").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

</script>

<script>
    $(document).on('click', '#idSender', function() {
        var sender = $(this).data('id');
        $('#nameUser').html($(this).data('name'));
        $('#receiverId').val($(this).data('id'));

        $.ajax({
            url: "/showMessages"
            , method: "get"
            , data: 'sender=' + sender
            , dataType: "json"
            , success: function(data01) {
                $('#testMas').html(data01);
            }
        });
    });


    $(document).on('click', '#SendMas', function() {
        var text = $('#textMessage').val();
        var receiver = $('#receiverId').val();
        var datamas = {
            "text": text
            , "receiver": receiver
        }

        if (receiver === "") {
            alert("يرجى اختيار المستقبل");
        } else {
            if (text === "") {
                alert("يرجى كتابة الرسالة");
            } else {
                $.ajax({
                    url: "/sendMessages"
                    , method: "get"
                    , data: datamas
                    , dataType: "json"
                    , success: function(data02) {
                        $('#testMas').html(data02);
                    }

                });
                $('#textMessage').val("");
            }
        }
    });


    $(document).ready(function() {
        function updatemessage(view = '') {
            var sender = $('#receiverId').val();
            $.ajax({
                url: "updatemessage"
                , method: "get"
                , data: 'sender=' + sender,

                dataType: "json"
                , success: function(data01) {
                    $('#testMas').html(data01);

                }
            });
        }

        setInterval(function() {
            updatemessage();
        }, 2000);
    });

</script>

@endsection
