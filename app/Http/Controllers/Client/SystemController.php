<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AlphaSystem;
use App\Models\CateAlphaSystem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\UserManual;

class SystemController extends Controller
{
    public function index(Request $request)
    {
        $cateRequest = $request->cate;
        $dateRequest = $request->date;

        $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if (!$dateRequest) {
            $dateRequest = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        } else {
            $dateRequest = $request->date;
        }

        if (!$cateRequest) {
            $cateRequest = "hdsd";
        } else {
            $cateRequest = $request->cate;
        }
        $hdsd = (object)[
            "name" => "Hướng dẫn sử dụng",
            "slug" => "hdsd",
            "position" => -1
        ];
        $cateSystems = CateAlphaSystem::orderBy('position', "asc")->get();
        $cateSystemsMobile = CateAlphaSystem::orderBy('position', "asc")->get();

        $cateSystems->prepend($hdsd);

        $alphaSystems = AlphaSystem::where('date_upload', $dateRequest)->get();

        // Đăng ký rồi => true => cho xem
        $flag_reg = false;

        $userManual = UserManual::first();

        if (Auth::user()) {
            if (Auth::user()->expiration > Carbon::now()) {
                $flag_reg = true;
            }
        }
        // dd(url()->previous());

        return view('client.pages.system', compact("cateSystems", "cateSystemsMobile", "alphaSystems", "cateRequest", "dateRequest", "dateNow", "flag_reg", "userManual"));
    }

    public function search(Request $request)
    {
        $url = url()->current();
        $query = request()->query();
        dd($url);
    }
}
