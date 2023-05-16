@extends('user.master')
@section('title', 'Phim ' . $movie->vie_name . ' (' . $movie->eng_name . ') - MinMovies')
@section('content')
    <!----------------- Movie list begin -------------------->
    <div class="faq">
        <div class="container">
            <div class="agileits-news-top">
                <ol class="breadcrumb">
                    <li><a href="{{ route('user.index') }}">Trang Chủ</a></li>
                    @foreach ($cate as $item)
                        @if ($item->id == $movie->cate_id)
                            <li><a href="{{ route('user.cate', $item->id) }}">{{ $item->cate_name }}</a></li>
                        @endif
                    @endforeach
                    @foreach ($nation as $item)
                        @if ($item->id == $movie->nation_id)
                            <li><a href="{{ route('user.nation', $item->id) }}">{{ $item->nation_name }}</a></li>
                        @endif
                    @endforeach
                    @foreach ($year as $item)
                        @if ($item->id == $movie->year_id)
                            <li><a href="{{ route('user.year', $item->id) }}">Năm {{ $item->year }}</a></li>
                        @endif
                    @endforeach
                    <li class="active">{{ $movie->vie_name }}</li>
                </ol>
            </div>
            <div class="row moviedetail">
                <div class="col-md-4 text-center">
                    <img class="img-thumbnail" src="{{ asset("/imgUploads/$movie->poster_image") }}">
                </div>
                <div class="col-md-4">
                    <div class="moviedetailinfor">
                        <h3>{{ $movie->vie_name }}</h3>
                        <h4>
                            <b style="margin-right: 5px;">{{ $movie->eng_name }}</b>
                        </h4>
                        <div class="moviedetailinfor2">
                            <p><b>Đạo diễn: </b>{{ $movie->director }}</p>
                            @foreach ($nation as $item)
                                @if ($item->id == $movie->nation_id)
                                    <p><b>Quốc gia: </b><a
                                            href="{{ route('user.nation', $movie->nation_id) }}">{{ $item->nation_name }}</a>
                                    </p>
                                @endif
                            @endforeach
                            @foreach ($year as $item)
                                @if ($item->id == $movie->year_id)
                                    <p><b>Năm sản xuất: </b><a
                                            href="{{ route('user.year', $movie->year_id) }}">{{ $item->year }}</a>
                                    </p>
                                @endif
                            @endforeach
                            @foreach ($cate as $item)
                                @if ($item->id == $movie->cate_id)
                                    <p><b>Thể loại: </b><a
                                            href="{{ route('user.cate', $movie->cate_id) }}">{{ $item->cate_name }}</a>
                                    </p>
                                @endif
                            @endforeach
                            <p><b>Thời lượng: </b>{{ $movie->time }}</p>
                            <p><b>Chất lượng: </b>{{ $movie->quality }}</p>
                            @foreach ($language as $item)
                                @if ($item->id == $movie->language_id)
                                    <p><b>Ngôn ngữ: </b>{{ $item->language }}</p>
                                @endif
                            @endforeach
                            <p><b>Điểm: </b><span class="badge badge-primary">{{ $movie->point }}</span></p>
                            @if ($averageRate == 0 && $totalRate == 0)
                                <p><b>Điểm người dùng đánh giá: </b><span class="badge badge-primary">Chưa có đánh
                                        giá</span></p>
                            @else
                                <p><b>Điểm người dùng đánh giá: </b><span class="badge badge-primary">{{ $averageRate }}
                                        ({{ $totalRate }} đánh giá)</span></p>
                            @endif
                            <p><b>Diễn viên: </b>{{ $movie->actor }}</p>
                            <p><b>Giá: </b><span class="badge badge-pill badge-danger price pull-center">
                                    @if ($movie->price == 0)
                                        {{ 'Miễn phí (' . number_format(round($movie->price)) . 'đ)' }}
                                    @else
                                        {{ number_format(round($movie->price)) . 'đ' }}
                                    @endif
                                </span></p>
                            <hr>
                            <div class="text-center">
                                <!-- LikeBtn.com BEGIN -->
                                <div class="row">
                                    <span class="likebtn-wrapper" data-identifier="detailmovie/{{ $movie->id }}"
                                        data-theme="ublue" data-lang="vi" data-ef_voting="push" data-rich_snippet="true"
                                        data-dislike_enabled="false" data-show_dislike_label="true"
                                        data-counter_clickable="true" data-counter_zero_show="true"
                                        data-counter_count="true" data-popup_width="0" data-share_size="small"
                                        data-loader_show="true" data-i18n_like_tooltip="Thích phim này!"
                                        data-i18n_dislike_tooltip="Không thích phim này!"
                                        data-i18n_share_text="Cảm ơn bạn đã thích phim!" data-i18n_popup_close="Tắt"></span>
                                    <script>
                                        (function(d, e, s) {
                                            if (d.getElementById("likebtn_wjs")) return;
                                            a = d.createElement(e);
                                            m = d.getElementsByTagName(e)[0];
                                            a.async = 1;
                                            a.id = "likebtn_wjs";
                                            a.src = s;
                                            m.parentNode.insertBefore(a, m)
                                        })(document, "script", "//w.likebtn.com/js/w/widget.js");
                                    </script>
                                    <!-- LikeBtn.com END -->
                                    <a target="_blank" class="btn btn-info infobtn" title="Chia sẽ lên Facebook!"
                                        href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i
                                            class="fab fa-facebook-square"></i> Facebook</a>
                                </div>

                            </div>
                        </div>
                        <div class="row moviebutton">
                            <div class="col-md-6">
                                @if (session('username_minmovies'))
                                    {{-- đã đăng nhập --}}
                                    <a href=""
                                        class="btn btn-warning btn-lg btn-block warningbtn">Thêm phim<br>vào
                                        tủ</a>
                                @else
                                    {{-- chua dang nhap --}}
                                    <a href="#" data-toggle="modal" data-target="#myModal"
                                        class="btn btn-warning btn-lg btn-block warningbtn">Thêm phim<br>vào
                                        tủ</a>
                                    <p class="text-center">(Yêu cầu đăng nhập)</p>
                                    </form>
                                @endif
                            </div>
                            <div class="col-md-6">
                                @php
                                    $server = 1;
                                @endphp
                                @if ($movie->price == 0)
                                    <a href="{{ route('user.movie.watch', [$movie->id, $server]) }}"
                                        class="btn btn-success btn-lg btn-block successbtn">Xem ngay<br>(Miễn phí)</a>
                                @else
                                    @if (session('username_minmovies'))
                                        @if (!$payment->isEmpty())
                                            <a href="{{ route('user.movie.watch', [$movie->id, $server]) }}"
                                                class="btn btn-success btn-lg btn-block successbtn">Xem
                                                ngay<br>(Đã mua)</a>
                                        @else
                                            <a href="#" data-toggle="modal" data-target="#buyMovie"
                                                class="btn btn-success btn-lg btn-block successbtn">Mua
                                                ngay<br>({{ number_format(round($movie->price)) . 'đ' }})</a>
                                        @endif
                                    @else
                                        <a href="#" data-toggle="modal" data-target="#myModal"
                                            class="btn btn-success btn-lg btn-block successbtn">Mua
                                            ngay<br>({{ number_format(round($movie->price)) . 'đ' }})</a>
                                        <p class="text-center">(Yêu cầu đăng nhập)</p>
                                    @endif
                                @endif
                            </div>
                            {{-- Code mua phim --}}

                            <div class="modal video-modal fade" id="buyMovie" tabindex="-1" role="dialog"
                                aria-labelledby="myModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            MUA PHIM
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <section>
                                            <div class="modal-body">
                                                <div class="w3_login_module">
                                                    <div class="module form-module">
                                                        <div class="toggle"><a class="walletI"
                                                                href="{{ route('user.getChargeWallet') }}">
                                                                <i class="fad fa-wallet"
                                                                    title="Nạp tiền vào ví ngay!"></i></a>
                                                            <div class="tooltip" style="margin-left:35px">Nạp tiền ngay!
                                                            </div>
                                                        </div>
                                                        <div class="form">
                                                            <form action="{{ route('user.buyMovie', $movie->id) }}"
                                                                method="get">
                                                                @csrf
                                                                <h2 class="text-center">VÍ:
                                                                    @if ($wallet)
                                                                        @foreach ($wallet as $item)
                                                                            <b>{{ number_format(round($item->money)) . 'đ' }}</b>
                                                                        @endforeach
                                                                    @endif
                                                                </h2><br>
                                                                <h3>Bạn có muốn mua phim <b>{{ $movie->vie_name }}</b> với
                                                                    giá
                                                                    <span
                                                                        class="badge badge-pill badge-danger price text-center">{{ number_format(round($movie->price)) . 'đ' }}</span>
                                                                </h3>
                                                                <br>
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

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="moviedetailinfor">
                        <p>
                        <h4><b>Nội dung</b></h4>{!! $movie->information !!}
                        </p>
                        <p>
                        <h4><b>Trailer</b></h4>
                        </p>
                        <div class="video-responsive">
                            {!! $movie->trailer !!}
                        </div>
                        <div>
                            <h4><b>Đánh giá phim</b></h4>
                            @if (session('username_minmovies'))
                                <form action="{{ route('user.postRate', [$movie->id, $user_id]) }}" method="post">
                                    @csrf
                                    <div class="row text-center">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input name="rate"
                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                    type="number" maxlength="2" max="10" class="form-control"
                                                    placeholder="Nhập điểm phim">
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-left: 0px  !important;">
                                            <button type="submit" class="btn btn-primary btn-block">Đánh giá</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form>
                                    <div class="row text-center">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input name="rate"
                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                    type="number" maxlength="2" max="10" class="form-control"
                                                    disabled placeholder="Đăng nhập để đánh giá">
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-left: 0px  !important;">
                                            <div class="text-center">
                                                <a href="#" data-toggle="modal" data-target="#myModal"
                                                    class="btn btn-block btn-primary primarybtn">
                                                    Đăng nhập
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
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
                                                    <form id="formComment"
                                                        action="{{ route('user.postComment', $movie->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <textarea required class="form-control" name="comment" id="addComment" maxlength="200"
                                                            placeholder="Cảm nghĩ của bạn..." rows="3"
                                                            oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')" oninput="this.setCustomValidity('')"></textarea>
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
                                                    $username = session('username_minmovies');
                                                @endphp
                                                @foreach ($comment as $item)
                                                    <ul class="media-list">
                                                        <li class="media">
                                                            <div class="media-body">
                                                                <span class="text-muted pull-right">
                                                                    <strong class="text-muted">
                                                                        @php
                                                                            \Carbon\Carbon::setLocale('vi');
                                                                            $commentTime = $item->created_at;
                                                                            $commentTime = \Carbon\Carbon::parse($commentTime);
                                                                            $currentTime = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                                                            echo $commentTime->diffForHumans($currentTime);
                                                                        @endphp
                                                                    </strong>
                                                                </span>
                                                                <strong class="text-primary" style="font-size:17px">
                                                                    @foreach ($user as $item2)
                                                                        @if ($item->user_id == $item2->id)
                                                                            {{ $item2->name }}
                                                                        @endif
                                                                    @endforeach
                                                                </strong>
                                                                <p style="font-size:16px">
                                                                    {{ $item->comment }}
                                                                </p>
                                                                @foreach ($user as $item2)
                                                                    @if ($item2->id == $item->user_id && $item2->username == $username)
                                                                        <a href="#" class="btn btn-success"
                                                                            data-toggle="modal"
                                                                            data-target="#editComment{{ $item->id }}">Sửa</a>
                                                                        <a href="{{ route('user.delComment', $item->id) }}"
                                                                            class="btn btn-danger" data-toggle="confirm"
                                                                            role="button">Xoá</a>
                                                                        <br><br>
                                                                        <div class="modal video-modal fade"
                                                                            id="editComment{{ $item->id }}"
                                                                            tabindex="-1" role="dialog"
                                                                            aria-labelledby="myModal">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        Sửa bình luận
                                                                                        <button type="button"
                                                                                            class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close"><span
                                                                                                aria-hidden="true">&times;</span></button>
                                                                                    </div>
                                                                                    <section>
                                                                                        <div class="modal-body">
                                                                                            <div class="w3_login_module">
                                                                                                <div
                                                                                                    class="module form-module">
                                                                                                    <div class="toggle"><i
                                                                                                            class="fa fa-times fa-pencil"></i>
                                                                                                    </div>
                                                                                                    <div class="form">
                                                                                                        <form
                                                                                                            action="{{ route('user.editComment', $item->id) }}"
                                                                                                            method="post">
                                                                                                            @csrf
                                                                                                            <blade
                                                                                                                ___html_tags_1___ />
                                                                                                            <br>
                                                                                                            <input
                                                                                                                type="submit"
                                                                                                                value="Xác nhận"
                                                                                                                id="btnEditComment">
                                                                                                        </form>
                                                                                                    </div>
                                                                                                    <blade
                                                                                                        ___scripts_1___ />
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
            @if (!$slider->isEmpty())
                <!-- slider-bottom -->
                <div class="banner-bottom">
                    <h3 class="text-uppercase text-lg text-bold">phim cùng thể loại</h3><br>
                    <div class="container text-center">
                        <div class="w3_agile_banner_bottom_grid">
                            <div id="owl-demo" class="owl-carousel owl-theme">
                                @foreach ($slider as $item)
                                    <div class="item">
                                        <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                            <a href="{{ route('user.movie', $item->id) }}"
                                                title="{{ $item->vie_name . ' (' . $item->eng_name . ')' }}"
                                                class="hvr-shutter-out-horizontal">
                                                <img src="{{ 'storage/app/poster/' . $item->poster_image }}"
                                                    title="{{ $item->vie_name . ' (' . $item->eng_name . ')' }}"
                                                    class="img-responsive" alt=" " />
                                                <div class="w3l-action-icon"><i class="fa fa-play-circle"
                                                        aria-hidden="true"></i>
                                                </div>
                                            </a>
                                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                                <div class="w3l-movie-text">
                                                    <a href="{{ route('user.movie', $item->id) }}"
                                                        title="{{ $item->vie_name . ' (' . $item->eng_name . ')' }}">{{ $item->vie_name }}</a>
                                                </div>
                                                <div class="mid-2 agile_mid_2_home">
                                                    <p>
                                                        @foreach ($year as $item2)
                                                            @if ($item2->id == $item->year_id)
                                                                {{ $item2->year }}
                                                            @endif
                                                        @endforeach
                                                    </p>
                                                    <div class="block-stars">
                                                        <ul class="w3l-ratings">
                                                            <p>{{ $item->time }}</p>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="ribben">
                                                @foreach ($language as $lang)
                                                    @if ($item->language_id == $lang->id)
                                                        <a href="{{ route('user.movie', $item->id) }}"
                                                            title="{{ $item->vie_name . ' (' . $item->eng_name . ')' }}">
                                                            <p>{{ $item->quality . '-' . $lang->language }}</p>
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="ribbennew5">
                                                <span class="badge badge-pill badge-danger price2 text-center"
                                                    style="margin-top:5px;">
                                                    @if ($item->price == 0)
                                                        Miễn phí
                                                    @else
                                                        {{ number_format(round($item->price)) . 'đ' }}
                                                    @endif
                                                </span>
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
    <script>
        //Code nút xoá
        $('[data-toggle="confirm"]').jConfirm({
            question: 'Bạn có chắc chắn xoá?',
            confirm_text: 'Có',
            deny_text: 'Không',
            size: 'medium',
            theme: 'white',
            follow_href: true
        });
    </script>
    <script src="public/user/js/owl.carousel2.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('body').on('click', '#submitComment', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "{{ route('user.postComment', $movie->id) }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "comment": $("#addComment").val(),
                    },
                    dataType: "html",
                    success: function(data) {
                        $("#updateComment").load(location.href + " #updateComment>*", "");
                    }
                });
            });

        });
    </script>
    <!----------------- Movie list end -------------------->
@endsection
