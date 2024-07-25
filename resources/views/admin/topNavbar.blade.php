<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                        data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/profile_img') . '/' . Auth::guard('admin')->user()->image }}"
                            alt="">{{ Auth::guard('admin')->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;"> Profile</a>
                        <a class="dropdown-item" href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                        </a>
                        <a class="dropdown-item" onclick="handleLogOut()"><i class="fa fa-sign-out pull-right"></i> Log
                            Out</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    {{-- logout form --}}
    <div>
        <form id="logout-form" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
<!-- /top navigation -->
