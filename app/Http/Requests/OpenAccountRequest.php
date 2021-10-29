<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpenAccountRequest extends FormRequest
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
			'fullname' => 'required|max:50',
			'birthday' => 'required',
			'identity_card' => 'required|min:9|max:12',
			'date_permit' => 'required',
			'address_permit' => 'required|max:100',
			'address_full' => 'required|max:150',
			'email' => 'required|email',
			'phone' => ['required', 'regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/'],
			'username_bank' => 'required|max:50',
			'account_number' => 'required|max:50',
			'branch_bank' => 'required|max:100',
			'content' => 'max:100',
		];
	}
	public function messages()
	{
		return [
			'required' => 'Vui lòng nhập :attribute',
			'min' => 'Vui lòng nhập tối thiểu :min ký tự',
			'max' => 'Vui lòng nhập dưới :max ký tự',
			'email' => ':attribute chưa đúng định dạng',
			'numeric' => ':attribute chỉ được nhập số',
			'phone.regex' => 'Số điện thoại không hợp lệ',
		];
	}
	public function attributes()
	{
		return [
			'fullname' => 'tên của bạn',
			'birthday' => 'ngày sinh',
			'identity_card' => 'chứng minh nhân dân',
			'date_permit' => 'ngày cấp',
			'address_permit' => 'nơi cấp',
			'address_full' => 'địa chỉ đầy đủ',
			'email' => 'email',
			'phone' => 'Số điện thoại',
			'username_bank' => 'tên đăng nhập',
			'account_number' => 'số tài khoản',
			'branch_bank' => 'chi nhánh ngân hàng',
			'content' => 'ghi chú',
		];
	}
}
