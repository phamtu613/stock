<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Knowledge;
use App\Models\CategoryKnowledge;
use Illuminate\Support\Str;
use App\Http\Requests\KnowledgeRequest;

class KnowledgeController extends Controller
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

			$knowledges = Knowledge::onlyTrashed()->get();
		} else {
			$knowledges = Knowledge::orderBy('id', 'DESC')->get();
		}

		// Đếm số lượng bảng ghi ko bao gồm thùng rác
		$count_knowledge_active = Knowledge::count();

		// Đếm số lượng bảng ghi thùng rác
		$count_knowledge_trash = Knowledge::onlyTrashed()->count();

		$count = [$count_knowledge_active, $count_knowledge_trash];

		return view('admin.pages.knowledge.list', compact('knowledges', 'list_action', 'count'));
	}

	public function create()
	{
		$categoryKnowledges = CategoryKnowledge::all();
		return view('admin.pages.knowledge.create', compact('categoryKnowledges'));
	}

	public function store(KnowledgeRequest $request)
	{
		// Ảnh đại diện
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

		// Ảnh đầu bài viết
		if ($request->hasFile('image')) {
			$file = $request->image;

			// get name file
			$fileName =  time() . $file->getClientOriginalName();

			$path = $file->move('public/uploads', $fileName);
			$image = 'public/uploads/' . $fileName;

			$request->image = $image;
		}

		$admin_id = Auth::guard('admin')->user()->id;

		Knowledge::create([
			'title' => $request->title,
			'slug' => Str::slug($request->title),
			'description' => $request->description,
			'content' => $request->content,
			'thumbnail' => $request->thumbnail,
			'image' => $request->image,
			'num_view' => $request->num_view,
			'vip' => $request->vip,
			"top_post" => $request->top_post,
			'admin_id' => $admin_id,
			'cate_knowledge_id' => $request->cate_knowledge
		]);

		return redirect(route('knowledges.index'))->with('success', 'Thêm bài viết thành công');
	}

	public function edit($id)
	{
		$knowledge = Knowledge::find($id);
		$categoryKnowledges = CategoryKnowledge::all();
		return view('admin.pages.knowledge.edit', compact('knowledge', 'categoryKnowledges'));
	}

	public function update(Request $request, $id)
	{
		$request->validate(
			[
				'title' => 'required|min:3|max:200',
				'description' => 'required',
				'content' => 'required|min:3',
			],
			[
				'required' => 'Vui lòng nhập :attribute',
				'min' => 'Nhập :attribute trên :min ký tự',
			],
			[
				'title' => 'tiêu đề',
				'description' => 'mô tả',
				'content' => 'nội dung',
				'description' => 'mô tả',
			]
		);

		$knowledge = Knowledge::find($id);
		$knowledgeThumbnail = $knowledge->thumbnail;
		$knowledgeImage = $knowledge->image;

		// Ảnh đầu bài viết
		if ($request->hasFile('image')) {

			if (file_exists($knowledgeImage)) {
				unlink($knowledgeImage);
			}

			$file = $request->image;

			$knowledgeImage = time() . $file->getClientOriginalName();

			// lên host mục uploads
			$path = $file->move('public/uploads', $knowledgeImage);

			// Variable ở DB
			$knowledgeImage = 'public/uploads/' . $knowledgeImage;
		}

		if ($request->hasFile('file')) {

			if (file_exists($knowledgeThumbnail)) {
				unlink($knowledgeThumbnail);
			}

			$file = $request->file;

			$knowledgeThumbnail = time() . $file->getClientOriginalName();

			// lên host mục uploads
			$path = $file->move('public/uploads', $knowledgeThumbnail);

			// Variable ở DB
			$knowledgeThumbnail = 'public/uploads/' . $knowledgeThumbnail;
		}

		Knowledge::where('id', $id)->update([
			'title' => $request->title,
			'slug' => Str::slug($request->title),
			'description' => $request->description,
			'content' => $request->content,
			'thumbnail' => $knowledgeThumbnail,
			'image' => $knowledgeImage,
			'num_view' => $request->num_view,
			'vip' => $request->vip,
			'top_post' => $request->top_post,
			'cate_knowledge_id' => $request->cate_knowledge,
		]);

		return redirect(route('knowledges.index'))->with('success', 'Cập nhật bài viết thành công');
	}

	public function action(Request $request)
	{
		$list_check = $request->input('list_check'); // [1,2,3]

		if ($list_check) {
			$action = $request->input('action');

			// Không chọn thì sẽ nhận value bằng giá trị hiển thị
			if ($action == 'Chọn') {
				return redirect()->route('knowledges.index')->with('error', 'Vui lòng chọn tác vụ để thực hiện');
			}

			if ($action == 'delete') {
				Knowledge::destroy($list_check);
				return redirect()->route('knowledges.index')->with('success', 'Bạn đã xóa thành công');
			}

			if ($action == 'restore') {
				Knowledge::onlyTrashed()
					->whereIn('id', $list_check)
					->restore();
				return redirect()->route('knowledges.index')->with('success', 'Bạn đã khôi phục thành công');
			}

			if ($action == 'forceDelete') {
				Knowledge::onlyTrashed()
					->whereIn('id', $list_check)
					->forceDelete();
				return redirect()->route('knowledges.index')->with('success', 'Bạn đã xóa vĩnh viễn thành công');
			}
		} else {
			return back()->with('error', 'Bạn phải chọn bài viết để thao tác');
		}
	}

	public function clearImage(Request $request, $id)
	{
		$knowledge = Knowledge::find($id);
		$image = $knowledge->image;

		if (file_exists($image)) {
			unlink($image);
		}

		Knowledge::where('id', $request->id)->update([
			'image' => '',
		]);
		return redirect()->route('knowledges.index')->with('success', 'Bạn đã xóa ảnh đầu bài viết thành công');
	}
}
