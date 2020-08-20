<?php

namespace App\Http\Controllers\Traits;

use App\Job;

use App\Workflow;

use Illuminate\Support\Facades\Auth;

trait HelperTraits{

    /**
     * Organise jobs for leads
     */
    public function getJobs(){
        //Get all job's collection
        $jobsCollection = Job::all();
        //job's container
        $jobs = [];
        foreach($jobsCollection as $job){
          $jobs[$job->id] = $job->name;
        }
        return $jobs;
    }

    /**
     * Organize workflows for lead
     */
    public function getWorkflows(){
        //Get all workflow's collection
        $workflowCollection = Workflow::all();
        //workflow's container
        $workflows = [];
        foreach($workflowCollection as $workflow){
           $workflows[$workflow->id] = $workflow->name;
        }
        return $workflows;
    }

    /**
     * Organize user's clients for leads
     */
    public function getUserClients(){
        // get user's clients
        $clientCollection = Auth::user()->clients;
        $clients = [];
        foreach($clientCollection as $client){
           $clients[$client->id] = "($client->firstname) &nbsp; $client->email";
        }
        return $clients;
    }

    
}