@extends('admin.master')
@section('title','Sửa Thể Loại - MinMovie')
@section('content')
<div class="container-fluid w-50 text-center">
    <form method="POST" action="{{ route('admin.cate.edit',$cate->id) }}">
        @csrf
        <div class="form-group">
            <h4 class="text-center">SỬA THỂ LOẠI</h4>
            <input type="text" name="txtCateName" class="form-control" required oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')" oninput="this.setCustomValidity('')" placeholder="Đặt tên cho thể loại"
                value="{{$cate->cate_name}} ">
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Sửa thể loại</button>
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
