@extends('admin.master')
@section('title', 'Danh Sách Phim - MinMovie')
@section('content')
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 text-center">SERIES FILM MANAGEMENT</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary">
                        LIST OF SERIES
                        <a href="{{ route('admin.movie.createSeries') }}" class="btn btn-success float-right">Add new
                            series</a>
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
                                    <th>Series name</th>
                                    <th>Poster</th>
                                    <th>Category</th>
                                    <th>Number of movies</th>
                                    <th>Director</th>
                                    <th>Actor</th>
                                    <th>Year</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th style="width:3em;">Edit</th>
                                    <th style="width:3em;">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($series as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td><a class="text-decoration-none"
                                                href="{{ route('user.detailSeries', $item->id) }}" title="Mở trong tab mới"
                                                target="_blank"><b>{{ $item->series_name }}</b></a></td>
                                        <td>
                                            <div class="imgMovieList">
                                                <img src='{{ asset("/imgUploads/$item->poster") }}'>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $item->description }}
                                        </td>
                                        <td>
                                            {{ $item->number_of_movie }}
                                        </td>
                                        <td>
                                            {{ $item->director }}
                                        </td>
                                        <td>
                                            {{ $item->actor }}
                                        </td>
                                        <td>
                                            {{ $item->year }}
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            {{ $item->updated_at }}
                                        </td>
                                        <td><a href="{{ route('admin.movie.editSeries', $item->id) }}"><i
                                                    class="far fa-edit fa-lg"></i></a></td>
                                        <td><a href="{{ route('admin.movie.deleteSeries', $item->id) }}"
                                                data-toggle="confirm" role="button"><i
                                                    class="far fa-trash-alt fa-lg text-danger"></i></a></td>
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
