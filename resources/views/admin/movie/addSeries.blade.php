@extends('admin.master')
@section('title','Thêm Phim Mới - MinMovie')
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
        left:37px;
}
</style>
<div class="container-fluid border-danger">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.movie.createSeries') }}">
        @csrf
        <div class="form-group">
            <h4 class="h3 mb-2 text-gray-800 text-center">ADD NEW SERIES</h4>
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                - {{ $error }}<br>
                @endforeach
            </div>
            @endif
            <h5 class="m-0 font-weight-bold text-primary pb-2">INFORMATION OF NEW SERIES</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Series Name</span>
                        </div>
                        <input type="text" class="form-control" title="Name of Series" name="seriesName" autofocus placeholder="Name of Series">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Number of episode</span>
                        </div>
                        <input type="number" class="form-control" name="numberOfMovie" title="Number of episode" placeholder="Number of episode">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Actors</span>
                        </div>
                        <input type="text" class="form-control" name="actor" title="Actors" placeholder="Actors">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group pb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Director</span>
                        </div>
                        <input type="text" class="form-control" name="director" title="Director" placeholder="Director">
                    </div>
                </div>
            </div>
            <div class="pb-3">
            <div class="row">
                <div class="col-md-6 pb-3">
                    <select class="form wide" required name="description" data-toggle="movie-dropdown" oninvalid="this.setCustomValidity('Có phải bạn có quên chọn gì đó?')" onchange="this.setCustomValidity('')">
                        <option value="" data-display="Category">Chưa chọn...</option>
                        @foreach ($cate as $item)
                        <option value="{{$item->cate_name}}">{{$item->cate_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 pb-3">
                    <select class="form wide" name="year" required="" data-toggle="movie-dropdown" oninvalid="this.setCustomValidity('Có phải bạn có quên chọn gì đó?')" onchange="this.setCustomValidity('')">
                        <option value data-display="Year">Chưa chọn...</option>
                        @foreach ($year as $item)
                        <option value="{{$item->year}}">{{$item->year}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="pb-3">
                <div class="custom-file">
                    <input type="file" name="poster" title="Poster" class="uploadimg custom-file-input" accept=".jpg, .png, image/jpeg, image/png">
                    <label class="custom-file-label" class="uploadimg" for="inputGroupFile01">Poster...</label>
                </div>
            </div>
            <div class="input-group pb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text admin_add_movie_title">Price</span>
                </div>
                <input type="number" class="form-control" name="price" title="Giá phim" maxlength="8">
            </div>
            <h5 class="m-0 font-weight-bold text-primary pb-2">CONTENT OF SERIES</h5>
            <textarea class="ckeditor" style="resize:none;" name="information" id="editor" cols="30"
                rows="10"></textarea>
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
        <button type="submit" class="btn btn-primary btn-block btn-lg">SUBMIT</button>
    </form><br>
</div>
@endsection
