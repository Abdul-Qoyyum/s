@extends('userdashboard')
@section('content')
<div class="card">
  <div class="card-body">
    <div>
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h2 class="text-left"><i class="fas fa-briefcase mr-2"></i><span class="job">Job</span></h2>
                </div>
                    <div class="card-body">
                    <h4>{{$task->name}}</h4>
                    <div class="row mb-2">
                        <div class="col">Type :</div>
                        <div class="col">{{$job->name}}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">Workflow :</div>
                        <div class="col">{{$workflow->name}}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">Main shoot :</div>
                        <div class="col">{{$task->start_date}}</div>
                    </div>
                  
                    <div class="d-flex">
                        <button class="btn btn-light mr-2"><i class="fas fa-edit mr-2"></i>Edit Job</button>
                        <div class="btn btn-light"><i class="fa fa-trash" aria-hidden="true"></i> Delete Job</div>
                    </div>
                </div>
              </div>


            </div>

            <!-- Client -->
            <div class="col-lg-6 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h2 class="text-left"><i class="fas fa-user mr-2"></i><span class="job">Client</span></h2>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                                <div>{{$client->firstname}} (Primary)</div>
                                <div>{{$client->email}}</div>
                        </div>
                    </div>
                  
                    <div class="d-flex">
                        <button class="btn btn-light mr-2"><i class="fas fa-edit mr-2"></i> <span style="font-size: 14px;">Edit Client</span></button>
                        <div class="btn btn-light"><i class="fa fa-paper-plane" aria-hidden="true"></i> <span style="font-size: 14px;">Send Email</span></div>
                    </div>

                </div>
              </div>
            </div>
              <!-- Invoice -->
              <div class="card shadow mb-4 w-100">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h2 class="text-left"><i class="fas fa-briefcase mr-2"></i><span class="job">Invoices</span></h2> 
                    <a href="{{route('job.invoice',$task->id)}}" class="btn btn-success">Add Invoice</a>
                </div>
                <div class="card-body">
                    @foreach ($invoices as $invoice)
                      <div class="row mt-2">
                            <div class="col">
                                <div class="d-flex justify-content-between mb-2 bg-light">
                                    <div class="col">Invoice {{$invoice->invoice_id}}</div>
                                    <div class="col">Total: ${{ $invoice->total }}</div>
                                </div>               
                                <div class="d-flex justify-content-between mb-2 bg-light">
                                    <div class="col">Next Payment Due 10 August 2020 (12 days ago)</div>
                                    <div class="col">Balance Due: $4,995.00</div>
                                </div>               

                                <div class="d-flex justify-content-start">
                                    <a  href="{{route('task.invoice',$task->id)}}" class="btn btn-light mr-2"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                    <div class="btn btn-light"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</div>
                                </div>

                            </div>                                              
                      </div>       
                      @endforeach


                </div>
              </div>
              <!-- End invoice section -->
          </div>
    </div>


  </div>
</div>    
@endsection