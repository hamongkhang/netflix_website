@extends('admin.master')
@section('title','Thêm Thể Loại - MinMovie')
@section('content')
<div class="container-fluid w-50 text-center">
    <form method="POST" action="{{ route('admin.cate.create') }}">
        @csrf
        <div class="form-group">
            <h4 class="text-center">THÊM THỂ LOẠI</h4>
            <input type="text" name="txtCateName" class="form-control" placeholder="Đặt tên cho thể loại" required oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')" oninput="this.setCustomValidity('')">
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Thêm thể loại</button>
    </form><br>

    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        - {{ $error }}
        @endforeach
    </div>
    @endif
</div>
@endsection
