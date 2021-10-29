<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryKnowledgeRequest extends FormRequest
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
            'position' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
            'max' => 'Vui lòng nhập dưới :max ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'danh mục',
            'position' => 'số thứ tự',
        ];
    }
}
