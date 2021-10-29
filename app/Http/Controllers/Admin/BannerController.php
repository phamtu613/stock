<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;

class BannerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$banners = Banner::orderBy('id', 'DESC')->paginate(3);
		return view('admin.pages.banner.list', compact('banners'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.pages.banner.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(BannerRequest $request)
	{
		// Banner
		if ($request->hasFile('image')) {
			$file = $request->image;

			// get name file
			$fileName =  time() . $file->getClientOriginalName();

			$path = $file->move('public/uploads', $fileName);
			$image = 'public/uploads/' . $fileName;

			$request->image = $image;
		}

		Banner::create([
			'name' => $request->name,
			'link' => $request->link,
			'image' => $request->image,
			'position' => $request->position
		]);

		return redirect(route('banners.index'))->with('status', 'Thêm banner thành công');
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
		$banner = Banner::find($id);
		return view('admin.pages.banner.edit', compact('banner'));
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
				'name' => 'required|max:200',
				'image' => 'mimes:jpeg,jpg,png,gif|max:10240',
				'position' => 'required',
			],
			[
				'required' => 'Vui lòng nhập :attribute',
				'max' => 'Vui lòng nhập dưới :max ký tự',
				'mimes' => 'Vui lòng chọn đúng định dạng ảnh',
				'image.max' => 'Kích thước :attribute quá lớn (>10MB)',
			],
			[
				'name' => 'tên hình ảnh',
				'image' => 'banner',
				'position' => 'số thứ tự',
			]
		);

		$banner = Banner::find($id);

		$bannerImg = $banner->image;

		if ($request->hasFile('image')) {

			if (file_exists($bannerImg)) {
				unlink($bannerImg);
			}

			$file = $request->image;

			$bannerImg = time() . $file->getClientOriginalName();

			// lên host mục uploads
			$path = $file->move('public/uploads', $bannerImg);

			// Variable ở DB
			$bannerImg = 'public/uploads/' . $bannerImg;
		}

		Banner::where('id', $id)->update([
			'name' => $request->name,
			'link' => $request->link,
			'image' => $bannerImg,
			'position' => $request->position
		]);

		return redirect(route('banners.index'))->with('status', 'Cập nhật banner thành công');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$banner = Banner::find($id);
		$banner->delete();
		return back()->with('status', 'Xóa banner thành công');
	}
}
