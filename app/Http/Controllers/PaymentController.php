<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Wallet;
use App\User;
use App\Nation;
use App\Cate;
use App\Year;
use App\Movie;
use App\WalletCharge;
use Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function buyMovie($movie_id){
        if(session('username_minmovies'))
        {
            $username=session('username_minmovies');
            $user=User::where('username',$username)->first();
            $user_id=$user->id;
            $wallet=Wallet::where('user_id',$user_id)->first();
            $movie=Movie::find($movie_id);
            if($wallet->money<$movie->price)
                return redirect()->back()->with(['thongbao_level'=>'danger','thongbao'=>"<b>Ví của bạn không đủ khoản dư để mua phim!</b><br>Bạn vui lòng nạp tiền vào ví để mua phim."]);
            else{
                $payment=new Payment();
                $payment->user_id=$user_id;
                $payment->movie_id=$movie_id;
                $payment->save();
                $wallet->money=$wallet->money-$movie->price;
                $wallet->save();
                return redirect()->back()->with(['thongbao_level'=>'success','thongbao'=>"<b>Mua phim thành công!</b><br>Hãy tận hưởng những phút giây thư giản trên <b>MinMovies</b>"]);
            }
        }
    }
    public function paymentList(){
        $user=User::all();
        $payment=Payment::all();
        $movie=Movie::all();
        return view('admin.payment.list',compact('payment','user','movie'));
    }
}
