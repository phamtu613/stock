<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CateAdvisoryInvest extends Model
{
    protected $table='cate_advisory_invests';
    protected $fillable=['name','slug', 'position'];
}
