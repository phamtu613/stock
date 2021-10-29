<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlphaSystem extends Model
{
    protected $table = 'alpha_systems';
    protected $fillable = ['image_chart','image_chart_week', 'date_upload', 'cate_alpha_system_id'];

    public function categorySystem()
    {
        return $this->belongsTo('App\Models\CateAlphaSystem', 'cate_alpha_system_id');
    }
}
