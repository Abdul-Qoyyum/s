<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Traits\HelperTraits;

use App\Job;

use App\Task;

use App\Workflow;


class TaskController extends Controller
{
    
    //Custom traits
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
        $tasks = Auth::user()->tasks;
        // return $tasks;
        $jobs = $this->getJobs();
        $workflows = $this->getWorkflows();
        $clients = $this->getUserClients();
        return view('users.tasks.index',compact('tasks','jobs','workflows','clients'));
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

        Auth::user()->tasks()->create($request->all());
        notify()->success("Saved Successfully");
        return redirect()->route('jobs.index');
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
        $task = Task::findOrFail($id);
        $jobs = $this->getJobs();
        $workflows = $this->getWorkflows();
        $clients = $this->getUserClients();
        return view('users.tasks.edit',compact('task','jobs','workflows','clients'));
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
        Task::findOrFail($id)->update($request->except(['_method','_token']));
        notify()->success('Updated Successfully');
        return redirect()->route('jobs.index');
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

}
