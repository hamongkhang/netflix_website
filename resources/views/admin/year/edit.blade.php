@extends('admin.master')
@section('title','Sửa Năm Sản Xuất - MinMovie')
@section('content')
<div class="container-fluid w-50 text-center">
    <form method="POST" action="{{ route('admin.year.edit',$year->id) }}">
        @csrf
        <div class="form-group">
            <h4 class="text-center">SỬA NĂM SẢN XUẤT</h4>
            <input type="text" name="txtYear" class="form-control" placeholder="Nhập năm sản xuất"
                value="{{ $year->year }}" required oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')" oninput="this.setCustomValidity('')">
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Sửa năm sản xuất</button>
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
