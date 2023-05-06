<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'txtUsername' => 'unique:users,username,'.$this->segment(4).',id'.'|max:20',
            'txtName' => 'max:30',
            'txtPassword' => 'max:30',
            'txtEmail' => 'max:40'
        ];
    }
    public function messages()
    {
        return [
            'txtUsername.unique' => 'Tài khoản đã tồn tại, bạn vui lòng kiểm tra lại',
            'txtName.max' => 'Bạn vui lòng nhập họ và tên ít hơn 30 ký tự!',
            'txtPassword.max' => 'Bạn vui lòng nhập mật khẩu ít hơn 30 ký tự!',
            'txtEmail.max' => 'Bạn vui lòng nhập Email ít hơn 40 ký tự!'
        ];
    }
}
