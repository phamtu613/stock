<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerCourse;
use App\Http\Requests\BannerCourseRequest;

class BannerCourseController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
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
		$bannerCourse = BannerCourse::find($id);
		return view('admin.pages.banner-course.edit', compact('bannerCourse'));
		// echo "ok";
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(BannerCourseRequest $request, $id)
	{
		$bannerCourse = BannerCourse::find($id);
		$image = $bannerCourse->image;

		// Banner
		if ($request->hasFile('banner')) {
			if (file_exists($image)) {
				unlink($image);
			}

			$file = $request->banner;

			$image = time() . $file->getClientOriginalName();

			// lên host mục uploads
			$path = $file->move('public/uploads', $image);

			// Variable ở DB
			$image = 'public/uploads/' . $image;
		}

		BannerCourse::where('id', $id)->update([
			'name' => $request->input('name'),
			'image' => $image,
		]);

		return redirect()->back()->with('status', 'Cập nhật thông tin Banner thành công');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
