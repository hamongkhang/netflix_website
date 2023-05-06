@extends('user.master')
@section('title','Trailer Phim Mới Cập Nhật - MinMovies')
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
                        Trailer Phim Mới Cập Nhật
                    </h4>
                    <div class="container">
                        <div class="agileits-single-top">
                            <ol class="breadcrumb">
                                <li><a href="{{ route('user.index') }}">Trang Chủ</a></li>
                                <li class="active">Trailer Phim Mới</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="browse-inner">
                        @foreach ($movie as $item)
                        <div class="movietrailer">
                            <a href="{{ route('user.movie',$item->id) }}"
                                title="{{ $item->vie_name.' ('.$item->eng_name.')' }}">{{ $item->vie_name.' ('.$item->eng_name.')' }}</a>
                            <div class="video-responsive">
                                {!! $item->trailer !!}
                            </div><br><br>
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
