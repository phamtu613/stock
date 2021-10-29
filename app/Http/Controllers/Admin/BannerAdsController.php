<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerAds;
use App\Http\Requests\BannerAdsRequest;

class BannerAdsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$bannerAds = BannerAds::orderBy('id', 'DESC')->paginate(10);
		return view('admin.pages.banner-ads.list', compact('bannerAds'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.pages.banner-ads.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(BannerAdsRequest $request)
	{
		// Banner
		if ($request->hasFile('banner')) {
			$file = $request->banner;

			// get name file
			$fileName =  time() . $file->getClientOriginalName();

			$path = $file->move('public/uploads', $fileName);
			$image = 'public/uploads/' . $fileName;

			$request->image = $image;
		}

		BannerAds::create([
			'name' => $request->name,
			'link' => $request->link,
			'image' => $request->image,
			'position' => $request->position
		]);

		return redirect(route('banner-ads.index'))->with('status', 'Thêm banner thành công');
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
		$bannerAds = BannerAds::find($id);
		return view('admin.pages.banner-ads.edit', compact('bannerAds'));
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
				'position' => 'required',
				'image' => 'mimes:jpeg,jpg,png,gif|max:10240'
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

		$bannerAds = BannerAds::find($id);

		$banner = $bannerAds->image;

		if ($request->hasFile('banner')) {

			if (file_exists($banner)) {
				unlink($banner);
			}

			$file = $request->banner;

			$banner = time() . $file->getClientOriginalName();

			// lên host mục uploads
			$path = $file->move('public/uploads', $banner);

			// Variable ở DB
			$banner = 'public/uploads/' . $banner;
		}

		BannerAds::where('id', $id)->update([
			'name' => $request->name,
			'link' => $request->link,
			'image' => $banner,
			'position' => $request->position
		]);

		return redirect(route('banner-ads.index'))->with('status', 'Cập nhật banner thành công');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$data = BannerAds::find($id);
		$data->delete();
		return redirect()->route('banner-ads.index')->with('status', 'Xóa user thành công');
	}
}
