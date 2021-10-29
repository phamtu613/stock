<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockPortfolio extends Model
{
    protected $table='stock_portfolios';
    protected $fillable=['link_excel'];
}
