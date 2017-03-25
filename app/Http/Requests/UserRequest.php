<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
           	'username' =>'required',
    		// 'password' => 'required|min:8|max:32'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập tài khoản đăng nhập',
            // 'password.required' => 'Vui lòng nhập mật khẩu đăng nhập',
            // 'password.min' => 'Mật khẩu phải chứa ít nhất 8 kí tự',
			// 'password.max' => 'Mật khẩu phải chứa ít nhất 32 kí tự'
        ];
    }
}
