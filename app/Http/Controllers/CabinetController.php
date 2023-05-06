<?php

namespace App\Http\Controllers;

use App\Cabinet;
use App\Nation;
use App\Cate;
use App\Year;
use App\Movie;
use App\Language;
use App\User;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cabinet=Cabinet::all();
        $user=User::all();
        $movie=Movie::all();
        return view('admin.cabinet.list',compact('user','cabinet','movie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function show(Cabinet $cabinet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function edit(Cabinet $cabinet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cabinet $cabinet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cabinet=Cabinet::find($id);
        $cabinet->delete();
        return redirect()->route('admin.cabinet.list')->with(['thongbao_level' => 'success', 'thongbao' => "<b>Xoá tủ phim thành công!</b>"]);

    }

    public function getCabinet()
    {
        $username=session('username_minmovies');
        $cate = Cate::all();
        $nation = Nation::all();
        $language = Language::all();
        $year = Year::all();
        //Lấy user_id
        $user = User::where('username', $username)->first();
        $user_id = $user->id;
        //Lấy tủ phim theo id
        $cabinet = Cabinet::where('user_id', $user_id)->get('movie_id');
        //Đổi thành array để truyền vào movie
        if(!$cabinet->isEmpty())
        {
            foreach ($cabinet as $object) {
                $movie_id[] = $object->toArray();
            }
            //Tìm movie theo movie_id
            $movie = Movie::whereIn('id', $movie_id)->latest()->paginate(24);
            return view('user.cabinet', compact('movie', 'cate', 'nation', 'year', 'language'))->with(['thongbao_level' => 'success', 'thongbao' => "<b>Thêm phim vào tủ thành công!</b>"]);
        }
        else{
            session()->put('thongbaotrong', 'Không có phim nào trong tủ');
            return view('user.cabinet', compact('cate', 'nation', 'year', 'language'));
        }
    }
    public function addCabinet($username, $movie_id)
    {

        $user = User::where('username', $username)->first();
        $cabinet = Cabinet::where('user_id', $user->id)->where('movie_id', $movie_id)->first();
        if ($cabinet) {
            //tra ve trang tu phim
            return redirect()->route('user.getCabinet')->with(['thongbao_level' => 'success', 'thongbao' => "<b>Phim đã có sẳn trong tủ của bạn!</b>"]);
        } else {
            $cabinet = new Cabinet;
            $cabinet->movie_id = $movie_id;
            $cabinet->user_id = $user->id;
            $cabinet->save();
            return redirect()->route('user.getCabinet')->with(['thongbao_level' => 'success', 'thongbao' => "<b>Thêm phim vào tủ thành công!</b>"]);
        }
    }
    public function deleteCabinet($username, $movie_id)
    {
        $cabinet = Cabinet::where('movie_id', $movie_id);
        $cabinet->delete();
        return redirect()->route('user.getCabinet')->with(['thongbao_level' => 'success', 'thongbao' => "<b>Xoá phim khỏi tủ thành công!</b>"]);;
    }
}
