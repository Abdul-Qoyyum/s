@extends('userdashboard')
@section('content')
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


              <!-- Plain Form -->
                <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Job</h6>
                      </div>
                <div class="card-body">  


                  <!-- collective form -->

                        {!! Form::model($task, ['action'=>['TaskController@update',$task->id],'method'=>'PATCH','id'=>'task']) !!}

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
                                <a  href="{{route('jobs.index')}}" class="btn btn-danger" >Cancel</a>
                                <input type="submit" class="btn btn-primary" value="Save changes">
                            </div>
                                {!! Form::close() !!}                                








                        </div>

                      </div>
                </div>
                          
              <!-- added 3 lines -->            
              </div>
            </div>
          </div>

                <!-- end plain form -->

@endsection
@section('scripts')
@include('includes.userTinymce')
    <script>
       $(document).ready(function(){
        
            // show company input form
            $('#display').click(function(){
               $('.company').toggleClass('hidden');
            });

            //validate task input 
            $('#task').validate({
              rules : {
                name : "required"
              },
              messages : {
                name : "Please Specify Job Name"
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
                </div><span class="w-50 h-80 ml-2 align-middle">Loading...</span>`);
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

                            // put the response email in the task eamil field
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