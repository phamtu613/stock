<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
	use SoftDeletes;

	protected $table = 'contacts';
	protected $fillable = ['name', 'email', 'phone', 'content', 'status_contact', 'admin_id'];

	public function admin()
	{
		return $this->belongsTo('App\Models\Admin');
	}
}
