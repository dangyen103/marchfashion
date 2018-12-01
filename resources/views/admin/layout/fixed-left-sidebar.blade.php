<div class="col-md-3 left_col menu_fixed bg-black">
    <div class="left_col scroll-view bg-black">
        <div class="navbar nav_title bg-black" style="border: 0;">
            <a href="#" class="site_title bg-black">
                <i class="bg-black"><img src="{{ asset('admin-assets/images/logo-icon.png') }}" alt="icon" width="26px"></i> 
                <span> March Fashion</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
            <img src="{{ asset('admin-assets/images/user.png') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
            <span>Xin chào,</span>
            <h2>Đặng Yến</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        @include('admin.layout.sidebar-menu')
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <!-- <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div> -->
        <!-- /menu footer buttons -->
    </div>
</div>