<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\Course;
use App\Models\DailyPost;
use App\Models\InvestmentConsulting;
use App\Models\InvestmentTrust;
use App\Models\Knowledge;
use App\Models\OpenAccount;
use App\Models\PostAdvisoryInvest;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
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

			$admins = Admin::onlyTrashed()->get();
		} else {
			$admins = Admin::orderBy('id', 'DESC')->get();
		}

		// Đếm số lượng bảng ghi ko bao gồm thùng rác
		$count_user_active = Admin::count();

		// Đếm số lượng bảng ghi thùng rác
		$count_user_trash = Admin::onlyTrashed()->count();

		$count = [$count_user_active, $count_user_trash];

		return view('admin.pages.admin.list', compact('admins', 'list_action', 'count'));
	}


	public function action(Request $request)
	{
		$item_check = $request->input('item_check');

		if ($item_check) {
			// check xem có trùng id đang login ko, có thì loại ra
			if (Auth::guard('admin')->user()->id == $item_check) {
				$item_check = '';
			}

			// kiểm tra con phần tử nào không
			if (!empty($item_check)) {
				$action = $request->input('action');

				// Không chọn thì sẽ nhận value bằng giá trị hiển thị
				if ($action == 'Chọn') {
					return redirect()->route('admin.index')->with('error', 'Vui lòng chọn tác vụ để thực hiện');
				}

				if ($action == 'delete') {
					$list_post_admin_by_id = DailyPost::where('admin_id', $item_check)->get();
					$list_post_knowledge_admin_by_id = Knowledge::where('admin_id', $item_check)->get();
					$list_cart_admin_by_id = Cart::where('admin_id', $item_check)->get();
					$list_contact_admin_by_id = Contact::where('admin_id', $item_check)->get();
					$list_course_admin_by_id = Course::where('admin_id', $item_check)->get();
					$list_investment_consulting_admin_by_id = InvestmentConsulting::where('admin_id', $item_check)->get();
					$list_investment_trust_admin_by_id = InvestmentTrust::where('admin_id', $item_check)->get();
					$list_open_account_admin_by_id = OpenAccount::where('admin_id', $item_check)->get();
					$list_post_advisory_invests_admin_by_id = PostAdvisoryInvest::where('admin_id', $item_check)->get();
					$list_user_register_vip_admin_by_id = User::where('admin_id', $item_check)->get();

					foreach ($list_post_admin_by_id as $post) {
						DailyPost::where('id', $post->id)->update([
							'admin_id' => 3,
						]);
					}
					foreach ($list_post_knowledge_admin_by_id as $post) {
						Knowledge::where('id', $post->id)->update([
							'admin_id' => 3,
						]);
					}
					foreach ($list_cart_admin_by_id as $item) {
						Cart::where('id', $item->id)->update([
							'admin_id' => 3,
						]);
					}
					foreach ($list_contact_admin_by_id as $item) {
						Contact::where('id', $item->id)->update([
							'admin_id' => 3,
						]);
					}
					foreach ($list_course_admin_by_id as $item) {
						Course::where('id', $item->id)->update([
							'admin_id' => 3,
						]);
					}
					foreach ($list_investment_consulting_admin_by_id as $item) {
						InvestmentConsulting::where('id', $item->id)->update([
							'admin_id' => 3,
						]);
					}
					foreach ($list_investment_trust_admin_by_id as $item) {
						InvestmentTrust::where('id', $item->id)->update([
							'admin_id' => 3,
						]);
					}
					foreach ($list_open_account_admin_by_id as $item) {
						OpenAccount::where('id', $item->id)->update([
							'admin_id' => 3,
						]);
					}
					foreach ($list_post_advisory_invests_admin_by_id as $item) {
						PostAdvisoryInvest::where('id', $item->id)->update([
							'admin_id' => 3,
						]);
					}
					foreach ($list_user_register_vip_admin_by_id as $item) {
						User::where('id', $item->id)->update([
							'admin_id' => 3,
						]);
					}

					Admin::destroy($item_check);
					return redirect()->route('admin.index')->with('status', 'Bạn đã xóa thành công');
				}

				if ($action == 'restore') {
					Admin::onlyTrashed()
						->where('id', $item_check)
						->restore();
					return redirect()->route('admin.index')->with('status', 'Bạn đã khôi phục thành công');
				}

				if ($action == 'forceDelete') {
					Admin::onlyTrashed()
						->where('id', $item_check)
						->forceDelete();
					return redirect()->route('admin.index')->with('status', 'Bạn đã xóa vĩnh viễn thành công');
				}
			} else {
				return redirect()->route('admin.index')->with('error', 'Không thể thao tác trên tài khoản của bạn');
			}
		} else {
			return back()->with('error', 'Bạn phải chọn tài khoản để thao tác');
		}
	}

	public function edit($id)
	{
		$admin = Admin::find($id);

		return view('admin.pages.admin.edit', compact('admin'));
	}

	//  update item list admin
	public function update(Request $request, $id)
	{
		$request->validate(
			[
				'name' => 'required|max:200',
				'phone' => 'required|max:11',
				'desc' => 'required',
				'facebook' => 'required|max:250',
				'zalo' => 'required|max:250',
			],
			[
				'required' => 'Vui lòng nhập :attribute',
				'max' => 'Vui lòng nhập dưới :max ký tự',
			],
			[
				'name' => 'tên admin',
				'phone' => 'số điện thoại',
				'desc' => 'mô tả',
				'facebook' => 'link facebook',
				'zalo' => 'link zalo',
			]
		);

		Admin::where('id', $id)->update([
			'name' => $request->name,
			'phone' => $request->phone,
			'address' => $request->address,
			'desc' => $request->desc,
			'position' => $request->position,
			'facebook' => $request->facebook,
			'zalo' => $request->zalo,
			'role' => $request->role,
		]);
		return redirect(route('admin.index'))->with('success', 'Cập nhật thông tin thành công');
	}

	public function create()
	{
		return view('admin.pages.admin.create');
	}

	public function store(Request $request)
	{
		if ($request->hasFile('avatar')) {
			$file = $request->avatar;

			// get name file
			$fileName =  time() . $file->getClientOriginalName();

			$path = $file->move('public/uploads', $fileName);
			$avatar = 'public/uploads/' . $fileName;

			$request->avatar = $avatar;
		} else {
			$request->avatar = 'public/client/img/admin.png';
		}
		Admin::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password),
			'address' => $request->address,
			'desc' => $request->desc,
			'facebook' => $request->facebook,
			'zalo' => $request->zalo,
			'avatar' => $request->avatar,
			'role' => 	$request->role,
		]);

		return redirect(route('admin.index'))->with('status', 'Thêm admin thành công');
	}

	public function getLogin()
	{
		return view('auth.admin.login');
	}

	public function postLogin(Request $request)
	{
		$arr = [
			'email' => $request->email,
			'password' => $request->password,
		];

		if ($request->remember == trans('remember.Remember Me')) {
			$remember = true;
		} else {
			$remember = false;
		}

		if (Auth::guard('admin')->attempt($arr)) {
			// dd('ok');
			return redirect('admin/dashboard')->with('message', 'Đăng nhập thành công');
		} else {
			return back()->with('error', 'Email hoặc mật khẩu không chính xác, vui lòng kiểm tra lại');
		}
	}

	public function logout()
	{
		// dd("dn");
		Auth::guard('admin')->logout();
		return redirect()->route('admin.login')->with('message', 'Đăng xuất thành công');
	}

	public function detail()
	{
		return view('admin.pages.admin.profile');
	}

	public function updateProfileAdmin(Request $request, $id)
	{
		$request->validate(
			[
				'name' => 'required|max:200',
				'phone' => 'required|max:200',
				'avatar' => 'mimes:jpeg,jpg,png,gif|max:10240',
				'address' => 'required|max:200',
				'desc' => 'required',
				'facebook' => 'required|max:250',
				'zalo' => 'required|max:250',
			],
			[
				'required' => 'Vui lòng nhập :attribute',
				'max' => 'Vui lòng nhập dưới :max ký tự',
				'mimes' => 'Vui lòng chọn đúng định dạng ảnh',
				'avatar.max' => 'Kích thước :attribute quá lớn (>10MB)',
			],
			[
				'name' => 'tên admin',
				'phone' => 'số điện thoại',
				'avatar' => 'avatar',
				'address' => 'địa chỉ',
				'desc' => 'mô tả',
				'facebook' => 'link facebook',
				'zalo' => 'link zalo',
			]
		);

		$admin = Admin::find($id);

		$avatar = $admin->avatar;

		if ($request->hasFile('avatar')) {

			if (file_exists($avatar)) {
				unlink($avatar);
			}

			$file = $request->avatar;

			$avatar = time() . $file->getClientOriginalName();

			// lên host mục uploads
			$path = $file->move('public/uploads', $avatar);

			// Variable ở DB
			$avatar = 'public/uploads/' . $avatar;
		}

		Admin::where('id', $id)->update([
			'name' => $request->name,
			'phone' => $request->phone,
			'avatar' => $avatar,
			'address' => $request->address,
			'position' => $request->position,
			'desc' => $request->desc,
			'facebook' => $request->facebook,
			'zalo' => $request->zalo
		]);
		return redirect()->back()->with('success', 'Cập nhật thông tin thành công');
	}
}
