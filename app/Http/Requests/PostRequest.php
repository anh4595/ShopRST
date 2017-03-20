<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'namepost' => 'required|unique:posts,name'
        ];
    }

    public function messages()
    {
        return [
            'namepost.required' => 'Vui lòng nhập tên bài viết',
            'namepost.unique' => 'Tên bài viết đã tồn tại'
        ];
    }
}
