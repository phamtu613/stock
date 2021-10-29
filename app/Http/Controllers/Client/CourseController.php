<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryCourse;
use App\Models\Course;
use App\Models\BannerCourse;

class CourseController extends Controller
{
    public function index($id = 1)
    {
        $idCategoryCourse = $id;

        // Banner
       $banner = BannerCourse::first();

        // list cate_courses
        $cateCourses = CategoryCourse::orderBy('position', 'asc')->get();

        // list courses
        $courses = Course::where('cate_course_id', '=', $idCategoryCourse)
            ->select('id', 'title', 'slug', 'price_old','price_current', 'num_student','num_star','admin_id','thumbnail','cate_course_id')
            ->orderBy('id', 'desc')
            ->paginate(8);

        return view('client.pages.course', compact('cateCourses', 'courses', 'idCategoryCourse', 'banner'));
    }
}
