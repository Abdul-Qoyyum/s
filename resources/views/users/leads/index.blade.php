@extends('userdashboard')
@section('content')

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Hello world
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->









<!-- DataTables Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Leads Overview</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive" width="100%" cellspacing="0">
                <table id="table_id" class="table table-bordered display">
                    <thead>
                        <tr>
                            <th>Lead created </th>
                            <th>Lead</th>
                            <th>Type</th>
                            <th>Main shoot date</th>
                            <th>Mail status</th>
                            <th>Next task</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($leads as $lead)
                        <tr>
                            <td>{{$lead->created_at->diffForHumans()}}</td>
                            <td>{{$lead->name}}</td>
                            <td>{{$lead->job->name}}</td>
                            <td>{{$lead->start_time ? $lead->start_time->diffForHumans() : ''}}</td>
                            <td>Pending</td>
                            <td></td>
                            <td>
                                <!-- Default dropright button -->
                                <div class="dropright">
                                <div class="test" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                                <div class="dropdown-menu">
                                    <!-- Dropdown menu links -->

                                    <ul class="navbar-nav mx-4 w-60">
                                        <li class="nav-item active mb-2" style="cursor: pointer;">
                                            <div  href="#exampleModalLong" data-toggle="modal"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Email</div>
                                        </li>
                                        <li class="nav-item" style="cursor: pointer;">
                                            <div  data-target="#edit{{$lead->id}}" data-toggle="modal"><i class="fas fa-edit"></i> Edit Lead</div>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="edit{{$lead->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Lead</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                {!! Form::model($lead, ['route'=>['lead.update',$lead->id]]) !!}

                              <div class="row">
                                  <div class="font-weight-bold col">Choose Client</div>
                                  <div class="col-5 form-group">
                                    {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'Email']) !!}
                                  </div>
                                  <span><strong>OR</strong></span>
                                  <div class="col">
                                    <!-- Button trigger addClient modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClient">
                                      <i class="fa fa-plus mr-2" aria-hidden="true"></i><span>Add new client</span>
                                    </button>
                                  </div>
                              </div>

                                <hr>
                                <p style="font-weight: bold;">Lead Details</p>
                                   <div class="form-group">
                                       {!! Form::label('name', 'Lead name:') !!}
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
                                     {!! Form::label('start_date', 'Date:',['class'=>'col-2']) !!}
                                     {!! Form::date('start_date', \Carbon\Carbon::now(), ['class'=>'form-control col-4']) !!}
                                     <div class="col-1 text-center"> to </div>
                                     {!! Form::date('end_date', \Carbon\Carbon::now(), ['class'=>'form-control col-4']) !!}
                                   </div>
                                  <div class="form-group row">
                                     {!! Form::label('start_time', 'Time:',['class'=>'col-2']) !!}
                                     {!! Form::time('start_time', \Carbon\Carbon::now(), ['class'=>'form-control col-4']) !!}
                                     <div class="col-1 text-center"> to </div>
                                     {!! Form::time('end_time', \Carbon\Carbon::now(), ['class'=>'form-control col-4']) !!}
                                   </div>
                                   <div class="form-group">
                                     {!! Form::label('location', 'Location') !!}
                                     {!! Form::text('location', null, ['class'=>'form-control']) !!}
                                   </div>
                                    <hr>
                                    <div class="form-group">
                                      {!! Form::label('notes', 'Lead Notes:', ['class'=>'font-weight-bold']) !!}
                                      {!! Form::textarea('notes', null, ['class'=>'form-control notes']) !!}
                                    </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                        </div>

                     @endforeach
                    </tbody>
                </table>

            <!-- modal section -->

            <!-- Modal -->
            <div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-align" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add A New Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <form id="client">
                      @csrf
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
                  <form>
                </div>
              </div>

            </div>


              </div>
            </div>
          </div>

@endsection
@section('scripts')
@include('includes.userTinymce')
    <script>
         $(document).ready( function () {
           //initialize data table
            $('#table_id').DataTable();

        } );

        // show company input form
        $('#display').click(function(){
           $('.company').toggleClass('hidden');
        });

        //Make ajax post request
        $("#client").submit(function(e) {
          e.preventDefault();
          var form_data = $(this).serialize(); //Encode form elements for submission
           $.ajax({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type: "POST",
               dataType:'json',
               data : form_data,
               url : "{{route('lead.client')}}",
               success : function (data) {
                   console.log(JSON.stringify(data));
                   $('#addClient').modal('toggle');
               }
           });
       });




    </script>
@stop
