<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
			'name' => 'required|max:50',
			'email' => 'required|email',
			'phone' => ['required', 'regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/'],
			'note' => 'max:100',
		];
	}
	public function messages()
	{
		return [
			'required' => 'Vui lòng nhập :attribute',
			'min' => 'Vui lòng nhập tối thiểu :min ký tự',
			'max' => 'Vui lòng nhập dưới :max ký tự',
			'numeric' => 'Vui lòng chỉ được nhập số',
			'email' => ':attribute chưa đúng định dạng',
			'note.max' => 'Vui lòng nhập ghi chú dưới 100 ký tự',
			'name.max' => 'Vui lòng nhập tên của bạn dưới 100 ký tự',
			'phone.regex' => 'Số điện thoại không hợp lệ',
		];
	}
	public function attributes()
	{
		return [
			'name' => 'tên của bạn',
			'email' => 'Email',
			'phone' => 'số điện thoại',
			'note' => 'ghi chú',
		];
	}
}
