<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvestmentConsulting extends Model
{
	use SoftDeletes;

	protected $table = 'investment_consultings';
	protected $fillable = ['name', 'email', 'phone', 'content', 'status_contact'];

	public function admin()
	{
		return $this->belongsTo('App\Models\Admin', 'admin_id');
	}
}
