@extends('userdashboard')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>    
@endsection
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Calendar Overview</h6>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-6 d-flex flex-row-reverse bd-highlight">
        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addNew">Add New</button>
        {{-- <button type="button" class="btn btn-info mb-1 mr-1">Export clients</button>
        <button type="button" class="btn btn-info mb-1 mr-1">Import clients</button> --}}
        </div>
    </div>
  </div>
  <div class="card-body">
    {!! $calendar->calendar() !!}
  </div>
</div>


<!-- Add New Modal -->
<div class="modal fade modal_1" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="padding: 15px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 15px 20px;">
         <p class="text-center light-green">I want to add a new</p>
         <div  class="d-flex mb-4 w-100 justify-content-around add-new-item">
             <div class="add-item-icon text-left mr-3"><i class="fa fa-bullhorn" aria-hidden="true"></i></div>
             <div>
               <h5 class="text-left add-item-title">lead (main shoot)</h5>
               <p class="text-left add-item-description">Schedule a date and time for a new lead’s main shoot.</p>
            </div>  
        </div>
        <div  class="d-flex mb-4 w-100 justify-content-around add-new-item" data-toggle="modal" data-target="#addTask">
             <div class="add-item-icon text-left mr-3"><i class="fa fa-camera" aria-hidden="true"></i></div>
             <div>
               <h5 class="text-left add-item-title">job (main shoot)</h5>
               <p class="text-left add-item-description">Schedule a date and time for a new job’s main shoot.</p>
            </div>  
        </div>
        <div  class="d-flex mb-4 w-100 justify-content-around add-new-item">
             <div class="add-item-icon text-left mr-3"><i class="fa fa-plus" aria-hidden="true"></i></div>
             <div>
               <h5 class="text-left add-item-title">extra shoot</h5>
               <p class="text-left add-item-description">Schedule an extra shoot for an existing job.</p>
            </div>  
        </div>
        <div  class="d-flex mb-4 w-100 justify-content-around add-new-item">
             <div class="add-item-icon text-left mr-3"><i class="fa fa-calendar" aria-hidden="true"></i></div>
             <div>
               <h5 class="text-left add-item-title">appointment</h5>
               <p class="text-left add-item-description">Schedule a date and time for an appointment.</p>
            </div>  
        </div>

      </div>
    </div>
  </div>
</div>









<!-- Modal -->
 <div class="modal fade modal_1" id="addTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add a New Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

                        {!! Form::open(['action'=>'TaskController@store','id'=>'task']) !!}

                              <div class="row h-100">
                                  <div class="font-weight-bold col-md align-middle">Choose Client</div>
                                  <div class="col-md-6 form-group">
                                    {!! Form::select('client_id', $clients, null, ['class' => 'form-control']) !!}
                                  </div>
                                  <span class="align-middle"><strong>OR</strong></span>
                                  <div class="col-md">
                                    <!-- Button trigger addClient modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClient">
                                      <i class="fa fa-plus mr-1" aria-hidden="true"></i><span>Add a New Client</span>
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
        <div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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

@endsection
@section('scripts')
@include('includes.userTinymce')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
    <script>
        $(document).ready(function(){
            
            // show company input form
            $('#display').click(function(){
               $('.company').toggleClass('hidden');
            });

            //validate Tasks input 
            $('#task').validate({
              rules : {
                name : "required"
              },
              messages : {
                name : "Please Specify Jobs Name"
              },
              submitHandler : function(form){
                form.submit();
              }
            });

            // validate input client form input
            $("#client").validate({
              rules : {
                firstname : "required",
                email : {
                 required : true,
                 email : true,
                },
              },
              messages : {
                firstname : "Please specify First Name",
                email : {
                  required : "Please specify email",
                },
              },
              submitHandler: function(form) {
                var profile = $('#profile');
                // Add spinner to the profile button
                 profile.html(`<div class="spinner-border text-black" role="status">
                  <span class="sr-only">Loading...</span>
                </div> <span>Loading...</span>`);
                 profile.prop("disabled", true);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        dataType:'json',
                        data : $(form).serialize(),
                        url : "{{route('jobs.client')}}",
                        success : function (data) {
                          console.log(data);
                          // reset the button
                          profile.html("Save Client Profile");
                          profile.prop("disabled", false);
                          // continue if there is a data response
                           if(typeof data == "object"){
                            $('#addClient').modal('toggle');
                            // grab the custormer's id...
                            // $("input[name='client_id']").val(`${data.id}`);
                            // Attach details to the select input field
                            $("select[name='client_id']").append(`<option value="${data.id}"> 
                                       (${data.firstname}) &nbsp; ${data.email}
                                  </option>`);
                            // set the return value as selected
                            $(`option[value="${data.id}"]`).attr('selected','selected');

                            // put the response email in the Tasks eamil field
                            $('.clientEmail').val(data.email);
                            // disable the email field
                            // $('.clientEmail').prop('disabled',true);
                           }
                        },
                        error : function(){
                            // reset the button
                            profile.html("Save Client Profile");
                            profile.prop("disabled", false);
                        }
                    });

                }
            });

        });
    </script>
@endsection