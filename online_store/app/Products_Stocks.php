<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_Stocks extends Model
{
    protected $table = 'products_stocks';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'stock_id','quantity'
    ];
}
 