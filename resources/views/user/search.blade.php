@extends('user.master')
@section('title','Tìm Kiếm - MinMovies')
@section('content')
<div class="general-agileits-w3l">
    <div class="w3l-medile-movies-grids">
        <!-- /movie-browse-agile -->
        <div class="movie-browse-agile">
            <!--/browse-agile-w3ls -->
            <div class="browse-agile-w3ls general-w3ls">
                <div class="tittle-head">
                    <h4 class="latest-text">
                        Tìm kiếm
                    </h4>
                    <div class="container">
                        <div class="agileits-single-top">
                            <ol class="breadcrumb">
                                <li><a href="{{ route('user.index') }}">Trang Chủ</a></li>
                                <li class="active">Tìm kiếm</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="browse-inner">

                        @if ($movie->isEmpty())
                        <h3 class="text-center">Không tìm thấy phim nào!</h3>
                        @else
                        <h3 class="text-center">Tìm thấy "<b>{{ count($movie) }}</b>" kết quả với từ khoá
                            "<b>{{ $search }}</b>"</h3><br>
                        @endif
                        @foreach ($movie as $item)
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
                                    class="badge badge-pill badge-danger price2 text-center" style="margin-top:5px">
                                    @if ($item->price==0)
                                        Miễn phí
                                    @else
                                    {{ number_format(round($item->price)).'đ' }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        @endforeach
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <!--//browse-agile-w3ls -->
            <div class="blog-pagenat-wthree">
                <ul>
                    {{ $movie->links() }}
                </ul>
            </div>
        </div>
        @endsection
