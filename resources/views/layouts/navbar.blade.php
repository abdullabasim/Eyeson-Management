<header  class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        {{--<span class="logo-mini"><b>Dr.</b>sys</span>--}}
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg font">مركز ايسون للتجميل  </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav style="" class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        {{--<a href="#" id="toggles" class="sidebar-toggle" data-toggle="push-menu" role="button">--}}
            {{--<span class="sr-only">Toggle navigation</span>--}}
        {{--</a>--}}

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    @if(\Auth::check())
                    <a href="{{url('/logout')}}"  >

                        <span class="hidden-xs">تسجيل الخروج</span>
                    </a>
                    @else
                        <a href="{{url('/login')}}"  >

                            <span class="hidden-xs">تسجيل الخروج</span>
                        </a>
                     @endif

                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside  class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul  class="sidebar-menu" data-widget="tree">
            @if(Auth::check())
            <li style="text-align: center" class="header"><font size="4"> مرحباً..  {{Auth::user()->name}}</font></li>

            @endif

            <li style="text-align: center !important;" class="treeview">
                <a href="#">

                    <span><font size="4">الزبائن</font> <i class="fas fa-users-cog"></i>

  </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul dir="rtl" class="treeview-menu">
                    <li><a href="{{url('/clientAdd')}}">  أضافة زبون</a></li>
                    @if(\Auth::user()->user_type_id == 1)
                    <li><a href="{{url('clientManage')}}"> أدارة الزبائن</a></li>
                    @endif
                </ul>
            </li>
                @if(\Auth::user()->user_type_id == 1)
            <li style="text-align: center !important;" class="treeview">
                <a href="#">

                    <span><font size="4">الخدمات</font>  </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul dir="rtl" class="treeview-menu">
                    <li><a href="{{url('serviceAdd')}}"> أضافة خدمة</a></li>
                    <li><a href="{{url('serviceManageStep1')}}"> أدارة  الخدمات</a></li>

                </ul>
            </li>
                @endif

            <li style="text-align: center !important;" class="treeview">
                <a href="#">

                    <span><font size="4"> الفواتير</font>  </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul dir="rtl" class="treeview-menu">
                    <li><a href="{{url('/sessionAdd')}}">  أضافة فاتورة</a></li>
                    @if(\Auth::user()->user_type_id == 1)
                    <li><a href="{{url('invoiceManage')}}"> أدارة الفواتير</a></li>
                    @endif

                </ul>
            </li>
                @if(\Auth::user()->user_type_id == 1)
            <li style="text-align: center !important;" class="treeview">
                <a href="#">

                    <span><font size="4">ألادارة </font>  </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul dir="rtl" class="treeview-menu">

                    <li><a href="{{url('/register')}}"> أضافة مستخدم للنظام</a></li>
                    <li><a href="{{url('/analysis')}}"> الوارد</a></li>
                </ul>
            </li>
                @endif




        </ul>
    </section>
    <!-- /.sidebar -->
</aside>