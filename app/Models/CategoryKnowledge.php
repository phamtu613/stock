<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryKnowledge extends Model
{
    protected $table = 'cate_knowledges';
    protected $fillable = ['name', 'slug', 'position'];

    public function knowledge()
    {
        return $this->hasMany('App\Models\Knowledge');
    }
}
