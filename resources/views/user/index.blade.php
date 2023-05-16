@extends('user.master')
@section('title','MinMovies')
@section('content')
@include('user.user_layout.slider')
<!-- general -->
<div class="general">
    <h4 class="latest-text w3_latest_text">danh mục phim</h4>
    <div class="container">
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Phim Hot Mới</a></li>
                <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Phim Ngẫu Nhiên</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                    <div class="w3_agile_featured_movies text-center">
                        @foreach ($newmovie as $item)
                        @if ($item->series_id==null && $item->series_id<2)
                        <div class="col-md-2 w3l-movie-gride-agile float-right">
                            <a href="{{route('user.movie',$item->id)}}" title="{{$item->vie_name.' ('.$item->eng_name.')'}}" class="hvr-shutter-out-horizontal"><img  src="{{ asset("/imgUploads/$item->poster_image")}}"title="{{$item->vie_name.' ('.$item->eng_name.')'}}" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text">
                                    <h6><a class="mid-1" href="{{route('user.movie',$item->id)}}" title="{{$item->vie_name.' ('.$item->eng_name.')'}}">{{$item->vie_name}}</a>
                                    </h6>
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>
                                        @foreach ($year as $item2)
                                        @if ($item2->id==$item->year_id)
                                        {{$item2->year}}
                                        @endif
                                        @endforeach
                                    </p>
                                    <div class="block-stars">
                                        <ul class="w3l-ratings">
                                            <p>{{$item->time}}</p>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben">
                                @foreach ($language as $lang)
                                @if ($item->language_id==$lang->id)
                                <a href="{{route('user.movie',$item->id)}}" title="{{$item->vie_name.' ('.$item->eng_name.')'}}">
                                    <p>{{$item->quality.'-'.$lang->language}}</p>
                                </a>
                                @endif
                                @endforeach
                            </div>
                            <div class="ribbennew3">
                                <span class="badge badge-pill badge-danger price2 text-center" style="margin-top:5px">
                                    @if ($item->price==0)
                                    Miễn phí
                                    @else
                                    {{ number_format(round($item->price)).'đ' }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="clearfix"> 

                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                    @foreach ($randommovie as $item)
                    <div class="col-md-2 w3l-movie-gride-agile float-right">
                        <a href="{{route('user.movie',$item->id)}}" title="{{$item->vie_name.' ('.$item->eng_name.')'}}" class="hvr-shutter-out-horizontal"><img title="{{$item->vie_name.' ('.$item->eng_name.')'}}" class="img-responsive" alt=" "   src="{{ asset("/imgUploads/$item->poster_image")}}"/>
                            <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                        </a>
                        <div class="mid-1 agileits_w3layouts_mid_1_home">
                            <div class="w3l-movie-text">
                                <h6><a class="mid-1" href="{{route('user.movie',$item->id)}}" title="{{$item->vie_name.' ('.$item->eng_name.')'}}">{{$item->vie_name}}</a>
                                </h6>
                            </div>
                            <div class="mid-2 agile_mid_2_home">
                                <p>
                                    @foreach ($year as $item2)
                                    @if ($item2->id==$item->year_id)
                                    {{$item2->year}}
                                    @endif
                                    @endforeach
                                </p>
                                <div class="block-stars">
                                    <ul class="w3l-ratings">
                                        <p>{{$item->time}}</p>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="ribben">
                            @foreach ($language as $lang)
                            @if ($item->language_id==$lang->id)
                            <a href="{{route('user.movie',$item->id)}}" title="{{$item->vie_name.' ('.$item->eng_name.')'}}">
                                <p>{{$item->quality.'-'.$lang->language}}</p>
                            </a>
                            @endif
                            @endforeach
                        </div>
                        <div class="ribbennew3">
                            <span class="badge badge-pill badge-danger price2 text-center" style="margin-top:5px">
                                @if ($item->price==0)
                                Miễn phí
                                @else
                                {{ number_format(round($item->price)).'đ' }}
                                @endif
                            </span>
                        </div>
                    </div>
                    @endforeach
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //general -->

@endsection
