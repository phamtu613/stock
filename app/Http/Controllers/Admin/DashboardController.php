<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\InvestmentConsulting;
use App\Models\OpenAccount;
use App\User;

class DashboardController extends Controller
{
	public function index()
	{

		$regOpenAccount = OpenAccount::count();
		$regConsulting = InvestmentConsulting::count();
		$user = User::count();
		$regCourse = Cart::count();
		return view('admin.pages.dashboard.dashboard', compact('regOpenAccount', 'regConsulting', 'user', 'regCourse'));
	}
}
