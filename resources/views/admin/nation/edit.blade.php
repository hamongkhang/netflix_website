@extends('admin.master')
@section('title','Sửa Quốc Gia - MinMovie')
@section('content')
<div class="container-fluid w-50 text-center">
    <form method="POST" action="{{ route('admin.nation.edit',$nation->id) }}">
        @csrf
        <div class="form-group">
            <h4 class="text-center">SỬA QUỐC GIA</h4>
            <input type="text" name="txtNationName" class="form-control" placeholder="Đặt tên cho quốc gia"
                value="{{ $nation->nation_name }}" required oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')" oninput="this.setCustomValidity('')">
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Sửa quốc gia</button>
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
