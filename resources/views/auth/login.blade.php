
<!DOCTYPE html>

<html lang="en" dir="rtl">

    <head>
        <meta charset="utf-8" />
        <title>برنامج إعانة</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../assets/pages/css/login-4-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}">

    </head>

    <!-- END HEAD -->
    <style>
        @font-face{
             font-family: cairo;
            src:url({{asset('fonts/Tajawal-Medium.ttf')}});
          }
        .form-title, span, input, button, .copyright{
          font-family: cairo;
          font-size: 16px;
        }
        </style>


    <body class=" login" >
        <!-- BEGIN LOGO -->
        <div class="logo" style="margin-top: 20px;">
            <a href="index.html">
                <img src="{{ asset('img/logo.png') }}" alt="" style="height: 100px;"/> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
                <form action="{{ route('login') }}" class="login-form" method="post">
                    {{ csrf_field() }}

                <h3 class="form-title" style="font-size: 18px;">تسجيل الدخول</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> يرجى ادخال اسم المستخدم وكلمة المرور </span>
                </div>
                @if ($errors->has('email'))
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    <span>{{ $errors->first('email') }}</span>
                </div>
            @endif
            @if ($errors->has('password'))
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                <span>{{ $errors->first('password') }}</span>
            </div>
        @endif

                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" style="font-size: 16px;" type="email" autocomplete="off" placeholder="اسم المستخدم" name="email" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix"  style="font-size: 16px;" type="password" autocomplete="off" placeholder="كلمة المرور" name="password" /> </div>
                </div>
                <div class="form-actions" style="margin-bottom: 40px;">

                    <button type="submit" class="btn green pull-right"> تسجيل الدخول </button>
                </div>


                <div class="create-account">
                        <a href="/register" class="btn btn-link font-white " style="font-family: cairo;"> ليس لديك حساب؟ سجل الآن </a>
                </div>
            </form>


        </div>
        <div class="copyright"> إعانة @ 2023 </div>

        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

        <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>

        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>

        <script src="../assets/pages/scripts/login-4.min.js" type="text/javascript"></script>

    </body>

</html>
