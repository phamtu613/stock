<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
	use SoftDeletes;

	protected $table = 'carts';
	protected $fillable = ['name', 'email', 'phone', 'note', 'status_payment', 'user_id', 'course_id', 'admin_id'];

	public function course()
	{
		return $this->belongsTo('App\Models\Course', 'course_id');
	}

	public function admin()
	{
		return $this->belongsTo('App\Models\Admin');
	}
}
