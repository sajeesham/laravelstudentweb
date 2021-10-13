<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>

            <ul class="site-menu">
                    <li class="site-menu-category">&nbsp;</li>
                    <li class="site-menu-item @if(Request::segment(1)=='admin' && Request::segment(2)=='') active  @endif">
                        <a class="animsition-link" href="{{ route('admin.index') }}">
                            <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub @if(Request::segment(2)=='teacher') active open  @endif">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon fa-hospital-o" aria-hidden="true"></i>
                            <span class="site-menu-title">Manage Teachers</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item @if(Request::segment(2)=='teacher' && Request::segment(3)=='') active  @endif">
                                <a class="animsition-link" href="{{ route('admin.teacher.index') }}">
                                    <span class="site-menu-title">Teacher List</span>
                                </a>
                            </li>
                            <li class="site-menu-item @if(Request::segment(2)=='teacher' && Request::segment(3)=='create') active  @endif">
                                <a class="animsition-link" href="{{ route('admin.teacher.create') }}">
                                    <span class="site-menu-title">Add Teacher</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="site-menu-item has-sub @if(Request::segment(2)=='student') active open  @endif">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon fa-hospital-o" aria-hidden="true"></i>
                            <span class="site-menu-title">Manage Students</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item @if(Request::segment(2)=='student' && Request::segment(3)=='') active  @endif">
                                <a class="animsition-link" href="{{ route('admin.student.index') }}">
                                    <span class="site-menu-title">Student List</span>
                                </a>
                            </li>
                            <li class="site-menu-item @if(Request::segment(2)=='student' && Request::segment(3)=='create') active  @endif">
                                <a class="animsition-link" href="{{ route('admin.student.create') }}">
                                    <span class="site-menu-title">Add Student</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    
					

                     <li class="site-menu-item has-sub @if(Request::segment(2)=='mark') active open  @endif">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon fa-hospital-o" aria-hidden="true"></i>
                            <span class="site-menu-title">Manage Marks</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item @if(Request::segment(2)=='mark' && Request::segment(3)=='') active  @endif">
                                <a class="animsition-link" href="{{ route('admin.mark.index') }}">
                                    <span class="site-menu-title">Student Mark List</span>
                                </a>
                            </li>
                            <li class="site-menu-item @if(Request::segment(2)=='mark' && Request::segment(3)=='create') active  @endif">
                                <a class="animsition-link" href="{{ route('admin.mark.create') }}">
                                    <span class="site-menu-title">Add Mark</span>
                                </a>
                            </li>

                        </ul>
                    </li>
					
					
					

                </ul>



            </div>
        </div>
    </div>
    <div class="site-menubar-footer">
        <a href="#" class="fold-show" data-placement="top" data-toggle="tooltip"
           data-original-title="Settings">
            <span class="icon md-settings" aria-hidden="true"></span>
        </a>
        <a href="{{ route('admin.profile') }}" data-placement="top" data-toggle="tooltip" data-original-title="Profile">
            <span class="icon md-account" aria-hidden="true"></span>
        </a>
        <a href="{{ route('logout') }}" data-placement="top" data-toggle="tooltip" data-original-title="Logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <span class="icon md-power" aria-hidden="true"></span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </a>
    </div>
</div>

