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
                        <button class="btn btn-light mr-2" data-toggle="modal" data-target="#editJob"><i class="fas fa-edit mr-2"></i>Edit Job</button>
                        {!! Form::open(['route'=>['jobs.destroy',$task->id],'method'=>'delete']) !!}
                        <button type="submit"  class="btn btn-light"><i class="fa fa-trash" aria-hidden="true"></i> Delete Job</button>
                        {!! Form::close() !!}
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
                        <button class="btn btn-light mr-2" data-toggle="modal" data-target="#editClient"><i class="fas fa-edit mr-2"></i> <span style="font-size: 14px;">Edit Client</span></button>
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
                                    <div class="col">Balance Due: ${{ $invoice->total }}</div>
                                </div>               

                                <div class="d-flex justify-content-start">
                                    <a  href="{{route('invoice.show',$invoice->id)}}" class="btn btn-light mr-2"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                    <div class="btn btn-light" data-toggle="modal" data-target="#sendInvoice"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</div>
                                </div>

                            </div>                                              
                      </div>       
                      <hr>  
                      @endforeach
                </div>
              </div>
              <!-- End invoice section -->
                    <!-- notes section -->
                    <div class="card shadow mb-4 w-100">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h2 class="text-left"><i class="fas fa-sticky-note mr-2"></i><span class="job">Notes:</span></h2> 
                        </div>
                      <div class="card-body">
                        <div class="row mt-2">
                            <div class="col">
                                <p class="text-center">Make your notes a work of art</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button  type="button" class="btn btn-light mr-2" data-toggle="modal" data-target="#editNote"><i class="fa fa-plus mr-2" aria-hidden="true"></i> Add Notes</button>
                                </div>
                           </div>                
                       </div>       
                      </div>
                    </div>

          </div>
    </div>
  </div>
</div>    

<!-- Modal section starts here -->

