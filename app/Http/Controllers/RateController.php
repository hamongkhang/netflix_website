<?php

namespace App\Http\Controllers;

use App\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function postRate(Request $request, $movie_id, $user_id)
    {
        # code...
        $rate = Rate::where('user_id', $user_id)->where('movie_id', $movie_id)->get();
        if ($rate->isEmpty()) {
            # code...

            $rate = new Rate;
            $rate->rate = $request->rate;
            $rate->movie_id = $movie_id;
            $rate->user_id = $user_id;
            $rate->save();
            return redirect()->route('user.movie', $movie_id)->with(['thongbao_level' => 'success', 'thongbao' => '<b>Đánh giá thành công!</b> Cảm ơn bạn.<br>Chúc bạn có những phút giây thư giãn trên <b>MinMovies</b>']);
        } else {
            return redirect()->route('user.movie', $movie_id)->with(['thongbao_level' => 'danger', 'thongbao' => '<b>Bạn đã đánh giá phim!</b> Không nên đánh giá quá nhiều lần!<br><b>Một lần là quá đủ!</b>']);
        }
    }
}
