<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
      /**
     * properties that are mass assignable
     * @var array
     */
    protected $fillable = [
        'name',
        'quote_id',
        'body',
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
