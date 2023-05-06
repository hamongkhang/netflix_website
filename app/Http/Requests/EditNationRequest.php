<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNationRequest extends FormRequest
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
            'txtNationName'=>'required|unique:nations,nation_name,'.$this->segment(4).',id'.'|max:30'
        ];
    }
    public function messages()
    {
        # code...
        return [
            'txtNationName.required'=>'Bạn vui lòng nhập tên quốc gia!',
            'txtNationName.unique'=>'Tên quốc gia bị trùng, vui lòng kiểm tra lại!',
            'txtNationName.max'=>'Vui lòng nhập tên quốc gia ít hơn 30 ký tự!'
        ];
    }
}
