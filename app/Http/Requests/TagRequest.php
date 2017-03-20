<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'nametag' => 'required|unique:slides,name',
            'namecode' => 'required|unique:slides,id'
        ];
    }

    public function messages()
    {
        return [
            'namecode.required' => 'Vui lòng nhập mã code thẻ tag',
            'namecode.unique' => 'Mã code thẻ tag đã tồn tại',
            'nametag.required' => 'Vui lòng nhập tên thẻ tag',
            'nametag.unique' => 'Tên thẻ tag đã tồn tại'
        ];
    }
}
