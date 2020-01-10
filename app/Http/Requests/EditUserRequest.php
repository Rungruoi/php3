<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        'name' => 'required|min:2|max:190',
        'email' =>['bail','required','email','max:255',
        Rule::unique('users')->ignore($this->id)],
        'address'=>'bail|required',
        'numberphone'=>'bail|required|min:10|max:11|regex:/[0-9]/',
        ];
    }
    public function messages(){
    return [
        'name.required'=>"Nhập tên tài khoản",
        'name.min'=>"Tên tài khoản dài hơn 2 ký tự",
        'email.required'=>"Email không được để trống",
        'email.email'=>"Nhập đúng định dạng email",
        'email.unique'=>"Email tài khoản đã tồn tại",
        'address.required'=>"Nhập địa chỉ của bạn",
        'numberphone'=>"Nhập số điện thoại",
        'numberphone.integer'=>"Nhập đúng định dạng số điện thoại",
        'numberphone.min'=>"Nhập đúng định dạng số điện thoại",
        'numberphone.max'=>"Nhập đúng số dạng điện thoại",
        'numberphone.regex'=>"Số điện thoại không đúng định dạng",

    ];
}

    
}
