<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="{{asset('admin/images/users/avatar-1.jpg')}}" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle">John Doe</a>
                </div>

                <p class="text-muted m-0">Administrator</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('admin.dashboard')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::segment(2) == 'dashboard'?'active':''}}"><i class="md md-home"></i><span> Dashboard </span></a>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect {{\Illuminate\Support\Facades\Request::segment(2) == 'employee'?'active':''}}"><i class="md md-people"></i><span> Manage Employee </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('employee.list')}}" style="{{\Illuminate\Support\Facades\Request::segment(3) == 'list'?'color: #317eeb' : ''}}"><i class="md md-list"></i>Employee List</a></li>
                        <li><a href="{{route('employee.add-page')}}" style="{{\Illuminate\Support\Facades\Request::segment(3) == 'add-new'?'color: #317eeb' : ''}}"><i class="md md-person-add"></i> Add Employee</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect {{\Illuminate\Support\Facades\Request::segment(2) == 'lead'?'active':''}}" ><i class="md md-list"></i><span> Manage Lead </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('lead.list')}}" style="{{\Illuminate\Support\Facades\Request::segment(3) == 'list'?'color: #317eeb' : ''}}"><i class="md md-list"></i>Lead List</a></li>
                        <li><a href="{{route('lead.add-page')}}" style="{{\Illuminate\Support\Facades\Request::segment(3) == 'add-new'?'color: #317eeb' : ''}}"><i class="md md-playlist-add"></i> Add Lead</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect {{\Illuminate\Support\Facades\Request::segment(2) == 'service'?'active':''}}"><i class="md md-list"></i><span> Manage Service </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('service.list')}}" style="{{\Illuminate\Support\Facades\Request::segment(3) == 'list'?'color: #317eeb' : ''}}"><i class="md md-list"></i>Service List</a></li>
                        <li><a href="{{route('service.add-page')}}" style="{{\Illuminate\Support\Facades\Request::segment(3) == 'add-new'?'color: #317eeb' : ''}}"><i class="md md-playlist-add"></i> Add Service</a></li>
                        <li><a href="{{route('service.visitor.page')}}" style="{{\Illuminate\Support\Facades\Request::segment(3) == 'visitor-service'?'color: #317eeb' : ''}}"><i class="md md-playlist-add"></i> User Service</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect {{\Illuminate\Support\Facades\Request::segment(2) == 'visitor'?'active':''}}"><i class="md md-person"></i><span> Manage Visitor </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('visitor.list')}}" style="{{\Illuminate\Support\Facades\Request::segment(3) == 'list'?'color: #317eeb' : ''}}"><i class="md md-list"></i>Visitor List</a></li>
                        <li><a href="{{route('visitor.add-page')}}" style="{{\Illuminate\Support\Facades\Request::segment(3) == 'add-new'?'color: #317eeb' : ''}}"><i class="md md-person-add"></i> Add Visitor</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
