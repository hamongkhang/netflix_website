<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'username'=>'unique:users,username',
            'email'=>'unique:users,email'
        ];
    }
    public function messages()
    {
        return [
            //
            'username.unique'=>"<b>Tài khoản đã tồn tại.</b> Bạn vui lòng kiểm tra lại!<br>Hoặc sử dụng chức năng <b>Quên mật khẩu!</b>",
            'email.unique'=>"<b>Email đã đăng ký tài khoản.</b> Bạn vui lòng kiểm tra lại!<br>Hoặc sử dụng chức năng <b>Quên mật khẩu!</b>"
        ];
    }
}
