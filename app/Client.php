<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    /**
     * Properties that are mass assignable
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'address',
        'town',
        'postcode',
        'state',
        'country',
        'notes',
        'user_id',
    ];

    

}
