<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DailyPostRequest;
use App\Models\DailyPost;
use App\Models\CateDailyPost;
use Illuminate\Support\Str;

class DailyPostController extends Controller
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

			$dailyPosts = DailyPost::onlyTrashed()->get();
		} else {
			$dailyPosts = DailyPost::orderBy('id', 'DESC')->get();
		}

		// Đếm số lượng bảng ghi ko bao gồm thùng rác
		$count_daily_post_active = DailyPost::count();

		// Đếm số lượng bảng ghi thùng rác
		$count_daily_post_trash = DailyPost::onlyTrashed()->count();

		$count = [$count_daily_post_active, $count_daily_post_trash];

		return view('admin.pages.daily-post.list', compact('dailyPosts', 'list_action', 'count'));
	}

	public function listTrash(Request $request)
	{
		$dailyPosts = DailyPost::onlyTrashed()->get();
		return view('admin.pages.daily-post.trash', compact('dailyPosts'));
	}

	public function create()
	{
		$categoryDailyPosts = CateDailyPost::all();
		return view('admin.pages.daily-post.create', compact('categoryDailyPosts'));
	}

	public function store(DailyPostRequest $request)
	{
		if ($request->hasFile('thumbnail')) {
			$file = $request->thumbnail;

			// get name file
			$fileName =  time() . $file->getClientOriginalName();

			$path = $file->move('public/uploads', $fileName);
			$thumbnail = 'public/uploads/' . $fileName;

			$request->thumbnail = $thumbnail;
		} else {
			$request->thumbnail = 'public/uploads/no-image.png';
		}

		if ($request->hasFile('image')) {
			$file = $request->image;

			// get name file
			$fileName =  time() . $file->getClientOriginalName();

			$path = $file->move('public/uploads', $fileName);
			$image = 'public/uploads/' . $fileName;

			$request->image = $image;
		}

		$admin_id = Auth::guard('admin')->user()->id;

		DailyPost::create([
			'title' => $request->title,
			'slug' => Str::slug($request->title),
			'description' => $request->description,
			'content' => $request->content,
			'thumbnail' => $request->thumbnail,
			'image' => $request->image,
			'num_view' => $request->num_view,
			'vip' => $request->vip,
			'cate_daily_post_id' => $request->category_post,
			'admin_id' => $admin_id,
		]);

		return redirect(route('dailyPosts.index'))->with('status', 'Thêm bài viết thành công');
	}

	public function edit($id)
	{
		$dailyPost = DailyPost::find($id);

		$categoryDailyPosts = CateDailyPost::all();

		return view('admin.pages.daily-post.edit', compact('dailyPost', 'categoryDailyPosts'));
	}

	public function update(DailyPostRequest $request, $id)
	{
		$dailyPost = DailyPost::find($id);
		$thumbnail = $dailyPost->thumbnail;
		$image = $dailyPost->image;

		// Ảnh đại diện
		if ($request->hasFile('thumbnail')) {

			if (file_exists($thumbnail)) {
				unlink($thumbnail);
			}

			$file = $request->thumbnail;

			// get name file
			$fileName =  time() . $file->getClientOriginalName();

			// to host
			$path = $file->move('public/uploads', $fileName);

			$thumbnail = 'public/uploads/' . $fileName;

			$request->thumbnail = $thumbnail;
		} else {
			$request->thumbnail = $thumbnail;
		}

		// Ảnh đầu bài viết
		if ($request->hasFile('image')) {

			if (file_exists($image)) {
				unlink($image);
			}

			$file = $request->image;

			$fileName = time() . $file->getClientOriginalName();

			// to host
			$path = $file->move('public/uploads/', $fileName);

			$image = 'public/uploads/' . $fileName;

			$request->image = $image;
		} else {
			$request->image = $image;
		}

		DailyPost::where('id', $id)->update([
			'title' => $request->title,
			'slug' => Str::slug($request->title),
			'description' => $request->description,
			'content' => $request->content,
			'thumbnail' => $request->thumbnail,
			'image' => $request->image,
			'num_view' => $request->num_view,
			'vip' => $request->vip,
			'cate_daily_post_id' => $request->category_post,
		]);

		return redirect(route('dailyPosts.index'))->with('status', 'Cập nhật bài viết thành công');
	}

	public function destroy($id)
	{
		$data = DailyPost::find($id);
		$data->delete();
		return redirect()->route('dailyPosts.index')->with('status', 'Xóa bài viết thành công');
	}

	public function action(Request $request)
	{
		$list_check = $request->input('list_check'); // [1,2,3]

		if ($list_check) {
			$action = $request->input('action');

			// Không chọn thì sẽ nhận value bằng giá trị hiển thị
			if ($action == 'Chọn') {
				return redirect()->route('dailyPosts.index')->with('error', 'Vui lòng chọn tác vụ để thực hiện');
			}

			if ($action == 'delete') {
				DailyPost::destroy($list_check);
				return redirect()->route('dailyPosts.index')->with('status', 'Bạn đã xóa thành công');
			}

			if ($action == 'restore') {
				DailyPost::onlyTrashed()
					->whereIn('id', $list_check)
					->restore();
				return redirect()->route('dailyPosts.index')->with('status', 'Bạn đã khôi phục thành công');
			}

			if ($action == 'forceDelete') {
				DailyPost::onlyTrashed()
					->whereIn('id', $list_check)
					->forceDelete();
				return redirect()->route('dailyPosts.index')->with('status', 'Bạn đã xóa vĩnh viễn thành công');
			}
		} else {
			return back()->with('error', 'Bạn phải chọn bài viết để thao tác');
		}
	}

	public function clearImage(Request $request, $id)
	{
		$dailyPost = DailyPost::find($id);
		$image = $dailyPost->image;

		if (file_exists($image)) {
			unlink($image);
		}

		DailyPost::where('id', $request->id)->update([
			'image' => '',
		]);
		return redirect()->route('dailyPosts.index')->with('status', 'Bạn đã xóa ảnh đầu bài viết thành công');
	}
}
