@extends('userdashboard')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Client</h6>
  </div>
  <div class="card-body">
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
      <a href="{{route('client.index')}}"  class="btn btn-secondary">Cancel</a>
      <button type="submit" class="btn btn-success">Update Client Profile</button>
  </div>
  {!! Form::close() !!}
  </div>
@stop
@section('scripts')
@include('includes.userTinymce')
    <script>
         $(document).ready( function () {
            // show company input form
            $('.display').click(function(){
               $('.company').toggleClass('hidden');
            });

            // validate input client form input
            $(".client").validate({
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
                  form.submit();
                }
            });


        });
    </script>
@stop
