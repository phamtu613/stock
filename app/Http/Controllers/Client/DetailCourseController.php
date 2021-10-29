<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\CartRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\CourseMail;

class DetailCourseController extends Controller
{
	public function courseDetail($slug, $id)
	{
		$course = Course::where('id', $id)->first();
		// dd($course);

		return view('client.pages.detail-course', compact('course'));
	}


	public function registerCourse(CartRequest $request, $idCourse)
	{
		Cart::create([
			'name' => $request->name,
			'email' => $request->email,
			'phone' => $request->phone,
			'note' => $request->note,
			'course_id' => $idCourse,
		]);

		$course = Course::where('id', $idCourse)->first();

		$data = [
			'name' => $request->name,
			'email' => $request->email,
			'phone' => $request->phone,
			'note' => $request->note,
			'course_name' => $course->title,
			'course_price' => $course->price_current
		];

		// Gửi mail
		Mail::to($request->email)->cc(['hotro@alphastock.vn'])->send(new CourseMail($data));

		return redirect()->back()->with('status', 'Chúc mừng bạn đã đăng ký thành công. Vui lòng kiểm tra email vừa nhập để hoàn tất đăng ký!');
	}
}
