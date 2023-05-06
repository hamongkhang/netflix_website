@extends('user.master')
@section('title','Hồ Sơ Của Tôi - MinMovies')
@section('content')
<br>
<div class="tittle-head">
    <h4 class="latest-text">Ví của tôi</h4>
    <div class="container">
        <div class="agileits-single-top">
            <ol class="breadcrumb">
                <li><a href="">Trang Chủ</a></li>
                <li class="active">Ví Của Tôi</li>
            </ol>
        </div>
    </div>
</div>
<div class="video-modal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                VÍ CỦA TÔI
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <section>
                <div class="modal-body">
                    <div class="w3_login_module">
                        <div class="module form-module">
                            <div class="toggle"><i class="fad fa-wallet" title="Ví của tôi"></i>
                            </div>
                            <div class="form">
                                <h1 class="text-center">
                                    @foreach ($wallet as $item)
                                    @if ($item->user_id==$user->id)
                                    {{ number_format(round($item->money,3)).' VNĐ' }}
                                    @endif
                                    @endforeach
                                </h1>
                                <br><br>
                                <form action="{{ route('user.getChargeWallet') }}">
                                    <input type="submit" value="Nạp tiền vào ví"><br>
                                </form>
                            </div>
                        </div><br><br>
                        <div style="margin:20px">
                            <h3 class="text-center">LỊCH SỬ NẠP TIỀN</h3><br>
                            <table class="table table-striped table-bordered text-center table-hover">
                                <thead class="text-center">
                                    <tr class="text-center pull-center">
                                        <th scope="col">STT</th>
                                        <th scope="col">Số hoá đơn</th>
                                        <th scope="col">Số tiền</th>
                                        <th scope="col">Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach ($walletCharge as $item)
                                    <tr>
                                        <th scope="row">
                                            {{ $i++ }}
                                        </th>
                                        <td>{{ $item->orderId }}</td>
                                        <td>{{ number_format(round($item->money)).'đ' }}</td>
                                        <td>
                                            @php
                                            \Carbon\Carbon::setLocale('vi');
                                            $commentTime=$item->created_at;
                                            $commentTime=\Carbon\Carbon::parse($commentTime);
                                            $currentTime= \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                            echo $commentTime->diffForHumans($currentTime);
                                            @endphp
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="blog-pagenat-wthree">
                                <ul>
                                    {{ $walletCharge->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div>


</div>
</div>
</div>
@endsection
