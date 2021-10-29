<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerKnowledge extends Model
{
    protected $table='banner_knowledge';
    protected $fillable = ['name', 'image'];
}
