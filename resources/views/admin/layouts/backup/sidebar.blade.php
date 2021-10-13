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
                    <li class="site-menu-item has-sub @if(Request::segment(2)=='hospital') active open  @endif">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon md-hospital" aria-hidden="true"></i>
                            <span class="site-menu-title">Hospital</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item @if(Request::segment(2)=='hospital' && Request::segment(3)=='') active  @endif">
                                <a class="animsition-link" href="{{ route('admin.hospital.index') }}">
                                    <span class="site-menu-title">Hospital List</span>
                                </a>
                            </li>
                            <li class="site-menu-item @if(Request::segment(2)=='hospital' && Request::segment(3)=='create') active  @endif">
                                <a class="animsition-link" href="{{ route('admin.hospital.create') }}">
                                    <span class="site-menu-title">Add Hospital</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="site-menubar-footer">
        <a href="{{ route('admin.settings') }}" class="fold-show" data-placement="top" data-toggle="tooltip"
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
<div class="site-gridmenu">
    <div>
        <div>
            <ul>
                <li>
                    <a href="apps/mailbox/mailbox.html">
                        <i class="icon md-email"></i>
                        <span>Mailbox</span>
                    </a>
                </li>
                <li>
                    <a href="apps/calendar/calendar.html">
                        <i class="icon md-calendar"></i>
                        <span>Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="apps/contacts/contacts.html">
                        <i class="icon md-account"></i>
                        <span>Contacts</span>
                    </a>
                </li>
                <li>
                    <a href="apps/media/overview.html">
                        <i class="icon md-videocam"></i>
                        <span>Media</span>
                    </a>
                </li>
                <li>
                    <a href="apps/documents/categories.html">
                        <i class="icon md-receipt"></i>
                        <span>Documents</span>
                    </a>
                </li>
                <li>
                    <a href="apps/projects/projects.html">
                        <i class="icon md-image"></i>
                        <span>Project</span>
                    </a>
                </li>
                <li>
                    <a href="apps/forum/forum.html">
                        <i class="icon md-comments"></i>
                        <span>Forum</span>
                    </a>
                </li>
                <li>
                    <a href="index.html">
                        <i class="icon md-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