<!-- Edit Job Modal -->
<div class="modal fade modal_1" id="editJob" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                          <!-- collective form -->

                        {!! Form::model($task, ['action'=>['InvoiceController@updateTask',$task->id],'method'=>'PATCH','id'=>'task']) !!}

                              <div class="row h-100">
                                  <div class="font-weight-bold col-md align-middle">Choose Client</div>
                                  <div class="col-md-4 form-group">
                                    {{-- {!! Form::text('email', null, ['class'=>'form-control clientEmail','placeholder'=>'Email']) !!} --}}
                                    {!! Form::select('client_id', $clients, null, ['class' => 'form-control']) !!}
                                  </div>
                                  <span class="align-middle"><strong>OR</strong></span>
                                  <div class="col-md">
                                    <!-- Button trigger addClient modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClient">
                                      <i class="fa fa-plus mr-1" aria-hidden="true"></i><span>Add new client</span>
                                    </button>
                                  </div>
                              </div>

                                <hr>
                                <p style="font-weight: bold;">Job Details</p>
                                   <div class="form-group">
                                       {!! Form::label('name', 'Job name:') !!}
                                       {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                   </div>
                                   <div class="form-group">
                                     {!! Form::label('job_id', 'Job type:') !!}
                                     {!! Form::select('job_id', $jobs, 1, ['class'=>'form-control']) !!}
                                   </div>
                                    <div class="form-group">
                                     {!! Form::label('workflow_id', 'Workflow:') !!}
                                     {!! Form::select('workflow_id', $workflows, 1, ['class'=>'form-control']) !!}
                                   </div>
                                   <hr>
                                <p style="font-weight: bold;">Main shoot</p>
                                    <div class="form-group row">
                                     {!! Form::label('start_date', 'Date:',['class'=>'col-md-2']) !!}
                                     {!! Form::date('start_date', \Carbon\Carbon::now(), ['class'=>'form-control col-md-4']) !!}
                                     <div class="col-md-1 text-center"> <strong>to</strong></div>
                                     {!! Form::date('end_date', \Carbon\Carbon::now(), ['class'=>'form-control col-md-4']) !!}
                                   </div>
                                  <div class="form-group row">
                                     {!! Form::label('start_time', 'Time:',['class'=>'col-md-2']) !!}
                                     {!! Form::time('start_time', \Carbon\Carbon::now(), ['class'=>'form-control col-md-4']) !!}
                                     <div class="col-md-1 text-center"> <strong>to</strong></div>
                                     {!! Form::time('end_time', \Carbon\Carbon::now(), ['class'=>'form-control col-md-4']) !!}
                                   </div>
                                   <div class="form-group">
                                     {!! Form::label('location', 'Location') !!}
                                     {!! Form::text('location', null, ['class'=>'form-control']) !!}
                                   </div>
                                    <hr>
                                    <div class="form-group">
                                      {!! Form::label('notes', 'Job Notes:', ['class'=>'font-weight-bold']) !!}
                                      {!! Form::textarea('notes', null, ['class'=>'form-control notes']) !!}
                                    </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Save changes">
                            </div>
                                {!! Form::close() !!}                                

      </div>
    </div>
  </div>
</div>

        <!-- Add Client Modal --> 
        <div class="modal fade modal_1" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-align" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add A New Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                    <form id="client">
                      @csrf
                  <div class="modal-body">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="display">
                        <label class="form-check-label" for="display">This client is a company and invoices will be addressed to the company.</label>
                      </div>
                      <div class="company hidden">
                        <div class="form-group">
                          <label for="company">Company</label>
                          <input type="text" name="company" class="form-control" value="">
                        </div>
                        <div class="form-group">
                          <label for="businessno">Business Number</label>
                          <input type="text" name="businessno" class="form-control" value="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label for="firstname">First Name*</label>
                          <input type="text" name="firstname" class="form-control"  value="">
                        </div>
                        <div class="col-md-6">
                          <label for="lastname">Last Name</label>
                          <input type="text" name="lastname" class="form-control"  value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" value="">
                      </div>
                      <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" name="email" class="form-control" value="">
                      </div>
                      <div class="form-group">
                        <label for="address">Street Address</label>
                        <input type="text" name="address" class="form-control" value="">
                      </div>
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label for="town">Suburb/Town</label>
                          <input type="text" name="town" class="form-control"  value="">
                        </div>
                        <div class="col-md-6">
                          <label for="postcode">Postcode/Zip</label>
                          <input type="text" name="postcode" class="form-control"  value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" name="state" class="form-control" value="">
                      </div>
                      <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" name="country" class="form-control" value="">
                      </div>
                      <div class="form-group">
                        <label for="notes">Client Notes</label>
                        <textarea name="notes" rows="8" cols="80" class="form-control notes"></textarea>
                      </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="profile">Save Client Profile</button>
                  </div>
                </form>
                </div>
              </div>

            </div>
          </div>
        </div>



<!-- Edit Client Modal -->
<div class="modal fade modal_1" id="editClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              {!! Form::model($client, ['route'=>['client.update',$client->id],'method'=>'PATCH','class'=>'client']) !!}
      <div class="form-check">
        <input type="checkbox" class="form-check-input display">
        <label class="form-check-label" for="display">This client is a company and invoices will be addressed to the company.</label>
      </div>
      <div class="company hidden">
        <div class="form-group">
            {!! Form::label('company', 'Company:') !!}
            {!! Form::text('company', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('businessno', 'Business Number:') !!}
            {!! Form::text('businessno', null, ['class'=>'form-control']) !!}
        </div>
      </div>
         <div class="form-group row">
           <div class="col-md-6">
             {!! Form::label('firstname', 'First Name:*') !!}
             {!! Form::text('firstname', null, ['class'=>'form-control']) !!}
           </div>
           <div class="col-md-6">
               {!! Form::label('lastname', 'Last Name:') !!}
               {!! Form::text('lastname', null, ['class'=>'form-control']) !!}
           </div>
        </div>
        <div class="form-group">
            {!! Form::label('phone', 'Phone:') !!}
            {!! Form::text('phone', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:*') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('address', 'Address:') !!}
            {!! Form::text('address', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group row">
          <div class="col-md-6">
            {!! Form::label('town', 'Suburb/Town:') !!}
            {!! Form::text('town', null, ['class'=>'form-control']) !!}
          </div>
          <div class="col-md-6">
              {!! Form::label('postcode', 'Postcode/Zip:') !!}
              {!! Form::text('postcode', null, ['class'=>'form-control']) !!}
          </div>
       </div>
       <div class="form-group">
           {!! Form::label('state', 'State:') !!}
           {!! Form::text('state', null, ['class'=>'form-control']) !!}
       </div>
       <div class="form-group">
           {!! Form::label('country', 'Country:') !!}
           {!! Form::text('country', null, ['class'=>'form-control']) !!}
       </div>
       <div class="form-group">
           {!! Form::label('notes', 'Client Notes:') !!}
           {!! Form::textarea('notes', null, ['class'=>'form-control notes']) !!}
       </div>
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-success">Update Client Profile</button>
  </div>
  {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>

<!-- send Invoice modal -->
<!-- Modal -->
<div class="modal fade modal_1" id="sendInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Send Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=>'invoice.send','id'=>"sendInvoiceForm"]) !!}
        <div class="form-group">
            {!! Form::label('email', 'To',['class'=>"font-weight-bold"]) !!}
            {!! Form::text('email', $client->email, ['class' => 'form-control']) !!}
        </div>
        {!! Form::hidden('name', "$client->firstname &nbsp; $client->lastname") !!}
        <div class="form-group">
          {!! Form::label('email_template_id', 'Choose email template',['class'=>"font-weight-bold"]) !!}
          {!! Form::select('email_template_id', $emailTemplates, null, ['class'=>'form-control','placeholder'=>'Choose an existing email template','id'=>'email_template_id']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('subject', 'Subject',['class'=>"font-weight-bold"]) !!}
          {!! Form::text('subject', null, ['class'=>"form-control"]) !!}
        </div>
        <div class="form-group">
          {!! Form::label('message', 'Message',['class'=>"font-weight-bold"]) !!}
          {!! Form::textarea('message', null, ['class'=>'form-control','id'=>"emailTemplate"]) !!}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Send</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

<!-- Add Notes Modal -->
<!-- Modal -->
<div class="modal fade modal_1" id="editNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['route'=>['jobs.notes',$task->id],'method'=>'PATCH']) !!}
        <div class="modal-body">
            {!! Form::textarea('notes', $task->notes, ['class'=>'form-control notes']) !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save changes</button>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


@endsection
@include('includes.scripts')