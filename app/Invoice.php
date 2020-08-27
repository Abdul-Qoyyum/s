<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * properties that are mass assignable
     * @var array
     */
    protected $fillable = [
        'invoice_id',
        'issue_date',
        'po_number',
        'task_id',
        'notes',
        'contracts',
        'description',
        'price',
        'quantity',
        'discount',
        'total',
    ];

    

}
