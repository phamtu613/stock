<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostAdvisoryInvest extends Model
{
    protected $table='post_advisory_invests';
    protected $fillable = ['title', 'slug', 'content', 'thumbnail', 'image', 'num_view', 'keyword', 'cate_advisory_invest_id','admin_id'];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function cateAdvisoryInvest()
    {
        return $this->belongsTo('App\Models\CateAdvisoryInvest');
    }
}
