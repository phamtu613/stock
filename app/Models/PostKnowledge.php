<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostKnowledge extends Model
{
	protected $table='post_knowledge';
    protected $fillable=['title','description','image','content','slug','vip','category_id'];
}
