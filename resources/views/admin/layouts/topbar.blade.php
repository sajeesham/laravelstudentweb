<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon md-more" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
            <span class="navbar-brand-text">Student Web</span>
        </div>
    </div>
    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="hidden-float" id="toggleMenubar">
                    <a data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
                <li class="hidden-xs" id="toggleFullscreen">
                    <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                        <span class="sr-only">Toggle fullscreen</span>
                    </a>
                </li>
            </ul>
            <!-- End Navbar Toolbar -->
            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="dropdown">
                    <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                       data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="{{ asset('assets/remark/global/portraits/5.png') }}" alt="...">
                <i></i>
              </span>
                    </a>
              
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a href="#" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Profile</a>
                        </li>
   
                        <li class="divider" role="presentation"></li>
                        <li role="presentation">
                            <a href="{{ route('logout') }}" role="menuitem" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon md-power" aria-hidden="true"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>


                 </li>
             </ul>

            <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
    </div>
</nav>
