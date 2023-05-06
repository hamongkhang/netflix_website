<!-- header -->
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="w3layouts_logo">
                    <a href="{{ route('user.index') }}">
                        <h1>Min<span>Movies</span></h1>
                    </a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="w3_search">
                    <form action="{{ route('user.search') }}" method="post" autocomplete="off">
                        @csrf
                        <input type="text" name="search" placeholder="Tìm kiếm" maxlength="50" required=""
                            oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                            oninput="this.setCustomValidity('')" onkeyup="showHint(this.value)">
                        <input type="submit" value="Tìm">
                        <div class="text-center">
                            <ul class="nav pull-center" style="position: relative">
                                <li class="dropdown"><a href="#" id="hoverHint" data-toggle="dropdown">
                                    <b class="caret"></b>
                                </a>
                                    <ul class="dropdown-menu pull-center">
                                        <li class="loggedin text-center text-black">
                                            <a href="#" id="txtHint" class="text-black"></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 text-center">
                @if (session('username_minmovies'))
                <div>
                    <ul class="nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <h4>Hello
                                    {{ Auth::user()->name }}
                                </h4> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu pull-center">
                                <li class="loggedin"><a href="{{ route('user.getCabinet') }}"><i class="fad fa-film-alt"
                                            style="margin-right:14px; --fa-primary-color: black; --fa-secondary-color: dodgerblue; --fa-secondary-opacity: 1.0;"></i>Tủ
                                        phim</a>
                                </li>
                                <li class="loggedin"><a href="{{ route('user.boughtMovie') }}"><i
                                            class="fad fa-shopping-basket"
                                            style="margin-right:12px; --fa-primary-color: peru; --fa-secondary-color: black; --fa-secondary-opacity: 1.0;"></i>Phim
                                        đã mua</a>
                                </li>
                                <li class="loggedin"><a href="{{ route('user.getWallet') }}"><i class="fad fa-wallet"
                                            style="margin-right:15px; --fa-primary-color: gold; --fa-secondary-color: black; --fa-secondary-opacity: 1.0;"></i>Ví</a>
                                </li>
                                <li class="loggedin"><a href="{{ route('user.getProfile') }}"><i
                                            class="fad fa-user-edit"
                                            style="margin-right:10px; --fa-primary-color: limegreen; --fa-secondary-color: black; --fa-secondary-opacity: 1.0;"></i>Hồ
                                        sơ</a></li>
                                <li class="loggedin"><a href="{{ route('user.historyPayment') }}"><i
                                            class="fad fa-history"
                                            style="margin-right:14px; --fa-primary-color: deeppink; --fa-secondary-color: black; --fa-secondary-opacity: 1.0;"></i>Lịch
                                        sử giao dịch</a></li>
                                <li class="divider"></li>
                                <li class="loggedin"><a href="{{ route('user.logout') }}"><i class="fad fa-sign-out-alt"
                                            style="margin-right:14px; --fa-primary-color: crimson; --fa-secondary-color: black; --fa-secondary-opacity: 1.0;"></i>Đăng
                                        xuất</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                @else
                <div class="w3l_sign_in_register">
                    <ul>
                        <li><img src="public/user/images/hello.gif" style="padding-right: 10px; width: 50px;"><a
                                href="#" data-toggle="modal" data-target="#myModal">Đăng Nhập</a></li>
                    </ul>
                </div>
                @endif


            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //header -->
<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Đăng Nhập & Đăng Ký
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <section>
                <div class="modal-body">
                    <div class="w3_login_module">
                        <div class="module form-module">
                            <div class="toggle signupnow"><i class="fas fa-user-plus" style="font-size:19px"></i>
                                <div class="tooltip" style="margin-left:35px">Đăng ký ngay!</div>
                            </div>
                            <div class="form">
                                <h3>Đăng Nhập</h3>
                                <form action="{{ route('user.postlogin') }}" method="post">
                                    @csrf
                                    <input type="text" name="username" placeholder="Tài khoản" maxlength="20"
                                        required="" oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                                        oninput="this.setCustomValidity('')">
                                    <input type="password" name="password" placeholder="Mật khẩu" maxlength="30"
                                        required="" oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                                        oninput="this.setCustomValidity('')">
                                    <input type="submit" value="Đăng nhập" name="login">
                                </form>
                            </div>
                            <div class="form">
                                <h3>Đăng Ký Tài Khoản</h3>
                                <form action="{{ route('user.signup') }}" method="post">
                                    @csrf
                                    <input type="text" name="name" maxlength="30" placeholder="Họ và tên" required=""
                                        oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                                        oninput="this.setCustomValidity('')">
                                    <input type="text" name="username" maxlength="20" placeholder="Tài khoản"
                                        required="" oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                                        oninput="this.setCustomValidity('')">
                                    <input type="password" name="password" maxlength="30" placeholder="Mật khẩu"
                                        required="" oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                                        oninput="this.setCustomValidity('')">
                                    <input type="email" name="email" maxlength="50" placeholder="Email" required=""
                                        oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                                        oninput="this.setCustomValidity('')">
                                    <input type="submit" value="Đăng ký" name="signup">
                                </form>
                            </div>
                            <div><a class="cta btn-block" href="{{ route('user.getrecoverpassword') }}">Quên mật
                                    khẩu?</a></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    $('.toggle').click(function(){
      // Switches the Icon
      $(this).children('i').toggleClass('fa-pencil');
      // Switches the forms
      $('.form').animate({
        height: "toggle",
        'padding-top': 'toggle',
        'padding-bottom': 'toggle',
        opacity: "toggle"
      }, "slow");
    });
</script>
<!-- //bootstrap-pop-up -->
<!-- nav -->
<div class="movies_nav">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <nav>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('user.index') }}">Trang chủ</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">thể loại <b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-2">
                                <li>
                                    @foreach ($cate as $item)
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href="{{route('user.cate',$item->id)}}">{{$item->cate_name}}</a></li>
                                        </ul>
                                    </div>
                                    @endforeach
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">quốc gia<b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <li>
                                    @foreach ($nation as $item)
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href="{{route('user.nation',$item->id)}}">{{$item->nation_name}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @endforeach
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">năm sản xuất<b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <li>
                                    @foreach ($year as $item)
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href="{{route('user.year',$item->id)}}">{{$item->year}}</a></li>
                                        </ul>
                                    </div>
                                    @endforeach
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('user.list') }}">danh sách phim</a></li>
                        <li><a href="{{ route('user.series') }}">series phim</a></li>
                        <li><a href="{{ route('user.about') }}">giới thiệu</a></li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
</div>
@if (session('thongbao'))
<div class="alert alert-{{ session('thongbao_level') }}" style="border-radius:0px;">
    <h4 class="text-center">{!! session('thongbao') !!}</h4>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <h4 class="text-center">{!! $error !!}</h4>
    @endforeach
</div>
@endif
<script>
    function showHint(str) {
        var xhttp;
        if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var parts = xhttp.responseText.split('|');
            document.getElementById("txtHint").innerHTML = parts[0];
            document.getElementById("movie_id").innerHTML = parts[1];
        }
        };
        xhttp.open("GET", "getHint/"+str, true);
        xhttp.send();
        $("#hoverHint").mouseover();
    }
</script>
<!-- //nav -->
