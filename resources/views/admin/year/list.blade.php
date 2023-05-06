@extends('admin.master')
@section('title','Danh Sách Năm Sản Xuất - MinMovie')
@section('content')
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">QUẢN LÝ NĂM SẢN XUẤT</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                    DANH SÁCH NĂM SẢN XUẤT
                    <a href="{{ route('admin.year.create')}}" class="btn btn-success float-right">Thêm năm sản xuất</a>
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
                                <th>Năm sản xuất</th>
                                <th style="width:3em;">Sửa</th>
                                <th style="width:3em;">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($year as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><a class="text-decoration-none" href="{{ route('user.year',$item->id) }}" target="_blank" title="Mở trong tab mới"><b>{{ $item->year }}</b></a></td>
                                <td><a href="{{ route('admin.year.edit',$item->id) }}"><i
                                            class="far fa-edit fa-lg"></i></a></td>
                                <td><a href=" {{ route('admin.year.del',$item->id) }} " data-toggle="confirm"
                                    role="button"><i
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
