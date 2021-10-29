<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Mail\Contact as MailContact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

	public function index()
	{
		return view('client.pages.contact');
	}

	public function contact(ContactRequest $request)
	{
		Contact::create([
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
			->cc(['hotro@alphastock.vn'])
			->send(new ContactMail($data));

		return redirect()->back()->with('status', 'Cảm ơn bạn đã liện hệ với chúng tôi, nhân viên chăm sóc sẽ sớm liên lạc với bạn ngay!');
	}
}
