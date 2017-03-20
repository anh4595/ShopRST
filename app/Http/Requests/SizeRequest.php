<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SizeRequest extends FormRequest
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
            'namesize' => 'required|unique:sizes,name',
            'namecode' => 'required|unique:sizes,id'
        ];
    }

    public function messages()
    {
        return [
            'namecode.required' => 'Vui lòng nhập mã code size kích thước',
            'namecode.unique' => 'Mã code size kích thước đã tồn tại',
            'namesize.required' => 'Vui lòng nhập kích thước size',
            'namesize.unique' => 'Kích thước size đã tồn tại'
        ];
    }
}
