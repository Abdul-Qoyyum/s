<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Traits\HelperTraits;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

use App\Task;

use App\Invoice as InvoiceModel;

use App\Product;

use App\Package;

use App;

use PDF;

class InvoiceController extends Controller
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

        $package = Package::findOrFail($request->package_id);

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
                'subtotal',
                'total',]) + [
                    'task_id' => $task->id,
                    'name' => $package->name,
                ];

            $invoice = InvoiceModel::create($invoiceDetails);

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
        $user = Auth::user();
        $invoice = InvoiceModel::findOrFail($id);
        $task = $invoice->task;
        $client = $task->client;
        return view('users.invoice.show',compact('user','invoice','task','client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = InvoiceModel::findOrFail($id);
        $task = $invoice->task;
        $client = $task->client;
        $job = $task->job;
        $workflow = $task->workflow;

//      Options
        $packages = $this->getAllPackages();
        $taxes = $this->getTaxOptions();
        $contracts = $this->getContracts();
        $questionaires = $this->getQuestionaires();
        $paymentSchedules = $this->getPaymentSchedules();
        return view('users.invoice.edit',compact('task','packages','taxes','contracts','client','job','workflow','questionaires','invoice','paymentSchedules'));

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
        $task = Task::findOrFail($request->task_id);
        // make package name update optional
        $package = ($request->has('package_id') && !empty($request->input('package_id'))) ? Package::findOrFail($request->package_id) : null;

        $name = []; 

        if($package){
           $name =  ['name' => $package->name,]; //change package name if only it exists
        }
        
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
                'subtotal',
                'total',]) + [
                    'task_id' => $task->id,] + $name;
            // update the invoice resource
            $invoice = InvoiceModel::where('id',$id)->update($invoiceDetails);

            notify()->success('Updated Successfully');
            //  redirect back to the task page
            return redirect()->route('jobs.show',$task->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = InvoiceModel::findOrFail($id);
        // Grab corresponding task id
        $task_id = $invoice->task->id;
        // Delete invoice
        $invoice->delete();
        notify()->success("Deleted Successfully");
        return redirect()->route('jobs.show',$task_id);
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
            notify()->warning('Oops something went wrong :)');
            return redirect()->back();
        }
        $task = Task::findOrFail($id);
        $task->update($request->except(['_method','_token']));
        notify()->success('Updated Successfully');
        return redirect()->route('jobs.show',$task->id);

    }

    /**
     * Renders invoice pdf format
     * @param int $id
     */
    public function preview($id){
        $user = Auth::user();
        $invoice = InvoiceModel::findOrFail($id);
        $task = $invoice->task;
        $client = $task->client;
        $view = view('users.invoice.invoice',compact('user','task','client','invoice'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream();
    }

    /**
     * Download the pdf for the invoice
     * @param int $id 
     */
    public function downloadPDF($id){
        $user = Auth::user();
        $invoice = InvoiceModel::findOrFail($id);
        $task = $invoice->task;
        $client = $task->client;
        $view = view('users.invoice.invoice',compact('user','task','client','invoice'))->render();
        $pdf = PDF::loadHtml($view);
        $time = \Carbon\Carbon::now();
        return $pdf->download("invoice-$time.pdf");
    }

    public function updateNote(){
        
    }

}
