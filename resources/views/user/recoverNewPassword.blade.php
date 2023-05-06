@extends('user.master')
@section('title','Khôi Phục Mật Khẩu - MinMovies')
@section('content')
<br>
<div class="tittle-head">
    <h4 class="latest-text">KHÔI PHỤC MẬT KHẨU</h4>
    <div class="container">
        <div class="agileits-single-top">
            <ol class="breadcrumb">
                <li><a href="{{ route('user.index') }}">Trang Chủ</a></li>
                <li><a href="{{ route('user.index') }}">Đăng Nhập</a></li>
                <li><a href="{{ route('user.getrecoverpassword') }}">Khôi Phục Mật Khẩu</a></li>
                <li class="active">Đặt Lại Mật Khẩu</li>
            </ol>
        </div>
    </div>
</div>
<div class="video-modal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Đặt Lại Mật Khẩu
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <section>
                <div class="modal-body">
                    <div class="w3_login_module">
                        <div class="module form-module">
                            <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                                <div class="tooltip">Hướng dẫn</div>
                            </div>
                            <div class="form">
                                <h3>Đặt lại mật khẩu</h3>
                                <form action="" method="post" name="form1">
                                    @csrf
                                    <input type="text" maxlength="50" placeholder="Email" disabled value="{{ $data['username'] }}">
                                    <input type="email" name="email" maxlength="50" placeholder="Email" disabled value="{{ $data['email'] }}">
                                    <input type="password" name="password" maxlength="30" placeholder="Mật khẩu mới"
                                        required="" oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                                        oninput="this.setCustomValidity('')">
                                    <input type="password" name="repassword" maxlength="30"
                                        placeholder="Nhập lại mật khẩu" required=""
                                        oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                                        oninput="this.setCustomValidity('')">
                                    <input type="submit" value="Đổi mật khẩu"><br><br>
                                </form>
                            </div>
                            <div class="form">
                                <h4><b>Bước 1:</b> Nhập Email đã liên kết với tài khoản của bạn và nhấn <b>"Gửi liên kết xác nhận"</b>.
                                </h4><br>
                                <h4><b>Bước 2:</b> Chờ trong giây lát, chúng tôi sẽ gửi email chứa liên kết xác nhận đến Email của bạn.</h4><br>
                                <h4><b>Bước 3:</b> Truy cập hòm mail của bạn kiểm tra xem đã nhận được email khôi phục từ
                                    chúng tôi hay chưa. Email của chúng tôi có dạng <b>"Email khôi phục tài khoản MinMovies"</b>.
                                </h4><br>
                                <h4><b>Bước 4:</b> Nhấp vào liên kết trong email để chuyển sang trang đổi mật khẩu.</h4><br>
                                <h4><b>Bước 5:</b> Đổi mật khẩu mới tại trang đổi mật khẩu.
                                </h4>
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
