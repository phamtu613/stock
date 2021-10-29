<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
	use SoftDeletes;

	protected $table = 'courses';
	protected $fillable = ['title', 'slug', 'thumbnail', 'info_course', 'curriculum', 'price_old', 'price_current', 'link_excel', 'num_student', 'num_star', 'keyword', 'type', 'time', 'admin_id', 'cate_course_id'];


	public function categoryCourse()
	{
		return $this->belongsTo('App\Models\CategoryCourse', 'cate_course_id');
	}

	public function admin()
	{
		return $this->belongsTo('App\Models\Admin');
	}
}
