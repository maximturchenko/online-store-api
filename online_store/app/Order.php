<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    
    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id');
    }
    /**
     * The orders that belong to the product.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product','products_orders','order_id','product_id');
    }
}
