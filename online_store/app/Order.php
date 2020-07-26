<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id'
    ];

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
