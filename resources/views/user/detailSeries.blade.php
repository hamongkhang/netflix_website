@extends('user.master')
@section('title', 'Phim ' . $series->series_name . ' - MinMovies')
@section('content')
    <!----------------- Movie list begin -------------------->
    <div class="faq">
        <div class="container">
            <div class="agileits-news-top">
                <ol class="breadcrumb">
                    <li><a href="{{ route('user.index') }}">Trang Chủ</a></li>
                    @foreach ($cate as $item)
                        @if ($item->cate_name == $series->description)
                            <li><a href="{{ route('user.cate', $item->id) }}">{{ $item->cate_name }}</a></li>
                        @endif
                    @endforeach
                    @foreach ($year as $item)
                        @if ($item->year == $series->year)
                            <li><a href="{{ route('user.year', $item->id) }}">Năm {{ $item->year }}</a></li>
                        @endif
                    @endforeach
                    <li class="active">{{ $series->series_name }}</li>
                </ol>
            </div>
            <div class="row moviedetail">
                <div class="col-md-4 text-center">
                    <img class="img-thumbnail" src="{{ asset("/imgUploads/$series->poster") }}">
                </div>
                <div class="col-md-4">
                    <div class="moviedetailinfor">
                        <h3>{{ $series->series_name }}</h3>
                        <h4>
                            <b style="margin-right: 5px;">{{ $series->series_name }}</b>
                        </h4>
                        <div class="moviedetailinfor2">
                            <p><b>Đạo diễn: </b>{{ $series->director }}</p>

                            <p><b>Diễn viên: </b><a href="">{{ $series->actor }}</a></p>


                            <p><b>Năm sản xuất: </b><a href="">{{ $series->year }}</a>
                            </p>

                            <p><b>Thể loại: </b><a href="">{{ $series->description }}</a>
                            </p>

                            <p><b>Thời lượng: </b>{{ $series->number_of_movie }} tập</p>
                            <p><b>Điểm: </b><span class="badge badge-primary">9.7</span></p>
                            <p><b>Điểm người dùng đánh giá: </b><span class="badge badge-primary">Chưa có đánh giá</span>
                            </p>
                            <p><b>Giá: </b><span class="badge badge-pill badge-danger price pull-center">
                                    @if ($series->price == 0)
                                        {{ 'Miễn phí (' . number_format(round($series->price)) . 'đ)' }}
                                    @else
                                        {{ number_format(round($series->price)) . 'đ' }}
                                    @endif
                                </span></p>
                            <hr>
                            <div class="text-center">
                                <!-- LikeBtn.com BEGIN -->
                                <div class="row">
                                    <span class="likebtn-wrapper" data-identifier="detailSeries/{{ $series->id }}"
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
                                    <a href="" class="btn btn-warning btn-lg btn-block warningbtn">Thêm phim<br>vào
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
                                @if ($series->price == 0)
                                    <a href="{{ route('user.movie.watchSeries', [$series->id, 1, $server]) }}"
                                        class="btn btn-success btn-lg btn-block successbtn">Xem ngay<br>(Miễn phí)</a>
                                @else
                                    @if (session('username_minmovies'))
                                        @if (!$payment->isEmpty())
                                            <a href="{{ route('user.movie.watchSeries', [$series->id, 1, $server]) }}"
                                                class="btn btn-success btn-lg btn-block successbtn">Xem
                                                ngay<br>(Đã mua)</a>
                                        @else
                                            <a href="#" data-toggle="modal" data-target="#buyMovie"
                                                class="btn btn-success btn-lg btn-block successbtn">Mua
                                                ngay<br>({{ number_format(round($series->price)) . 'đ' }})</a>
                                        @endif
                                    @else
                                        <a href="#" data-toggle="modal" data-target="#myModal"
                                            class="btn btn-success btn-lg btn-block successbtn">Mua
                                            ngay<br>({{ number_format(round($series->price)) . 'đ' }})</a>
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
                                            MUA SERIES
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
                                                            <form action="{{ route('user.buySeries', $series->id) }}"
                                                                method="get">
                                                                @csrf
                                                                <h2 class="text-center">VÍ:
                                                                    @if ($wallet)
                                                                        @foreach ($wallet as $item)
                                                                            <b>{{ number_format(round($item->money)) . 'đ' }}</b>
                                                                        @endforeach
                                                                    @endif
                                                                </h2><br>
                                                                <h3>Bạn có muốn mua series phim
                                                                    <b>{{ $series->series_name }}</b>
                                                                    với giá
                                                                    <span
                                                                        class="badge badge-pill badge-danger price text-center">{{ number_format(round($series->price)) . 'đ' }}</span>
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
                        <h4><b>Nội dung</b></h4>{!! $series->information !!}
                        </p>
                        <p>
                        <h4><b>Trailer</b></h4>
                        </p>
                        @if (count($movie) > 0)
                            <div class="video-responsive">
                                {!! $movie[0]->trailer !!}
                            </div>
                        @endif
                        <div>
                            @if (count($movie) > 0)
                                <h4><b>Đánh giá series phim</b></h4>
                                @if (session('username_minmovies'))
                                    <form action="{{ route('user.postRate', [$movie[0]->id, $user_id]) }}"
                                        method="post">
                                        @csrf
                                        <div class="row text-center">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input name="rate"
                                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        type="number" maxlength="2" max="10"
                                                        class="form-control" placeholder="Nhập điểm phim">
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
                                                        type="number" maxlength="2" max="10"
                                                        class="form-control" disabled placeholder="Đăng nhập để đánh giá">
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
                            @endif
                        </div>
                    </div>
                </div>

            </div>

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
    {{-- <script type="text/javascript">
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
    </script> --}}
    <!----------------- Movie list end -------------------->
@endsection
