<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\CategoryCourse;
use App\Models\Cart;

class CourseController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$status = $request->input('status');

		//set default list_action
		$list_action = ["delete" => "Xóa tạm thời"];

		if ($status == 'trash') {

			//set list_action with url trash
			$list_action = [
				"restore" => "Khôi phục",
				"forceDelete" => "Xóa vĩnh viễn",
			];

			// $knowledges = Knowledge::onlyTrashed()->get();
			$courses = Course::onlyTrashed()->orderBy('id', 'DESC')->get();
		} else {
			$courses = Course::orderBy('id', 'DESC')->get();
		}

		// Đếm số lượng bảng ghi ko bao gồm thùng rác
		$count_knowledge_active = Course::count();

		// Đếm số lượng bảng ghi thùng rác
		$count_knowledge_trash = Course::onlyTrashed()->count();

		$count = [$count_knowledge_active, $count_knowledge_trash];

		return view('admin.pages.course.list', compact('courses', 'list_action', 'count'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$categoryCourses = CategoryCourse::all();
		return view('admin.pages.course.create', compact('categoryCourses'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CourseRequest $request)
	{
		if ($request->hasFile('thumbnail')) {
			$file = $request->thumbnail;

			// get name file
			$fileName =  time() . $file->getClientOriginalName();

			$path = $file->move('public/uploads', $fileName);
			$thumbnail = 'public/uploads/' . $fileName;

			$request->thumbnail = $thumbnail;
		} else {
			$request->thumbnail = 'public/uploads/no-image.png';
		}

		$admin_id = Auth::guard('admin')->user()->id;

		Course::create([
			'title' => $request->title,
			'slug' => Str::slug($request->title),
			'thumbnail' => $request->thumbnail,
			'info_course' => $request->info_course,
			'curriculum' => $request->curriculum,
			'price_old' => $request->price_old,
			'price_current' => $request->price_current,
			'link_excel' => $request->link_excel,
			'num_student' => $request->num_student,
			'num_star' => $request->num_star,
			'type' => $request->type,
			'time' => $request->time,
			'cate_course_id' => $request->category_course,
			'admin_id' => $admin_id,
		]);

		return redirect(route('courses.index'))->with('status', 'Thêm khóa học thành công');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$course = Course::find($id);
		$categoryCourses = CategoryCourse::all();
		return view('admin.pages.course.edit', compact('course', 'categoryCourses'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$request->validate(
			[
				'title' => 'required|max:200',
				'thumbnail' => 'mimes:jpeg,jpg,png,gif|max:10240',
				'info_course' => 'required',
				'curriculum' => 'required',
				'price_old' => 'required',
				'price_current' => 'required',
				'type' => 'required',
				'time' => 'required',
				'category_course' => 'not_in:0',
			],
			[
				'required' => 'Vui lòng nhập :attribute',
				'max' => 'Vui lòng nhập dưới :max ký tự',
				'not_in' => 'Vui lòng chọn :attribute',
				'mimes' => 'Vui lòng chọn đúng định dạng :attribute',
				'thumbnail.max' => 'Kích thước ảnh quá lớn (>10MB)',
			],
			[
				'title' => 'tiêu đề bài viết',
				'thumbnail' => 'ảnh khóa học',
				'info_course' => 'thông tin khóa học',
				'curriculum' => 'chương trình khóa học',
				'price_old' => 'giá cũ',
				'price_current' => 'giá hiện tại',
				'type' => 'loại khóa học',
				'time' => 'thời lượng khóa học',
				'category_course' => 'danh mục khóa học',
			]
		);
		$course = Course::find($id);
		$thumbnail = $course->thumbnail;

		// Ảnh đại diện khóa học
		if ($request->hasFile('thumbnail')) {

			if (file_exists($thumbnail)) {
				unlink($thumbnail);
			}

			$file = $request->thumbnail;

			// get name file
			$fileName =  time() . $file->getClientOriginalName();

			// to host
			$path = $file->move('public/uploads', $fileName);

			$thumbnail = 'public/uploads/' . $fileName;

			$request->thumbnail = $thumbnail;
		} else {
			$request->thumbnail = $thumbnail;
		}

		Course::where('id', $id)->update([
			'title' => $request->title,
			'slug' => Str::slug($request->title),
			'thumbnail' => $thumbnail,
			'info_course' => $request->info_course,
			'curriculum' => $request->curriculum,
			'price_old' => $request->price_old,
			'price_current' => $request->price_current,
			'link_excel' => $request->link_excel,
			'num_student' => $request->num_student,
			'num_star' => $request->num_star,
			'type' => $request->type,
			'time' => $request->time,
			'cate_course_id' => $request->category_course,
		]);

		return redirect(route('courses.index'))->with('status', 'Cập nhật khóa học thành công');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$data = Course::find($id);
		$data->delete();
		return back()->with('status', 'Xóa khóa học thành công');
	}

	/**
	 * Hành động dropdown
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function action(Request $request)
	{
		$list_check = $request->input('list_check'); // [1,2,3]

		if ($list_check) {
			$action = $request->input('action');

			// Không chọn thì sẽ nhận value bằng giá trị hiển thị
			if ($action == 'Chọn') {
				return redirect()->route('courses.index')->with('error', 'Vui lòng chọn tác vụ để thực hiện');
			}

			if ($action == 'delete') {
			    $listUser = Cart::where('course_id', '=', $list_check)->get();
				foreach ($listUser as $key => $user) {
					Cart::destroy($user->id);
					Cart::onlyTrashed()
					->where('id', $user->id)
					->forceDelete();
				}
				
				Course::destroy($list_check);
				return redirect()->route('courses.index')->with('success', 'Bạn đã xóa thành công');
			}

			if ($action == 'restore') {
				Course::onlyTrashed()
					->where('id', $list_check)
					->restore();
				return redirect()->route('courses.index')->with('success', 'Bạn đã khôi phục thành công');
			}

			if ($action == 'forceDelete') {
				Course::onlyTrashed()
					->where('id', $list_check)
					->forceDelete();
				return redirect()->route('courses.index')->with('success', 'Bạn đã xóa vĩnh viễn thành công');
			}
		} else {
			return back()->with('error', 'Bạn phải chọn khóa học để thao tác');
		}
	}
}
