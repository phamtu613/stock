<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerMarketDaily;
use App\Http\Requests\BannerMarketDailyRequest;

class BannerMarketDailyController extends Controller
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
		$bannerMarketdaily = BannerMarketDaily::find($id);
		return view('admin.pages.banner-marketdaily.edit', compact('bannerMarketdaily'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(BannerMarketDailyRequest $request, $id)
	{
		$bannerMarketDaily = BannerMarketDaily::find($id);
		$image = $bannerMarketDaily->image;

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

		BannerMarketDaily::where('id', $id)->update([
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
