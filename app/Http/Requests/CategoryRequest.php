<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category' => 'required|unique:postcategories,name'
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'Vui lòng nhập tên danh mục',
            'category.unique' => 'Tên danh mục đã tồn tại'
        ];
    }
}
