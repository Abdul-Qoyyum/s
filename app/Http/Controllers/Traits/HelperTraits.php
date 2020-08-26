<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\Auth;

use App\Job;

use App\Workflow;

use App\Package;

use App\Option;

use App\Contract;

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


    /**
     * Organise all packages for invoice
     */
    public function getAllPackages(){
       $packageCollection = Package::all();
       $packages = [];
       foreach($packageCollection as $package){
          $packages[$package->id] = $package->name;
       }
       return $packages;
    }

    /**
     * Organise all tax options for invoice view
     */
    public function getTaxOptions(){
        $optionCollection = Option::all();
        $options = [];
        foreach($optionCollection as $option){
           $options[$option->id] = $option->name;
        }
        return $options;
    }

    /**
     * Organise all Contracts for invoice view
     */
    public function getContracts(){
        $contractCollection = Contract::all();
        $contracts =  [];
        foreach($contractCollection as $contract){
          $contracts[$contract->id] = $contract->name;
        }
        return $contracts;
    }

}