<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CateDailyPost extends Model
{
    protected $table='cate_daily_posts';
    protected $fillable=['name','slug', 'position'];
}
