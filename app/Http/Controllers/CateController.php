<?php

namespace App\Http\Controllers;

use App\Cate;
use App\Language;
use App\Nation;
use App\Year;
use App\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Http\Requests\EditCateRequest;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getcate($id)
    {
        $language = Language::all();
        $cate = Cate::all();
        $catename = Cate::find($id);
        $nation = Nation::all();
        $year = Year::all();
        $movie = Movie::where('cate_id', $id)->latest()->paginate(24);
        return view('user.cate', compact('id', 'movie', 'cate', 'nation', 'year', 'catename', 'language'));
    }

    public function index()
    {
        $cate= Cate::all();
        return view('admin.cate.list',compact('cate'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.cate.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateRequest $request)
    {
        //
        $cate=new Cate;
        $cate->cate_name=$request->txtCateName;
        $cate->save();
        return redirect()->route('admin.cate.list')->with(['thongbao_level'=>'success','thongbao'=>'Thêm thể loại thành công!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cate  $cate
     * @return \Illuminate\Http\Response
     */
    public function show(Cate $cate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cate  $cate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cate=Cate::find($id);
        return view('admin.cate.edit',compact('cate','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cate  $cate
     * @return \Illuminate\Http\Response
     */
    public function update(EditCateRequest $request, $id)
    {
        //
        $cate=Cate::find($id);
        $cate->cate_name=$request->txtCateName;
        $cate->save();
        return redirect()->route('admin.cate.list')->with(['thongbao_level'=>'success','thongbao'=>'Sửa thể loại thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cate  $cate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate=Cate::find($id);
        $cate->delete();
        return redirect()->route('admin.cate.list')->with(['thongbao_level'=>'success','thongbao'=>'Xoá thể loại thành công!']);
    }
}
