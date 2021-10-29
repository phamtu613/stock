<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Knowledge extends Model
{
    use SoftDeletes;

    protected $table='knowledges';
    protected $fillable = ['cate_knowledge_id', 'title', 'slug', 'description', 'content', 'thumbnail', 'image', 'num_view', 'vip', 'top_post', 'keyword', 'admin_id'];

    
    public function categoryKnowledge()
    {
        return $this->belongsTo('App\Models\CategoryKnowledge', 'cate_knowledge_id');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}
