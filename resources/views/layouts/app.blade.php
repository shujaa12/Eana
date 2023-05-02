<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head>
        <meta charset="utf-8" />
        <title>برنامج إعانة</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/css/components-rtl.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('assets/global/css/plugins-rtl.min.css')}}" rel="stylesheet" type="text/css" />

        @yield('css')

        <link href="{{asset('assets/layouts/layout3/css/layout-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/layouts/layout3/css/themes/default-rtl.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{asset('assets/layouts/layout3/css/custom-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">

        <style>
            @font-face{
                 font-family: Tajawal;
                src:url({{asset('fonts/Tajawal-Medium.ttf')}});
              }
            *{
              font-family: Tajawal;
              font-size: 16px;
            }
            body, h1, h2, h3, h4 , tr, td,li, .block ,label, .Tajawal, .page-title, .panel-title, .uppercase, .modal-title, .label{
                font-family: Tajawal;
            }

            select{
                height: 100px;
            }


    #title1{
        color: black;
        text-decoration: none;
    }
            </style>

<style>


    ::-webkit-scrollbar {
        width: 8px;
        background-color: rgba(199, 199, 199, 0.705);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: rgba(173, 172, 172, 0.884);
        border-radius: 10px;
    }




    #spinner0 {
        float: right;
        position: fixed;
        display: none;
        right: 0%;
        top: 0px;
        height: 100%;
        width: 100%;
        background-color: #7473739a;
    }

    #spinner1 {
        margin: 0 auto;
        margin-top: 18%;
        margin-right: 46.5%;
    }

    .lds-hourglass {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }

    .lds-hourglass:after {
        content: " ";
        display: block;
        border-radius: 50%;
        width: 0;
        height: 0;
        margin: 8px;
        box-sizing: border-box;
        border: 32px solid #fff;
        border-color: #fff transparent #fff transparent;
        animation: lds-hourglass 1.2s infinite;
    }

    @keyframes lds-hourglass {
        0% {
            transform: rotate(0);
            animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
        }

        50% {
            transform: rotate(900deg);
            animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
        }

        100% {
            transform: rotate(1800deg);
        }
    }



.page-content{
    background-color: #f3f3f3;
}


@media screen and (max-width: 600px) {
    #spinner1 {
        margin: 0 auto;
        margin-top: 50%;
        margin-right: 40%;
    }

}

@media screen and (max-width: 700px) {
    .portlet-body {
overflow-x:auto;
    }

}

</style>
    </head>

    <body class="page-container-bg-solid">
        <div class="page-header">
            <div class="page-header-top">
                <div class="container">
                    <div class="page-logo">
                        <a href="/">
                            <img src="{{asset('img/logo.png') }}" alt="logo" style="height: 60px;margin-top: 5px;">
                        </a>
                    </div>
                    <a href="javascript:;" class="menu-toggler"></a>
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            @if (isset(Auth::user()->id))
                            <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bell"></i>
                                    <span class="badge badge-default" id="notifications_count1">0</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>
                                            <span class="bold" id="notifications_count"></span> </h3>
                                        <a id="notificationsDoneAll">تمييز الكل كمقروء</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283"  id="notifications">

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="droddown dropdown-separator">
                                <span class="separator"></span>
                            </li>

                            <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="circle" id="messages_count1">0</span>
                                    <span class="corner"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3><span class="bold" id="messages_count">0 رسالة</span></h3>
                                        <a href="/Messenger">عرض الكل</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283" id="messages1">
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="{{asset('assets/layouts/layout3/img/avatar9.jpg')}}">
                                    <span class="username username-hide-mobile">{{ Auth::user()->name }} </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="/Profile">
                                            <i class="icon-user"></i> الصفحة الشخصية </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="/passwordReset">
                                            <i class="icon-lock"></i> تغيير كلمة المرور </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            <i class="icon-key li1"></i> تسجيل خروج</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                    </li>

                                </ul>
                            </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-header-menu">
                <div class="container">




                    @include('includes.navbar')
                </div>
            </div>
        </div>


        @yield('content')




        <div class="page-prefooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 footer-block">
                        <h2>نبذة عنا</h2>
                        <p style="text-align: justify"> يمكن للأشخاص من خلاله التبرع بالأشياء التي لا يحتاجونها بعد الآن، ويتم تقديم هذه الأشياء للأشخاص الذين يحتاجونها بشكل مجاني. ويمكن للأشخاص البحث في الموقع عن المنتجات التي يحتاجونها والتواصل مع صاحب المنتج لترتيب عملية الاستلام.</p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>تواصل معنا</h2>
                        <ul class="social-icons">
                            <li>
                                <a href="javascript:;" data-original-title="rss" class="rss"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="facebook" class="facebook"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="twitter" class="twitter"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>اتصل بنا</h2>
                        <address class="margin-bottom-40" style="float: right"> جوال: <a href="tel:+966 55 786 9291">9291 786 55 966+</a>
                            <br> إيميل:
                            <a href="mailto:info@metronic.com">info@metronic.com</a>
                        </address>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-footer" style="text-align: center">
            <div class="container">إعانة  &copy;  2023
            </div>
        </div>
        @if (isset(Auth::user()->id))
        <input type="hidden" id="userIdnotifications" value="{{auth()->user()->id}}"/>
        @endif

        <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/layouts/layout3/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/layouts/layout3/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>

        @yield('js')
    </body>

    <script>



        $(document).on('click', '.spinner', function() {
            $('#spinner0').show();
        });


        function ConfirmDelete() {
            return confirm('تأكيد الحذف');
        }



        $(document).on('click', '#notificationsDone', function() {
            var dataid = {
            "id": $(this).data('id')
        }
        $.ajax({
            url: "/notificationsDone"
            , method: "get"
            , data: dataid
            , dataType: "json",
            success: function(data0) {
            }
        });
        });

        $(document).on('click', '#notificationsDoneAll', function() {
            var id = $("#userIdnotifications").val();
            var dataid = {"id": id}
            if (confirm('تعيين الكل كمقروء')) {

        $.ajax({
            url: "/notificationsDoneAll"
            , method: "get"
            , data: dataid
            , dataType: "json",
            success: function(data0) {
            }
        });
    }
        });

         notifications();
         messenger();

  function notifications(){
    var id = $("#userIdnotifications").val();

var dataorder = {"id":id}
$.ajax({
   url:"/notifications_es",
   method:"get",
   data: dataorder,
   dataType: "json",
   success: function(data) {
    $('#notifications').html(data.notifications);
    $('#notifications_count').html(data.notifications_count + " اشعار");
    $('#notifications_count1').html(data.notifications_count);

         }
 });
  };

  function messenger(){
    var id = $("#userIdnotifications").val();

var dataorder = {"id":id}
$.ajax({
   url:"/MessengerCount",
   method:"get",
   data: dataorder,
   dataType: "json",
   success: function(data) {
    $('#messages_count').html(data.messages_count + " رسالة");
    $('#messages_count1').html(data.messages_count);
    $('#messages1').html(data.messages);



         }
 });
  };
  setInterval(function(){
    notifications();
    messenger();
      }, 4000);




      $('.nour').trigger('click');

      $('#navbar').animate({
                    scrollTop: $(".active").offset().top-80
                }, 1000, 'swing');



        </script>
</html>
