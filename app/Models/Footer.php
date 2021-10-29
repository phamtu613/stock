<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
	protected $table = 'footers';
	protected $fillable = ['info_footer', 'address', 'fanpage', 'image_trainer1', 'name_trainer1', 'desc_trainer1', 'image_trainer2', 'name_trainer2', 'desc_trainer2', 'image_trainer3', 'name_trainer3', 'desc_trainer3', 'image_trainer4', 'name_trainer4', 'desc_trainer4'];
}
