<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'name' => 'required:feedbacks,name',
            'email' => 'required:feedbacks,email',
            'subject' => 'required:feedbacks,subject',
            'message' => 'required:feedbacks,message'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên của bạn',
            'email.required' => 'Vui lòng nhập tên email của bạn',
            'subject.required' => 'Vui lòng nhập tên tiêu đề thư của bạn',
            'message.required' => 'Vui lòng nhập nội dung nhận xét của bạn'
        ];
    }
}
