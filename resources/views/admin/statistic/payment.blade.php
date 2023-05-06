@extends('admin.master')
@section('title','Thống Kê Doanh Thu - MinMovie')
@section('content')
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">THỐNG KÊ DOANH THU</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                    DANH SÁCH PHIM ĐÃ BÁN
                    <h4 class="float-right">Tổng tiền bán phim:
                        @php
                        $total=0;
                        @endphp
                        @foreach ($payment as $item)
                        @foreach ($movie as $item2)
                        @if ($item->movie_id==$item2->id)
                        @php
                        $total+=$item2->price;
                        @endphp
                        @endif
                        @endforeach
                        @endforeach
                        <b>{{ number_format($total).' VNĐ' }}</b>
                    </h4>
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
                                <th style="width:1em;">STT</th>
                                <th>Phim</th>
                                <th>Số lần mua</th>
                                <th>Giá</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($payment2 as $item)
                            @foreach ($movie as $item3)
                            @if ($item->movie_id==$item3->id)
                            @php
                            $n=0;
                            @endphp
                            @foreach ($payment as $item4)
                            @if ($item->movie_id==$item4->movie_id)
                            @php
                            $n++;
                            @endphp
                            @endif
                            @endforeach
                            @if ($n!=0)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><a class="text-decoration-none" href="{{ route('user.movie',$item->movie_id) }}"
                                        title="Mở trong tab mới" target="_blank"><b>
                                            {{ $item3->vie_name }}
                                        </b></a></td>
                                <td>
                                    {{  $n  }}
                                </td>
                                <td>
                                    {{ number_format(round($item3->price)).'đ' }}
                                </td>
                                <td>
                                    {{ number_format(round($item3->price)*$n).'đ' }}
                                </td>
                            </tr>
                            @endif
                            @endif
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <form class="m-3" action="{{ route('admin.statistic.sort_payment') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form wide" name="sortID" data-toggle="movie-dropdown"
                                        oninvalid="this.setCustomValidity('Có phải bạn có quên chọn gì đó?')"
                                        onchange="this.setCustomValidity('')">
                                        <option value="" data-display="Duyệt theo tháng">Chưa chọn...</option>
                                        @for ($i = 1; $i <= 12; $i++) @isset($sortID) @if ($i==$sortID) <option selected
                                            value="{{ $i }}">Tháng {{ $i }}
                                            </option>
                                            @php
                                            $i++;
                                            @endphp
                                            @endif
                                            @endisset
                                            <option value="{{ $i }}">Tháng {{ $i }}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form wide" name="sortIDYear" data-toggle="movie-dropdown"
                                        oninvalid="this.setCustomValidity('Có phải bạn có quên chọn gì đó?')"
                                        onchange="this.setCustomValidity('')">
                                        <option value="" data-display="Duyệt theo năm">Chưa chọn...</option>
                                        @for ($i = 2020; $i >= 2018; $i--)
                                        @isset($sortIDYear)
                                        @if ($i==$sortIDYear)
                                        <option selected value="{{ $i }}">{{ $i }}</option>
                                        @php
                                        $i--;
                                        @endphp
                                        @endif
                                        @endisset
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button class="ml-3 btn btn-success btn-block">Duyệt</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
