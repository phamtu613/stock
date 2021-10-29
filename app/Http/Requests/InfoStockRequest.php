<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoStockRequest extends FormRequest
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
			'phone1' => ['required', 'regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/'],
			'phone2' => ['required', 'regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/'],
			'phone2' => 'required|max:11|min:10',
			'email' => 'required|max:50',
			'facebook' => 'required|max:100',
			'map' => 'required',
		];
	}
	public function messages()
	{
		return [
			'required' => 'Vui lòng nhập :attribute',
			'max' => 'Vui lòng nhập dưới :max ký tự',
			'min' => 'Vui lòng nhập tối thiểu :min ký tự',
			'phone1.regex' => 'Số điện thoại không hợp lệ',
			'phone2.regex' => 'Số điện thoại không hợp lệ',
		];
	}
	public function attributes()
	{
		return [
			'phone1' => 'liên hệ 1',
			'phone2' =>  'liên hệ 2',
			'email' =>  'email',
			'facebook' =>  'địa chỉ facebook',
			'map' => 'bản đồ trang web',
		];
	}
}
