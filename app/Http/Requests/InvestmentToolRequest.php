<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestmentToolRequest extends FormRequest
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
            'title' => 'required|max:200',
            'content' => 'required',
            'num_view' => 'required',
            'thumbnail' => 'mimes:jpeg,jpg,png,gif|max:10240',
            
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
            'max' => 'Vui lòng nhập dưới :max ký tự',
            'mimes' => 'Vui lòng chọn đúng định dạng ảnh',
            'thumbnail.max' => 'Kích thước ::attribute quá lớn (>10MB)',
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'tiêu đề bài viết',
            'content' => 'nội dung bài viết',
            'num_view' => 'lượt xem ban đầu',
            'thumbnail' => 'ảnh bài viết',
        ];
    }
}
