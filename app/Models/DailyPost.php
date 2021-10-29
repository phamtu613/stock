<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyPost extends Model
{
	use SoftDeletes;

	protected $table = 'daily_posts';
	protected $fillable = ['title', 'slug', 'description', 'content', 'thumbnail', 'image', 'num_view', 'vip', 'top_post', 'keyword', 'cate_daily_post_id', 'admin_id'];

	public function admin()
	{
		return $this->belongsTo('App\Models\Admin');
	}

	public function categoryPost()
	{
		return $this->belongsTo('App\Models\CateDailyPost', 'cate_daily_post_id');
	}
}
