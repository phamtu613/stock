<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoStock extends Model
{
    protected $table = 'info_stocks';
    protected $fillable = ['phone1', 'phone2', 'email', 'facebook', 'map'];
}
