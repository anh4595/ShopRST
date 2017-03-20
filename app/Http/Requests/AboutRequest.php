<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'nameabout' => 'required|unique:abouts,name'
        ];
    }

    public function messages()
    {
        return [
            'nameabout.required' => 'Vui lòng nhập tên giới thiệu',
            'nameabout.unique' => 'Tên giới thiệu đã tồn tại'
        ];
    }
}
