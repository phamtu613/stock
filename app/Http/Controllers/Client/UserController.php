<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterVipRequest;
use Illuminate\Http\Request;
use App\User;
use App\Models\RegisterVip;
use Carbon\Carbon;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// cờ bật form đk
		$flag_reg = false;

		// HSD nhỏ hơn ngày hiện tại => bth => mở đăng ký
		if (Auth::user()->expiration < Carbon::now()) {
			$flag_reg = true;
		}

		return view('client.pages.user', compact('flag_reg'));
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
				'name' => 'required|max:50'
			],
			[
				'required' => 'Vui lòng nhập :attribute',
				'max' => 'Vui lòng nhập dưới :max ký tự',
			],
			[
				'name' => 'tên của bạn',
			]
		);

		User::where('id', Auth::id())->update([
			'name' => $request->name,
		]);

		return redirect()->back()->with('status', 'Cập nhật thông tin thành công');
	}


	// registerVip
	public function registerVip(UserRegisterVipRequest $request)
	{
		User::where('id', Auth::id())->update([
			'phone' => $request->phone,
			'package' => $request->package,
		]);

		return redirect()->back()->with('success', 'Chúc mừng bạn đã đăng ký thành công');
	}
}
