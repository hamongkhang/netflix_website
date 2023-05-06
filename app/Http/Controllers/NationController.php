<?php

namespace App\Http\Controllers;

use App\Cate;
use App\Language;
use App\Nation;
use App\Year;
use App\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\NationRequest;
use App\Http\Requests\EditNationRequest;

class NationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getnation($id)
    {
        $language = Language::all();
        $cate = Cate::all();
        $nationname = Nation::find($id);
        $nation = Nation::all();
        $year = Year::all();
        $movie = Movie::where('nation_id', $id)->latest()->paginate(24);
        return view('user.nation', compact('id', 'movie', 'cate', 'nation', 'year', 'nationname', 'language'));
    }

    public function index()
    {
        //
        $nation=Nation::all();
        return view('admin.nation.list',compact('nation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.nation.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NationRequest $request)
    {
        //
        $nation=new Nation;
        $nation->nation_name=$request->txtNationName;
        $nation->save();
        return redirect()->route('admin.nation.list')->with(['thongbao_level'=>'success','thongbao'=>'Thêm quốc gia thành công!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function show(Nation $nation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $nation=Nation::find($id);
        return view('admin.nation.edit',compact('nation','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function update(EditNationRequest $request, $id)
    {
        //
        $nation=Nation::find($id);
        $nation->nation_name=$request->txtNationName;
        $nation->save();
        return redirect()->route('admin.nation.list')->with(['thongbao_level'=>'success','thongbao'=>'Sửa quốc gia thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $nation=Nation::find($id);
        $nation->delete();
        return redirect()->route('admin.nation.list')->with(['thongbao_level'=>'success','thongbao'=>'Xoá quốc gia thành công']);
    }
}
