<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlphaSystemRequest extends FormRequest
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
            'image_chart' => 'required|mimes:jpeg,jpg,png,gif|max:10240',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng chọn :attribute',
            'mimes' => 'Vui lòng chọn đúng định dạng ảnh',
            'max' => 'Kích thước :attribute quá lớn (>10MB)',
        ];
    }
    public function attributes()
    {
        return [
            'image_chart' => 'Hình ảnh',
        ];
    }
}
