<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
{
    protected $table='cate_courses';
    protected $fillable=['name','slug', 'position'];
}
