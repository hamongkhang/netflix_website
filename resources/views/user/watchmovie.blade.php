@if (round($movie->price)!=0)
    @if ($bought!=1)
        <script>
            alert('Mời bạn mua phim để xem!');
            window.location = '{{ URL::previous() }}';
        </script>
    @endif
@endif
@extends('user.master')
@section('title','Xem Phim '.$movie->vie_name.' ('.$movie->eng_name.') - MinMovies')
@section('content')
<!----------------- Movie list begin -------------------->
<div class="faq">
    <div class="container">
        <div class="agileits-news-top">
            <ol class="breadcrumb">
                <li><a href="{{ route('user.index') }}">Trang Chủ</a></li>
                @foreach ($cate as $item)
                @if ($item->id==$movie->cate_id)
                <li><a href="{{ route('user.cate',$item->id) }}">{{ $item->cate_name }}</a></li>
                @endif
                @endforeach
                @foreach ($nation as $item)
                @if ($item->id==$movie->nation_id)
                <li><a href="{{ route('user.nation',$item->id) }}">{{ $item->nation_name }}</a></li>
                @endif
                @endforeach
                @foreach ($year as $item)
                @if ($item->id==$movie->year_id)
                <li><a href="{{ route('user.year',$item->id) }}">Năm {{ $item->year }}</a></li>
                @endif
                @endforeach
                <li><a href="{{ route('user.movie',$movie->id) }}">Phim {{ $movie->vie_name }}</a></li>
                <li class="active">Xem Phim</li>
            </ol>
        </div>
        <div class="row moviedetail">
            <div class="col-md-8 ">
                @foreach ($year as $item)
                @if ($item->id==$movie->year_id)
                <h3>{{$movie->vie_name.' ('.$item->year.')'}}</h3>
                @endif
                @endforeach
                <h4>
                    <b style="margin-right: 5px;">{{$movie->eng_name}}</b>
                </h4><br>
                <div class="moviedetailinfor">
                    <div class="video-responsive" id="myVideo">
                        @foreach ($link as $item)
                        @if ($item->movie_id==$movie->id)
                        @if ($server==1)
                        {!!$item->link1!!}
                        @endif
                        @if ($server==2)
                        {!!$item->link2!!}
                        @endif
                        @if ($server==3)
                        {!!$item->link3!!}
                        @endif
                        @if ($server==4)
                        {!!$item->link4!!}
                        @endif
                        @if ($server==5)
                        {!!$item->link5!!}
                        @endif
                        @if ($server==6)
                        {!!$item->link6!!}
                        @endif
                        @php
                        break;
                        @endphp
                        @endif
                        @endforeach
                    </div><br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <button class="switch btn btn-info infobtn"><i class="fas fa-lightbulb"></i> <b>Tắt
                                        đèn</b></button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pull-right">
                                <!-- LikeBtn.com BEGIN -->
                                <span class="likebtn-wrapper" data-identifier="detailmovie/{{$movie->id}}"
                                    data-theme="ublue" data-lang="vi" data-ef_voting="push" data-rich_snippet="true" data-dislike_enabled="false"
                                    data-show_dislike_label="true" data-counter_clickable="true"
                                    data-counter_zero_show="true" data-counter_count="true" data-popup_width="0"
                                    data-share_size="small" data-loader_show="true"
                                    data-i18n_like_tooltip="Thích phim này!"
                                    data-i18n_dislike_tooltip="Không thích phim này!"
                                    data-i18n_share_text="Cảm ơn bạn đã thích phim!" data-i18n_popup_close="Tắt"></span>
                                <script>
                                    (function(d,e,s){if(d.getElementById("likebtn_wjs"))return;a=d.createElement(e);m=d.getElementsByTagName(e)[0];a.async=1;a.id="likebtn_wjs";a.src=s;m.parentNode.insertBefore(a, m)})(document,"script","//w.likebtn.com/js/w/widget.js");
                                </script>
                                <!-- LikeBtn.com END -->
                                <a target="_blank" class="btn btn-info infobtn" title="Chia sẽ lên Facebook!"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"><i
                                        class="fab fa-facebook-square"></i> Facebook</a>
                            </div>
                        </div>
                    </div><br>
                    @foreach ($link as $item2)
                    @if ($item2->movie_id==$movie->id)
                    @if ($item2->link1!='')
                    @php
                    $server=1;
                    @endphp
                    <a href="{{route('user.movie.watch',[$movie->id,$server])}}"
                        class="btn btn-success btn-lg successbtn">Server
                        1</a>
                    @endif
                    @if ($item2->link2!='')
                    @php
                    $server=2;
                    @endphp
                    <a href="{{route('user.movie.watch',[$movie->id,$server])}}"
                        class="btn btn-success btn-lg successbtn">Server
                        2</a>
                    @endif
                    @if ($item2->link3!='')
                    @php
                    $server=3;
                    @endphp
                    <a href="{{route('user.movie.watch',[$movie->id,$server])}}"
                        class="btn btn-success btn-lg successbtn">Server
                        3</a>
                    @endif
                    @if ($item2->link4!='')
                    @php
                    $server=4;
                    @endphp
                    <a href="{{route('user.movie.watch',[$movie->id,$server])}}"
                        class="btn btn-success btn-lg successbtn">Server
                        4</a>
                    @endif
                    @if ($item2->link5!='')
                    @php
                    $server=5;
                    @endphp
                    <a href="{{route('user.movie.watch',[$movie->id,$server])}}"
                        class="btn btn-success btn-lg successbtn">Server
                        5</a>
                    @endif
                    @if ($item2->link6!='')
                    @php
                    $server=6;
                    @endphp
                    <a href="{{route('user.movie.watch',[$movie->id,$server])}}"
                        class="btn btn-success btn-lg successbtn">Server
                        6</a>
                    @endif
                    @endif
                    @endforeach
                    <br><br>
                    <p>Nếu phim bị lỗi bạn vui lòng chọn Server khác hoặc kiểm tra lại đường truyền và tải lại trang.
                        Xin lỗi vì bất tiện này!</p>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    @if (session('username_minmovies'))
                    <a href="{{ route('user.addCabinet',[session('username_minmovies'),$movie->id]) }}"
                        class="btn btn-warning btn-lg btn-block warningbtn">Thêm vào tủ</a><br>
                    @else
                    <a href="#" data-toggle="modal" data-target="#myModal"
                        class="btn btn-warning btn-lg btn-block warningbtn">Đăng
                        nhập để thêm phim vào tủ</a><br>
                    @endif
                    <div class="moviedetailinforright">
                        <hr>
                        <h4 class="text-center"><b>PHIM MỚI NHẤT</b></h4>
                        <hr>
                        <div>
                            <div>
                                <div class="marquee" id="marquee" style="height: 480px;">
                                    @foreach ($slider as $item)
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="{{ route('user.movie',$item->id) }}">
                                                    <img src="{{ asset("/imgUploads/$item->poster_image")}}"
                                                        title="{{$item->vie_name.' ('.$item->eng_name.')'}}"
                                                        class="img-responsive img-fluid" alt=" " />
                                                </a>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="itema">
                                                    <a href="{{ route('user.movie',$item->id) }}"
                                                        title="{{$item->vie_name.' ('.$item->eng_name.')'}}"><b>{{ $item->vie_name }}</b><br>{{ $item->eng_name }}
                                                        @foreach ($year as $item2)
                                                        @if ($item2->id==$item->year_id)
                                                        ({{$item2->year}})
                                                        @endif
                                                        @endforeach
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="comment">
                        <div class="row bootstrap snippets">
                            <div class="col-md-12">
                                <div class="comment-wrapper">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3><b>Bình luận</b></h3>
                                        </div>
                                        <div class="panel-body" id="updateComment">
                                            @if (session('username_minmovies'))
                                            <form id="formComment" action="{{ route('user.postComment',$movie->id) }}"
                                                method="post">
                                                @csrf
                                                <textarea required class="form-control" name="comment" id="addComment"
                                                    maxlength="200" placeholder="Cảm nghĩ của bạn..." rows="3"
                                                    oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                                                    oninput="this.setCustomValidity('')"></textarea>
                                                <br>
                                                <button type="submit" id="submitComment"
                                                    class="btn btn-info pull-right infobtn">Bình
                                                    luận</button>
                                            </form>
                                            @else
                                            <div class="text-center">
                                                <a href="#" data-toggle="modal" data-target="#myModal"
                                                    class="btn btn-lg btn-primary primarybtn">
                                                    <h4 class="text-center">Đăng nhập để bình luận</h4>
                                                </a>
                                            </div>
                                            @endif
                                            <div class="clearfix"></div>
                                            <hr>
                                            @if ($comment->isEmpty())
                                            <h4 class="text-center">Chưa có bình luận nào</h4>
                                            @endif
                                            @php
                                            $username=session('username_minmovies');
                                            @endphp
                                            @foreach ($comment as $item)
                                            <ul class="media-list">
                                                <li class="media">
                                                    <div class="media-body">
                                                        <span class="text-muted pull-right">
                                                            <strong class="text-muted">
                                                                @php
                                                                \Carbon\Carbon::setLocale('vi');
                                                                $commentTime=$item->created_at;
                                                                $commentTime=\Carbon\Carbon::parse($commentTime);
                                                                $currentTime= \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                                                echo $commentTime->diffForHumans($currentTime);
                                                                @endphp
                                                            </strong>
                                                        </span>
                                                        <strong class="text-primary" style="font-size:17px">
                                                            @foreach ($user as $item2)
                                                            @if ($item->user_id==$item2->id)
                                                            {{ $item2->name }}
                                                            @endif
                                                            @endforeach
                                                        </strong>
                                                        <p style="font-size:16px">
                                                            {{ $item->comment }}
                                                        </p>
                                                        @foreach ($user as $item2)
                                                        @if ($item2->id==$item->user_id&&$item2->username==$username)
                                                        <a href="#" class="btn btn-success" data-toggle="modal"
                                                            data-target="#editComment{{$item->id}}">Sửa</a>
                                                        <a href="{{ route('user.delComment',$item->id) }}"
                                                            class="btn btn-danger" data-toggle="confirm" role="button"
                                                            id="btnDelComment">Xoá</a>
                                                        <br><br>
                                                        <div class="modal video-modal fade"
                                                            id="editComment{{$item->id}}" tabindex="-1" role="dialog"
                                                            aria-labelledby="myModal">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        Sửa bình luận
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <section>
                                                                        <div class="modal-body">
                                                                            <div class="w3_login_module">
                                                                                <div class="module form-module">
                                                                                    <div class="toggle"><i
                                                                                            class="fa fa-times fa-pencil"></i>
                                                                                    </div>
                                                                                    <div class="form">
                                                                                        <form
                                                                                            action="{{ route('user.editComment',$item->id) }}"
                                                                                            method="post">
                                                                                            @csrf
                                                                                            <textarea name="comment"
                                                                                                id="txtEditComment{{$item->id}}"
                                                                                                class="form-control"
                                                                                                rows="5"
                                                                                                placeholder="Nhập bình luận"
                                                                                                maxlength="250"
                                                                                                required=""
                                                                                                oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')"
                                                                                                oninput="this.setCustomValidity('')">{{ $item->comment }}</textarea><br>
                                                                                            <input type="submit"
                                                                                                value="Xác nhận"
                                                                                                id="btnEditComment">
                                                                                        </form>
                                                                                    </div>
                                                                                    <script type="text/javascript">
                                                                                        $('body').on('click','#btnEditComment',function (e) {
                                                                                            e.preventDefault();
                                                                                            $.ajax({
                                                                                                type: "post",
                                                                                                url: "{{ route('user.editComment',$item->id) }}",
                                                                                                data: {
                                                                                                    "_token": "{{ csrf_token() }}",
                                                                                                    "comment": $("#txtEditComment{{$item->id}}").val(),
                                                                                                },
                                                                                                dataType: "html",
                                                                                                success: function (data) {
                                                                                                    $("#updateComment").load(location.href+" #updateComment>*","");
                                                                                                }
                                                                                            });
                                                                                            $("#editComment{{$item->id}}").modal('hide');
                                                                                        });
                                                                                    </script>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </li>
                                            </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (!$sliderCate->isEmpty())
        <!-- slider-bottom -->
        <div class="banner-bottom">
            <h3 class="text-uppercase text-lg text-bold">phim cùng thể loại</h3><br>
            <div class="container text-center">
                <div class="w3_agile_banner_bottom_grid">
                    <div id="owl-demo" class="owl-carousel owl-theme">
                        @foreach ($sliderCate as $item)
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                <a href="{{route('user.movie',$item->id)}}"
                                    title="{{$item->vie_name.' ('.$item->eng_name.')'}}"
                                    class="hvr-shutter-out-horizontal">
                                    <img src="{{ asset("/imgUploads/$item->poster_image")}}"
                                        title="{{$item->vie_name.' ('.$item->eng_name.')'}}" class="img-responsive"
                                        alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i>
                                    </div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <a href="{{route('user.movie',$item->id)}}"
                                            title="{{$item->vie_name.' ('.$item->eng_name.')'}}">{{$item->vie_name}}</a>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p>
                                            @foreach ($year as $item2)
                                            @if ($item2->id==$item->year_id)
                                            {{$item2->year}}
                                            @endif
                                            @endforeach
                                        </p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <p>{{$item->time}}</p>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    @foreach ($language as $lang)
                                    @if ($item->language_id==$lang->id)
                                    <a href="{{route('user.movie',$item->id)}}"
                                        title="{{$item->vie_name.' ('.$item->eng_name.')'}}">
                                        <p>{{$item->quality.'-'.$lang->language}}</p>
                                    </a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- slider-bottom -->
        @endif
    </div>
