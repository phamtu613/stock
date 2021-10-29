<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FooterRequest extends FormRequest
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
			'info_footer' => 'required|max:200',
			'address' => 'required|max:200',
			'fanpage' => 'required',
			'name_trainer1' => 'required|max:30',
			'name_trainer2' => 'required|max:30',
			'name_trainer3' => 'required|max:30',
			'name_trainer4' => 'required|max:30',
			'desc_trainer1' => 'required',
			'desc_trainer2' => 'required',
			'desc_trainer3' => 'required',
			'desc_trainer4' => 'required',
			'image_trainer1' => 'mimes:jpeg,jpg,png,gif|max:10240',
			'image_trainer2' => 'mimes:jpeg,jpg,png,gif|max:10240',
			'image_trainer3' => 'mimes:jpeg,jpg,png,gif|max:10240',
			'image_trainer4' => 'mimes:jpeg,jpg,png,gif|max:10240',
		];
	}
	public function messages()
	{
		return [
			'required' => 'Vui lòng nhập :attribute',
			'max' => 'Vui lòng nhập dưới :max ký tự',
			'mimes' => 'Vui lòng chọn đúng định dạng ảnh',
			'image_trainer1.max' => 'Kích thước :attribute quá lớn (>10MB)',
			'image_trainer2.max' => 'Kích thước :attribute quá lớn (>10MB)',
			'image_trainer3.max' => 'Kích thước :attribute quá lớn (>10MB)',
			'image_trainer4.max' => 'Kích thước :attribute quá lớn (>10MB)',
		];
	}
	public function attributes()
	{
		return [
			'info_footer' => 'giới thiệu footer',
			'address' => 'địa chỉ',
			'fanpage' => 'fanpage',
			'name_trainer1' => 'tên trainer1',
			'name_trainer2' => 'tên trainer2',
			'name_trainer3' => 'tên trainer3',
			'desc_trainer1' => 'mô tả trainer1',
			'desc_trainer2' => 'mô tả trainer2',
			'image_trainer1' => 'ảnh đại diện trainer1',
			'image_trainer2' => 'ảnh đại diện trainer2',
			'image_trainer3' => 'ảnh đại diện trainer3',
		];
	}
}
