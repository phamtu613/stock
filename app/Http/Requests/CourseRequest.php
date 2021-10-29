<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
			'thumbnail' => 'required|mimes:jpeg,jpg,png,gif|max:10240',
			'info_course' => 'required',
			'curriculum' => 'required',
// 			'price_old' => 'required',
			'price_current' => 'required',
			'type' => 'required',
			'time' => 'required',
			'category_course' => 'not_in:0',
		];
	}
	public function messages()
	{
		return [
			'required' => 'Vui lòng nhập :attribute',
			'max' => 'Vui lòng nhập dưới :max ký tự',
			'not_in' => 'Vui lòng chọn :attribute',
			'mimes' => 'Vui lòng chọn đúng định dạng :attribute',
			'thumbnail.max' => 'Kích thước ảnh quá lớn (>10MB)',
		];
	}
	public function attributes()
	{
		return [
			'title' => 'tiêu đề bài viết',
			'thumbnail' => 'ảnh khóa học',
			'info_course' => 'thông tin khóa học',
			'curriculum' => 'chương trình khóa học',
// 			'price_old' => 'giá cũ',
			'price_current' => 'giá hiện tại',
			'type' => 'loại khóa học',
			'time' => 'thời lượng khóa học',
			'category_course' => 'danh mục khóa học',
		];
	}
}
