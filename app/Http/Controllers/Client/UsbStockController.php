<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsbStockController extends Controller
{
	public function index()
	{
		return view('client.pages.usb-stock');
	}
}
