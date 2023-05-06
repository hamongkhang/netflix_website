<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small" title="Hồ sơ">{{ Auth::user()->name }}</span>
                <i  title="Hồ sơ" class="fad fa-user-cog fa-2x" style="--fa-primary-color: dodgerblue; --fa-secondary-color: blue; --fa-secondary-opacity: 1.0;"></i>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin.user.edit',Auth::user()->id) }}">
                    <i class="fad fa-user-edit fa-fw mr-2"  style="margin-right:10px; --fa-primary-color: limegreen; --fa-secondary-color: black; --fa-secondary-opacity: 1.0;"></i>
                    Hồ Sơ
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.logout') }}">
                    <i class="fad fa-sign-out-alt fa-fw mr-2"  style="margin-right:14px; --fa-primary-color: crimson; --fa-secondary-color: black; --fa-secondary-opacity: 1.0;"></i>
                    Đăng Xuất
                </a>
            </div>
        </li>
    </ul>
</nav>
