<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"> <span>My Dashboard </span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('/public/images/static_img/contributor.jfif') }}"
                    alt="..." class="img-circle profile_img">

            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::guard('contributor')->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    {{-- dashboard --}}
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard <span
                                class="fa fa-chevron-right"></span></a>
                    </li>                
                   
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>