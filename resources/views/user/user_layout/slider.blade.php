<!-- banner-bottom -->
<div class="banner-bottom">
    <h4 class="latest-text w3_latest_text pt-5">phim mới đề cử</h4>
    <div class="container text-center">
        <div class="w3_agile_banner_bottom_grid">
            <div id="owl-demo" class="owl-carousel owl-theme">
                @foreach ($slider as $item)
                @if ($item->series_id==null)
                <div class="item">
                    <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                        <a href="{{route('user.movie',$item->id)}}" title="{{$item->vie_name.' ('.$item->eng_name.')'}}"
                            class="hvr-shutter-out-horizontal">
                            <img src="{{ asset("/imgUploads/$item->poster_image")}}"
                                title="{{$item->vie_name.' ('.$item->eng_name.')'}}" class="img-responsive" alt=" " />
                            <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                        </a>
                        <div class="mid-1 agileits_w3layouts_mid_1_home">
                            <div class="w3l-movie-text">
                                <a href="{{route('user.movie',$item->id)}}"
                                    title="{{$item->vie_name.' ('.$item->eng_name.')'}}">{{$item->vie_name}}</a>
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
                            <a href="{{route('user.movie',$item->id)}}"
                                title="{{$item->vie_name.' ('.$item->eng_name.')'}}">
                                <p>{{$item->quality.'-'.$lang->language}}</p>
                            </a>
                            @endif
                            @endforeach
                        </div>
                        <div class="ribbennew">
                            <span
                                class="badge badge-pill badge-danger price2 text-center" style="margin-top:5px;">
                                @if ($item->price==0)
                                    Miễn phí
                                @else
                                {{ number_format(round($item->price)).'đ' }}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
