@extends('user.master')
@section('title','Danh Sách Phim - MinMovies')
@section('content')
<!-- /w3l-medile-movies-grids -->
<div class="general-agileits-w3l">
    <div class="w3l-medile-movies-grids">
        <!-- /movie-browse-agile -->
        <div class="movie-browse-agile">
            <!--/browse-agile-w3ls -->
            <div class="browse-agile-w3ls general-w3ls">
                <div class="tittle-head">
                    <h4 class="latest-text">
                        lịch sử giao dịch
                    </h4>
                    <div class="container">
                        <div class="agileits-single-top">
                            <ol class="breadcrumb">
                                <li><a href="{{ route('user.index') }}">Trang Chủ</a></li>
                                <li class="active">Lịch Sử Giao Dịch</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-center">LỊCH SỬ MUA PHIM</h3><br>
                            <table class="table table-striped table-bordered text-center table-hover" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Phim</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach ($payment as $item)
                                    @foreach ($movie as $item2)
                                    @if ($item->movie_id==$item2->id)
                                    <tr>
                                        <th scope="row">
                                            {{ $i++ }}
                                        </th>
                                        <td>{{ $item2->vie_name }}</td>
                                        <td>{{ number_format(round($item2->price)).'đ' }}</td>
                                        <td>
                                            @php
                                            \Carbon\Carbon::setLocale('vi');
                                            $commentTime=$item->created_at;
                                            $commentTime=\Carbon\Carbon::parse($commentTime);
                                            $currentTime= \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                            echo $commentTime->diffForHumans($currentTime);
                                            @endphp
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="blog-pagenat-wthree">
                                <ul>
                                    {{ $payment->links() }}
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-center">LỊCH SỬ NẠP TIỀN</h3><br>
                            <table class="table table-striped table-bordered text-center table-hover">
                                <thead class="text-center">
                                    <tr class="text-center pull-center">
                                        <th scope="col">STT</th>
                                        <th scope="col">Số hoá đơn</th>
                                        <th scope="col">Số tiền</th>
                                        <th scope="col">Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach ($walletCharge as $item)
                                    <tr>
                                        <th scope="row">
                                            {{ $i++ }}
                                        </th>
                                        <td>{{ $item->orderId }}</td>
                                        <td>{{ number_format(round($item->money)).'đ' }}</td>
                                        <td>
                                            @php
                                            \Carbon\Carbon::setLocale('vi');
                                            $commentTime=$item->created_at;
                                            $commentTime=\Carbon\Carbon::parse($commentTime);
                                            $currentTime= \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                            echo $commentTime->diffForHumans($currentTime);
                                            @endphp
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="blog-pagenat-wthree">
                                <ul>
                                    {{ $walletCharge->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //movie-browse-agile -->
        <!--body wrapper start-->
        @endsection
