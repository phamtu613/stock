<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryKnowledgeRequest;
use App\Models\CategoryKnowledge;
use Illuminate\Support\Str;

class CategoryKnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryKnowledges = CategoryKnowledge::orderBy('id', 'DESC')->paginate(10);
        return view('admin.pages.category-knowledge.list', compact('categoryKnowledges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category-knowledge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryKnowledgeRequest $request)
    {
        CategoryKnowledge::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'position' => $request->position
        ]);

        return redirect(route('categoryKnowledges.index'))->with('status', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "function show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryKnowledge = CategoryKnowledge::find($id);
        return view('admin.pages.category-knowledge.edit', compact('categoryKnowledge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryKnowledgeRequest $request, $id)
    {
        CategoryKnowledge::where('id', $id)->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'position' => $request->input('position'),
        ]);

        return redirect(route('categoryKnowledges.index'))->with('status', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CategoryKnowledge::find($id);
        $data->delete();
        return back()->with('status', 'Xóa danh mục thành công');
    }
}
