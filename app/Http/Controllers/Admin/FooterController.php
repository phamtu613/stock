<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FooterRequest;
use Illuminate\Support\Str;
use App\Models\Footer;

class FooterController extends Controller
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
		$footer = Footer::find($id);
		return view('admin.pages.footer.edit', compact('footer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(FooterRequest $request, $id)
	{

		$Footer = Footer::find($id);
		$imageTrainer1 = $Footer->image_trainer1;
		$imageTrainer2 = $Footer->image_trainer2;
		$imageTrainer3 = $Footer->image_trainer3;
		$imageTrainer4 = $Footer->image_trainer4;

		// Ảnh đại diện trainer 1
		if ($request->hasFile('image_trainer1')) {

			if (file_exists($imageTrainer1)) {
				unlink($imageTrainer1);
			}

			$file = $request->image_trainer1;

			$imageTrainer1 = time() . $file->getClientOriginalName();

			// lên host mục uploads
			$path = $file->move('public/uploads', $imageTrainer1);

			// Variable ở DB
			$imageTrainer1 = 'public/uploads/' . $imageTrainer1;
		}

		// Ảnh đại diện trainer 2
		if ($request->hasFile('image_trainer2')) {

			if (file_exists($imageTrainer2)) {
				unlink($imageTrainer2);
			}

			$file = $request->image_trainer2;

			$imageTrainer2 = time() . $file->getClientOriginalName();

			// lên host mục uploads
			$path = $file->move('public/uploads', $imageTrainer2);

			// Variable ở DB
			$imageTrainer2 = 'public/uploads/' . $imageTrainer2;
		}

		// Ảnh đại diện trainer 3
		if ($request->hasFile('image_trainer3')) {

			if (file_exists($imageTrainer3)) {
				unlink($imageTrainer3);
			}

			$file = $request->image_trainer3;

			$imageTrainer3 = time() . $file->getClientOriginalName();

			// lên host mục uploads
			$path = $file->move('public/uploads', $imageTrainer3);

			// Variable ở DB
			$imageTrainer3 = 'public/uploads/' . $imageTrainer3;
		}

		// Ảnh đại diện trainer 4
		if ($request->hasFile('image_trainer4')) {

			if (file_exists($imageTrainer4)) {
				unlink($imageTrainer4);
			}

			$file = $request->image_trainer4;

			$imageTrainer4 = time() . $file->getClientOriginalName();

			// lên host mục uploads
			$path = $file->move('public/uploads', $imageTrainer4);

			// Variable ở DB
			$imageTrainer4 = 'public/uploads/' . $imageTrainer4;
		}

		Footer::where('id', $id)->update([
			'info_footer' => $request->input('info_footer'),
			'address' => $request->input('address'),
			'fanpage' => $request->input('fanpage'),
			'image_trainer1' => $imageTrainer1,
			'image_trainer2' => $imageTrainer2,
			'image_trainer3' => $imageTrainer3,
			'image_trainer4' => $imageTrainer4,
			'name_trainer1' => $request->input('name_trainer1'),
			'name_trainer2' => $request->input('name_trainer2'),
			'name_trainer3' => $request->input('name_trainer3'),
			'name_trainer4' => $request->input('name_trainer4'),
			'desc_trainer1' => $request->input('desc_trainer1'),
			'desc_trainer2' => $request->input('desc_trainer2'),
			'desc_trainer3' => $request->input('desc_trainer3'),
			'desc_trainer4' => $request->input('desc_trainer4'),
		]);

		return redirect()->back()->with('status', 'Cập nhật thông tin Footer thành công');
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
