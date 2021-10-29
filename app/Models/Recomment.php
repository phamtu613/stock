<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recomment extends Model
{
    protected $table='recomments';
    protected $fillable=['date_recomment','content_recomment'];
}
