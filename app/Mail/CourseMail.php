<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CourseMail extends Mailable
{
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public $data;

	public function __construct($data)
	{
		$this->data = $data;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->view('mails.course')
			->from('hotro@alphastock.vn', 'AlphaStock.vn')
			->subject('[AlphaStock.vn] Thư xác nhận đăng ký khóa học thành công')
			->with($this->data);
	}
}
