<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlphaSystemRequest;
use App\Models\AlphaSystem;
use App\Models\CateAlphaSystem;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class AlphaSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listSystem = AlphaSystem::orderBy('date_upload', 'DESC')->get();
        $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        return view('admin.pages.alpha-system.list', compact("listSystem", "dateNow"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        return view('admin.pages.alpha-system.create', compact("dateNow"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // AlphaSystemRequest
    public function store(Request $request)
    {
        if ($request->hasFile('image_chart')) {
            $listCateSystem = CateAlphaSystem::all();
            $files = $request->image_chart;
            $date = $request->date;

            $lastAlphaSystem = AlphaSystem::orderBy('id', 'desc')->first();

            $getDate = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

            // nếu trùng ngày hôm nay
            if ($date === $getDate) {
                // check thử hôm nay có hình rồi thì báo có rồi
                if ($lastAlphaSystem->date_upload === $getDate) {
                    return back()->with('error', 'Hôm nay đã upload hình ảnh rồi nha');
                } else {
                    // chưa thì up thoi, check length image
                    if (count($files) === count($listCateSystem) * 2) {

                        // up file item to server
                        foreach ($files as $file) {
                            $splitFile = explode('.', $file->getClientOriginalName()); // ['abc', 'jpg']
                            $fileName =  $splitFile[0] . $getDate . '.jpg';

                            if (file_exists($fileName)) {
                                unlink($fileName);
                            }

                            $path = $file->move('public/uploads/system', $fileName);
                        }

                        foreach ($listCateSystem as $cateSystem) {
                            AlphaSystem::create([
                                'image_chart' => 'public/uploads/system/' . $cateSystem->slug . '-d' . $getDate . '.jpg',
                                'image_chart_week' => 'public/uploads/system/' . $cateSystem->slug . '-w' . $getDate . '.jpg',
                                'date_upload' => $getDate,
                                'cate_alpha_system_id' => $cateSystem->id
                            ]);
                        }
                    } else {
                        return back()->with('error', 'Số hình ảnh phải bằng danh mục');
                    }
                }
            } else {
                // check ngày chọn đó có hình trong db chưa
                $allAlphasSystem = AlphaSystem::select('date_upload')->get();
                foreach ($allAlphasSystem as $key => $allAlphaSystem) {
                    if ($allAlphaSystem->date_upload === $date) {
                        return back()->with('error', 'Ngày này đã upload hình ảnh rồi nha');
                    }
                }

                // nếu ko ko có thì up vô db theo ngày mới chọn á
                if (count($files) === count($listCateSystem) * 2) {

                    // up file item to server
                    foreach ($files as $file) {
                        $splitFile = explode('.', $file->getClientOriginalName()); // ['abc', 'jpg']
                        $fileName =  $splitFile[0] . $date . '.jpg';

                        if (file_exists($fileName)) {
                            unlink($fileName);
                        }

                        $path = $file->move('public/uploads/system', $fileName);
                    }

                    foreach ($listCateSystem as $cateSystem) {
                        AlphaSystem::create([
                            'image_chart' => 'public/uploads/system/' . $cateSystem->slug . '-d' . $date . '.jpg',
                            'image_chart_week' => 'public/uploads/system/' . $cateSystem->slug . '-w' . $date . '.jpg',
                            'date_upload' => $date,
                            'cate_alpha_system_id' => $cateSystem->id
                        ]);
                    }
                } else {
                    return back()->with('error', 'Số hình ảnh phải bằng danh mục');
                }
            }
        } else {
            return back()->with('error', 'Phải chọn hình ảnh để upload');
        }
        return redirect(route('alpha-system.index'))->with('success', 'Thêm chart thành công');
    }

    public function changeImage(Request $request)
    {
        $id = $request->id;
        $image = $request->image;
        $alphaSystem = AlphaSystem::find($id);
        $imageChartOld = $alphaSystem->image_chart;


        // $fileName =  $splitFile[0] . $getDate . '.jpg';

        // $path = $file->move('public/uploads/system', $fileName);

        // if (file_exists($alphaSystem->image_chart)) {
        //     unlink($alphaSystem->image_chart);
        // }
    }

    public function delete(Request $request)
    {
        $alphaSystemsDate = AlphaSystem::where('date_upload', $request->date)->get();

        foreach ($alphaSystemsDate as $alphaSystemDate) {
            echo $alphaSystemDate->image_chart;
            if (file_exists($alphaSystemDate->image_chart)) {
                unlink($alphaSystemDate->image_chart);
            } else if (file_exists($alphaSystemDate->image_chart_week)) {
                unlink($alphaSystemDate->image_chart_week);
            }
        }

        $alphaSystemsDate = AlphaSystem::where('date_upload', $request->date)->delete();
        return redirect()->back()->with('success', 'Xóa chart thành công');
    }
}
