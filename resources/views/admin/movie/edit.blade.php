@extends('admin.master')
@section('title','Sửa Phim - MinMovie')
@section('content')
<style>
    select {
        display: block !important;
        margin: 0;
        border: 0;
        padding: 0;
        height: 1px;
        opacity: 0;
        position: relative;
        /* Top should be the same as the height of your */
        /* unfocused, nice select replacement element! */
        top: 35px;
        left: 37px;
    }
</style>
<div class="container-fluid border-danger">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.movie.edit',$movie->id) }}">
        @csrf
        <div class="form-group">
            <h4 class="h3 mb-2 text-gray-800 text-center">SỬA PHIM</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                - {{ $error }}<br>
                @endforeach
            </div>
            @endif
            <h5 class="m-0 font-weight-bold text-primary pb-2">THÔNG TIN PHIM</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tên tiếng Việt</span>
                        </div>
                        <input type="text" class="form-control" title="Tên phim bằng tiếng Việt" name="txtViename"
                            autofocus value="{{$movie->vie_name}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tên tiếng Anh</span>
                        </div>
                        <input type="text" class="form-control" name="txtEngname" title="Tên phim bằng tiếng Anh"
                            value="{{$movie->eng_name}}">
                    </div>
                </div>
            </div>
            <div>

            </div>
            <div class="row">
                <div class="col-md-3 pb-3">
                    <select class="form wide" required name="cate_id" data-toggle="movie-dropdown"
                        oninvalid="this.setCustomValidity('Có phải bạn có quên chọn gì đó?')"
                        onchange="this.setCustomValidity('')">
                        <option value="" data-display="Thể Loại">Chưa chọn...</option>
                        @foreach ($cate as $item)
                        @if ($movie->cate_id==$item->id)
                        <option selected value="{{$item->id}}">{{$item->cate_name}}</option>
                        @else
                        <option value="{{$item->id}}">{{$item->cate_name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 pb-3">
                    <select class="form wide" name="nation_id" required data-toggle="movie-dropdown"
                        oninvalid="this.setCustomValidity('Có phải bạn có quên chọn gì đó?')"
                        onchange="this.setCustomValidity('')">
                        <option value data-display="Quốc Gia">Chưa chọn...</option>
                        @foreach ($nation as $item)
                        @if ($movie->nation_id==$item->id)
                        <option selected value="{{$item->id}}">{{$item->nation_name}}</option>
                        @else
                        <option value="{{$item->id}}">{{$item->nation_name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 pb-3">
                    <select class="form wide" name="year_id" required="" data-toggle="movie-dropdown"
                        oninvalid="this.setCustomValidity('Có phải bạn có quên chọn gì đó?')"
                        onchange="this.setCustomValidity('')">
                        <option value data-display="Năm Sản Xuất">Chưa chọn...</option>
                        @foreach ($year as $item)
                        @if ($movie->year_id==$item->id)
                        <option selected value="{{$item->id}}">{{$item->year}}</option>
                        @else
                        <option value="{{$item->id}}">{{$item->year}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 pb-3">
                    <select class="form wide" name="language_id" required="" data-toggle="movie-dropdown"
                        oninvalid="this.setCustomValidity('Có phải bạn có quên chọn gì đó?')"
                        onchange="this.setCustomValidity('')">
                        <option value data-display="Ngôn Ngữ">Chưa chọn...</option>
                        @foreach ($language as $item)
                        @if ($movie->language_id==$item->id)
                        <option selected value="{{$item->id}}">{{$item->language}}</option>
                        @else
                        <option value="{{$item->id}}">{{$item->language}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pb-3">
                <img class="img-thumbnail" src="{{ asset("/imgUploads/$item->poster_image")}}" alt="" title="{{asset('storage/app/poster/'.$movie->poster_image)}}">
                <input type="hidden" name="img11" value="{{$item->img1}}">
                </div>
                <div class="col-md-9">
                    <div class="pb-3">
                        <div class="custom-file">
                            <input type="file" name="poster_image" title="Ảnh Poster Phim" class="uploadimg custom-file-input"
                                accept=".jpg, .png, image/jpeg, image/png">
                            <label class="custom-file-label" class="uploadimg"
                                for="inputGroupFile01">{{ asset("/imgUploads/$item->poster_image")}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group pb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text admin_add_movie_title">Thời lượng</span>
                                </div>
                                <input type="text" class="form-control" name="txtTime" title="Thời lượng phim"
                                    value="{{$movie->time}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group pb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text admin_add_movie_title">Chất lượng</span>
                                </div>
                                <input type="text" class="form-control" name="txtQuality" title="Chất lượng phim"
                                    value="{{$movie->quality}}">
                            </div>
                        </div>
                    </div>
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text admin_add_movie_title">Điểm phim</span>
                        </div>
                        <input type="text" class="form-control" name="txtPoint" title="Điểm phim"
                            value="{{$movie->point}}">
                    </div>
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text admin_add_movie_title">Đạo diễn</span>
                        </div>
                        <input type="text" class="form-control" name="txtDirector" title="Đạo diễn"
                            value="{{$movie->director}}">
                    </div>
                    <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text admin_add_movie_title">Giá phim</span>
                </div>
                <input type="number" class="form-control" name="txtPrice" title="Giá phim" value="{{$movie->price}}" maxlength="8">
            </div>
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text admin_add_movie_title">Diễn viên</span>
                        </div>
                        <input type="text" class="form-control" name="txtActor" title="Danh sách diễn viên"
                            value="{{$movie->actor}}">
                    </div>
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text admin_add_movie_title">Trailer phim</span>
                        </div>
                        <input type="text" class="form-control" name="txtTrailer" title="Mã nhúng Trailer phim"
                            value="{{$movie->trailer}}">
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text admin_add_movie_title">Server 1</span>
                        </div>
                        @foreach ($link as $item)
                        @if ($movie->id==$item->movie_id)
                            @php
                                $link1=$item->link1
                            @endphp
                        @endif
                        @endforeach
                        <input type="text" class="form-control" name="txtServer1" title="Link phim Server 1"
                            value="{{$link1}}">
                    </div>
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text admin_add_movie_title">Server 2</span>
                        </div>
                        @foreach ($link as $item)
                        @if ($movie->id==$item->movie_id)
                            @php
                                $link2=$item->link2
                            @endphp
                        @endif
                        @endforeach
                        <input type="text" class="form-control" name="txtServer2" title="Link phim Server 2"
                            value="{{$link2}}">
                    </div>
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text admin_add_movie_title">Server 3</span>
                        </div>
                        @foreach ($link as $item)
                        @if ($movie->id==$item->movie_id)
                            @php
                                $link3=$item->link3;
                            @endphp
                        @endif
                        @endforeach
                        <input type="text" class="form-control" name="txtServer3" title="Link phim Server 3"
                            value="{{$link3}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text admin_add_movie_title">Server 4</span>
                        </div>
                        @foreach ($link as $item)
                        @if ($movie->id==$item->movie_id)
                            @php
                                $link4=$item->link4
                            @endphp
                        @endif
                        @endforeach
                        <input type="text" class="form-control" name="txtServer4" title="Link phim Server 4"
                            value="{{$link4}}">
                    </div>
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text admin_add_movie_title">Server 5</span>
                        </div>
                        @foreach ($link as $item)
                        @if ($movie->id==$item->movie_id)
                            @php
                                $link5=$item->link5
                            @endphp
                        @endif
                        @endforeach
                        <input type="text" class="form-control" name="txtServer5" title="Link phim Server 5"
                            value="{{$link5}}">
                    </div>
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text admin_add_movie_title">Server 6</span>
                        </div>
                        @foreach ($link as $item)
                        @if ($movie->id==$item->movie_id)
                            @php
                                $link6=$item->link6
                            @endphp
                        @endif
                        @endforeach
                        <input type="text" class="form-control" name="txtServer6" title="Link phim Server 6"
                            value="{{$link6}}">
                    </div>
                </div>
            </div>
            <h5 class="m-0 font-weight-bold text-primary pb-2">NỘI DUNG PHIM</h5>
            <textarea class="ckeditor" style="resize:none;" name="txtInfo" id="editor" cols="30"
                rows="10">{{$movie->information}}</textarea>
            <script>
                var editor = CKEDITOR.replace( 'editor',{
                    language:'vi',
                    height:'25em',
                    width: '100%',
                    placeholder: 'Nội dung phim'
                } );
                editor.config.removePlugins = 'resize';
                CKFinder.setupCKEditor( editor );
                CKFinder.widget( 'ckfinder-widget', {
                id: 'custom-instance-id',
                thumbnailDefaultSize: 400
            } );
            </script>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Sửa phim</button>
    </form><br>
</div>
@endsection
