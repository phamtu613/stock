<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Knowledge;
use App\Models\DailyPost;
use App\Models\BannerAds;
use App\Models\OpenAccount;
use App\Models\PostAdvisoryInvest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\InvestmentConsulting;
use App\Models\InvestmentTrust;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\OpenAccountRequest;
use App\Mail\InvestmentConsultingMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\OpenAccountMail;
use App\Mail\InvestmentTrustMail;
use Carbon\Carbon;

class DetailPostController extends Controller
{
	// Chi tiết kiến thức chung
	public function knowledgeDetail($slug, $id)
	{
		// Update num view
		$numViewPost = Knowledge::where('id', $id)
			->select('num_view')
			->first();

		Knowledge::where('id', $id)->update([
			'num_view' => $numViewPost->num_view + 1
		]);

		// get post detail
		$post = Knowledge::where('id', $id)->first();

		// cờ bật danh mục
		$flag_reg = false;

		// HSD lớn hơn ngày hiện tại => vip => mở danh mục ra
		if (Auth::user()) {
			if ((Auth::user()->expiration > Carbon::now()) && Auth::user()->deleted_vip == '0') {
				$flag_reg = true;
			}
		}

		$opacity_text = false;

		// post is Vip
		if ($post->vip == 'Vip') {
			if (Auth::user()) {
				if ($flag_reg) {
					$post->content = $post->content;
				} else {
					$post->content = Str::substr($post->content, 0, 500);
					$opacity_text = true;
				}
			} else {
				$post->content = Str::substr($post->content, 0, 500);
				$opacity_text = true;
			}
		}

		// list post hiển thị sidebar
		$topPosts = Knowledge::where('top_post', '=', 'Hiển thị')->get();

		// relative post 
		$relativePosts = Knowledge::whereNotIn('id', [$id])->orderBy('id', 'DESC')->limit(2)->get();

		// url detail
		$urlDetail = 'client.knowledgeDetail';

		// Banner Ads
		$bannerAds =  BannerAds::orderBy('position', 'ASC')->get();

		$urlCurrent = url()->current();
		$urlLogin = "/login?key=" . $urlCurrent;

		return view('client.pages.detail-post', compact('post', 'topPosts', 'relativePosts', 'urlDetail', 'bannerAds', 'urlLogin', 'flag_reg', 'opacity_text'));
	}

	// Chi tiết bài viết hằng ngày
	public function marketDailyPostDetail($slug, $id)
	{
		// Update num view
		$numViewPost = DailyPost::where('id', $id)
			->select('num_view')
			->first();

		DailyPost::where('id', $id)->update([
			'num_view' => $numViewPost->num_view + 1
		]);

		// get post detail
		$post = DailyPost::where('id', $id)->first();

		// cờ bật danh mục
		$flag_reg = false;

		// HSD lớn hơn ngày hiện tại => vip => mở danh mục ra
		if (Auth::user()) {
			if ((Auth::user()->expiration > Carbon::now()) && Auth::user()->deleted_vip == '0') {
				$flag_reg = true;
			}
		}
		$opacity_text = false;

		// post is Vip
		if ($post->vip == 'Vip') {
			if (Auth::user()) {
				if ($flag_reg) {
					$post->content = $post->content;
				} else {
					$post->content = Str::substr($post->content, 0, 500);
					$opacity_text = true;
				}
			} else {
				$post->content = Str::substr($post->content, 0, 500);
				$opacity_text = true;
			}
		}

		// list post hiển thị sidebar
		$topPosts = Knowledge::where('top_post', '=', 'Hiển thị')->get();

		// relative post 
		$relativePosts = DailyPost::whereNotIn('id', [$id])->orderBy('id', 'DESC')->limit(2)->get();

		// url detail
		$urlDetail = 'client.marketdailyDetail';

		// Banner Ads
		$bannerAds =  BannerAds::orderBy('position', 'ASC')->get();

		$urlCurrent = url()->current();
		$urlLogin = "/login?key=" . $urlCurrent;

		// HSD lớn hơn ngày hiện tại => vip => mở danh mục ra
		if (Auth::user()) {
			if ((Auth::user()->expiration > Carbon::now()) && Auth::user()->deleted_vip == '0') {
				$flag_reg = true;
			}
		}

		return view('client.pages.detail-post', compact('post', 'topPosts', 'relativePosts', 'urlDetail', 'bannerAds', 'urlLogin', 'flag_reg', 'opacity_text'));
	}

	// Chi tiết bài viết
	public function detailAdvisoryInvest($slug, $id)
	{
		// Update num view
		$numViewPost = PostAdvisoryInvest::where('id', $id)
			->select('num_view')
			->first();

		PostAdvisoryInvest::where('id', $id)->update([
			'num_view' => $numViewPost->num_view + 1
		]);

		// get post detail
		$post = PostAdvisoryInvest::where('id', $id)->first();

		// relative post
		$relativePosts = DailyPost::orderBy('id', 'DESC')->limit(2)->get();

		// url detail
		$urlDetail = 'client.marketdailyDetail';

		return view('client.pages.post-register-form', compact('post', 'relativePosts', 'urlDetail'));
	}

	//  Tư vấn đầu tư
	public function registerInvestmentConsulting(ContactRequest $request)
	{
		InvestmentConsulting::create([
			'name' => $request->name,
			'email' => $request->email,
			'phone' => $request->phone,
			'content' => $request->content,
		]);

		$data = [
			'name' => $request->name,
			'email' => $request->email,
		];

		// Gửi mail
		Mail::to($request->email)
			->cc([env('MAIL_FROM_ADDRESS')])
			->send(new InvestmentConsultingMail($data));

		return redirect()->back()->with(['success' => 'Chúng tôi sẽ liên hệ bạn sớm nhất có thể', 'hotline' => 'Hotline: 0905915183']);
	}

	//  Ủy thác đầu tư
	public function registerInvestmentTrust(ContactRequest $request)
	{
		InvestmentTrust::create([
			'name' => $request->name,
			'email' => $request->email,
			'phone' => $request->phone,
			'content' => $request->content,
		]);

		$data = [
			'name' => $request->name,
			'email' => $request->email,
		];

		// Gửi mail
		Mail::to($request->email)
			->cc([env('MAIL_FROM_ADDRESS')])
			->send(new InvestmentTrustMail($data));

		return redirect()->back()->with(['success' => 'Chúng tôi sẽ liên hệ bạn sớm nhất có thể', 'hotline' => 'Hotline: 0905915183']);
	}

	//  Mở tài khoản
	public function registerOpenAccount(Request $request)
	{
		dd($request->all());
		OpenAccount::create([
			'fullname' => $request->fullname,
			'birthday' => $request->birthday,
			'date_permit' => $request->date_permit,
			'identity_card' => $request->identity_card,
			'address_permit' => $request->address_permit,
			'address_full' => $request->address_full,
			'email' => $request->email,
			'phone' => $request->phone,
			'username_bank' => $request->username_bank,
			'account_number' => $request->account_number,
			'branch_bank' => $request->branch_bank,
			'content' => $request->content,
		]);

		$data = [
			'name' => $request->fullname,
			'email' => $request->email,
		];

		// Gửi mail
		Mail::to($request->email)
			->cc([env('MAIL_FROM_ADDRESS')])
			->send(new OpenAccountMail($data));

		return redirect()->back()->with(['success' => 'Chúng tôi sẽ liên hệ bạn sớm nhất có thể', 'hotline' => 'Hotline: 0905915183']);
	}
}
