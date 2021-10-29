<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostAdvisoryInvest;
use App\Models\CateAdvisoryInvest;
use Illuminate\Support\Str;
use App\Http\Requests\PostAdvisoryInvestRequest;

class PostAdvisoryInvestsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$postAdvisoryInvests = PostAdvisoryInvest::orderBy('id', 'DESC')->get();
		return view('admin.pages.advisory-invests.list', compact('postAdvisoryInvests'));
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
		$advisoryInvest = PostAdvisoryInvest::find($id);

		$cateAdvisoryInvest = CateAdvisoryInvest::all();

		return view('admin.pages.advisory-invests.edit', compact('advisoryInvest', 'cateAdvisoryInvest'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(PostAdvisoryInvestRequest $request, $id)
	{
		$postAdvisoryInvest = PostAdvisoryInvest::find($id);
		$postAdvisoryInvestThumbnail = $postAdvisoryInvest->thumbnail;

		if ($request->hasFile('thumbnail')) {

			if (file_exists($postAdvisoryInvestThumbnail)) {
				unlink($postAdvisoryInvestThumbnail);
			}

			$file = $request->thumbnail;

			$postAdvisoryInvestThumbnail = time() . $file->getClientOriginalName();

			// lên host mục uploads
			$path = $file->move('public/uploads', $postAdvisoryInvestThumbnail);

			// Variable ở DB
			$postAdvisoryInvestThumbnail = 'public/uploads/' . $postAdvisoryInvestThumbnail;
		}

		PostAdvisoryInvest::where('id', $id)->update([
			'title' => $request->title,
			'keyword' => $request->keyword,
			'slug' => Str::slug($request->title),
			'content' => $request->content,
			'thumbnail' => $postAdvisoryInvestThumbnail,
			'num_view' => $request->num_view,
			'keyword' => $request->keyword,
		]);

		return redirect()->route('post-advisory-invests.index')->with('success', 'Cập nhật bài viết thành công');
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
