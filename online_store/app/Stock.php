<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    /**
     * The products that belong to the stock.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product','products_stocks','stock_id','product_id');
    }
}
