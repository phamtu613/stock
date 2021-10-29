<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DailyPost;
use App\Models\Recomment;
use App\Models\StockPortfolio;
use App\Models\BannerMarketDaily;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MarketdailyController extends Controller
{
	public function index($url = 'bai-viet-hang-ngay')
	{
		$urlMarketdaily = $url;

		// Banner
		$banner = BannerMarketDaily::first();

		// list daily post
		$dailyPosts = DailyPost::where('cate_daily_post_id', '=', '1')->orderBy('id', 'desc')->paginate(8);
		// dd($dailyPosts);

		// list báo cáo phân tích post
		$reportPosts = DailyPost::where('cate_daily_post_id', '=', '2')->orderBy('id', 'desc')->paginate(8);

		// list recomment
		// 		$recomments = Recomment::orderBy('id', 'desc')->limit(10)->get();

		// 	link_excel stock_portfolios
		$linkPortfolio = StockPortfolio::first();

		$dailyPosts->render('client.pages.marketdaily');

		// Đăng ký rồi => true => cho xem
		$flag_reg = false;

		if (Auth::user()) {
			if (Auth::user()->expiration > Carbon::now()) {
				$flag_reg = true;
			}
		}

		return view('client.pages.marketdaily', compact('dailyPosts', 'reportPosts', 'recomments', 'linkPortfolio', 'banner', 'urlMarketdaily', 'flag_reg'));
	}
}
