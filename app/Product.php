<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * properties that are mass assignable
     */
    protected $fillable = [
       'description',
       'price',
       'quantity',
       'total',
    ];
}
