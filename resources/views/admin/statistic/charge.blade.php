@extends('admin.master')
@section('title','Thống Kê Nạp Tiền - MinMovie')
@section('content')
<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center">THỐNG KÊ NẠP TIỀN</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="m-0 font-weight-bold text-primary">
                    DANH SÁCH NGƯỜI DÙNG ĐÃ NẠP TIỀN
                    <h4 class="float-right">Tổng tiền đã nạp:
                        @php
                        $total=0;
                        @endphp
                        @foreach ($charge as $item)
                        @foreach ($user as $item2)
                        @if ($item->user_id==$item2->id)
                        @php
                        $total+=$item->money;
                        @endphp
                        @endif
                        @endforeach
                        @endforeach
                        <b>{{ number_format($total).' VNĐ' }}</b>
                    </h4>
                    <br>


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
                                <th>Người dùng</th>
                                <th>Số lần nạp</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @if (!$charge->isEmpty())
                            @foreach ($charge2 as $item)
                            @foreach ($user as $item3)
                            @if ($item->user_id==$item3->id)
                            <tr>
                                @php
                                $n=0;
                                @endphp
                                @foreach ($charge as $item4)
                                @if ($item->user_id==$item4->user_id)
                                @php
                                $n++;
                                @endphp
                                @endif
                                @endforeach
                                @if ($n!=0)
                                <td>{{ $i++ }}</td>
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
                                <td>
                                    @php
                                    $n=0;
                                    @endphp
                                    @foreach ($charge as $item4)
                                    @if ($item->user_id==$item4->user_id)
                                    @php
                                    $n++;
                                    @endphp
                                    @endif
                                    @endforeach
                                    {{  $n  }}
                                </td>
                                <td>
                                    @php
                                    $total=0;
                                    @endphp
                                    @foreach ($charge as $item4)
                                    @if ($item->user_id==$item4->user_id)
                                    @php
                                    $total+=$item4->money;
                                    @endphp
                                    @endif
                                    @endforeach
                                    {{  number_format($total).'đ'  }}
                                </td>
                                @endif
                            </tr>
                            @endif
                            @endforeach
                            @endforeach
                            @endif
                        </tbody>
                    </table>


                </div>
            </div>
            <div>
                <form class="m-3" action="{{ route('admin.statistic.sort_charge') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form wide" name="sortID" data-toggle="movie-dropdown"
                                        oninvalid="this.setCustomValidity('Có phải bạn có quên chọn gì đó?')"
                                        onchange="this.setCustomValidity('')">
                                        <option value="" data-display="Duyệt theo tháng">Chưa chọn...</option>
                                        @for ($i = 1; $i <= 12; $i++) @isset($sortID) @if ($i==$sortID) <option
                                            selected value="{{ $i }}">Tháng {{ $i }}
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
                                    <select class="form wide" name="sortIDYear"
                                        data-toggle="movie-dropdown"
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
                            <a href="https://sandbox.vnpayment.vn/merchantv2/Users/Login.htm?ReturnUrl=%2fmerchantv2%2fUsers%2fLogout.htm"
                    class="btn btn-success float-right" target="_blank">Truy cập trang quản lý doanh thu
                    VNPAY</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
