@extends('admin.master')
@section('title','Danh Sách Tủ Phim - MinMovie')
@section('content')
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">QUẢN LÝ TỦ PHIM</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                    DANH SÁCH TỦ PHIM
                </div>
            </div>
            @if (session('thongbao'))
            <div class="alert alert-{{ session('thongbao_level') }}" style="border-radius:0px;">
                - {!! session('thongbao') !!}
            </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center" id="dataTable"
                        width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width:3em;">STT</th>
                                <th>Phim</th>
                                <th>Người dùng</th>
                                <th style="width:3em;">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($cabinet as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><a class="text-decoration-none" href="{{ route('user.movie',$item->movie_id) }}"
                                        title="Mở trong tab mới" target="_blank"><b>
                                            @foreach ($movie as $item2)
                                            @if ($item2->id==$item->movie_id)
                                            {{ $item2->vie_name.' ('.$item2->eng_name.')' }}
                                            @endif
                                            @endforeach
                                        </b></a></td>
                                <td>
                                    @foreach ($user as $item2)
                                    @if ($item2->id==$item->user_id)
                                    <a class="text-decoration-none" href="{{ route('admin.user.edit',$item2->id) }}"
                                        title="Mở người dùng trong tab mới" target="_blank"><b>
                                            {{ $item2->name }}
                                        </b></a>
                                    @endif
                                    @endforeach
                                </td>
                                <td><a href=" {{ route('admin.cabinet.del',$item->id) }} " data-toggle="confirm"
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
