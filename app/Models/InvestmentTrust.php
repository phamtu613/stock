<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvestmentTrust extends Model
{
	use SoftDeletes;

	protected $table = 'investment_trusts';
	protected $fillable = ['name', 'email', 'phone', 'content', 'status_contact', 'admin_id'];

	public function admin()
	{
		return $this->belongsTo('App\Models\Admin', 'admin_id');
	}
}
