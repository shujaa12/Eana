<div class="hor-menu  hor-menu-light" style="width: 100%;">
    <div class="col-md-8">
            <ul class="nav navbar-nav">

                <li class="Tajawal active">
                    <a href="/" class="nav-link " style="font-family: Tajawal !important;">
                        <i class="fa fa-home"></i> الرئيسية
                    </a>
                </li>


        <li class="menu-dropdown classic-menu-dropdown ">
            <a href="javascript:;" >
                <i class="fa fa-bar-chart"></i>
                المنتجات
                <span class="arrow"></span>
            </a>
            <ul class="dropdown-menu" class="Tajawal">
                <li class="Tajawal">
                    <a href="/" class="nav-link" style="font-family: Tajawal !important;">
                    المنتجات (التبرعات)
                    </a>
                </li>
                <li class="Tajawal">
                    <a href="/" class="nav-link" style="font-family: Tajawal !important;">
                     المنتجات التي حصلت عليها
                    </a>
                </li>
            </ul>

        </li>




        <li class="menu-dropdown classic-menu-dropdown ">
            <a href="javascript:;" >
                <i class="fa fa-bar-chart"></i>
                الطلبات
                <span class="arrow"></span>
            </a>
            <ul class="dropdown-menu" class="Tajawal">
                <li class="Tajawal">
                    <a href="/" class="nav-link" style="font-family: Tajawal !important;">
                           طلباتي
                    </a>
                </li>
                <li class="Tajawal">
                    <a href="/" class="nav-link" style="font-family: Tajawal !important;">
                           الموافقة على الطلبات
                    </a>
                </li>
            </ul>

        </li>


    </ul>
</div>
<div class="col-md-4">


        @if (!isset(Auth::user()->id))
        <ul class="nav navbar-nav pull-right">
            <li class="Tajawal pull-right">
                <a href="/register" class="nav-link" style="font-family: Tajawal !important;">
                   تسجيل حساب
                </a>
            </li>
            <li class="Tajawal pull-right">
                <a href="/login" class="nav-link" style="font-family: Tajawal !important;">
                 دخول
                </a>
            </li>
        </ul>
            @endif




</div>

</div>
