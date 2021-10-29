<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\User;
use App\Models\InvestmentConsulting;
use App\Models\InvestmentTrust;
use App\Models\OpenAccount;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
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
		$list_action = ["delete" => "Xóa tạm thời"];

		if ($status == 'trash') {
			//set list_action with url trash
			$list_action = [
				"restore" => "Khôi phục",
				"forceDelete" => "Xóa vĩnh viễn",
			];

			$users = User::onlyTrashed()->get();
		} else {
			$users = User::orderBy('id', 'DESC')->get();
		}

		// Đếm số lượng bảng ghi ko bao gồm thùng rác
		$count_user_active = User::count();

		// Đếm số lượng bảng ghi thùng rác
		$count_user_trash = User::onlyTrashed()->count();

		$count = [$count_user_active, $count_user_trash];

		$timeCurrent = Carbon::now();

		return view('admin.pages.user.list', compact('users', 'list_action', 'count', 'timeCurrent'));
	}

	/**
	 * Hành động dropdown user
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function action(Request $request)
	{
		$list_check = $request->input('list_check'); // [1,2,3]

		if ($list_check) {
			$action = $request->input('action');

			// Không chọn thì sẽ nhận value bằng giá trị hiển thị
			if ($action == 'Chọn') {
				return redirect()->route('users.index')->with('error', 'Vui lòng chọn tác vụ để thực hiện');
			}

			if ($action == 'delete') {
				User::destroy($list_check);
				return redirect()->route('users.index')->with('status', 'Bạn đã xóa thành công');
			}

			if ($action == 'restore') {
				User::onlyTrashed()
					->whereIn('id', $list_check)
					->restore();
				return redirect()->route('users.index')->with('status', 'Bạn đã khôi phục thành công');
			}

			if ($action == 'forceDelete') {
				User::onlyTrashed()
					->whereIn('id', $list_check)
					->forceDelete();
				return redirect()->route('users.index')->with('status', 'Bạn đã xóa vĩnh viễn thành công');
			}
		} else {
			return back()->with('error', 'Bạn phải chọn user để thao tác');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$data = User::find($id);
		$data->delete();
		return redirect()->route('users.index')->with('status', 'Xóa user thành công');
	}

	// get RegisterVip
	public function getRegisterVip(Request $request)
	{
		$status = $request->input('status');

		$list_action = [
			'paid' => 'Đã thanh toán',
			'unpaid' => 'Chưa thanh toán',
			'delete' => 'Xóa',
		];

		if ($status == 'trash') {
			//set list_action with url trash
			$list_action = [
				"restore" => "Khôi phục",
				"forceDelete" => "Xóa vĩnh viễn",
			];
			$registerVips = User::where('phone', '<>', '')->where('deleted_vip', '1')->orderBy('id', 'DESC')->get();
		} else {
			$registerVips = User::where('phone', '<>', '')->where('deleted_vip', '0')->orderBy('id', 'DESC')->get();
		}

		// Đếm số lượng bảng ghi ko bao gồm thùng rác
		$count_register_vip_active = count(User::where('phone', '<>', '')->where('deleted_vip', '0')->orderBy('id', 'DESC')->get());

		// Đếm số lượng bảng ghi thùng rác
		$count_register_vip_trash = count(User::where('phone', '<>', '')->where('deleted_vip', '1')->orderBy('id', 'DESC')->get());

		$count = [$count_register_vip_active, $count_register_vip_trash];

		$listAdmins = Admin::orderBy('id', 'DESC')->get();
		return view('admin.pages.user.list-register-vip', compact('registerVips', 'list_action', 'listAdmins', 'count'));
	}

	// action Status RegisterVip
	public function actionStatus(Request $request)
	{
		$action = $request->input('action');
		$item_check = $request->input('item_check');
		$adminUpdate = $request->input('admin-update');

		if ($item_check) {
			if ($action == 'Chọn trạng thái') {
				return back()->with('error', 'Bạn phải chọn tác vụ để thao tác');
			}

			if ($adminUpdate == 'Admin cập nhật') {
				return back()->with('error', 'Bạn phải chọn admin cập nhật');
			}

			// time now
			$expiration = Carbon::now();

			// get package check
			$packageItemCheck = User::select('package')->where('id', '=', $item_check)->first();

			$createAtCheck = User::select('created_at')->where('id', '=', $item_check)->first();

			// Đã thanh toán
			if ($action == 'paid') {
				if ($packageItemCheck->package == "6 tháng: 200.000") {
					$expiration = $expiration->addMonths(6);
				}
				if ($packageItemCheck->package == "1 năm: 400.000") {
					$expiration = $expiration->addMonths(12);
				}
				if ($packageItemCheck->package == "Trọn đời: 1.500.000") {
					$expiration = $expiration->addYears(10);
				}

				User::where('id', '=', $item_check)->update([
					'status' => 'Đã thanh toán',
					'expiration' => $expiration,
					'admin_id' => $adminUpdate
				]);
				return back()->with('status', 'Cập nhật trạng thái thành công');
			}

			// Chưa thanh toán
			if ($action == 'unpaid') {
				User::where('id', '=', $item_check)->update([
					'expiration' => $createAtCheck->created_at,
					'status' => 'Chưa thanh toán',
					'admin_id' => $adminUpdate
				]);

				return back()->with('status', 'Cập nhật trạng thái thành công');
			}

			// Xóa
			if ($action == 'delete') {
				User::where('id', '=', $item_check)->update([
					'deleted_vip' => '1',
					'admin_id' => $adminUpdate
				]);

				return back()->with('status', 'Xóa đăng ký thành công');
			}

			if ($action == 'restore') {
				if ($adminUpdate == 'Admin cập nhật') {
					return back()->with('error', 'Bạn phải chọn admin cập nhật');
				}
				User::where('id', '=', $item_check)->update([
					'deleted_vip' => '0',
					'admin_id' => $adminUpdate
				]);
				return back()->with('success', 'Bạn đã khôi phục thành công');
			}

			if ($action == 'forceDelete') {
				User::where('id', '=', $item_check)->update([
					'phone' => NULL,
					'package' => NULL,
					'deleted_vip' => '0',
				]);
				return back()->with('success', 'Bạn đã xóa vĩnh viễn thành công');
			}
		} else {
			return back()->with('error', 'Bạn phải chọn user để thao tác');
		}
	}

	// get đk Tư vấn đầu tư
	public function getRegisterConsulting(Request $request)
	{
		$status = $request->input('status');

		//set default list_action
		$list_action = [
			"contact" => "Đã liên hệ",
			"not_contact" => "Chưa liên hệ",
			"delete" => "Xóa tạm thời"
		];

		if ($status == 'trash') {

			//set list_action with url trash
			$list_action = [
				"restore" => "Khôi phục",
				"forceDelete" => "Xóa vĩnh viễn",
			];

			$listRegisters = InvestmentConsulting::onlyTrashed()->get();
		} else {
			$listRegisters = InvestmentConsulting::orderBy('id', 'DESC')->get();
		}

		// Đếm số lượng bảng ghi ko bao gồm thùng rác
		$count_register_active = InvestmentConsulting::count();

		// Đếm số lượng bảng ghi thùng rác
		$count_register_trash = InvestmentConsulting::onlyTrashed()->count();

		$count = [$count_register_active, $count_register_trash];

		$action = "users.actionStatusConsulting";

		$listAdmins = Admin::orderBy('id', 'DESC')->get();

		return view('admin.pages.user.list-register-advisory-invest', compact('listRegisters', 'list_action', 'listAdmins', 'action', 'count'));
	}

	// action Status Consulting
	public function actionStatusConsulting(Request $request)
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
				InvestmentConsulting::whereIn('id', $list_check)->update(['status_contact' => 'Đã liên hệ', 'admin_id' => $adminUpdate]);
				return redirect()->route('users.registerConsulting')->with('status', 'Bạn đã cập nhật trạng thái thành công');
			}

			if ($action == 'not_contact') {
				InvestmentConsulting::whereIn('id', $list_check)->update(['status_contact' => 'Chưa liên hệ', 'admin_id' => null]);
				return redirect()->route('users.registerConsulting')->with('status', 'Bạn đã cập nhật trạng thái thành công');
			}

			if ($action == 'delete') {
				if ($adminUpdate == 'Admin cập nhật') {
					return back()->with('error', 'Bạn phải chọn admin cập nhật');
				}
				InvestmentConsulting::whereIn('id', $list_check)->update(['admin_id' => $adminUpdate]);
				InvestmentConsulting::destroy($list_check);
				return redirect()->route('users.registerConsulting')->with('status', 'Bạn đã xóa thành công');
			}

			if ($action == 'restore') {
				if ($adminUpdate == 'Admin cập nhật') {
					return back()->with('error', 'Bạn phải chọn admin cập nhật');
				}
				InvestmentConsulting::onlyTrashed()->whereIn('id', $list_check)->update(['admin_id' => $adminUpdate]);
				InvestmentConsulting::onlyTrashed()
					->whereIn('id', $list_check)
					->restore();
				return redirect()->route('users.registerConsulting')->with('success', 'Bạn đã khôi phục thành công');
			}

			if ($action == 'forceDelete') {
				InvestmentConsulting::onlyTrashed()
					->whereIn('id', $list_check)
					->forceDelete();
				return redirect()->route('users.registerConsulting')->with('success', 'Bạn đã xóa vĩnh viễn thành công');
			}
		} else {
			return back()->with('error', 'Bạn phải chọn user để thao tác');
		}
	}

	// get đk Ủy thác đầu tư
	public function getRegisterTrust(Request $request)
	{
		$status = $request->input('status');

		//set default list_action
		$list_action = [
			"contact" => "Đã liên hệ",
			"not_contact" => "Chưa liên hệ",
			"delete" => "Xóa tạm thời"
		];

		if ($status == 'trash') {

			//set list_action with url trash
			$list_action = [
				"restore" => "Khôi phục",
				"forceDelete" => "Xóa vĩnh viễn",
			];

			$listRegisters = InvestmentTrust::onlyTrashed()->get();
		} else {
			$listRegisters = InvestmentTrust::orderBy('id', 'DESC')->get();
		}

		// Đếm số lượng bảng ghi ko bao gồm thùng rác
		$count_register_active = InvestmentTrust::count();

		// Đếm số lượng bảng ghi thùng rác
		$count_register_trash = InvestmentTrust::onlyTrashed()->count();

		$count = [$count_register_active, $count_register_trash];

		$action = "users.actionStatusConsulting";

		$listAdmins = Admin::orderBy('id', 'DESC')->get();

		$action = "users.actionStatusTrust";

		$listAdmins = Admin::orderBy('id', 'DESC')->get();

		return view('admin.pages.user.list-register-advisory-invest', compact('listRegisters', 'list_action', 'action', 'listAdmins', 'count'));
	}

	// action Status Trust
	public function actionStatusTrust(Request $request)
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
				InvestmentTrust::whereIn('id', $list_check)->update(['status_contact' => 'Đã liên hệ', 'admin_id' => $adminUpdate]);
				return redirect()->route('users.registerTrust')->with('status', 'Bạn đã cập nhật trạng thái thành công');
			}

			if ($action == 'not_contact') {
				InvestmentTrust::whereIn('id', $list_check)->update(['status_contact' => 'Chưa liên hệ', 'admin_id' => null]);
				return redirect()->route('users.registerTrust')->with('status', 'Bạn đã cập nhật trạng thái thành công');
			}

			if ($action == 'delete') {
				if ($adminUpdate == 'Admin cập nhật') {
					return back()->with('error', 'Bạn phải chọn admin cập nhật');
				}
				InvestmentTrust::whereIn('id', $list_check)->update(['admin_id' => $adminUpdate]);
				InvestmentTrust::destroy($list_check);;
				return redirect()->route('users.registerTrust')->with('status', 'Bạn đã xóa thành công');
			}

			if ($action == 'restore') {
				if ($adminUpdate == 'Admin cập nhật') {
					return back()->with('error', 'Bạn phải chọn admin cập nhật');
				}
				InvestmentTrust::onlyTrashed()->whereIn('id', $list_check)->update(['admin_id' => $adminUpdate]);
				InvestmentTrust::onlyTrashed()
					->whereIn('id', $list_check)
					->restore();
				return redirect()->route('users.registerTrust')->with('success', 'Bạn đã khôi phục thành công');
			}

			if ($action == 'forceDelete') {
				InvestmentTrust::onlyTrashed()
					->whereIn('id', $list_check)
					->forceDelete();
				return redirect()->route('users.registerTrust')->with('success', 'Bạn đã xóa vĩnh viễn thành công');
			}
		} else {
			return back()->with('error', 'Bạn phải chọn user để thao tác');
		}
	}

	// get đk mở tk
	public function getRegisterOpenAccount(Request $request)
	{
		$status = $request->input('status');

		//set default list_action
		$list_action = [
			'open' => 'Đã mở',
			'not_open' => 'Chưa mở',
			'delete' => 'Xóa tạm thời',
		];

		if ($status == 'trash') {

			//set list_action with url trash
			$list_action = [
				"restore" => "Khôi phục",
				"forceDelete" => "Xóa vĩnh viễn",
			];

			$listRegisters = OpenAccount::onlyTrashed()->get();
		} else {
			$listRegisters = OpenAccount::orderBy('id', 'DESC')->get();
		}

		// Đếm số lượng bảng ghi ko bao gồm thùng rác
		$count_register_active = OpenAccount::count();

		// Đếm số lượng bảng ghi thùng rác
		$count_register_trash = OpenAccount::onlyTrashed()->count();

		$count = [$count_register_active, $count_register_trash];

		$listAdmins = Admin::orderBy('id', 'DESC')->get();

		return view('admin.pages.user.list-register-open-account', compact('listRegisters', 'list_action', 'listAdmins', 'count'));
	}

	// action Status Open Account
	public function actionStatusOpenAccount(Request $request)
	{
		$action = $request->input('action');
		$adminUpdate = $request->input('admin-update');
		$list_check = $request->input('list_check');

		if ($list_check) {
			if ($action == 'Chọn trạng thái') {
				return back()->with('error', 'Bạn phải chọn tác vụ để thao tác');
			}

			if ($action == 'open') {
				if ($adminUpdate == 'Admin cập nhật') {
					return back()->with('error', 'Bạn phải chọn admin cập nhật');
				}
				OpenAccount::whereIn('id', $list_check)->update(['status_contact' => 'Đã mở', 'admin_id' => $adminUpdate]);
				return redirect()->route('users.registerOpenAccount')->with('status', 'Bạn đã cập nhật trạng thái thành công');
			}

			if ($action == 'not_open') {
				OpenAccount::whereIn('id', $list_check)->update(['status_contact' => 'Chưa mở', 'admin_id' => null]);
				return redirect()->route('users.registerOpenAccount')->with('status', 'Bạn đã cập nhật trạng thái thành công');
			}

			if ($action == 'delete') {
				if ($adminUpdate == 'Admin cập nhật') {
					return back()->with('error', 'Bạn phải chọn admin cập nhật');
				}
				OpenAccount::whereIn('id', $list_check)->update(['admin_id' => $adminUpdate]);
				OpenAccount::destroy($list_check);
				return redirect()->route('users.registerOpenAccount')->with('status', 'Bạn đã xóa thành công');
			}

			if ($action == 'restore') {
				if ($adminUpdate == 'Admin cập nhật') {
					return back()->with('error', 'Bạn phải chọn admin cập nhật');
				}
				OpenAccount::onlyTrashed()->whereIn('id', $list_check)->update(['admin_id' => $adminUpdate]);
				OpenAccount::onlyTrashed()
					->whereIn('id', $list_check)
					->restore();
				return redirect()->route('users.registerOpenAccount')->with('success', 'Bạn đã khôi phục thành công');
			}

			if ($action == 'forceDelete') {
				OpenAccount::onlyTrashed()
					->whereIn('id', $list_check)
					->forceDelete();
				return redirect()->route('users.registerOpenAccount')->with('success', 'Bạn đã xóa vĩnh viễn thành công');
			}
		} else {
			return back()->with('error', 'Bạn phải chọn user để thao tác');
		}
	}

	//  edit Open Account
	public function editOpenAccount($id)
	{
		$accountOpen = OpenAccount::find($id);
		return view('admin.pages.user.edit-open-account', compact('accountOpen'));
	}

	//  update Open Account
	// public function updateOpenAccount(Request $request, $id)
	// {
	// 	OpenAccount::where('id', $id)->update([
	// 		'status_contact' => $request->status_contact,
	// 	]);

	// 	return redirect(route('users.registerOpenAccount'))->with('success', 'Cập nhật trạng thái thành công');
	// }
}
