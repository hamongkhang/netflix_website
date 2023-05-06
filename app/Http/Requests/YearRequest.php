<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YearRequest extends FormRequest
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
            'txtYear'=>'required|unique:years,year|max:30'
        ];
    }
    public function messages()
    {
        # code...
        return [
            'txtYear.required'=>'Bạn vui lòng nhập năm sản xuất!',
            'txtYear.unique'=>'Năm sản xuất bị trùng, vui lòng kiểm tra lại!',
            'txtYear.max'=>'Vui lòng nhập năm sản xuất ít hơn 30 ký tự!'
        ];
    }
}
