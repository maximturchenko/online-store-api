<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'phone_number','first_name','middle_name','last_name'
    ];
}
 