<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name'=>'required|unique:product',
            'slug'=>'required|max:56',
            'description'=>'required',
            'feature_image'=>'required|file|mimes:jpeg,png,jpg',
            'price'=>'required|integer|regex:/[1-9]/|between:0,999'
 

        ];
    }
    public function messages(){
        return [
            'name.required'=>"Tên sản phẩm không được để trống",
            'name.unique'=>"Tên sản phẩm đã tồn tại mời chọn tên khác",
            'slug.required'=>"Tiêu đề Seo cho sản phẩm",
            'slug.max'=>"Tiêu đề SEO tối đa 56 kí tự",
            'description.required'=>"Nhập mô tả sản phẩm của bạn",
            'feature_image.required'=>"Chọn ảnh cho sản phẩm",
            'feature_image.file'=>"Định dạng file không hợp lệ",
            'feature_image.mimes'=>"Định dạng file không hợp lệ",
            'price.required'=>"Giá sản phẩm không được để trống",
            'price.integer'=>"Giá sản phẩm phải làm tròn",
            'price.regex'=>"Giá sản phẩm phải lớn hơn 0",
            'price.between'=>"Giá sản phẩm không hợp lệ"


        ];

    }
}
