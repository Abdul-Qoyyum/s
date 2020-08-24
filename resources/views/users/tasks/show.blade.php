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
                  <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>


            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                  <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
                </div>
              </div>

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                  <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                  <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                </div>
              </div>

            </div>
          </div>
    </div>

    {{-- <div> --}}


        <div class="row justify-content-between">
            <!-- Job -->
            <div class="col-md-6 main-jobs-cell">
                <h2 class="text-left"><i class="fas fa-briefcase mr-2"></i><span class="job">Job</span></h2>
                <hr>        
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
            <!-- Client -->
            <div class="col-md-6 main-jobs-cell">
                <h2 class="text-left"><i class="fas fa-user mr-2"></i><span class="job">Client</span></h2>
                <hr>        
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
      <!-- Invoice -->
       <div class="row mt-2">
            <div class="col main-jobs-cell">
              <div class="d-flex justify-content-between">
                <h2 class="text-left"><i class="fas fa-briefcase mr-2"></i><span class="job">Invoices</span></h2> 
                <a href="{{route('invoice.create')}}" class="btn btn-success">Add Invoice</a>
              </div>
                <hr>        
                <div class="d-flex justify-content-between mb-2 bg-light">
                    <div class="col">Invoice 20200803</div>
                    <div class="col">Total: $4,995.00</div>
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


    {{-- </div> --}}
  </div>
</div>    
@endsection