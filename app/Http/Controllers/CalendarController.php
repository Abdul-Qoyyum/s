<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Traits\HelperTraits;

use App\Task;

class CalendarController extends Controller
{

    use HelperTraits;

    /**
     * Renders the calendar index page
     */
    public function index(){
        $tasks = Task::all();
        $clients = $this->getUserClients();    
        $jobs = $this->getJobs();
        $workflows = $this->getWorkflows();    
        $calendar = \Calendar::addEvents($tasks);
        return view('users.calendar.index',compact('calendar','clients','jobs','workflows'));
    }
}
