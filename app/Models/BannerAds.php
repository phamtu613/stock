<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerAds extends Model
{
    protected $table='banner_ads';
    protected $fillable = ['name', 'image', 'position', 'link'];
}
