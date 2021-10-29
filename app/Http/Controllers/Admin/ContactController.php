<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Contact;

class ContactController extends Controller
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
			'contact' => 'Đã liên hệ',
			'not_contact' => 'Chưa liên hệ',
			'delete' => 'Xóa tạm thời',
		];

		if ($status == 'trash') {

			//set list_action with url trash
			$list_action = [
				"restore" => "Khôi phục",
				"forceDelete" => "Xóa vĩnh viễn",
			];

			$contacts = Contact::onlyTrashed()->get();
		} else {
			$contacts = Contact::orderBy('id', 'DESC')->get();
		}

		// Đếm số lượng bảng ghi ko bao gồm thùng rác
		$count_register_active = Contact::count();

		// Đếm số lượng bảng ghi thùng rác
		$count_register_trash = Contact::onlyTrashed()->count();

		$count = [$count_register_active, $count_register_trash];

		$listAdmins = Admin::orderBy('id', 'DESC')->get();

		return view('admin.pages.contact.list', compact('contacts', 'list_action', 'listAdmins', 'count'));
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
		$contact = Contact::find($id);
		return view('admin.pages.contact.edit', compact('contact'));
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
		Contact::where('id', $id)->update([
			'status_contact' => $request->input('status_contact')
		]);

		return redirect(route('contacts.index'))->with('status', 'Cập nhật trạng thái thành công');
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

	// action status registerContact
	public function actionStatusRegisterContact(Request $request)
	{
		$action = $request->input('action');
		$adminUpdate = $request->input('admin-update');
		$list_check = $request->input('list_check');

		if ($list_check) {
			if ($action == 'Chọn trạng thái') {
				return back()->with('error', 'Bạn phải chọn tác vụ để thao tác');
			}

			if ($action == 'contact') {
				if ($adminUpdate == 'Admin cập nhật') {
					return back()->with('error', 'Bạn phải chọn admin cập nhật');
				}
				Contact::whereIn('id', $list_check)->update(['status_contact' => 'Đã liên hệ', 'admin_id' => $adminUpdate]);
				return redirect()->route('contacts.index')->with('status', 'Bạn đã cập nhật trạng thái thành công');
			}

			if ($action == 'not_contact') {
				Contact::whereIn('id', $list_check)->update(['status_contact' => 'Chưa liên hệ', 'admin_id' => null]);
				return redirect()->route('contacts.index')->with('status', 'Bạn đã cập nhật trạng thái thành công');
			}

			if ($action == 'delete') {
				if ($adminUpdate == 'Admin cập nhật') {
					return back()->with('error', 'Bạn phải chọn admin cập nhật');
				}
				Contact::whereIn('id', $list_check)->update(['admin_id' => $adminUpdate]);
				Contact::destroy($list_check);;
				return redirect()->route('contacts.index')->with('status', 'Bạn đã xóa thành công');
			}

			if ($action == 'restore') {
				if ($adminUpdate == 'Admin cập nhật') {
					return back()->with('error', 'Bạn phải chọn admin cập nhật');
				}
				Contact::onlyTrashed()->whereIn('id', $list_check)->update(['admin_id' => $adminUpdate]);
				Contact::onlyTrashed()
					->whereIn('id', $list_check)
					->restore();
				return redirect()->route('contacts.index')->with('success', 'Bạn đã khôi phục thành công');
			}

			if ($action == 'forceDelete') {
				Contact::onlyTrashed()
					->whereIn('id', $list_check)
					->forceDelete();
				return redirect()->route('contacts.index')->with('success', 'Bạn đã xóa vĩnh viễn thành công');
			}
		} else {
			return back()->with('error', 'Bạn phải chọn user để thao tác');
		}
	}
}
