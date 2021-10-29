<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
			'email' => 'required|max:500|email',
			'password' => 'required|max:200',
			'address' => 'required|max:250',
			'desc' => 'required|max:500',
			'facebook' => 'required|max:255',
			'zalo' => 'required|max:255',
			'avatar' => 'required|mimes:jpeg,jpg,png,gif|max:10240',
			'role' =>	'not_in:0',
		];
	}
	public function messages()
	{
		return [
			'required' => 'Vui lòng nhập :attribute',
			'max' => 'Vui lòng nhập dưới :max ký tự',
			'mimes' => 'Vui lòng chọn đúng định dạng ảnh',
			'avatar.max' => 'Kích thước :attribute quá lớn (>10MB)',
			'not_in' => 'Vui lòng chọn :attribute',
			'email' => 'Vui lòng nhập đúng định dạng email',
		];
	}
	public function attributes()
	{
		return [
			'name' => 'tên admin',
			'email' => 'email',
			'password' => 'mật khẩu',
			'address' => 'địa chỉ',
			'desc' => 'mô tả',
			'facebook' => 'facebook',
			'zalo' => 'zalo',
			'avatar' => 'hình đại diện',
			'role' =>	'quyền',
		];
	}
}
