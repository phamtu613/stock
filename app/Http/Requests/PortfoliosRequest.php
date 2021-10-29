<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfoliosRequest extends FormRequest
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
            'link_excel' => 'required',
            'top_stock' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
        ];
    }
    public function attributes()
    {
        return [
            'link_excel' => 'link danh mục',
            'top_stock' => 'link top cổ phiếu',
        ];
    }
}
