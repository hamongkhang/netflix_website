@extends('admin.master')
@section('title','Danh Sách Phim - MinMovie')
@section('content')
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">QUẢN LÝ PHIM</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                    DANH SÁCH PHIM
                    <a href="{{ route('admin.movie.create')}}" class="btn btn-success float-right">Thêm phim mới</a>
                </div>
            </div>
            @if (session('thongbao'))
            <div class="alert alert-{{ session('thongbao_level') }}" style="border-radius:0px;">
                - {{ session('thongbao') }}
            </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center" id="dataTable"
                        width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width:3em;">STT</th>
                                <th>Tên tiếng Việt</th>
                                <th>Tên tiếng Anh</th>
                                <th>Thể loại</th>
                                <th>Quốc gia</th>
                                <th>NSX</th>
                                <th>Poster</th>
                                <th style="width:3em;">Sửa</th>
                                <th style="width:3em;">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($movie as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><a class="text-decoration-none" href="{{ route('user.movie',$item->id) }}" title="Mở trong tab mới" target="_blank"><b>{{ $item->vie_name }}</b></a></td>
                                <td><a class="text-decoration-none" href="{{ route('user.movie',$item->id) }}" title="Mở trong tab mới" target="_blank"><b>{{ $item->eng_name }}</b></a></td>
                                <td>
                                    @foreach ($cate as $item_cate)
                                    @if ($item->cate_id==$item_cate->id)
                                    {{ $item_cate->cate_name }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($nation as $item_nation)
                                    @if ($item->nation_id==$item_nation->id)
                                    {{ $item_nation->nation_name }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($year as $item_year)
                                    @if ($item->year_id==$item_year->id)
                                    {{ $item_year->year }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    <div class="imgMovieList">
                                        <img src="{{'storage/app/poster/'.$item->poster_image}}" alt="">
                                    </div>
                                </td>
                                <td><a href="{{ route('admin.movie.edit',$item->id) }}"><i
                                            class="far fa-edit fa-lg"></i></a></td>
                                <td><a href="{{ route('admin.movie.del',$item->id) }}" data-toggle="confirm"
                                        role="button"><i class="far fa-trash-alt fa-lg text-danger"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
