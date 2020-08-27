<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Traits\HelperTraits;

use App\Task;

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
        return $request->all();
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
}
