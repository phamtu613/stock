<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryCourseRequest;
use App\Models\CategoryCourse;

class CategoryCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryCourses = CategoryCourse::orderBy('id', 'DESC')->paginate(10);
        return view('admin.pages.category-course.list', compact('categoryCourses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category-course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCourseRequest $request)
    {
        CategoryCourse::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'position' => $request->position
        ]);

        return redirect(route('categoryCourses.index'))->with('status', 'Thêm danh mục thành công');
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
        $categoryCourse = CategoryCourse::find($id);
        return view('admin.pages.category-course.edit', compact('categoryCourse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryCourseRequest $request, $id)
    {
        CategoryCourse::where('id', $id)->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'position' => $request->input('position'),
        ]);

        return redirect(route('categoryCourses.index'))->with('status', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryCourse = CategoryCourse::find($id);
        $categoryCourse->delete();
        return back()->with('status', 'Xóa danh mục thành công');
    }
}
