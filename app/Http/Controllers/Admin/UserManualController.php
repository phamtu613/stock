<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserManual;
use Illuminate\Http\Request;

class UserManualController extends Controller
{
    public function edit()
    {
        $userManual = UserManual::first();

        return view('admin.pages.user-manual.edit', compact('userManual'));
    }

    public function update(Request $request, $id)
    {
        UserManual::where('id', $id)->update([
            'content' => $request->content
        ]);

        return back()->with('success', 'Cập nhật HDSD thành công');
    }
}
