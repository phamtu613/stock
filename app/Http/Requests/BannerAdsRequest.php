<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerAdsRequest extends FormRequest
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
            'name' => 'required|max:200',
            'banner' => 'required|mimes:jpeg,jpg,png,gif|max:10240',
            'position' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
            'max' => 'Vui lòng nhập dưới :max ký tự',
            'mimes' => 'Vui lòng chọn đúng định dạng ảnh',
            'banner.max' => 'Kích thước :attribute quá lớn (>10MB)',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'tên hình ảnh',
            'banner' => 'banner',
            'position' => 'số thứ tự',
        ];
    }
}
