@extends('admin.master')
@section('title','Thêm Năm Sản Xuất - MinMovie')
@section('content')
<div class="container-fluid w-50 text-center">
    <form method="POST" action="{{ route('admin.year.create') }}">
        @csrf
        <div class="form-group">
            <h4 class="text-center">THÊM NĂM SẢN XUẤT</h4>
            <input type="text" name="txtYear" id="txtYear" class="form-control" placeholder="Nhập năm sản xuất" required oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')" oninput="this.setCustomValidity('')">
            <script type="text-javascript">CKEDITOR.replace('txtYear');</script>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Thêm năm sản xuất</button>
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
