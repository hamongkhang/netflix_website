<?php

namespace App\Http\Controllers;

use App\Year;
use App\Nation;
use App\Movie;
use App\Cate;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Requests\YearRequest;
use App\Http\Requests\EditYearRequest;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getyear($id)
    {
        $language = Language::all();
        $cate = Cate::all();
        $yearname = Year::find($id);
        $nation = Nation::all();
        $year = Year::all();
        $movie = Movie::where('year_id', $id)->latest()->paginate(24);
        return view('user.year', compact('id', 'movie', 'cate', 'nation', 'year', 'yearname', 'language'));
    }

    public function index()
    {
        //
        $year=Year::all();
        return view('admin.year.list',compact('year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.year.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(YearRequest $request)
    {
        //
        $year=new Year;
        $year->year=$request->txtYear;
        $year->save();
        return redirect(route('admin.year.list'))->with(['thongbao_level'=>'success','thongbao'=>'Thêm năm sản xuất thành công!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function show(Year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $year=Year::find($id);
        return view('admin.year.edit',compact('year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(EditYearRequest $request, $id)
    {
        //
        $year=Year::find($id);
        $year->year=$request->txtYear;
        $year->save();
        return redirect(route('admin.year.list'))->with(['thongbao_level'=>'success','thongbao'=>'Sửa năm sản xuất thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $year=Year::find($id);
        $year->delete();
        return redirect(route('admin.year.list'))->with(['thongbao_level'=>'success','thongbao'=>'Xoá năm sản xuất thành công!']);
    }
}
