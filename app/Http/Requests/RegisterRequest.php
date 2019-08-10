<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'bail|required|min:4|max:190',
            'email' =>'bail|required|email|max:255|unique:users',
            'password' => 'bail|required|min:6',
            'repass'=>'same:password',
            'checkbox'=>'required',
        ];
    }
    public function messages(){
        return [
            
            'name.required'=>"Tên tài khoản không được để trống",
            'name.alpha'=>"Tên không được nhập số",
            'email.required'=>"Email không được để trống",
            'email.string'=>"Nhập đúng định dạng email",
            'email.max'=>"Email không quá 255 ký tự",
            'email.unique'=>"Email tài khoản đã tồn tại!",
            'password.required'=>"Mật khẩu không được để trống",
            'password.min'=>"Mật khẩu phải nhiều hơn 6 ký tự",
            'repass.same'=>"Mật khẩu không trùng khớp",
            'checkbox.required'=>"Vui lòng chấp nhận điều khoản"

        ];
    }
}
