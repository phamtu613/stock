<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryDailyPostRequest;
use App\Models\CateDailyPost;
use Illuminate\Support\Str;

class CategoryDailyPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryDailyPosts = CateDailyPost::orderBy('position', 'ASC')->paginate(10);
        return view('admin.pages.category-daily-post.list', compact('categoryDailyPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category-daily-post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryDailyPostRequest $request)
    {
        CateDailyPost::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'position' => $request->position
        ]);

        return redirect(route('category-daily-post.index'))->with('status', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryDailyPost = CateDailyPost::find($id);
        return view('admin.pages.category-daily-post.edit', compact('categoryDailyPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryDailyPostRequest $request, $id)
    {
        CateDailyPost::where('id', $id)->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'position' => $request->input('position'),
        ]);

        return redirect(route('category-daily-post.index'))->with('status', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryDailyPost = CateDailyPost::find($id);
        $categoryDailyPost->delete();
        return back()->with('status', 'Xóa danh mục thành công');
    }
}
