<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/assets/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
<span class="input-group-btn">
  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            {{--<li class="treeview {{ $ActiveSidebar[0] == 1 ? 'active' : '' }}">--}}
            {{--<a href="{{url('#')}}"><span>Movie</span> <i class="fa fa-angle-left pull-right"></i></a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li><a href="{{url('server')}}">All Movies</a></li>--}}
            {{--<li><a href="{{url('server')}}">Create New Movie</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            <li class="treeview {{ $ActiveRoute[0] == 1 ? 'active' : '' }}">
                <a href="{{url('#')}}"><span>Agents</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('agents')}}">All Agents</a></li>
                    <li><a href="{{url('agents/create')}}">Create New Agent</a></li>
                </ul>
            </li>
            <li class="treeview {{ $ActiveRoute[1] == 1 ? 'active' : '' }}">
                <a href="{{url('#')}}"><span>Movies</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('movies')}}">All Movies</a></li>
                    <li><a href="{{url('movies/create')}}">Create New Movie</a></li>
                </ul>
            </li>
            <li class="treeview {{ $ActiveRoute[2] == 1 ? 'active' : '' }}">
                <a href="{{url('#')}}"><span>Server</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('server')}}">Status</a></li>
                    <li><a href="{{url('#')}}">Monitor</a></li>
                    <li><a href="{{url('#')}}">Manage</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>