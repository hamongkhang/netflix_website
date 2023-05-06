<?php

namespace App\Http\Controllers;

use App\User;
use App\Cate;
use App\Nation;
use App\Language;
use App\Movie;
use App\Year;
use App\WalletCharge;
use App\Wallet;
use App\Payment;

use Hash;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\EditUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        return view('admin.user.list', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $user = new User;
        $user->username = $request->txtUsername;
        $user->password = bcrypt($request->txtPassword);
        $user->name = $request->txtName;
        $user->email = $request->txtEmail;
        $user->level = $request->rdoLevel;
        $user->save();

        $wallet = new Wallet();
        $wallet->user_id = $user->id;
        $wallet->money = 0;
        $wallet->save();
        return redirect()->route('admin.user.list')->with(['thongbao_level' => 'success', 'thongbao' => 'Thêm người dùng thành công!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('admin.user.edit', compact('user', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        //
        $user = User::find($id);
        $user->name = $request->txtName;
        $user->username = $request->txtUsername;
        $user->level = $request->rdoLevel;
        if ($request->txtPassword) {
            $user->password = bcrypt($request->txtPassword);
        }
        $user->save();
        return redirect()->route('admin.user.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $wallet = Wallet::where('user_id', $id)->first();
        $wallet->delete();
        $user->delete();
        return redirect()->route('admin.user.list')->with(['thongbao_level' => 'success', 'thongbao' => "Xoá người dùng thành công"]);
    }

    public function getlogin()
    {
        $cate = Cate::all();
        $nation = Nation::all();
        $year = Year::all();
        return view('user.index', compact('cate', 'nation', 'year'));
    }
    public function loginuser(Request $request)
    {
        $arr = ['username' => $request->username, 'password' => $request->password];
        if (Auth::attempt($arr, true)) {
            $user = User::where('username', $request->username)->first();
            $request->session()->put('username_minmovies', $user->username);
            return redirect()->back()->with(['thongbao_level' => 'success', 'thongbao' => "<b>Đăng nhập thành công!</b><br>Hãy tận hưởng những phút giây thư giản trên <b>MinMovies</b>"]);
        } else
            return redirect()->back()->with(['thongbao_level' => 'danger', 'thongbao' => "<b>Đăng nhập thất bại!</b> Bạn vui lòng kiểm tra lại tài khoản và mật khẩu.<br>Hoặc sử dụng chức năng <b>Quên mật khẩu!</b>"]);
    }
    public function logoutuser()
    {
        session()->forget('username_minmovies');
        Auth::logout();
        return redirect()->back()->with(['thongbao_level' => 'success', 'thongbao' => "<b>Đăng xuất thành công!</b>"]);
    }
    public function signupuser(SignupRequest $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = 0;
        $user->save();

        $wallet = new Wallet();
        $wallet->user_id = $user->id;
        $wallet->money = 0;
        $wallet->save();
        return redirect()->back()->with(['thongbao_level' => 'success', 'thongbao' => "<b>Đăng ký tài khoản thành công!</b><br>Mời bạn đăng nhập."]);
    }
    public function getProfile()
    {
        $cate = Cate::all();
        $nation = Nation::all();
        $language = Language::all();
        $year = Year::all();
        $username = session('username_minmovies');
        $user = User::where('username', $username)->first();
        if (session('username_minmovies'))
            return view('user.profile', compact('cate', 'nation', 'language', 'year', 'user'));
    }
    public function postProfile(Request $request)
    {
        $username = session('username_minmovies');
        if ($request->name) {
            $user = User::where('username', $username)->first();
            $user->name = $request->name;
            $user->save();
        }
        if ($request->password && $request->repassword && $request->oldpassword) {
            $user = User::where('username', $username)->first();
            $password = $user->password;
            $oldpassword = $request->oldpassword;
            if (Hash::check($oldpassword, $password)) {
                if ($request->password == $request->repassword) {
                    $user->password = bcrypt($request->password);
                    $user->save();
                } else
                    return redirect()->route('user.getProfile')->with(['thongbao_level' => 'danger', 'thongbao' => "<b>Nhập lại mật khẩu không chính xác!</b><br>Bạn vui lòng kiểm tra lại."]);
            } else
                return redirect()->route('user.getProfile')->with(['thongbao_level' => 'danger', 'thongbao' => "<b>Mật khẩu cũ không chính xác!</b><br>Bạn vui lòng kiểm tra lại."]);
        }
        return redirect()->route('user.getProfile')->with(['thongbao_level' => 'success', 'thongbao' => "<b>Sửa thông tin tài khoản thành công!</b>"]);
    }
    public function historyPayment()
    {
        $cate = Cate::all();
        $nation = Nation::all();
        $year = Year::all();
        $movie = Movie::all();
        $username = session('username_minmovies');
        $user = User::where('username', $username)->first();
        $user_id = $user->id;
        $payment = Payment::where('user_id', $user_id)->paginate(10);
        $walletCharge = WalletCharge::where('user_id', $user_id)->paginate(10);
        return view('user.history', compact('cate', 'nation', 'year', 'movie', 'payment', 'walletCharge'));
    }
}
