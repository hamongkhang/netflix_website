@extends('user.master')
@section('title','Phim Đã Mua - MinMovies')
@section('content')
<div class="general-agileits-w3l">
    <div class="w3l-medile-movies-grids">
        <!-- /movie-browse-agile -->
        <div class="movie-browse-agile">
            <!--/browse-agile-w3ls -->
            <div class="browse-agile-w3ls general-w3ls">
                <div class="tittle-head">
                    <h4 class="latest-text">
                        Phim đã mua
                    </h4>
                    <div class="container">
                        <div class="agileits-single-top">
                            <ol class="breadcrumb">
                                <li><a href="{{ route('user.index') }}">Trang Chủ</a></li>
                                <li class="active">Phim Đã Mua</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="browse-inner">
                        @if ($payment->isEmpty())
                            <h3 class="text-center">Bạn chưa mua phim nào!</h3><br>
                        @else
                        <h3 class="text-center">Bạn đã mua "<b>{{ count($payment) }}</b>" phim</h3><br>
                        @foreach ($movie as $item)
                            @foreach ($payment as $item2)
                                @if ($item2->movie_id==$item->id)
                                <div class="col-md-2 w3l-movie-gride-agile">
                                    <a href="{{route('user.movie',$item->id)}}"
                                        title="{{$item->vie_name.' ('.$item->eng_name.')'}}"
                                        class="hvr-shutter-out-horizontal"><img
                                            src="{{ asset("/imgUploads/$item->poster_image")}}"
                                            title="{{$item->vie_name.' ('.$item->eng_name.')'}}" class="img-responsive"
                                            alt=" " />
                                        <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                    </a>
                                    <div class="mid-1">
                                        <div class="w3l-movie-text">
                                            <h6><a href="{{route('user.movie',$item->id)}}"
                                                    title="{{$item->vie_name.' ('.$item->eng_name.')'}}">{{$item->vie_name}}</a>
                                            </h6>
                                        </div>
                                        <div class="mid-2">
                                            <p>
                                                @foreach ($year as $item2)
                                                @if ($item2->id==$item->year_id)
                                                {{$item2->year}}
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
                                        @if ($item->language_id==$lang->id)
                                        <a href="{{route('user.movie',$item->id)}}"
                                            title="{{$item->vie_name.' ('.$item->eng_name.')'}}">
                                            <p>{{$item->quality.'-'.$lang->language}}</p>
                                        </a>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="ribbennew3">
                                        <span
                                            class="badge badge-pill badge-danger price2 text-center" style="margin-top:5px;">
                                            {{ number_format(round($item->price)).'đ' }}
                                        </span>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endforeach
                        @endif

                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <!--//browse-agile-w3ls -->
            @if (session('thongbaotrong'))
                @php
                    session()->forget('thongbaotrong');
                @endphp
            @else
            <div class="blog-pagenat-wthree">
                <ul>
                    {{ $payment->links() }}
                </ul>
            </div>
            @endif
        </div>
        @endsection
