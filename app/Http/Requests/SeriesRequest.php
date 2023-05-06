<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesRequest extends FormRequest
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
            'seriesName'=>'required|unique:movies,vie_name|max:150',
            'information'=>'required',
            'poster'=>'required',
            'description'=>'required',
            'numberOfMovie'=>'required',
            'director'=>'required',
            'actor'=>'required',
            'year'=>'required',
            'price'=>'required'
        ];
    }

    public function messages()
 {
        # code...
        return [
            'seriesName.required'=>'Bạn vui lòng nhập tên của series!',
            'seriesName.unique'=>'Tên phim bị trùng, bạn vui lòng kiểm tra lại!',
            'seriesName.max'=>'Bạn vui lòng nhập tên phim ít hơn 150 ký tự!',
            'poster.required'=>'Bạn vui lòng tải lên poster!',
            'director.required'=>'Bạn vui lòng nhập tên đạo diễn!',
            'information.required'=>'Bạn vui lòng nhập nội dung phim!',
            'numberOfMovie.required'=>'Bạn vui lòng nhập số lượng tập!',
            'description.required'=>'Bạn vui lòng nhập mô tả!',
            'actor.required'=>'Bạn vui lòng nhập diễn viên!',
            'price.required'=>'Bạn vui lòng nhập giá phim!',
            'year.required'=>'Bạn vui lòng nhập năm sản xuất!',

        ];
    }
}
