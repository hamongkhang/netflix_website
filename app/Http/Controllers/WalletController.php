<?php

namespace App\Http\Controllers;

use App\Wallet;
use App\User;
use App\Nation;
use App\Cate;
use App\Year;
use App\WalletCharge;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function getWallet()
    {
        $cate = Cate::all();
        $nation = Nation::all();
        $year = Year::all();
        $username=session('username_minmovies');
        $user=User::where('username',$username)->first();
        $user_id=$user->id;
        $wallet=Wallet::all();
        $walletCharge=WalletCharge::where('user_id',$user_id)->paginate(10);
        return view('user.wallet', compact('cate', 'nation', 'year','user','wallet','walletCharge'));
    }
    public function getChargeWallet()
    {
        $cate = Cate::all();
        $nation = Nation::all();
        $year = Year::all();
        return view('user.chargeWallet', compact('cate', 'nation', 'year'));
    }
    public function postChargeWallet(Request $request)
    {
        $username = session('username_minmovies');
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/webxemphim/wallet/saveChargeWallet/".$username;
        $vnp_TmnCode = "NPEH7523"; //Mã website tại VNPAY
        $vnp_HashSecret = "JECUMZPPNSAXSMLSGJGJTHJMKJBRYHRT"; //Chuỗi bí mật

        $vnp_TxnRef = date('YmdHis'); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Nạp tiền vào ví";
        $vnp_OrderType = "250006";
        $vnp_Amount = $request->amount * 100;
        $vnp_Locale = "vn";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function saveChargeWallet($username)
    {
        /*
        * IPN URL: Ghi nhận kết quả thanh toán từ VNPAY
        * Các bước thực hiện:
        * Kiểm tra checksum
        * Tìm giao dịch trong database
        * Kiểm tra tình trạng của giao dịch trước khi cập nhật
        * Cập nhật kết quả vào Database
        * Trả kết quả ghi nhận lại cho VNPAY
        */
        $username = session('username_minmovies');
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_TmnCode = "NPEH7523"; //Mã website tại VNPAY
        $vnp_HashSecret = "JECUMZPPNSAXSMLSGJGJTHJMKJBRYHRT"; //Chuỗi bí mật
        $inputData = array();
        $returnData = array();
        $data = $_REQUEST;
        foreach ($data as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . $key . "=" . $value;
            } else {
                $hashData = $hashData . $key . "=" . $value;
                $i = 1;
            }
        }
        $vnpTranId = $inputData['vnp_TransactionNo']; //Mã giao dịch tại VNPAY
        $vnp_BankCode = $inputData['vnp_BankCode']; //Ngân hàng thanh toán
        $secureHash = hash('sha256', $vnp_HashSecret . $hashData);
        $Status = 0;
        $orderId = $inputData['vnp_TxnRef'];
        $amount = $inputData['vnp_Amount'];

        try {
            //Check Orderid
            //Kiểm tra checksum của dữ liệu
            if ($secureHash == $vnp_SecureHash) {
                //Cài đặt Code cập nhật kết quả thanh toán, tình trạng đơn hàng vào DB
                //
                $user = User::where('username', $username)->first();
                $user_id = $user->id;
                $wallet = Wallet::where('user_id', $user_id)->first();
                $wallet_id = $wallet->id;
                $wallet_charge = new WalletCharge();
                $wallet_charge->user_id = $user_id;
                $wallet_charge->wallet_id = $wallet_id;
                $wallet_charge->orderId = $orderId;
                $wallet_charge->money = $amount / 100;
                $wallet_charge->save();
                $wallet->money = $wallet->money + ($amount / 100);
                $wallet->save();
                //
                //Trả kết quả về cho VNPAY: Website TMĐT ghi nhận yêu cầu thành công
                $returnData['RspCode'] = '00';
                $returnData['Message'] = 'Confirm Success';
                $thongbao_level = 'success';
                $thongbao = "<b>Nạp tiền vào ví thành công!</b>";
            } else {
                $returnData['RspCode'] = '97';
                $returnData['Message'] = 'Chu ky khong hop le';
                $thongbao_level = 'danger';
                $thongbao = "<b>Nạp tiền vào ví thất bại!</b>";
            }
        } catch (Exception $e) {
            $returnData['RspCode'] = '99';
            $returnData['Message'] = 'Unknow error';
            $thongbao_level = 'danger';
            $thongbao = "<b>Nạp tiền vào ví thất bại!</b>";
        }
        return redirect()->route('user.getWallet')->with(['thongbao_level'=>$thongbao_level,'thongbao'=>$thongbao]);
    }
    public function walletCharge(){
        $user=User::all();
        $walletCharge=WalletCharge::all();
        return view('admin.wallet_charge.list',compact('walletCharge','user'));
    }
}
