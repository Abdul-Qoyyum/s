<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
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

    /**
     * Get lead's Job Type
     */
    public function job(){
       return $this->belongsTo('App\Job');
    }


    /**
     * Get lead's Workflow
     */
    public function workflow()
    {
        return $this->belongsTo('App\Workflow');
    }



}
