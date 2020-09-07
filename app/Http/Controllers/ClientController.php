<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Traits\HelperTraits;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

use App\Http\Resources\ClientResource;

use App\Exports\ClientExport;

use App\Imports\ClientImport;

use App\Exports\ClientSampleExport;

use App\Client;

class ClientController extends Controller
{

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
        $user = Auth::user();

        $clients = $user->clients()->orderBy('id','DESC')->get();
        $emailTemplates = $this->getEmailTemplates();
        return view('users.clients.index',compact('clients','emailTemplates'));
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
        // get currently authenticated in user
        $user = Auth::user();
        // validates incoming request
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'email' => 'email:rfc,dns'
        ]);
        //redirect back if validation fails
        if ($validator->fails()) {
            notify()->warning('Oops something went wrong :)');
            return redirect()->back();
        }
        // store user's client's data
        $user->clients()->create($request->all());
        notify()->success('Saved successfully');
        return redirect()->back();
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
        $client = Client::findOrFail($id);
        return view('users.clients.edit',compact('client'));
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
        // validates incoming request
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'email' => 'email:rfc,dns'
        ]);
        //redirect back if validation fails
        if ($validator->fails()) {
            notify()->warning('Oops something went wrong :)');
            return redirect()->back();
        }

        Client::findOrFail($id)->update($request->all());
        notify()->success('Updated Successfully');
        return redirect()->route('client.index');
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
     * Send the client's message
     */
    public function send(Request $request){
        
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
     * Export clients to csv 
     */
    public function export() 
    {
        return Excel::download(new ClientExport, 'clients.xlsx');
    }


    /**
     * Import client's CSV file 
     * @return \Illuminate\Http\Response
     */
    public function import() 
    {

        return request()->file('file');
        
        try {
                $import->import(request()->file('file'));
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                $failures = $e->failures();     
                // foreach ($failures as $failure) {
                //     $failure->row(); // row that went wrong
                //     $failure->attribute(); // either heading key (if using heading row concern) or column index
                //     $failure->errors(); // Actual error messages from Laravel validator
                //     $failure->values(); // The values of the row that has failed.
                // }
           }


    }

    /**
     * Export sample CSV for client
     */
    public function exportClientSampleCSV(){
        return Excel::download(new ClientSampleExport, 'clients_sample.xlsx');
    }


    /**
     * Get client user's details
     */
    public function users(){
        // Replace with company later
        // $clients = Auth::user()->clients;
        return ClientResource::collection(Auth::user()->clients);
    }


}
