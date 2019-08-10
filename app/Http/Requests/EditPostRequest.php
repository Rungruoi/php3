<?php

namespace App\Http\Requests;
use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
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
        $reqDate = new DateTime('now');
        $reqDate = $reqDate->modify('0 days');
        return [
            'title'=>'required|max:200',
            'content'=>'required',
            'image'=>'file|mimes:jpeg,png,jpg',
           // 'publish_date' => "after_or_equal:".$reqDate->format('Y-m-d'),
            'auther'=>'required',
            'cate_id'=>'required'
        ];
    }
    public function messages(){

        return [
            'title.required'=>"Tiêu đề không được để trống",
            'title.unique'=>"Tiêu đề đã tồn tại",
            'title.max'=>"Tiêu đề không quá 200 kí tự",
            'content.required'=>"Nhập nội dung cho bài viết của bạn",
            'image.required'=>"Chọn ảnh cho bài viết của bạn",
            'image.file'=>"Định dạng không hợp lệ",
            'image.mimes'=>"Chỉ hỗ trợ file ảnh",
            'publish_date.after_or_equal'=>"Ngày viết không hợp lệ",
            'auther.required'=>"Vui lòng nhập tên tác giả bài viết",
            'cate_id.required'=>"Chọn danh mục cho bài viết của bạn"

        ];

    }
}
