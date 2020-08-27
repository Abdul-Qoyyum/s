<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model implements \Asdfx\LaravelFullcalendar\Event
{

    protected $color = '#fff';

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



    protected $dates = ['start', 'end'];

    /**
     * Get the event's id number
     *
     * @return int
     */
    public function getId() {
		return $this->id;
	}

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->name;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        // return (bool)$this->all_day;
        return false;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        // return $this->start_date;
        return \Carbon\Carbon::parse($this->start_date);
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        // return $this->end_date;
        return \Carbon\Carbon::parse($this->end_date);
    }



    /**
     * Optional FullCalendar.io settings for this event
     *
     * @return array
     */
    public function getEventOptions()
    {
        return [
            'color' => $this->color,
			//etc
        ];
    }




    
    /**
     * Get Task's client
     */
    public function client(){
        return $this->belongsTo('App\Client');
    }

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

    /**
     * Get task's invoice
     */
    public function invoices(){
        return $this->hasMany('App\Invoice');
    }


}
