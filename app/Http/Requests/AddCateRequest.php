<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCateRequest extends FormRequest
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
            'name'=>'required|unique:categories|max:16',
            'description'=>'required'
            
        ];
    }
    public function messages(){
        return [
            'name.required'=>"Tên danh mục không được để trống",
            'name.unique'=>"Tên danh mục đã tồn tại!",
            'name.max'=>"Tên danh mục không quá  16 kí tự",
            'description.required'=>"Nhập nội dung cho description"
        ];

    }
}

