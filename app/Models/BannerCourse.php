<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerCourse extends Model
{
    protected $table='banner_courses';
    protected $fillable = ['name', 'image'];
}
