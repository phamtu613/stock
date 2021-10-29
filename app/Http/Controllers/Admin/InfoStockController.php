<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoStockRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\InfoStock;

class InfoStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $infoStock = InfoStock::find($id);
        // dd($infoStock);
        return view('admin.pages.info-stock.edit', compact('infoStock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InfoStockRequest $request, $id)
    {
        $InfoStock = InfoStock::find($id);

        InfoStock::where('id', $id)->update([
            'phone1' => $request->input('phone1'),
            'phone2' => $request->input('phone2'),
            'email' => $request->input('email'),
            'facebook' => $request->input('facebook'),
            'map' => $request->input('map'),
        ]);

        return redirect()->back()->with('status', 'Cập nhật thông tin Stock thành công');
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
}
