<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description','price','category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }

    /**
     * The stocks that belong to the product.
     */
    public function stocks()
    {
        return $this->belongsToMany('App\Stock','products_stocks','product_id','stock_id');
    }

    /**
     * The orders that belong to the product.
     */
    public function orders()
    {
        return $this->belongsToMany('App\Order','products_orders','product_id','order_id');
    }
 
    public function products_stocks()
    {
        return $this->hasMany('App\Products_Stocks','product_id');
    } 
}
 