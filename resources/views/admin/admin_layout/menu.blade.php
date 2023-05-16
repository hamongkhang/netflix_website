<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user.index') }}"
        title="Mở MinMovies trong tab mới" target="_blank">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fad fa-toolbox"
                style="--fa-primary-color: white; --fa-secondary-color: black; --fa-secondary-opacity: 1.0;"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MinMovie</div>
        <div class="sidebar-brand-icon rotate-15">
            <i class="fad fa-toolbox"
                style="--fa-primary-color: black; --fa-secondary-color: white; --fa-secondary-opacity: 1.0;"></i>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>TỔNG QUAN</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản Lý Phim
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-list-ul"></i>
            <span>Danh mục</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh sách danh mục</h6>
                <a class="collapse-item" href=" {{ route('admin.cate.list') }} "><i class="far fa-list-alt pr-2 text-lg"></i>Thể
                    loại</a>
                <a class="collapse-item" href=" {{ route('admin.nation.list') }} "><i class="far fa-flag pr-2 text-lg"></i>Quốc
                    gia</a>
                <a class="collapse-item" href=" {{ route('admin.year.list') }} "><i
                        class="far fa-calendar-check pr-2 text-lg mr-1"></i>Năm sản xuất</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-video"></i>
            <span>Phim</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh mục quản lý</h6>
                <a class="collapse-item" href="{{ route('admin.movie.list') }}"><i class="fas fa-film pr-2 text-lg"></i>Phim</a>
                <a class="collapse-item" href="{{ route('admin.cabinet.list') }}"><i
                        class="far fa-file-video pr-sm-2 ml-1 text-lg"></i>Tủ phim</a>
                <a class="collapse-item" href="{{ route('admin.movie.series') }}"><i
                        class="fas fa-video pr-sm-2 ml-1 text-lg"></i>Series phim</a>
                <a class="collapse-item" href="{{ route('admin.comment.list') }}"><i
                        class="far fa-comment-alt text-lg pr-2"></i>Bình luận</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản Lý Người Dùng
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.user.list') }}">
            <i class="fas fa-user"></i>
            <span>Người dùng</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản Lý Giao Dịch
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment"
            aria-expanded="true" aria-controls="collapsePayment">
            <i class="fas fa-shopping-cart"></i>
            <span>Giao dịch</span>
        </a>
        <div id="collapsePayment" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh mục quản lý</h6>
                <a class="collapse-item" href="{{ route('admin.walletCharge.list') }}"><i class="far fa-file-invoice-dollar text-lg pr-2 ml-1 mr-1"></i>Nạp ví</a>
                <a class="collapse-item" href="{{ route('admin.payment.list') }}"><i class="fas fa-shopping-basket pr-2 text-lg"></i>Mua phim</a>
                <a class="collapse-item" href="{{ route('admin.payment.listSeries') }}"><i class="fas fa-shopping-basket pr-2 text-lg"></i>Mua series phim</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Quản Lý Thống Kê
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStatistic"
            aria-expanded="true" aria-controls="collapseStatistic">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Thống kê</span>
        </a>
        <div id="collapseStatistic" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh mục thống kê</h6>
                <a class="collapse-item" href="{{ route('admin.statistic.charge') }}"><i class="fas fa-money-check-alt pr-2 text-lg"></i>Nạp ví</a>
                <a class="collapse-item" href="{{ route('admin.statistic.payment') }}"><i class="far fa-badge-dollar text-lg pr-2" style="padding-left:2px;margin-right:2px;"></i>Mua phim</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
