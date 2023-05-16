@extends('user.master')
@section('title','Danh Sách Series Phim - MinMovies')
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
                        Danh Sách Series Phim Mới Nhất
                    </h4>
                    <div class="container">
                        <div class="agileits-single-top">
                            <ol class="breadcrumb">
                                <li><a href="{{ route('user.index') }}">Trang Chủ</a></li>
                                <li class="active">Danh Sách Series Phim</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="browse-inner">
                        @foreach ($series as $item)
                        <div class="col-md-2 w3l-movie-gride-agile">
                            <a href="{{route('user.detailSeries',$item->id)}}" title="{{$item->series_name.' ('.$item->series_name.')'}}"
                                class="hvr-shutter-out-horizontal"><img style='height:200px'
                                    src="{{ asset("/imgUploads/$item->poster")}}" title="{{$item->series_name.' ('.$item->series_name.')'}}"
                                    class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1">
                                <div class="w3l-movie-text">
                                    <h6><a href="{{route('user.detailSeries',$item->id)}}"
                                            title="{{$item->series_name.' ('.$item->series_name.')'}}"><b>{{$item->series_name}}</b></a></h6>
                                </div>
                                <div class="mid-2">
                                    <p>
                                        {{$item->year}}
                                    </p>
                                    <div class="block-stars">
                                        <ul class="w3l-ratings">
                                            <p>{{ $item->description }}</p>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben">
                                <a href=""
                                    title="{{$item->number_of_movie.' ('.$item->number_of_movie.')'}}">
                                    <p>{{$item->number_of_movie}}</p>
                                </a>
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
        <!-- //movie-browse-agile -->
        <!--body wrapper start-->
        @endsection
