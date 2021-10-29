<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerMarketDaily extends Model
{
    protected $table='banner_market_dailies';
    protected $fillable = ['name', 'image'];
}
