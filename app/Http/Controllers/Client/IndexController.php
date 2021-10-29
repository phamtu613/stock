<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Course;
use Illuminate\Http\Request;

class IndexController extends Controller
{

	public function index()
	{
		$banners = Banner::all();

		return view('client.pages.index', compact('banners'));
	}
}
