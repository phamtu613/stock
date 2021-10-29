<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DailyPostRequest extends FormRequest
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
			'description' => 'required',
			'content' => 'required',
			'num_view' => 'required',
			'image' => 'mimes:jpeg,jpg,png,gif|max:10240',
			'thumbnail' => 'mimes:jpeg,jpg,png,gif|max:10240',
			'category_post' => 'not_in:0',
		];
	}
	public function messages()
	{
		return [
			'required' => 'Vui lòng nhập :attribute',
			'max' => 'Vui lòng nhập dưới :max ký tự',
			'not_in' => 'Vui lòng chọn :attribute',
			'mimes' => 'Vui lòng chọn đúng định dạng ảnh',
			'image.max' => 'Kích thước :attribute quá lớn (>10MB)',
			'thumbnail.max' => 'Kích thước :attribute quá lớn (>10MB)',
		];
	}
	public function attributes()
	{
		return [
			'title' => 'tiêu đề bài viết',
			'description' => 'mô tả bài viết',
			'content' => 'nội dung bài viết',
			'num_view' => 'lượt xem ban đầu',
			'image' => 'ảnh đầu bài viết',
			'thumbnail' => 'ảnh đại diện bài viết',
			'category_post' => 'danh mục bài viêt',
		];
	}
}
