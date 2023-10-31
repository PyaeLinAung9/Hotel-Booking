<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="" class="site_title"><i class="fa fa-paw"></i> <span>{{ (getSiteSetting() !== null) ? getSiteSetting()->name : ''}}</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ URL::to('images')}}/{{ getSiteSetting()->image }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>
                    {{ Auth::guard('Admin')->user()->name}}
                </h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ URL::to('admin-backend/index')}}"><i class="fa fa-laptop"></i> Home </a></li>

                    <li><a><i class="fa fa-edit"></i> View <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ URL::to('admin/view/create')}}"> Create</a></li>
                            <li><a href="{{ URL::to('admin/view/list')}}"> List</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-bed"></i> Bed <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ URL::to('admin/bed/create')}}"> Create</a></li>
                            <li><a href="{{ URL::to('admin/bed/list')}}"> List</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i>Amenities <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ URL::to('admin/amenity/create')}}"> Create</a></li>
                            <li><a href="{{ URL::to('admin/amenity/list')}}"> List</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i>Special Feature <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ URL::to('admin/feature/create')}}">Create</a></li>
                            <li><a href="{{ URL::to('admin/feature/list')}}">List</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i> Room <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ URL::to('admin/room/create')}}"> Create</a></li>
                            <li><a href="{{ URL::to('admin/room/list')}}"> List</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i> Reservation <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ URL::to('admin/reservation/list')}}"> List</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i> Hotel Setting <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ URL::to('admin/setting/form')}}"> Create</a></li>
                        </ul>
                    </li>
                </ul>
            </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ URL::to('logout')}}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
