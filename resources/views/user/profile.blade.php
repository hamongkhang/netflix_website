@extends('user.master')
@section('title','Hồ Sơ Của Tôi - MinMovies')
@section('content')
<br>
<div class="tittle-head">
    <h4 class="latest-text">Hồ sơ người dùng</h4>
    <div class="container">
        <div class="agileits-single-top">
            <ol class="breadcrumb">
                <li><a href="">Trang Chủ</a></li>
                <li class="active">Hồ Sơ Người Dùng</li>
            </ol>
        </div>
    </div>
</div>
<div class="video-modal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                THÔNG TIN NGƯỜI DÙNG
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <section>
                <div class="modal-body">
                    <div class="w3_login_module">
                        <div class="module form-module">
                            <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                                <div class="tooltip">Đổi mật khẩu</div>
                            </div>
                            <div class="form">
                                <h3>Thông Tin</h3>
                                <form action="{{ route('user.postProfile') }}" method="post">
                                    @csrf
                                    <input type="text" name="name" value="{{ $user->name }}" placeholder="Tên người dùng" required="" oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                                    oninput="this.setCustomValidity('')">
                                    <input type="text" readonly placeholder="Tài khoản: {{ $user->username }}">
                                    <input type="email" readonly placeholder="Email: {{ $user->email }}">
                                    <input type="submit" value="Lưu thông tin"><br><br>
                                    <p class="text-center">Tài khoản và Email không thể thay đổi</p>
                                </form>
                            </div>
                            <div class="form">
                                <h3>Đổi Mật Khẩu</h3>
                                <form name="form1" action="{{ route('user.postProfile') }}" method="post">
                                    @csrf
                                    <input type="password" name="oldpassword" placeholder="Mật khẩu cũ" required="" oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                                    oninput="this.setCustomValidity('')">
                                    <input type="password" name="password" placeholder="Mật khẩu" required="" oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                                    oninput="this.setCustomValidity('')">
                                    <input type="password" name="repassword"  placeholder="Nhập lại mật khẩu"
                                        required="" oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                                        oninput="this.setCustomValidity('')">
                                    <input type="submit" value="Xác nhận">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script type="text/javascript">
    function check{
        var pass=document.forms["form1"]["password"].value;
        var repass=document.forms["form1"]["repassword"].value;
        const constpass=document.getElementById('pass');
        const constrepass=document.getElementById('repass');
        if(pass!=repass)
        {
            alert("Nhập lại mật khẩu không chính xác!");
            constrepass.focus();
            return false;
        }
    }
</script>
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
@endsection
