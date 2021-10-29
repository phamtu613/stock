<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OpenAccount extends Model
{
	use SoftDeletes;

	protected $table = 'open_accounts';
	protected $fillable = ['fullname', 'birthday', 'identity_card', 'date_permit', 'address_permit', 'address_full', 'email', 'phone', 'username_bank', 'account_number', 'branch_bank', 'content', 'status_contact'];

	public function admin()
	{
		return $this->belongsTo('App\Models\Admin', 'admin_id');
	}
}
