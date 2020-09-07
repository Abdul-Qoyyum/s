<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Traits\HelperTraits;

use Illuminate\Support\Str;

use App\Exports\LeadExport;

use App\Http\Resources\LeadResource;

use Maatwebsite\Excel\Facades\Excel;

use App\Job;

use App\Lead;

use App\Workflow;

class LeadController extends Controller
{

    // use custom trait
    use HelperTraits;

    public function __construct(){
       $this->middleware('auth');
    }

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
        $emailTemplates = $this->getEmailTemplates();
        return view('users.leads.index',compact('leads','jobs','workflows','clients','emailTemplates'));
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
        return "This page is currently under maintainance";
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
        Lead::findOrFail($id)->update($request->except(['_method','_token']));
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
     * Send the lead
     */
    public function send(Request $request){
        
        // return $request->all();

        $validator = Validator::make($request->all(),[
           'email' => 'required|email:rfc,dns',
           'name'=>'required',
           'subject'=>'required',
           'message'=> 'required',
        ]); 
        
        if($validator->fails()){
           notify()->warning("Oops something went wrong :)");
           return redirect()->back();
        }

        //Replace parameters placeholders
        $body = Str::replaceArray('%client_name%', [$request->name], $request->message);


      try{
            Mail::send([], [], function ($message) use ($request, $body) {
               // use company in place of users later
                $user = Auth::user();
                // $message->from($user->email, $user->name);
                $message->sender($user->email, $user->name);
                $message->to($request->email, $request->name);
                $message->subject($request->subject);
                $message->setBody($body,'text/html');
            });

            notify()->success("Message Sent");
            return redirect()->back();

      }catch(\Exception $e){
          notify()->warning("Oops something went wrong :)");
          return redirect()->back();
      }


    }





    
    /**
     * Export the leads
     */
    public function export(){
      return Excel::download(new LeadExport, 'leads.xlsx');
    }

    /**
     * Get lead's users
     */
    public function users(){
        // Replace with company leads later
        $lead = Auth::user()->leads;
        return LeadResource::collection($lead);
    }

}
