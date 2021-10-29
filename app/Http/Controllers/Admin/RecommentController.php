<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recomment;

class RecommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recomments = Recomment::orderBy('id', 'DESC')->paginate(10);
        return view('admin.pages.recomment.list', compact('recomments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.recomment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'date_recomment' => 'required',
                'content_recomment' => 'required',
            ],
            [
                'required' => 'Vui lòng nhập :attribute',
            ],
            [
                'date_recomment' => 'ngày khyến nghị',
                'content_recomment' => 'nội dung',
            ]
        );

        Recomment::create([
            'date_recomment' => $request->date_recomment,
            'content_recomment' => $request->content_recomment,
        ]);

        return redirect(route('recomments.index'))->with('status', 'Thêm khuyến nghị thành công');
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
        $recomment = Recomment::find($id);
        return view('admin.pages.recomment.edit', compact('recomment'));
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
        Recomment::where('id', $id)->update([
            'date_recomment' => $request->date_recomment,
            'content_recomment' => $request->content_recomment,
        ]);

        return redirect(route('recomments.index'))->with('status', 'Cập nhật khuyến nghị thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Recomment::find($id);
        $data->delete();
        return back()->with('status', 'Xóa khuyến nghị thành công');
    }
}
