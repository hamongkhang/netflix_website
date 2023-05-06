<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            'txtCateName'=>'required|unique:cates,cate_name|max:20'
        ];
    }
    public function messages()
    {
        # code...
        return [
            'txtCateName.required'=>'Bạn vui lòng nhập tên thể loại!',
            'txtCateName.unique'=>'Tên thể loại bị trung, vui lòng kiểm tra lại!',
            'txtCateName.max'=>'Vui lòng nhập tên thể loại ít hơn 20 ký tự!'
        ];
    }
}
