<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    /**
     * Properties that are mass assignable
     */
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'location',
        'notes',
        'user_id',
        'client_id',
        'workflow_id',
        'job_id',
    ];
}
