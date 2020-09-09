<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\Auth;

use App\Job;

use App\Workflow;

use App\Package;

use App\Option;

use App\Contract;

use App\Questionaire;

use App\PaymentSchedule;

use App\EmailTemplate;

trait HelperTraits{

    /**
     * Get all jobs
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
     * Get all workflows
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
     * Get all user's clients
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
     * Get all packages
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
     * Get all tax options
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
     * Get all Contracts
     */
    public function getContracts(){
        $contractCollection = Contract::all();
        $contracts =  [];
        foreach($contractCollection as $contract){
          $contracts[$contract->id] = $contract->name;
        }
        return $contracts;
    }

    /**
     * Get all Questionnaires
     */
    public function getQuestionaires(){
        $questionaireCollection = Questionaire::all();
        $questionaires = [];
        foreach($questionaireCollection as $questionaire){
           $questionaires[$questionaire->id] = $questionaire->name; 
        }
        return $questionaires;
    }

    /**
     * Get all payment schedule
     */
    public function getPaymentSchedules(){
        $paymentScheduleCollection = PaymentSchedule::all();
        $paymentSchedules = [];
        foreach($paymentScheduleCollection as $paymentSchedule){
          $paymentSchedules[$paymentSchedule->id] = $paymentSchedule->name;
        }
        return $paymentSchedules;
    }

    /**
     * Get all email templates
     */
    public function getEmailTemplates(){
       $emailTemplateCollection = EmailTemplate::all();
       $emailTemplates = [];
       foreach($emailTemplateCollection as $emailTemplate){
         $emailTemplates[$emailTemplate->id] = $emailTemplate->name;
       }
       return $emailTemplates;
    }
}