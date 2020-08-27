<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Traits\HelperTraits;

use Illuminate\Support\Facades\Validator;

use App\Task;

use App\Invoice;

use App\Product;

class InvoiceController extends Controller
{

    use HelperTraits;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::findOrFail($request->task_id);

            $invoiceDetails = $request->only([
                'invoice_id',
                'issue_date',
                'po_number',
                'notes',
                'contracts',
                'description',
                'price',
                'quantity',
                'discount',
                'total',]) + ['task_id' => $task->id];

            $invoice = Invoice::create($invoiceDetails);

            notify()->success('Saved Successfully');
            //  redirect back to the task page
            return redirect()->route('jobs.show',$task->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
     * Show the invoice form for specific task
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function task($id){
//      task resource and relationships with other resource details
        $task = Task::findOrFail($id);
        $client = $task->client;
        $job = $task->job;
        $workflow = $task->workflow;

//      Options
        $packages = $this->getAllPackages();
        $taxes = $this->getTaxOptions();
        $contracts = $this->getContracts();
        $questionaires = $this->getQuestionaires();
         return view('users.invoice.create',compact('task','packages','taxes','contracts','client','job','workflow','questionaires'));
    }


    /**
     * Update Jobs
     *  
     * */    
    public function updateTask(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);
        //abort if validation fails
        if ($validator->fails()) {
                return;
        }
        $task = Task::findOrFail($id);
        $task->update($request->except(['_method','_token']));
        notify()->success('Updated Successfully');
        return redirect()->route('jobs.show',$task->id);

    }

    
}
