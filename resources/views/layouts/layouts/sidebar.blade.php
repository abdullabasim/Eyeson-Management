<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <br>
                <br>
                <br>
            </div>
            <div class="pull-left info">
                <p>
                Welconme :
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> </a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Main Menu</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{url('/Archives')}}"><i class="fa fa-clipboard"></i> All Archives</a></li>
                    <li class="active"><a href="{{'/pendingOnly'}}"><i class="fa fa-circle-o"></i>Pending Only</a></li>
                    <li class="active"><a href="{{'/confirmOnly'}}"><i class="fa fa-circle-o"></i>Confirm Only</a></li>
                    <li class="active"><a href="{{'/doneOnly'}}"><i class="fa fa-circle-o"></i>Done Only</a></li>
                    <li><a href="{{url('/addArchive')}}"><i class="fa fa-user-plus"></i>Add New Archive</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
