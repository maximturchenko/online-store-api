<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_Orders extends Model
{
    protected $table = 'products_orders';
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'order_id','quantity_products'
    ];


}
