<?php

namespace App\Http\Controllers\Auth;

use App\Cate;
use App\Nation;
use App\User;
use App\Year;
use App\RecoverPassword;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Str;
use Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function getrecoverpassword()
    {
        $cate = Cate::all();
        $nation = Nation::all();
        $year = Year::all();
        return view('user.recoverpassword', compact('cate', 'nation', 'year'));
    }
    public function postrecoverpassword(Request $request)
    {
        $result = User::where('email', $request->email)->first();
        if ($result) {
            $email = $request->email;
            $resetpassword = RecoverPassword::firstOrCreate(['email' => $request->email, 'token' => Str::random(60)]);
            $token = RecoverPassword::where('email', $request->email)->first();
            $link = url('checkrecover') . "/" . $token->token; //send it to email
            //Send mail
            $data = array('info' => $link, 'email' => $email);
            Mail::send('user.user_layout.mail', $data, function ($message) use ($email) {
                $message->from('vcb000111@gmail.com', 'MinMovies@no-reply');
                $message->to($email, 'Visitor')->subject('Email khôi phục tài khoản MinMovies!');
            });
            return redirect()->route('user.index')->with(['thongbao_level' => 'success', 'thongbao' => "<b>Liên kết khôi phục tài khoản đã được gửi đến Email của bạn!</b><br>Bạn vui lòng kiểm tra Email."]);

        } else
            return redirect()->back()->with(['thongbao_level' => 'danger', 'thongbao' => "<b>Email chưa đăng ký tài khoản!</b><br>Bạn vui lòng kiểm tra lại."]);
    }
    public function checkrecover(Request $request, $token)
    {
        $cate = Cate::all();
        $nation = Nation::all();
        $year = Year::all();
        // Check token valid or not
        $result = RecoverPassword::where('token', $request->token)->first();
        $user=User::where('email',$result->email)->first();
        $data = ['email' => $result->email, 'info' => $result->token,'username'=>$user->username];
        if ($result) {
            return view('user.recoverNewPassword', compact('data', 'cate', 'nation', 'year'));
        } else {
            return redirect()->route('user.checkrecover', $token)->with(['thongbao_level' => 'danger', 'thongbao' => "<b>Sai thông tin khôi phục!</b><br>Bạn vui lòng kiểm tra lại."]);
        }
    }
    public function postRecoverNewPassword(Request $request, $token)
    {
        $cate = Cate::all();
        $nation = Nation::all();
        $year = Year::all();
        $result = RecoverPassword::where('token', $request->token)->first();
        $email = $result->email;
        if ($result) {
            if ($request->password == $request->repassword) {
                $user = User::where('email', $email)->first();
                $user->password = bcrypt($request->password);
                $user->save();
                return redirect()->route('user.index')->with(['thongbao_level' => 'success', 'thongbao' => "<b>Khôi phục mật khẩu thành công!</b><br>Hãy tận hưởng những phút giây thư giản trên <b>MinMovies</b>"]);
            } else
                return redirect()->route('user.checkrecover', $token)->with(['thongbao_level' => 'danger', 'thongbao' => "<b>Nhập lại mật khẩu không chính xác!</b><br>Bạn vui lòng kiểm tra lại!"]);
        }
    }
}
