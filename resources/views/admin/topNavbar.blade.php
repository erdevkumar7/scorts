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
                        {{-- <img src="{{ asset('/public/images/profile_img') . '/' . Auth::guard('admin')->user()->image }}"
                            alt=""> --}}
                        @if (Auth::guard('admin')->user()->image !== null)
                            <img src="{{ asset('/public/images/profile_img') . '/' . Auth::guard('admin')->user()->image }}"
                                alt="...">
                        @else
                            <img src="{{ asset('/public/images/static_img/admin.jpg') }}" alt="...">
                        @endif
                        {{ Auth::guard('admin')->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin_dashboard') }}"> Dashboard</a>
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
