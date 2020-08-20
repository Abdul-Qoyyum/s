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
        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addTask">Add New</button>
        {{-- <button type="button" class="btn btn-info mb-1 mr-1">Export clients</button>
        <button type="button" class="btn btn-info mb-1 mr-1">Import clients</button> --}}
        </div>
    </div>
  </div>
  <div class="card-body">
    {!! $calendar->calendar() !!}
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

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
@endsection