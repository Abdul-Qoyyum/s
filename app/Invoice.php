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
        'name',
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
        'subtotal',
        'total',
    ];

    /**
     * Get Invoice's task (Job)
     */
    public function task(){
        return $this->belongsTo('App\Task');
    }

}
