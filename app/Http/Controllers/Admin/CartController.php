<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Admin;

class CartController extends Controller
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
		$list_action = [
			'payment' => 'Đã thanh toán',
			'not_payment' => 'Chưa thanh toán',
			'delete' => 'Xóa tạm thời',
		];

		if ($status == 'trash') {

			//set list_action with url trash
			$list_action = [
				"restore" => "Khôi phục",
				"forceDelete" => "Xóa vĩnh viễn",
			];

			$carts = Cart::onlyTrashed()->get();
		} else {
			$carts = Cart::orderBy('id', 'DESC')->get();
		}

		// Đếm số lượng bảng ghi ko bao gồm thùng rác
		$count_register_active = Cart::count();

		// Đếm số lượng bảng ghi thùng rác
		$count_register_trash = Cart::onlyTrashed()->count();

		$count = [$count_register_active, $count_register_trash];

		$listAdmins = Admin::orderBy('id', 'DESC')->get();

		return view('admin.pages.cart.list', compact('carts', 'list_action', 'listAdmins', 'count'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
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
		$cart = Cart::find($id);
		$admins = Admin::all();
		return view('admin.pages.cart.edit', compact('cart', 'admins'));
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
		// Cart::where('id', $id)->update([
		// 	'status_payment' => $request->input('status_payment'),
		// 	'admin_id' => $request->input('admin_id')
		// ]);

		// return redirect(route('carts.index'))->with('status', 'Cập nhật đơn đăng ký thành công');
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

	// action status Register Course
	public function actionStatusRegisterCourse(Request $request)
	{
		$action = $request->input('action');
		$adminUpdate = $request->input('admin-update');
		$list_check = $request->input('list_check');

		if ($list_check) {
			if ($action == 'Chọn trạng thái') {
				return back()->with('error', 'Bạn phải chọn tác vụ để thao tác');
			}

			if ($action == 'payment') {
				if ($adminUpdate == 'Admin cập nhật') {
					return back()->with('error', 'Bạn phải chọn admin cập nhật');
				}
				Cart::whereIn('id', $list_check)->update(['status_payment' => 'Đã thanh toán', 'admin_id' => $adminUpdate]);
				return redirect()->route('carts.index')->with('status', 'Bạn đã cập nhật trạng thái thành công');
			}

			if ($action == 'not_payment') {
				Cart::whereIn('id', $list_check)->update(['status_payment' => 'Chưa thanh toán', 'admin_id' => null]);
				return redirect()->route('carts.index')->with('status', 'Bạn đã cập nhật trạng thái thành công');
			}

			if ($action == 'delete') {
				Cart::whereIn('id', $list_check)->update(['admin_id' => $adminUpdate]);
				Cart::destroy($list_check);;
				return redirect()->route('carts.index')->with('status', 'Bạn đã xóa thành công');
			}

			if ($action == 'restore') {
				if ($adminUpdate == 'Admin cập nhật') {
					return back()->with('error', 'Bạn phải chọn admin cập nhật');
				}
				Cart::onlyTrashed()->whereIn('id', $list_check)->update(['admin_id' => $adminUpdate]);
				Cart::onlyTrashed()
					->whereIn('id', $list_check)
					->restore();
				return redirect()->route('carts.index')->with('success', 'Bạn đã khôi phục thành công');
			}

			if ($action == 'forceDelete') {
				Cart::onlyTrashed()
					->whereIn('id', $list_check)
					->forceDelete();
				return redirect()->route('carts.index')->with('success', 'Bạn đã xóa vĩnh viễn thành công');
			}
		} else {
			return back()->with('error', 'Bạn phải chọn user để thao tác');
		}
	}
}