</div>
</div>
</div>
<div class="suggest text-center">
    <a href="#" class="infoarrow" data-toggle="modal" data-target="#modal"><i class="fas fa-arrow-down" title="Đóng"
            style="font-size:25px"></i></a>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="Carousel" class="carousel slide">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row carouselcontainer">
                                @foreach ($suggest as $item)
                                <div class="col-md-2 carouselitem"><a href="{{route('user.movie',$item->id)}}"
                                        class="thumbnail"><img src="{{ asset("/imgUploads/$item->poster_image")}}"
                                            alt="Image" title="{{ $item->vie_name.' ('.$item->eng_name.')'}}"></a>
                                </div>
                                @endforeach
                            </div>
                            <!--.row-->
                        </div>
                        <!--.item-->
                    </div>
                    <!--.carousel-inner-->
                </div>
                <!--.Carousel-->
            </div>
        </div>
    </div>
    <!--.container-->
</div>
<script src="//cdn.jsdelivr.net/npm/jquery.marquee@1.5.0/jquery.marquee.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script>
    $(document).ready(function() {
        $('.marquee').marquee({
        //If you wish to always animate using jQuery
        allowCss3Support: true,
        //works when allowCss3Support is set to true - for full list see http://www.w3.org/TR/2013/WD-css3-transitions-20131119/#transition-timing-function
        css3easing: 'linear',
        //requires jQuery easing plugin. Default is 'linear'
        easing: 'linear',
        //pause time before the next animation turn in milliseconds
        delayBeforeStart: 0,
        //'left', 'right', 'up' or 'down'
        direction: 'down',
        //true or false - should the marquee be duplicated to show an effect of continues flow
        duplicated: true,
        //speed in milliseconds of the marquee in milliseconds
        duration: 12000,
        //gap in pixels between the tickers
        gap: 0,
        //on cycle pause the marquee
        pauseOnCycle: false,
        //on hover pause the marquee - using jQuery plugin https://github.com/tobia/Pause
        pauseOnHover: true,
        //the marquee is visible initially positioned next to the border towards it will be moving
        startVisible: true

        });
      });
</script>
<script>
    //Code nút xoá
    $('[data-toggle="confirm"]').jConfirm({
        question:'Bạn có chắc chắn xoá?',
        confirm_text:'Có',
        deny_text:'Không',
        size:'medium',
        theme:'white',
        follow_href:true
        });
</script>
<script src="public/user/js/owl.carousel2.js"></script>
<script>
    var vid = document.getElementById("myVideo");
    vid.onpause = function() {
        $(".suggest").slideDown();
    };
    vid.onplay = function() {
        $(".suggest").slideUp();
    };
    $( document ).ready(function() {
        $(".suggest").slideUp();
    });
    $(".infoarrow").click(function(){
        $(".suggest").slideUp();
    });
</script>
<script>
    $(document).ready(function() {
    $('.video').allofthelights();
});
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('body').on('click','#submitComment',function (e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "{{ route('user.postComment',$movie->id) }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "comment": $("#addComment").val(),
                },
                dataType: "html",
                success: function (data) {
                    $("#updateComment").load(location.href+" #updateComment>*","");
                }
            });
        });
    });
</script>
<!----------------- Movie list end -------------------->
@endsection
