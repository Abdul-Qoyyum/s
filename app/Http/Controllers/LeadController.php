<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use App\Job;

use App\Lead;

use App\Workflow;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Auth::user()->leads;
        $jobs = $this->getJobs();
        $workflows = $this->getWorkflows();
        $clients = $this->getUserClients();
        return view('users.leads.index',compact('leads','jobs','workflows','clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        //abort if validation fails
        if ($validator->fails()) {
                return;
        }

        Auth::user()->leads()->create($request->all());
        notify()->success("Saved Successfully");
        return redirect()->route('lead.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        $jobs = $this->getJobs();
        $workflows = $this->getWorkflows();
        $clients = $this->getUserClients();
        return view('users.leads.edit',compact('lead','jobs','workflows','clients'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        //abort if validation fails
        if ($validator->fails()) {
                return;
        }

        $user = Auth::user()->leads()->update($request->except(['_method','_token']));
        notify()->success('Updated Successfully');
        return redirect()->route('lead.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store a newly created client's resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function client(Request $request){
      // get currently authenticated in user
      $user = Auth::user();
      // validates incoming request
      $validator = Validator::make($request->all(), [
          'firstname' => 'required',
          'email' => 'email:rfc,dns'
      ]);
      //redirect back if validation fails
      if ($validator->fails()) {
            return;
      }
      // store user's client's data
      $client = $user->clients()->create($request->all());
      
      return response()->json([
        'id' => $client->id,
        'firstname' => $client->firstname,
        'email' => $client->email,
      ],200);

    }


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
