<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditMovieRequest extends FormRequest
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
            'txtViename'=>'required|unique:movies,vie_name,'.$this->segment(4).',id'.'|max:150',
            'txtEngname'=>'required|unique:movies,eng_name,'.$this->segment(4).',id'.'|max:150',
            'txtInfo'=>'required',
            'txtDirector'=>'required',
            'txtPoint'=>'required',
            'txtTime'=>'required',
            'txtQuality'=>'required',
            'txtActor'=>'required',
            'txtTrailer'=>'required',
            'txtServer1'=>'required'
        ];
    }
    public function messages()
    {
        # code...
        return [
            'txtViename.required'=>'Bạn vui lòng nhập tên tiếng Việt của phim!',
            'txtViename.unique'=>'Tên phim bị trùng, bạn vui lòng kiểm tra lại!',
            'txtViename.max'=>'Bạn vui lòng nhập tên phim ít hơn 150 ký tự!',
            'txtEngname.required'=>'Bạn vui lòng nhập tên tiếng Anh của phim!',
            'txtEngname.unique'=>'Tên phim bị trùng, bạn vui lòng kiểm tra lại!',
            'txtEngname.max'=>'Bạn vui lòng nhập tên phim ít hơn 150 ký tự!',
            'txtDirector.required'=>'Bạn vui lòng nhập tên đạo diễn!',
            'txtInfo.required'=>'Bạn vui lòng nhập nội dung phim!',
            'txtPoint.required'=>'Bạn vui lòng nhập điểm phim!',
            'txtTime.required'=>'Bạn vui lòng nhập thời lượng!',
            'txtQuality.required'=>'Bạn vui lòng nhập chất lượng!',
            'txtActor.required'=>'Bạn vui lòng nhập diễn viên!',
            'txtTrailer.required'=>'Bạn vui lòng nhập mã nhúng Trailer!',
            'txtServer1.required'=>'Bạn vui lòng nhập Server 1!',

        ];
    }
}
